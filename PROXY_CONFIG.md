# Configuración del Proxy Reverso (Render)

Esta aplicación Laravel está configurada para funcionar detrás de un proxy reverso (Render) que oculta la URL/IP real del servidor backend.

## 📋 Archivos modificados

### 1. `/bootstrap/app.php`
- Configurado `trustProxies(at: '*')` para confiar en todos los proxies
- Esto permite que Laravel reciba correctamente las cabeceras X-Forwarded-*

### 2. `/app/Http/Middleware/TrustProxies.php`
- Middleware creado para gestionar las cabeceras del proxy
- Confía en todas las cabeceras: X-Forwarded-For, X-Forwarded-Host, X-Forwarded-Port, X-Forwarded-Proto

### 3. `/app/Providers/AppServiceProvider.php`
- Configurado para forzar URLs del proxy cuando `BEHIND_PROXY=true`
- Fuerza HTTPS cuando `FORCE_HTTPS=true`
- Usa `PROXY_URL` o `APP_URL` como dominio base para todas las URLs generadas

### 4. `/config/app.php`
- Añadidas configuraciones: `behind_proxy`, `proxy_url`, `force_https`
- Configurado `asset_url` para assets estáticos

### 5. `/.env.example`
- Añadidas variables de entorno para configuración del proxy
- Documentadas opciones de sesión para HTTPS

## 🚀 Cómo activar el modo proxy

### Paso 1: Configurar variables de entorno

Edita tu archivo `.env` y configura:

```env
# Activar modo proxy
BEHIND_PROXY=true

# URL pública del proxy (la URL de Render)
PROXY_URL=https://tu-app.onrender.com
APP_URL=https://tu-app.onrender.com
ASSET_URL=https://tu-app.onrender.com

# Forzar HTTPS (si el proxy usa HTTPS)
FORCE_HTTPS=true

# Configuración de producción (IMPORTANTE)
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=error
```

### Paso 2: Configurar sesiones (si usas sesiones)

```env
# Dominio de sesión (debe coincidir con tu dominio de Render)
SESSION_DOMAIN=.tu-app.onrender.com
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax
```

### Paso 3: Limpiar caché

Después de cambiar la configuración:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## 🔒 Seguridad

### Lo que está protegido:

✅ **IP del servidor**: Oculta detrás del proxy de Render
✅ **Puerto del servidor**: No visible para los clientes
✅ **URLs generadas**: Todas apuntan al dominio del proxy
✅ **Redirecciones**: Laravel redirige al dominio del proxy
✅ **Assets**: Se sirven usando la URL del proxy
✅ **Cabeceras sensibles**: El proxy elimina X-Powered-By, Server, etc.

### Recomendaciones adicionales:

1. **Firewall**: Configura el firewall para SOLO aceptar conexiones desde las IPs de Render
   ```bash
   # Obtén las IPs de Render y configura UFW
   sudo ufw allow from RENDER_IP to any port 8000
   sudo ufw deny 8000
   ```

2. **Token secreto**: Para mayor seguridad, puedes añadir un middleware que valide un header secreto:
   - El proxy Render enviaría: `X-Secret-Token: tu-token-secreto`
   - Laravel validaría este token antes de procesar la petición

3. **Rate Limiting**: Implementado en ambos lados (proxy y Laravel)

4. **No exponer dominio real**: Si tu servidor Laravel tiene un dominio DNS, no lo compartas públicamente

## 📊 Verificación

Para verificar que la configuración funciona:

1. **Revisa los logs de Laravel**: Deberían mostrar la IP del proxy, no del cliente
2. **Inspecciona las URLs generadas**: Deben usar el dominio del proxy
3. **Verifica las redirecciones**: No deben exponer el dominio real
4. **Revisa los assets**: Deben cargarse desde el dominio del proxy

## 🔧 Troubleshooting

### Laravel genera URLs con el dominio incorrecto

- Verifica que `BEHIND_PROXY=true`
- Asegúrate de que `PROXY_URL` esté configurado correctamente
- Limpia la caché: `php artisan config:clear`

### Sesiones no funcionan

- Verifica `SESSION_DOMAIN` (debe coincidir con el dominio del proxy)
- Si usas HTTPS, asegúrate de que `SESSION_SECURE_COOKIE=true`
- Verifica que las cookies se estén enviando correctamente

### Errores de HTTPS/HTTP mixto

- Asegúrate de que `FORCE_HTTPS=true` cuando uses HTTPS
- Verifica que `APP_URL` use `https://`
- Revisa que no haya assets hardcodeados con `http://`

## 📝 Modo desarrollo vs producción

### Desarrollo (sin proxy):
```env
BEHIND_PROXY=false
APP_URL=http://localhost:8000
APP_DEBUG=true
APP_ENV=local
FORCE_HTTPS=false
```

### Producción (con proxy Render):
```env
BEHIND_PROXY=true
PROXY_URL=https://tu-app.onrender.com
APP_URL=https://tu-app.onrender.com
ASSET_URL=https://tu-app.onrender.com
APP_DEBUG=false
APP_ENV=production
FORCE_HTTPS=true
SESSION_SECURE_COOKIE=true
```

## 📚 Archivos del proxy

El proxy reverso está configurado en `/srv/zcentral/proxy-render/`:
- `nginx.conf.template`: Configuración de Nginx
- `Dockerfile`: Imagen Docker del proxy
- `entrypoint.sh`: Script de inicio
- `.env.example`: Variables de entorno del proxy
- `render.yaml`: Configuración de despliegue en Render
- `README.md`: Documentación completa del proxy

## 🆘 Soporte

Si tienes problemas con la configuración:
1. Revisa los logs de Laravel: `storage/logs/laravel.log`
2. Revisa los logs del proxy en Render Dashboard
3. Verifica que todas las variables de entorno estén correctamente configuradas
4. Asegúrate de haber limpiado la caché después de cambiar la configuración
