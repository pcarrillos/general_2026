# Proxy Reverso para Laravel en Render

Este directorio contiene los archivos necesarios para desplegar un proxy reverso en Render (plan gratuito) que apuntará a tu aplicación Laravel, ocultando su IP y dominio real.

## Archivos incluidos

- `Dockerfile`: Imagen Docker basada en Nginx Alpine
- `nginx.conf.template`: Plantilla de configuración de Nginx
- `entrypoint.sh`: Script de inicio que procesa variables de entorno
- `render.yaml`: Configuración de despliegue en Render
- `.env.example`: Ejemplo de archivo de variables de entorno
- `README.md`: Este archivo con instrucciones

## Configuración previa

### 1. Configurar variables de entorno

Copia el archivo `.env.example` y edítalo con tus valores:

```bash
cp .env.example .env
```

Edita el archivo `.env` con los valores de tu aplicación:

```env
# URL completa de tu aplicación Laravel (OBLIGATORIO)
LARAVEL_APP_URL=http://tu-servidor.com:8000

# Puerto (Render lo asigna automáticamente, pero puedes definir uno por defecto)
PORT=8080

# Rutas permitidas (separadas por |)
# Ejemplos:
#   Solo API: ALLOWED_PATHS=^/api/.*
#   API y public: ALLOWED_PATHS=^/api/.*|^/public/.*
#   Todas (por defecto): ALLOWED_PATHS=
ALLOWED_PATHS=

# Rutas bloqueadas (separadas por |)
# Por defecto bloquea archivos de configuración
BLOCKED_PATHS=^/\.env|^/\.git.*

# Tamaño máximo de archivos a subir (en MB)
MAX_UPLOAD_SIZE=100

# Timeout de conexión (en segundos)
PROXY_TIMEOUT=60
```

**IMPORTANTE**: El servidor Laravel debe ser accesible desde internet para que Render pueda conectarse.

### 2. Ejemplos de configuración de rutas

#### Permitir solo API endpoints:
```env
ALLOWED_PATHS=^/api/.*
```

#### Permitir API y archivos públicos:
```env
ALLOWED_PATHS=^/api/.*|^/public/.*|^/storage/.*
```

#### Bloquear rutas administrativas:
```env
BLOCKED_PATHS=^/\.env|^/\.git.*|^/admin.*|^/phpmyadmin.*
```

### 3. Editar render.yaml

Abre `render.yaml` y asegúrate de que las variables de entorno estén configuradas correctamente. Render tomará los valores de las variables que definas en su dashboard.

## Despliegue en Render

### Opción 1: Desde el Dashboard de Render (Recomendado)

1. Sube este directorio a un repositorio Git (GitHub, GitLab, etc.)
2. Ve a [Render Dashboard](https://dashboard.render.com/)
3. Click en "New +" → "Web Service"
4. Conecta tu repositorio
5. Configura el servicio:
   - **Name**: zcentral-proxy (o el nombre que prefieras)
   - **Environment**: Docker
   - **Region**: Oregon (o la más cercana a ti)
   - **Branch**: main (o tu rama principal)
   - **Root Directory**: `proxy-render`
   - **Plan**: Free
6. En "Advanced", añade las variables de entorno desde tu archivo `.env`:
   - `LARAVEL_APP_URL`: http://tu-servidor-laravel.com:8000 (OBLIGATORIO)
   - `PORT`: 8080 (opcional, Render lo asigna automáticamente)
   - `ALLOWED_PATHS`: Define las rutas permitidas (vacío = todas)
   - `BLOCKED_PATHS`: ^/\.env|^/\.git.* (o tus propias reglas)
   - `MAX_UPLOAD_SIZE`: 100 (en MB)
   - `PROXY_TIMEOUT`: 60 (en segundos)
7. Click en "Create Web Service"

### Opción 2: Usando render.yaml

1. Sube el directorio `proxy-render` a un repositorio Git
2. En Render Dashboard, click en "New +" → "Blueprint"
3. Conecta tu repositorio
4. Render detectará automáticamente el `render.yaml`
5. Revisa la configuración y confirma

## ⚠️ Configurar Laravel para OCULTAR el backend (CRÍTICO)

**IMPORTANTE**: Sin esta configuración, Laravel podría exponer la URL/IP real de tu servidor. Sigue TODOS estos pasos:

### 1. Editar config/trustedproxy.php

```php
<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    // Confiar en TODOS los proxies (Render usa IPs dinámicas)
    protected $proxies = '*';

    // Confiar en todas las cabeceras del proxy
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
```

### 2. Actualizar .env de Laravel (MUY IMPORTANTE)

```env
# URL del PROXY, NO del servidor real
APP_URL=https://tu-proxy-render.onrender.com
ASSET_URL=https://tu-proxy-render.onrender.com

# FORZAR HTTPS si el proxy usa HTTPS
FORCE_HTTPS=true

# Deshabilitar el modo debug en producción (evita exponer rutas)
APP_DEBUG=false
APP_ENV=production
```

### 3. Forzar URLs del proxy en AppServiceProvider

Edita `app/Providers/AppServiceProvider.php`:

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Forzar HTTPS si está detrás de proxy
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Forzar dominio del proxy
        URL::forceRootUrl(config('app.url'));
    }
}
```

### 4. Si usas sesiones, actualiza SESSION_DOMAIN

```env
SESSION_DOMAIN=.tu-proxy-render.onrender.com
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax
```

### 5. Deshabilitar errores detallados

En `.env`:
```env
APP_DEBUG=false
LOG_LEVEL=error
```

En `app/Exceptions/Handler.php`, asegúrate de NO mostrar información sensible en errores.

## Verificación

1. Una vez desplegado, Render te dará una URL como: `https://zcentral-proxy.onrender.com`
2. Visita `https://tu-proxy-render.onrender.com/health` - deberías ver "OK"
3. Visita `https://tu-proxy-render.onrender.com` - deberías ver tu aplicación Laravel

## Limitaciones del Plan Gratuito de Render

- ⏰ El servicio se suspende después de 15 minutos de inactividad
- 🐌 Primera carga después de suspensión puede tardar ~1 minuto
- 💾 750 horas de servicio por mes
- 🌐 Ancho de banda limitado

## Solución de problemas

### El proxy no puede conectarse a Laravel

- Verifica que `LARAVEL_APP_URL` en las variables de entorno de Render sea accesible públicamente
- Asegúrate de que el puerto esté abierto en el firewall de tu servidor Laravel
- Revisa los logs en Render Dashboard → tu servicio → Logs
- El script `entrypoint.sh` muestra la configuración al inicio, revisa los logs

### Error 502 Bad Gateway

- Laravel no está respondiendo o no es accesible
- Verifica que Laravel esté ejecutándose
- Comprueba que `LARAVEL_APP_URL` sea correcto
- Revisa los logs del contenedor en Render

### Error 403 Access Denied

- Tu ruta está bloqueada por `BLOCKED_PATHS`
- Tu ruta no está en `ALLOWED_PATHS` (si definiste rutas permitidas)
- Revisa la configuración de tus patrones de rutas

### Laravel muestra URLs incorrectas

- Configura `TrustedProxies` en Laravel
- Actualiza `APP_URL` en `.env` de Laravel

### Ver configuración activa

Los logs de Render mostrarán la configuración al inicio del contenedor:
```
=========================================
Configuración del Proxy Reverso
=========================================
Puerto: 8080
Aplicación Laravel: http://tu-servidor.com:8000
Backend: tu-servidor.com:8000
Rutas permitidas: .*
Rutas bloqueadas: ^/\.env|^/\.git.*
Tamaño máx. upload: 100M
Timeout: 60s
=========================================
```

## Monitoreo

En Render Dashboard puedes:
- Ver logs en tiempo real
- Monitorear uso de recursos
- Configurar notificaciones de downtime

## 🔒 Seguridad: ¿Qué tan protegido está el backend?

### ✅ Lo que el proxy OCULTA:

1. **IP del servidor Laravel**: Los clientes solo ven la IP de Render
2. **Puerto real**: El puerto del servidor Laravel permanece oculto
3. **Cabeceras del servidor**: `X-Powered-By`, `Server`, etc. se eliminan
4. **Redirecciones**: Se reescriben automáticamente al dominio del proxy

### ⚠️ Lo que DEBES configurar en Laravel:

1. **APP_URL y ASSET_URL**: Deben apuntar al proxy (no al servidor real)
2. **TrustedProxies**: Confiar en el proxy para recibir cabeceras correctas
3. **APP_DEBUG=false**: Evitar que errores expongan rutas/información
4. **URL::forceRootUrl()**: Forzar que Laravel use el dominio del proxy

### ❌ Lo que AÚN podría filtrar información:

1. **APIs de terceros**: Si Laravel llama APIs que registran tu IP, expondrá la IP real
2. **Webhooks**: Si Laravel envía webhooks, la IP de origen será la real
3. **DNS lookup**: Un atacante podría intentar resolver tu dominio real si lo conoce
4. **Logs y errores**: Si Laravel loggea URLs absolutas con el dominio real

### 🛡️ Recomendaciones de seguridad adicional:

1. **Firewall**: Configura el firewall de Laravel para SOLO aceptar conexiones desde las IPs de Render
   ```bash
   # Ejemplo con UFW
   sudo ufw allow from RENDER_IP to any port 8000
   sudo ufw deny 8000
   ```

2. **Token secreto**: Añade un header secreto entre proxy y Laravel
   - En Nginx: `proxy_set_header X-Secret-Token "tu-token-secreto";`
   - En Laravel: Middleware que valide este header

3. **VPN/Túnel**: Usa una VPN entre Render y tu servidor (más complejo)

4. **No usar dominio público**: Si tu Laravel no tiene dominio DNS público, será más difícil de encontrar

5. **Rate limiting**: Implementa en ambos lados (proxy y Laravel)

### 📊 Nivel de protección:

- **Contra usuarios normales**: ✅ Muy protegido (no verán el backend)
- **Contra inspección de headers**: ✅ Protegido (headers ocultos/reescritos)
- **Contra rastreo de IP**: ✅ Protegido (solo ven IP de Render)
- **Contra ataques sofisticados**: ⚠️ Requiere configuración adicional (firewall, tokens)

## Seguridad adicional (recomendado)

Para mayor seguridad, considera:

1. **Restringir acceso por IP** en Laravel (firewall para solo aceptar IPs de Render)
2. **Usar token secreto** entre el proxy y Laravel
3. **Configurar CORS** apropiadamente
4. **Implementar rate limiting** en Nginx y Laravel
5. **No exponer el dominio real** en DNS públicos

## 🌐 Uso con Cloudflare

Si tu dominio Laravel está detrás de Cloudflare con nube naranja 🟠, **ya está todo configurado**:

- ✅ El proxy envía el header `X-Proxy-Domain` con su dominio real
- ✅ Laravel usa `X-Proxy-Domain` para identificar el proxy (no `Host`)
- ✅ Funciona perfectamente con Cloudflare en el medio

**Configuración en `config/proxies.json`**:
```json
{
  "domain": "proxy1.onrender.com"  ← Dominio del PROXY, no de Cloudflare
}
```

**Más información**: Ver `/srv/zcentral/CLOUDFLARE_CONFIG.md`

## Contacto

Para dudas o problemas con la configuración, consulta:
- [Documentación de Render](https://render.com/docs)
- [Documentación de Nginx](https://nginx.org/en/docs/)
- [Laravel TrustedProxies](https://laravel.com/docs/requests#configuring-trusted-proxies)
