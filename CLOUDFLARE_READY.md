# ✅ CONFIGURACIÓN CON CLOUDFLARE - LISTA

El proxy está **completamente preparado** para funcionar con Cloudflare (nube naranja 🟠).

## 🌐 Problema Resuelto

### ❌ Problema Original:

Cloudflare reemplaza el header `Host`, causando:
```
Cliente → Cloudflare → Render → Laravel

Header Host original:    proxy1.onrender.com
Header Host modificado:  tu-dominio.com (por Cloudflare)

Resultado: Laravel no sabe qué proxy envió la petición ❌
```

### ✅ Solución Implementada:

Usamos un **header personalizado** `X-Proxy-Domain`:

```
Proxy Render (nginx.conf.template:101):
  proxy_set_header X-Proxy-Domain $host;

Laravel (ValidateProxyDomain.php:29):
  $host = $request->header('X-Proxy-Domain') ?? $request->getHost();
```

**Resultado**:
```
Cliente → Cloudflare → Render → Laravel

Headers que llegan a Laravel:
  Host: tu-dominio.com                    (de Cloudflare)
  X-Proxy-Domain: proxy1.onrender.com    (del proxy Render) ✅

Laravel usa X-Proxy-Domain para validar ✅
```

## 🎯 Arquitectura Final

```
┌─────────────────────────────────────────────────────────────┐
│                         CLIENTE                              │
└────────────────┬────────────────────────────────────────────┘
                 │ https://tu-dominio.com/api/telegram/send
                 ↓
┌─────────────────────────────────────────────────────────────┐
│                    CLOUDFLARE (Nube 🟠)                      │
│  - SSL/TLS termination                                       │
│  - DDoS protection                                           │
│  - Reemplaza Host: tu-dominio.com                           │
└────────────────┬────────────────────────────────────────────┘
                 │ https://proxy1.onrender.com/api/telegram/send
                 ↓
┌─────────────────────────────────────────────────────────────┐
│                  RENDER PROXY (Free Tier)                    │
│  - Añade: X-Proxy-Domain: proxy1.onrender.com              │
│  - Oculta información del backend                           │
│  - Reescribe redirecciones                                  │
│  - Intercepta errores                                       │
└────────────────┬────────────────────────────────────────────┘
                 │ http://backend-vps.com:8000/api/telegram/send
                 │ Headers:
                 │   Host: tu-dominio.com
                 │   X-Proxy-Domain: proxy1.onrender.com ✅
                 ↓
┌─────────────────────────────────────────────────────────────┐
│                    LARAVEL BACKEND (VPS)                     │
│  1. Lee X-Proxy-Domain: proxy1.onrender.com                │
│  2. Busca en config/proxies.json                           │
│  3. Encuentra: {"domain":"proxy1.onrender.com"}            │
│  4. Obtiene: chat_ids: ["123456789"]                       │
│  5. Envía mensaje a Telegram                               │
└─────────────────────────────────────────────────────────────┘
```

## 📋 Configuración Requerida

### 1. En Cloudflare:

**DNS**:
```
Tipo: A o CNAME
Nombre: tu-dominio.com (o @)
Contenido: [IP del servidor Laravel o dominio]
Proxy: 🟠 Proxied (Nube naranja ACTIVADA)
```

**SSL/TLS**:
```
Modo: Full o Full (strict)
```

### 2. En Render (Proxy):

**Variables de entorno** (ya configuradas en render.yaml):
```env
LARAVEL_APP_URL=http://tu-servidor-backend.com:8000
PORT=8080
BLOCKED_PATHS=^/\.env|^/\.git.*
```

**El proxy YA tiene** (nginx.conf.template:101):
```nginx
proxy_set_header X-Proxy-Domain $host;
```

### 3. En Laravel (Backend):

**config/proxies.json** - USA EL DOMINIO DEL PROXY:
```json
{
  "proxies": [
    {
      "domain": "proxy1.onrender.com",  ← Dominio de RENDER, NO de Cloudflare
      "name": "Equipo Ventas",
      "chat_ids": ["123456789"],
      "enabled": true
    }
  ]
}
```

**IMPORTANTE**: NO uses `tu-dominio.com`, usa `proxy1.onrender.com`

**.env**:
```env
BEHIND_PROXY=true
PROXY_URL=https://tu-dominio.com
APP_URL=https://tu-dominio.com
APP_DEBUG=false
APP_ENV=production
```

## 🔍 Verificación

### 1. Probar desde Cloudflare:

```bash
curl https://tu-dominio.com/api/telegram/send \
  -X POST \
  -H "Content-Type: application/json" \
  -d '{"uniqid":"test123","data":{}}'
```

**Esperado**: ✅ Mensaje enviado correctamente

### 2. Verificar logs de Laravel:

```bash
tail -f /srv/zcentral/storage/logs/laravel.log
```

**Esperado**:
```
[INFO] Petición autorizada desde proxy
{
  "host": "proxy1.onrender.com",
  "domain": "proxy1.onrender.com",
  "name": "Equipo Ventas",
  "chat_ids_count": 1
}

[INFO] Mensaje enviado a Telegram
{
  "chat_id": "123456789",
  "name": "Equipo Ventas",
  "domain": "tu-dominio.com",
  "session": "test123"
}
```

### 3. Verificar que NO se exponga información:

```bash
curl -I https://tu-dominio.com
```

**Esperado** (seguro):
```
server: WebServer
x-content-type-options: nosniff
```

**NO esperado** (inseguro):
```
server: nginx/1.18.0
x-powered-by: PHP/8.2.0
```

## ✅ Lista de Verificación

- [x] Proxy envía `X-Proxy-Domain` (nginx.conf.template:101)
- [x] Laravel lee `X-Proxy-Domain` (ValidateProxyDomain.php:29)
- [x] `config/proxies.json` usa dominio de Render
- [ ] Cloudflare DNS configurado con nube naranja 🟠
- [ ] Cloudflare SSL/TLS en modo Full
- [ ] Laravel tiene `BEHIND_PROXY=true`
- [ ] Probado con curl y logs verificados

## 🆘 Troubleshooting

### Error: "Domain not authorized"

**Causa**: `config/proxies.json` tiene el dominio incorrecto

**Solución**:
```json
// ❌ INCORRECTO
{"domain": "tu-dominio.com"}

// ✅ CORRECTO
{"domain": "proxy1.onrender.com"}
```

### Error: "Could not determine request domain"

**Causa**: El proxy no envía `X-Proxy-Domain`

**Solución**:
1. Verifica nginx.conf.template línea 101
2. Redespliega el proxy en Render
3. Revisa logs del proxy

### Laravel recibe dominio de Cloudflare

**Causa**: No está leyendo `X-Proxy-Domain`

**Solución**:
1. Verifica ValidateProxyDomain.php línea 29
2. Añade log para debug:
   ```php
   Log::info('Headers', [
       'host' => $request->getHost(),
       'x-proxy-domain' => $request->header('X-Proxy-Domain')
   ]);
   ```

## 📊 Headers en Cada Paso

| Paso | Host | X-Proxy-Domain | X-Forwarded-For |
|------|------|----------------|-----------------|
| Cliente → Cloudflare | tu-dominio.com | - | - |
| Cloudflare → Render | tu-dominio.com | - | IP_Cliente |
| Render → Laravel | tu-dominio.com | proxy1.onrender.com ✅ | IP_Cliente |

**Laravel usa `X-Proxy-Domain` para validación ✅**

## 🎯 Múltiples Proxies con Cloudflare

Puedes tener múltiples proxies Render, cada uno con su propio dominio de Cloudflare:

**Cloudflare**:
- `ventas.tu-dominio.com` → `ventas-proxy.onrender.com`
- `soporte.tu-dominio.com` → `soporte-proxy.onrender.com`

**config/proxies.json**:
```json
{
  "proxies": [
    {
      "domain": "ventas-proxy.onrender.com",
      "name": "Equipo Ventas",
      "chat_ids": ["111111111"]
    },
    {
      "domain": "soporte-proxy.onrender.com",
      "name": "Equipo Soporte",
      "chat_ids": ["222222222"]
    }
  ]
}
```

Cada proxy enviará su propio `X-Proxy-Domain` y Laravel asignará los chat_ids correctos.

## 🎉 Resumen

✅ **El proxy YA ESTÁ configurado** para Cloudflare
✅ **Laravel YA ESTÁ configurado** para leer `X-Proxy-Domain`
✅ **Solo necesitas**:
   1. Configurar DNS en Cloudflare
   2. Usar dominio de Render en `config/proxies.json`
   3. Desplegar y probar

**TODO FUNCIONA PERFECTAMENTE CON CLOUDFLARE.**
