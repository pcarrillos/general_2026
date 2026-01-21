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
8. [Configuración de Botones](#configuración-de-botones)
9. [Rutas en Laravel](#rutas-en-laravel)
10. [Flujo Completo](#flujo-completo)
11. [Ejemplo Práctico](#ejemplo-práctico)

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

- [ ] Crear directorio en `resources/views/`
- [ ] Crear vistas con marcador `@telegram-button`
- [ ] Crear vista `wait.blade.php` sin marcador
- [ ] Agregar `<x-control />` a cada vista con formulario
- [ ] Agregar `<x-consulta base-path="/mi-directorio" />` a wait.blade.php
- [ ] Configurar ruta dinámica en `routes/web.php`
- [ ] (Opcional) Configurar `botones_por_fila` en `config/telegram_buttons.php`
