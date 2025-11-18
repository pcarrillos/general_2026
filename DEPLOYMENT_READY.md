# ✅ PROXY REVERSO - COMPLETAMENTE PREPARADO

El proxy en `/srv/zcentral/proxy-render` está **100% listo** para desplegar en Render.

## 📦 Archivos Incluidos

| Archivo | Estado | Propósito |
|---------|--------|-----------|
| ✅ `Dockerfile` | Listo | Imagen Docker con Nginx Alpine |
| ✅ `nginx.conf.template` | Listo | Configuración segura del proxy |
| ✅ `entrypoint.sh` | Listo | Script de inicio con variables |
| ✅ `render.yaml` | Listo | Configuración de Render |
| ✅ `.env.example` | Listo | Plantilla de variables |
| ✅ `README.md` | Listo | Documentación completa |
| ✅ `SECURITY_CHECKLIST.md` | Listo | Checklist de seguridad |

## 🔒 Medidas de Seguridad Implementadas

### 1. Ocultar Información del Servidor
- ✅ `server_tokens off` - NO muestra versión de Nginx
- ✅ `proxy_hide_header X-Powered-By` - Oculta PHP del backend
- ✅ `proxy_hide_header Server` - Oculta servidor del backend
- ✅ `proxy_hide_header X-Runtime` - Oculta tiempo de ejecución
- ✅ `proxy_hide_header X-Request-Id` - Oculta ID de petición
- ✅ `add_header Server "WebServer"` - Servidor genérico

### 2. Reescribir Redirecciones
- ✅ `proxy_redirect` configurado
- ✅ URLs del backend reescritas al dominio del proxy
- ✅ Previene exposición del dominio/IP real

### 3. Interceptar Errores del Backend
- ✅ `proxy_intercept_errors on`
- ✅ Páginas de error personalizadas
- ✅ NO expone stack traces ni rutas de archivos
- ✅ Mensajes genéricos: "Service temporarily unavailable"

### 4. Control de Rutas
- ✅ `ALLOWED_PATHS` - Rutas permitidas (opcional)
- ✅ `BLOCKED_PATHS` - Rutas bloqueadas (por defecto: .env, .git)
- ✅ Bloqueo a nivel de Nginx (antes de llegar al backend)

### 5. Cabeceras de Seguridad
- ✅ `X-Frame-Options: SAMEORIGIN`
- ✅ `X-Content-Type-Options: nosniff`
- ✅ `X-XSS-Protection: 1; mode=block`

### 6. Configuraciones Adicionales
- ✅ Health check en `/health` (no consulta backend)
- ✅ Compresión gzip
- ✅ Timeouts configurables
- ✅ Tamaño de upload configurable
- ✅ Buffering optimizado

## 🚀 Desplegar en Render

### Opción 1: Desde el Dashboard (Recomendado)

1. **Sube el directorio a Git**:
   ```bash
   cd /srv/zcentral
   git add proxy-render/
   git commit -m "Add Render proxy configuration"
   git push
   ```

2. **Crea el servicio en Render**:
   - Ve a https://dashboard.render.com
   - Click en "New +" → "Web Service"
   - Conecta tu repositorio
   - Configura:
     - **Name**: `tu-proxy-name`
     - **Environment**: Docker
     - **Region**: Oregon (o la más cercana)
     - **Branch**: main
     - **Root Directory**: `proxy-render`
     - **Plan**: Free

3. **Configura variables de entorno** (en "Advanced"):
   ```
   LARAVEL_APP_URL=http://tu-servidor-backend.com:8000
   PORT=8080
   ALLOWED_PATHS=
   BLOCKED_PATHS=^/\.env|^/\.git.*
   MAX_UPLOAD_SIZE=100
   PROXY_TIMEOUT=60
   ```

4. **Despliega**: Click en "Create Web Service"

### Opción 2: Usando render.yaml

1. **Edita `render.yaml`**:
   ```yaml
   envVars:
     - key: LARAVEL_APP_URL
       value: http://tu-servidor-backend.com:8000
   ```

2. **Despliega**:
   - En Render Dashboard → "New +" → "Blueprint"
   - Conecta repositorio
   - Render detectará automáticamente `render.yaml`

## 🔧 Configuración del Backend Laravel

Después de desplegar el proxy, configura Laravel:

### 1. Actualizar `.env` de Laravel:

```env
# IMPORTANTE: Activar modo proxy
BEHIND_PROXY=true

# URL del proxy (NO del backend)
PROXY_URL=https://tu-proxy.onrender.com
APP_URL=https://tu-proxy.onrender.com
ASSET_URL=https://tu-proxy.onrender.com

# Seguridad
APP_ENV=production
APP_DEBUG=false
FORCE_HTTPS=true
```

### 2. Configurar `config/proxies.json`:

```json
{
  "proxies": [
    {
      "domain": "tu-proxy.onrender.com",
      "name": "Tu Equipo",
      "chat_ids": ["123456789"],
      "enabled": true
    }
  ]
}
```

### 3. Limpiar caché en Laravel:

```bash
cd /srv/zcentral
php artisan cache:clear
php artisan config:clear
```

## ✅ Verificación Post-Despliegue

### 1. Health Check:
```bash
curl https://tu-proxy.onrender.com/health
# Esperado: OK
```

### 2. Verificar Headers:
```bash
curl -I https://tu-proxy.onrender.com
# Esperado: server: WebServer
# NO esperado: server: nginx/1.x o x-powered-by: PHP/8.2
```

### 3. Probar la aplicación:
```bash
curl https://tu-proxy.onrender.com/api/telegram/send \
  -X POST \
  -H "Content-Type: application/json" \
  -d '{"uniqid":"test123","data":{}}'
```

### 4. Verificar dominio no autorizado:
```bash
curl https://otro-dominio.com
# Esperado: {"error":"Forbidden","message":"Domain not authorized"}
```

### 5. Verificar rutas bloqueadas:
```bash
curl https://tu-proxy.onrender.com/.env
# Esperado: Access Denied
```

## 📊 Lo que el Proxy Oculta

| Información | Estado | Cómo |
|-------------|--------|------|
| IP del backend | ✅ Oculta | Proxy intermediario |
| Dominio del backend | ✅ Oculta | Redirecciones reescritas |
| Puerto del backend | ✅ Oculta | No se expone en headers |
| Versión de Nginx | ✅ Oculta | `server_tokens off` |
| Versión de PHP | ✅ Oculta | `proxy_hide_header X-Powered-By` |
| Stack traces | ✅ Oculta | `proxy_intercept_errors on` |
| Rutas de archivos | ✅ Oculta | Errores interceptados |
| Headers del backend | ✅ Oculta | `proxy_hide_header` |

## 🎯 Limitaciones del Plan Gratuito de Render

- ⏰ Servicio se suspende tras 15 min de inactividad
- 🐌 Primera carga post-suspensión: ~1 minuto
- 💾 750 horas/mes de servicio
- 🌐 Ancho de banda limitado
- 💰 Costo: $0 USD

## 🆘 Solución de Problemas

### El proxy no arranca:
1. Verifica logs en Render Dashboard
2. Asegúrate de que `LARAVEL_APP_URL` sea accesible
3. Verifica que el Dockerfile sea válido

### Errores 502 Bad Gateway:
1. El backend no está accesible
2. Verifica que `LARAVEL_APP_URL` sea correcto
3. Verifica firewall del servidor backend

### Se expone información del backend:
1. Revisa `SECURITY_CHECKLIST.md`
2. Verifica que Laravel tenga `APP_DEBUG=false`
3. Verifica que Laravel tenga `BEHIND_PROXY=true`

### Dominios no autorizados acceden:
1. Verifica `config/proxies.json` en Laravel
2. Asegúrate de que el dominio esté exactamente como en Render
3. Limpia caché: `php artisan cache:clear`

## 📚 Documentación

- **README.md** - Guía general de uso
- **SECURITY_CHECKLIST.md** - Checklist de seguridad completo
- **DEPLOYMENT_READY.md** - Este archivo

## 🎉 Resumen

El proxy está **100% LISTO** para:

✅ Desplegar en Render (plan gratuito)
✅ Ocultar completamente el backend
✅ Manejar múltiples dominios (multi-proxy)
✅ Controlar rutas permitidas/bloqueadas
✅ Interceptar errores del backend
✅ Reescribir redirecciones
✅ Funcionar con la configuración de seguridad de Laravel

**TODO ESTÁ PREPARADO Y SEGURO. LISTO PARA PRODUCCIÓN.**
