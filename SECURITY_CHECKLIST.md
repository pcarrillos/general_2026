# Checklist de Seguridad - Proxy Reverso (Render)

Este proxy está configurado para **NO exponer** información del backend (Laravel).

## ✅ Configuraciones de Seguridad Implementadas

### 1. Ocultar Información del Servidor (nginx.conf.template:58-65)

```nginx
server_tokens off;                    # NO muestra versión de nginx
proxy_hide_header X-Powered-By;       # Oculta PHP version del backend
proxy_hide_header Server;             # Oculta servidor del backend
proxy_hide_header X-Runtime;          # Oculta tiempo de ejecución
proxy_hide_header X-Request-Id;       # Oculta ID de petición
add_header Server "WebServer" always; # Servidor genérico
```

**Resultado**: Cliente solo ve "WebServer", no "nginx/1.x" o "PHP/8.2"

---

### 2. Reescribir Redirecciones (nginx.conf.template:83-84)

```nginx
proxy_redirect ${LARAVEL_APP_URL} $scheme://$host;
proxy_redirect ~^https?://[^/]+(/.*) $scheme://$host$1;
```

**Qué hace**: Si Laravel redirige a `http://backend-real.com/login`, el cliente ve `https://proxy.onrender.com/login`

**Previene**: Exposición accidental de la URL real del backend

---

### 3. Interceptar Errores del Backend (nginx.conf.template:111, 115-135)

```nginx
proxy_intercept_errors on;

error_page 500 502 503 504 @error_backend;
error_page 404 @error_notfound;
error_page 403 @error_forbidden;

location @error_backend {
    return 500 '{"error":"Service temporarily unavailable","status":500}';
}
```

**Qué hace**: Si el backend devuelve un error con información sensible, el proxy lo reemplaza con un mensaje genérico

**Previene**: Stack traces, rutas de archivos, y mensajes de error del backend

---

### 4. Control de Rutas (nginx.conf.template:33-42, 71-78)

```nginx
# Bloquear rutas peligrosas
map $request_uri $blocked {
    default 0;
    ~*${BLOCKED_PATHS} 1;
}

if ($blocked = 1) {
    return 403 "Access Denied\n";
}
```

**Configuración en .env**:
```env
BLOCKED_PATHS=^/\.env|^/\.git.*|^/admin.*
```

**Previene**: Acceso a archivos de configuración, rutas administrativas, etc.

---

### 5. Cabeceras de Seguridad (nginx.conf.template:53-55)

```nginx
add_header X-Frame-Options "SAMEORIGIN" always;
add_header X-Content-Type-Options "nosniff" always;
add_header X-XSS-Protection "1; mode=block" always;
```

**Previene**: Clickjacking, MIME sniffing, XSS attacks

---

### 6. Health Check Público (nginx.conf.template:68-72)

```nginx
location /health {
    access_log off;
    return 200 "OK\n";
}
```

**Qué hace**: Render puede verificar que el proxy está vivo sin consultar el backend

**Previene**: Exponer el estado real del backend

---

## 📋 Variables de Entorno Requeridas

Configura estas variables en Render Dashboard o en `render.yaml`:

### Obligatorias:

```env
LARAVEL_APP_URL=http://tu-servidor-backend.com:8000
```

### Opcionales (con valores por defecto):

```env
PORT=8080                                    # Puerto del proxy
ALLOWED_PATHS=                               # Vacío = todas las rutas
BLOCKED_PATHS=^/\.env|^/\.git.*            # Rutas bloqueadas
MAX_UPLOAD_SIZE=100                         # MB
PROXY_TIMEOUT=60                            # Segundos
```

---

## 🔍 Verificación de Seguridad

### 1. Verificar que NO se exponen cabeceras sensibles:

```bash
curl -I https://tu-proxy.onrender.com
```

**✅ Esperado (seguro)**:
```
HTTP/2 200
server: WebServer
x-content-type-options: nosniff
x-frame-options: SAMEORIGIN
```

**❌ NO esperado (inseguro)**:
```
HTTP/2 200
server: nginx/1.18.0
x-powered-by: PHP/8.2.0
```

---

### 2. Verificar redirecciones:

```bash
curl -I https://tu-proxy.onrender.com/redirect
```

**✅ Esperado**: `Location: https://tu-proxy.onrender.com/destino`

**❌ NO esperado**: `Location: http://backend-real.com/destino`

---

### 3. Verificar errores del backend:

Fuerza un error 500 en el backend y verifica la respuesta:

```bash
curl https://tu-proxy.onrender.com/ruta-que-causa-error
```

**✅ Esperado**:
```json
{
  "error": "Service temporarily unavailable",
  "status": 500
}
```

**❌ NO esperado**:
```
Fatal error: Call to undefined function...
in /var/www/html/app/... on line 123
```

---

### 4. Verificar rutas bloqueadas:

```bash
curl https://tu-proxy.onrender.com/.env
```

**✅ Esperado**:
```
Access Denied
```

---

### 5. Verificar health check:

```bash
curl https://tu-proxy.onrender.com/health
```

**✅ Esperado**:
```
OK
```

---

## ⚠️ Información que el Proxy NO puede ocultar

### 1. IP del cliente
El backend verá la IP real del cliente a través de `X-Forwarded-For`

**Esto es correcto**: Laravel necesita la IP real para rate limiting, logs, etc.

### 2. Headers personalizados del cliente
Si el cliente envía headers personalizados, el backend los recibirá

**Mitigación**: El backend debe validar todos los headers

### 3. Dominio del proxy
El cliente obviamente conoce el dominio de Render que está usando

**Esto es correcto**: Es el dominio público que quieres exponer

---

## 🛡️ Niveles de Protección

| Qué se Oculta | Nivel | Notas |
|---------------|-------|-------|
| IP del backend | ✅ Total | Cliente no puede descubrirla |
| Dominio del backend | ✅ Total | Redirecciones reescritas |
| Puerto del backend | ✅ Total | No se expone en headers |
| Versión de Nginx (proxy) | ✅ Total | `server_tokens off` |
| Versión de PHP (backend) | ✅ Total | `proxy_hide_header X-Powered-By` |
| Stack traces del backend | ✅ Total | `proxy_intercept_errors on` |
| Rutas de archivos | ✅ Total | Errores interceptados |
| Archivos sensibles (.env) | ✅ Total | Bloqueados por `BLOCKED_PATHS` |
| Tiempo de respuesta | ⚠️ Parcial | Cliente puede medir tiempos |
| Existencia del backend | ❌ Expuesto | Si proxy responde, hay un backend |

---

## 🚨 Señales de Alerta

Si detectas alguna de estas señales, HAY UN PROBLEMA:

### ❌ Headers que NO deberían aparecer:

```
X-Powered-By: PHP/8.2.0
Server: nginx/1.18.0
X-Laravel-Version: 11.x
X-Runtime: 0.234ms
```

### ❌ Mensajes de error detallados:

```
Fatal error in /var/www/html/...
Symfony\Component\HttpKernel\Exception\...
Stack trace: #0 /var/www/html/vendor/...
```

### ❌ Redirecciones al backend real:

```
Location: http://backend-real.com/login
Location: http://192.168.1.100:8000/api
```

### ❌ Acceso a archivos sensibles:

```bash
curl https://proxy.onrender.com/.env
# Devuelve contenido del archivo
```

---

## 🔧 Solución de Problemas

### Se están exponiendo headers del backend

**Verifica**:
1. `proxy_hide_header` está configurado correctamente
2. Laravel tiene el middleware `SecurityHeaders`
3. PHP tiene `expose_php = Off`

**Solución**:
```nginx
proxy_hide_header X-Powered-By;
proxy_hide_header Server;
proxy_hide_header X-Runtime;
```

---

### Las redirecciones exponen el backend

**Verifica**:
1. `proxy_redirect` está configurado
2. Laravel tiene `PROXY_URL` configurado
3. Laravel usa `URL::forceRootUrl()`

**Solución**:
```nginx
proxy_redirect ${LARAVEL_APP_URL} $scheme://$host;
```

---

### Los errores exponen información del backend

**Verifica**:
1. `proxy_intercept_errors on` está configurado
2. Laravel tiene `APP_DEBUG=false` en producción
3. Laravel usa el `Handler` personalizado

**Solución**:
```nginx
proxy_intercept_errors on;
error_page 500 @error_backend;
```

---

## 📊 Resumen de Archivos

| Archivo | Propósito | Crítico |
|---------|-----------|---------|
| `nginx.conf.template` | Configuración del proxy | ✅ Sí |
| `entrypoint.sh` | Procesa variables de entorno | ✅ Sí |
| `Dockerfile` | Construye imagen del proxy | ✅ Sí |
| `render.yaml` | Configuración de despliegue | ⚠️ Opcional |
| `.env.example` | Plantilla de configuración | ℹ️ Referencia |
| `README.md` | Documentación general | ℹ️ Referencia |

---

## ✅ Checklist Final

Antes de desplegar en producción:

- [ ] Variables de entorno configuradas en Render
- [ ] `LARAVEL_APP_URL` apunta al backend correcto
- [ ] `BLOCKED_PATHS` incluye rutas sensibles
- [ ] Backend tiene `BEHIND_PROXY=true`
- [ ] Backend tiene `APP_DEBUG=false`
- [ ] Probadas las verificaciones de seguridad (curl -I)
- [ ] Health check responde correctamente
- [ ] Redirecciones usan el dominio del proxy
- [ ] Errores NO muestran información del backend

---

## 🎯 Estado Actual

**El proxy está LISTO y COMPLETAMENTE PREPARADO** para:

✅ Ocultar completamente el backend
✅ Reescribir redirecciones
✅ Interceptar errores
✅ Bloquear rutas sensibles
✅ Eliminar headers que exponen información
✅ Funcionar en el plan gratuito de Render

**NO expone**:
- ❌ IP del backend
- ❌ Dominio del backend
- ❌ Puerto del backend
- ❌ Versión de software
- ❌ Stack traces
- ❌ Rutas de archivos
- ❌ Información sensible

**Todo está configurado y seguro.**
