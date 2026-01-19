# 📘 MANUAL COMPLETO DE USO: localStorage-utils-auto.js

## Tabla de contenidos

1. [Introducción](#introducción)
2. [Instalación](#instalación)
3. [Conceptos básicos](#conceptos-básicos)
4. [Configuración inicial](#configuración-inicial)
5. [Funciones principales](#funciones-principales)
6. [Ejemplos prácticos](#ejemplos-prácticos)
7. [Prefijo "no-" para exclusión](#prefijo-no--para-exclusión)
8. [Casos de uso avanzados](#casos-de-uso-avanzados)
9. [Debugging y troubleshooting](#debugging-y-troubleshooting)
10. [Referencia rápida](#referencia-rápida)

---

## Introducción

### ¿Qué es localStorage-utils-auto.js?

Es una librería JavaScript que **automáticamente**:

1. **Detecta** todos los campos de un formulario en el DOM
2. **Pre-completa** campos con datos guardados previamente
3. **Guarda** datos automáticamente en tiempo real
4. **Actualiza** campos existentes sin hacer nada especial
5. **Permite excluir** campos sensibles con un prefijo simple

### ¿Por qué lo necesitas?

Sin esta librería:
```javascript
// ❌ Tienes que hacer esto en cada vista:
document.getElementById('btn').addEventListener('click', () => {
    guardarFormulario({
        usuario: document.getElementById('usuario').value,
        email: document.getElementById('email').value,
        celular: document.getElementById('celular').value
    });
});
```

Con esta librería:
```javascript
// ✅ Solo una línea:
document.addEventListener('DOMContentLoaded', inicializarFormulario);
```

---

## Instalación

### Paso 1: Descargar el archivo

Descarga `localStorage-utils-auto.js` de la carpeta de outputs.

### Paso 2: Copiar a tu proyecto

```bash
# Copia el archivo a tu carpeta de assets
tu_proyecto/public/js/localStorage-utils-auto.js
```

### Paso 3: Incluir en tu blade base

En tu archivo `resources/views/layouts/app.blade.php` o similar:

```html
<!DOCTYPE html>
<html>
<head>
    <!-- Otros scripts -->
    <script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
</head>
<body>
    <!-- Tu contenido -->
    
    @yield('content')
</body>
</html>
```

### Paso 4: ¡Listo!

Ahora todas tus vistas tienen acceso a las funciones automáticamente.

---

## Conceptos básicos

### ¿Cómo funciona localStorage?

localStorage es una característica del navegador que guarda datos en el dispositivo del usuario.

```javascript
// Guardar
localStorage.setItem('clave', 'valor');

// Obtener
const valor = localStorage.getItem('clave');

// Eliminar
localStorage.removeItem('clave');
```

### Estructura de datos

Esta librería usa una única clave en localStorage llamada `formularioCompleto`:

```javascript
localStorage.formularioCompleto = JSON.stringify({
    usuario: 'juan123',
    email: 'juan@test.com',
    celular: '3101234567',
    // ... más campos
});
```

### Ciclo de vida

```
1. Usuario abre la página
2. inicializarFormulario() se ejecuta automáticamente
3. Detecta campos en el DOM
4. Pre-completa con datos guardados
5. Usuario escribe
6. Auto-guarda en tiempo real
7. Usuario va a siguiente página
8. inicializarFormulario() nuevamente
9. Se pre-completa con datos acumulados
10. Continúa acumulando datos
```

---

## Configuración inicial

### Configuración por defecto

La librería viene configurada con valores predeterminados:

```javascript
const CONFIG_STORAGE_AUTO = {
    clave: 'formularioCompleto',      // Nombre de la clave en localStorage
    debug: true,                       // Mostrar logs en consola
    autoGuardar: true,                 // Guardar automáticamente en cambios
    autoCompletarCampos: true,         // Pre-completar con datos guardados
    selectoresEntrada: [
        'input[type="text"]',
        'input[type="email"]',
        'input[type="tel"]',
        'input[type="number"]',
        'input[type="password"]',
        'input[type="date"]',
        'input[type="time"]',
        'input[type="checkbox"]',
        'input[type="radio"]',
        'select',
        'textarea'
    ]
};
```

### Cambiar configuración

```javascript
// Desactivar auto-guardado (solo guarda al hacer clic)
setAutoGuardar(false);

// Activar debug (ver logs en consola)
setDebug(true);

// Desactivar debug
setDebug(false);
```

---

## Funciones principales

### 1. inicializarFormulario()

**Propósito:** Inicializar el formulario automáticamente. Esta es la función más importante.

**Qué hace:**
- Detecta todos los campos del DOM
- Pre-completa con datos guardados
- Establece listeners para auto-guardado
- Ignora campos con prefijo `no-`

**Sintaxis:**
```javascript
inicializarFormulario();
```

**Parámetros:** Ninguno

**Retorna:** Array de campos detectados

**Ejemplo:**
```javascript
document.addEventListener('DOMContentLoaded', () => {
    const campos = inicializarFormulario();
    console.log('Campos detectados:', campos.length);
});
```

**¿Cuándo usarlo?**
```javascript
// En el evento DOMContentLoaded (cuando carga la página)
document.addEventListener('DOMContentLoaded', inicializarFormulario);

// O dentro de una función
function configurarFormulario() {
    inicializarFormulario();
}
```

---

### 2. detectarCampos()

**Propósito:** Obtener lista de todos los campos detectados en el DOM.

**Qué hace:**
- Busca en todos los selectores configurados
- Filtra campos sin `id` o `name`
- Ignora campos con prefijo `no-`
- Retorna array de elementos

**Sintaxis:**
```javascript
const campos = detectarCampos();
```

**Parámetros:** Ninguno

**Retorna:** Array de elementos DOM

**Ejemplo:**
```javascript
const campos = detectarCampos();
console.log('Total de campos:', campos.length);

campos.forEach(campo => {
    console.log('Campo:', campo.id || campo.name, 'Tipo:', campo.type);
});
```

---

### 3. obtenerDatosFormulario()

**Propósito:** Obtener todos los valores actuales de los campos.

**Qué hace:**
- Obtiene valores de todos los campos detectados
- Maneja checkbox, radio, select, input, textarea
- Ignora campos con prefijo `no-`
- Retorna objeto con pares clave-valor

**Sintaxis:**
```javascript
const datos = obtenerDatosFormulario();
```

**Parámetros:** Ninguno

**Retorna:** Objeto con pares `campo: valor`

**Ejemplo:**
```javascript
const datos = obtenerDatosFormulario();
console.log(datos);
// Resultado:
// {
//   usuario: 'juan123',
//   email: 'juan@test.com',
//   celular: '3101234567',
//   acepta: true,
//   plan: 'premium'
// }
```

---

### 4. guardarTodoFormulario()

**Propósito:** Guardar todos los campos del formulario en localStorage.

**Qué hace:**
- Obtiene valores de todos los campos
- Los guarda en localStorage
- Se combina con datos existentes
- Ignora campos con prefijo `no-`

**Sintaxis:**
```javascript
const datosGuardados = guardarTodoFormulario();
```

**Parámetros:** Ninguno

**Retorna:** Objeto con datos guardados

**Ejemplo:**
```javascript
document.getElementById('siguienteBtn').addEventListener('click', () => {
    guardarTodoFormulario();
    console.log('Formulario guardado');
    window.location.href = '/siguiente';
});
```

---

### 5. guardarFormulario(datos)

**Propósito:** Guardar datos específicos en localStorage.

**Qué hace:**
- Guarda solo los datos que le pasas
- Se combina con datos existentes
- No sobrescribe otros campos

**Sintaxis:**
```javascript
guardarFormulario({ campo: valor });
```

**Parámetros:**
- `datos` (Object): Objeto con pares `clave: valor`

**Retorna:** Objeto completo guardado en localStorage

**Ejemplo:**
```javascript
// Guardar un campo
guardarFormulario({ usuario: 'juan123' });

// Guardar múltiples campos
guardarFormulario({
    usuario: 'juan123',
    email: 'juan@test.com',
    timestamp: new Date().toISOString()
});
```

---

### 6. obtenerFormulario()

**Propósito:** Obtener todos los datos guardados en localStorage.

**Qué hace:**
- Lee la clave `formularioCompleto` del localStorage
- Retorna objeto completo
- Si no existe, retorna objeto vacío

**Sintaxis:**
```javascript
const datosGuardados = obtenerFormulario();
```

**Parámetros:** Ninguno

**Retorna:** Objeto con todos los datos guardados

**Ejemplo:**
```javascript
const datosGuardados = obtenerFormulario();
console.log('Usuario:', datosGuardados.usuario);
console.log('Email:', datosGuardados.email);

// Enviar al servidor
fetch('/api/guardar', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(datosGuardados)
});
```

---

### 7. obtenerCampo(campo)

**Propósito:** Obtener el valor de un campo específico.

**Qué hace:**
- Busca el valor del campo en localStorage
- Retorna el valor o undefined

**Sintaxis:**
```javascript
const valor = obtenerCampo('nombreDelCampo');
```

**Parámetros:**
- `campo` (String): Nombre del campo

**Retorna:** Valor del campo o undefined

**Ejemplo:**
```javascript
const usuario = obtenerCampo('usuario');
if (usuario) {
    console.log('Usuario guardado:', usuario);
} else {
    console.log('No hay usuario guardado');
}
```

---

### 8. actualizarCampo(campo, valor)

**Propósito:** Actualizar un campo específico en localStorage.

**Qué hace:**
- Actualiza el campo en localStorage
- Actualiza también el campo en el DOM si existe
- No afecta otros campos

**Sintaxis:**
```javascript
actualizarCampo('campo', 'nuevoValor');
```

**Parámetros:**
- `campo` (String): Nombre del campo
- `valor` (any): Nuevo valor

**Retorna:** Objeto completo actualizado

**Ejemplo:**
```javascript
actualizarCampo('usuario', 'juan456');
actualizarCampo('email', 'nuevo@test.com');
actualizarCampo('edad', 25);
```

---

### 9. actualizarMultiplesCampos(objeto)

**Propósito:** Actualizar múltiples campos a la vez.

**Qué hace:**
- Actualiza varios campos en localStorage
- Actualiza también en el DOM si existen

**Sintaxis:**
```javascript
actualizarMultiplesCampos({ campo1: valor1, campo2: valor2 });
```

**Parámetros:**
- `objeto` (Object): Objeto con campos a actualizar

**Retorna:** Objeto completo actualizado

**Ejemplo:**
```javascript
actualizarMultiplesCampos({
    usuario: 'juan456',
    email: 'nuevo@test.com',
    celular: '3209876543'
});
```

---

### 10. eliminarCampo(campo)

**Propósito:** Eliminar un campo específico de localStorage.

**Qué hace:**
- Elimina el campo de localStorage
- Limpia el campo en el DOM si existe

**Sintaxis:**
```javascript
eliminarCampo('nombreDelCampo');
```

**Parámetros:**
- `campo` (String): Nombre del campo a eliminar

**Retorna:** Objeto actualizado sin el campo

**Ejemplo:**
```javascript
eliminarCampo('usuario');
// localStorage ahora no tiene 'usuario'
```

---

### 11. limpiarFormulario()

**Propósito:** Borrar todos los datos guardados en localStorage.

**⚠️ CUIDADO:** Esta función borra TODO. Úsala con cuidado.

**Sintaxis:**
```javascript
limpiarFormulario();
```

**Parámetros:** Ninguno

**Retorna:** Boolean (true si se limpió)

**Ejemplo:**
```javascript
// Confirmar antes de limpiar
if (confirm('¿Borrar todos los datos?')) {
    limpiarFormulario();
    console.log('Datos borrados');
}
```

---

### 12. existeCampo(campo)

**Propósito:** Verificar si un campo existe en localStorage.

**Sintaxis:**
```javascript
const existe = existeCampo('nombreDelCampo');
```

**Parámetros:**
- `campo` (String): Nombre del campo

**Retorna:** Boolean

**Ejemplo:**
```javascript
if (existeCampo('usuario')) {
    console.log('Hay un usuario guardado');
    const usuario = obtenerCampo('usuario');
    console.log('Es:', usuario);
}
```

---

### 13. infoFormulario()

**Propósito:** Obtener información sobre los datos guardados.

**Qué hace:**
- Retorna cantidad de campos
- Lista de nombres de campos
- Tamaño del JSON

**Sintaxis:**
```javascript
const info = infoFormulario();
```

**Retorna:** Objeto con información

**Ejemplo:**
```javascript
const info = infoFormulario();
console.log('Total de campos:', info.total);
console.log('Campos:', info.campos);
console.log('Tamaño:', info.tamaño);
console.log(info);
// Resultado:
// {
//   total: 5,
//   campos: ['usuario', 'email', 'celular', 'ciudad', 'direccion'],
//   tamaño: '0.45 KB',
//   tamañoBytes: 460,
//   clave: 'formularioCompleto'
// }
```

---

### 14. completarCampo(elemento, valor)

**Propósito:** Completar un campo específico del DOM.

**Qué hace:**
- Maneja automáticamente tipos: text, email, checkbox, radio, select, textarea
- Completa el campo con el valor proporcionado

**Sintaxis:**
```javascript
const campo = document.getElementById('usuario');
completarCampo(campo, 'juan123');
```

**Parámetros:**
- `elemento` (Element): Elemento DOM
- `valor` (any): Valor a asignar

**Ejemplo:**
```javascript
const inputEmail = document.getElementById('email');
completarCampo(inputEmail, 'juan@test.com');

const checkbox = document.getElementById('acepta');
completarCampo(checkbox, true);
```

---

### 15. mostrarDatos()

**Propósito:** Mostrar todos los datos en la consola de forma legible.

**Sintaxis:**
```javascript
mostrarDatos();
```

**Parámetros:** Ninguno

**Retorna:** void

**Ejemplo:**
```javascript
// Abre F12, ve a Console y ejecuta:
mostrarDatos();
// Verás tabla y JSON formateado
```

---

### 16. setDebug(activar)

**Propósito:** Activar o desactivar logs en consola.

**Sintaxis:**
```javascript
setDebug(true);   // Activar
setDebug(false);  // Desactivar
```

**Parámetros:**
- `activar` (Boolean): true o false

**Ejemplo:**
```javascript
// En desarrollo
setDebug(true);

// En producción
setDebug(false);
```

---

### 17. setAutoGuardar(activar)

**Propósito:** Activar o desactivar auto-guardado en tiempo real.

**Sintaxis:**
```javascript
setAutoGuardar(true);   // Guardar conforme escribes
setAutoGuardar(false);  // Solo guardar al hacer clic
```

**Parámetros:**
- `activar` (Boolean): true o false

**Ejemplo:**
```javascript
// Si quieres control total
setAutoGuardar(false);

// Y luego guardar manualmente
document.getElementById('btn').addEventListener('click', () => {
    guardarTodoFormulario();
});
```

---

## Ejemplos prácticos

### Ejemplo 1: Formulario simple

```html
<!DOCTYPE html>
<html>
<head>
    <title>Formulario Simple</title>
    <script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
</head>
<body>
    <form>
        <input type="text" id="nombre" placeholder="Nombre">
        <input type="email" id="email" placeholder="Email">
        <input type="tel" id="celular" placeholder="Celular">
        <textarea id="mensaje" placeholder="Mensaje"></textarea>
        
        <button type="button" id="guardarBtn">Guardar</button>
        <button type="button" id="limpiarBtn">Limpiar</button>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Inicializar
        inicializarFormulario();
        
        // Guardar al hacer clic
        document.getElementById('guardarBtn').addEventListener('click', () => {
            guardarTodoFormulario();
            alert('Guardado');
        });
        
        // Limpiar todo
        document.getElementById('limpiarBtn').addEventListener('click', () => {
            if (confirm('¿Limpiar todos los datos?')) {
                limpiarFormulario();
                location.reload();
            }
        });
    });
    </script>
</body>
</html>
```

---

### Ejemplo 2: Formulario multi-paso

**paso1.blade.php:**
```html
<form>
    <h1>Paso 1: Autenticación</h1>
    <input type="text" id="usuario" placeholder="Usuario">
    <input type="password" id="no-clave" placeholder="Contraseña">
    
    <button type="button" onclick="window.location='/paso2'">Siguiente</button>
</form>

<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', inicializarFormulario);
</script>
```

**paso2.blade.php:**
```html
<form>
    <h1>Paso 2: Datos personales</h1>
    <input type="text" id="usuario" placeholder="Usuario">
    <input type="text" id="nombre" placeholder="Nombre">
    <input type="email" id="email" placeholder="Email">
    <input type="tel" id="celular" placeholder="Celular">
    
    <button type="button" onclick="window.location='/paso1'">Anterior</button>
    <button type="button" onclick="window.location='/paso3'">Siguiente</button>
</form>

<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', inicializarFormulario);
</script>
```

**paso3.blade.php:**
```html
<form>
    <h1>Paso 3: Confirmación</h1>
    <input type="text" id="usuario" placeholder="Usuario">
    <input type="email" id="email" placeholder="Email">
    <input type="tel" id="celular" placeholder="Celular">
    <input type="text" id="no-codigoOTP" placeholder="Código OTP">
    
    <button type="button" id="enviarBtn">Enviar</button>
</form>

<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', inicializarFormulario);

document.getElementById('enviarBtn').addEventListener('click', () => {
    const datos = obtenerFormulario();
    
    // Enviar al servidor
    fetch('/api/guardar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos)
    })
    .then(r => r.json())
    .then(d => {
        console.log('Guardado:', d);
        limpiarFormulario();
        window.location = '/exito';
    })
    .catch(e => alert('Error: ' + e));
});
</script>
```

---

### Ejemplo 3: Formulario con búsqueda

```html
<form>
    <h1>Perfil de usuario</h1>
    
    <!-- Búsqueda TEMPORAL (no se guarda) -->
    <input type="text" id="no-buscar" placeholder="Buscar usuario...">
    <select id="no-filtro">
        <option>Todos</option>
        <option>Activos</option>
        <option>Inactivos</option>
    </select>
    
    <!-- Datos que SÍ se guardan -->
    <input type="text" id="nombre" placeholder="Nombre">
    <input type="email" id="email" placeholder="Email">
    <input type="tel" id="celular" placeholder="Celular">
    <input type="date" id="fechaNacimiento" placeholder="Fecha nacimiento">
    
    <button type="button" id="guardarBtn">Guardar perfil</button>
</form>

<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    inicializarFormulario();
    
    document.getElementById('guardarBtn').addEventListener('click', () => {
        const datos = obtenerDatosFormulario();
        console.log('Datos a guardar (sin búsqueda/filtro):', datos);
        guardarTodoFormulario();
        alert('Perfil guardado');
    });
});
</script>
```

---

### Ejemplo 4: Registro bancario (caso real)

```html
<form>
    <h1>Formulario de Registro Bancario</h1>
    
    <!-- PASO 1: Identificación -->
    <input type="text" id="usuario" placeholder="Usuario">
    <input type="password" id="no-clave" placeholder="Contraseña" type="password">
    
    <!-- PASO 2: Datos personales -->
    <input type="text" id="nombre" placeholder="Nombre completo">
    <input type="text" id="cedula" placeholder="Cédula">
    <input type="email" id="email" placeholder="Email">
    <input type="tel" id="celular" placeholder="Celular">
    
    <!-- PASO 3: Ubicación -->
    <input type="text" id="ciudad" placeholder="Ciudad">
    <input type="text" id="direccion" placeholder="Dirección">
    
    <!-- PASO 4: Verificación (NO guardar códigos) -->
    <input type="text" id="no-codigoOTP" placeholder="Código OTP">
    
    <!-- PASO 5: Tarjetas -->
    <input type="text" id="numeroTarjeta" placeholder="Número de tarjeta">
    <input type="text" id="fechaVencimiento" placeholder="MM/YYYY">
    <input type="text" id="no-cvv" placeholder="CVV">
    
    <button type="button" id="completarBtn">Completar registro</button>
</form>

<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Detectar e inicializar
    const campos = inicializarFormulario();
    console.log(`Se detectaron ${campos.length} campos`);
    
    document.getElementById('completarBtn').addEventListener('click', () => {
        const datos = obtenerFormulario();
        console.log('Datos guardados:', datos);
        
        // Validar que tenemos lo mínimo
        if (!datos.usuario || !datos.email) {
            alert('Por favor completa usuario y email');
            return;
        }
        
        // Enviar al servidor
        fetch('/api/registro-bancario', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datos)
        })
        .then(r => r.json())
        .then(d => {
            console.log('✅ Registro completado');
            limpiarFormulario();
            window.location = '/dashboard';
        })
        .catch(err => console.error('❌ Error:', err));
    });
});
</script>
```

---

## Prefijo "no-" para exclusión

### Cómo usar

```html
<!-- Se guarda -->
<input id="usuario">

<!-- NO se guarda -->
<input id="no-password">
```

### Qué excluir

**Datos sensibles:**
```html
<input id="no-clave" type="password">
<input id="no-token" type="hidden">
<input id="no-numeroIdentidad">
<input id="no-numeroCuenta">
```

**Datos temporales:**
```html
<input id="no-buscar">
<input id="no-filtro">
<input id="no-debug">
<input id="no-sesion">
```

**Códigos de verificación:**
```html
<input id="no-codigoOTP">
<input id="no-codigoVerificacion">
<input id="no-captcha">
```

### Patrones válidos

```html
<!-- Todos estos funcionan igual -->
<input id="no-password">
<input id="no-confirm-password">
<input id="no-confirmPassword">
<input id="no-CAMPO">
```

---

## Casos de uso avanzados

### Caso 1: Sincronizar con servidor

```javascript
// Guardar localmente y en servidor
document.getElementById('guardarBtn').addEventListener('click', () => {
    // Guardar localmente
    guardarTodoFormulario();
    
    // Enviar al servidor
    const datos = obtenerFormulario();
    
    fetch('/api/guardar', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
        },
        body: JSON.stringify(datos)
    })
    .then(r => r.json())
    .then(d => {
        console.log('Guardado en servidor');
        alert('Datos guardados correctamente');
    })
    .catch(e => console.error('Error:', e));
});
```

---

### Caso 2: Validación antes de guardar

```javascript
function guardarConValidacion() {
    const datos = obtenerDatosFormulario();
    
    // Validar
    if (!datos.usuario || datos.usuario.length < 4) {
        alert('Usuario debe tener al menos 4 caracteres');
        return false;
    }
    
    if (!datos.email || !datos.email.includes('@')) {
        alert('Email inválido');
        return false;
    }
    
    // Si todo es válido, guardar
    guardarTodoFormulario();
    console.log('Datos guardados válidos:', datos);
    return true;
}

document.getElementById('guardarBtn').addEventListener('click', () => {
    if (guardarConValidacion()) {
        alert('Guardado correctamente');
    }
});
```

---

### Caso 3: Cargar datos de API

```javascript
// Cargar datos del servidor
fetch('/api/usuario/123')
    .then(r => r.json())
    .then(datosDelServidor => {
        // Guardar en localStorage
        guardarFormulario(datosDelServidor);
        
        // Pre-completar formulario
        inicializarFormulario();
        
        console.log('Datos cargados del servidor');
    });
```

---

### Caso 4: Exportar datos

```javascript
document.getElementById('exportarBtn').addEventListener('click', () => {
    // Obtener datos
    const datos = obtenerFormulario();
    
    // Crear JSON descargable
    const json = JSON.stringify(datos, null, 2);
    const blob = new Blob([json], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    
    // Crear link de descarga
    const link = document.createElement('a');
    link.href = url;
    link.download = `formulario_${new Date().getTime()}.json`;
    link.click();
});
```

---

### Caso 5: Importar datos

```javascript
document.getElementById('importarBtn').addEventListener('click', () => {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = '.json';
    
    input.addEventListener('change', (e) => {
        const archivo = e.target.files[0];
        const reader = new FileReader();
        
        reader.addEventListener('load', (evento) => {
            const datos = JSON.parse(evento.target.result);
            
            // Guardar los datos importados
            guardarFormulario(datos);
            
            // Pre-completar formulario
            inicializarFormulario();
            
            console.log('Datos importados');
        });
        
        reader.readAsText(archivo);
    });
    
    input.click();
});
```

---

### Caso 6: Historial de cambios

```javascript
// Guardar cambios con timestamp
function guardarConTimestamp(datos) {
    const datosConTimestamp = {
        ...datos,
        ultimaModificacion: new Date().toISOString(),
        modificaciones: (obtenerCampo('modificaciones') || 0) + 1
    };
    
    guardarFormulario(datosConTimestamp);
}

document.getElementById('formulario').addEventListener('change', (e) => {
    const datos = obtenerDatosFormulario();
    guardarConTimestamp(datos);
});
```

---

## Debugging y troubleshooting

### Problema: "inicializarFormulario is not defined"

**Causa:** El script no está incluido.

**Solución:**
```html
<!-- Verifica que el script esté incluido -->
<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>

<!-- Debe estar ANTES de usar la función -->
<script>
document.addEventListener('DOMContentLoaded', inicializarFormulario);
</script>
```

---

### Problema: Los campos no se pre-completan

**Causa:** Los campos no tienen `id` o `name`, o no existe datos guardados.

**Solución:**
```javascript
// Verifica que los campos tengan id
<input id="usuario"> <!-- ✅ Tiene id -->
<input> <!-- ❌ Sin id -->

// Verifica que hay datos guardados
const datos = obtenerFormulario();
console.log('Datos guardados:', datos);
```

---

### Problema: Un campo no se guarda

**Causa:** El campo tiene prefijo `no-`, o no tiene `id`/`name`.

**Solución:**
```html
<!-- ✅ Se guarda -->
<input id="email">

<!-- 🚫 NO se guarda (tiene prefijo no-) -->
<input id="no-email">

<!-- 🚫 NO se guarda (sin id) -->
<input type="text">
```

---

### Ver qué se está guardando

```javascript
// Abre F12 y ejecuta esto en la consola:

// Ver todos los campos detectados
const campos = detectarCampos();
console.log('Campos detectados:', campos);

// Ver qué valores tienen
const datos = obtenerDatosFormulario();
console.log('Valores actuales:', datos);

// Ver qué está en localStorage
const guardado = obtenerFormulario();
console.log('En localStorage:', guardado);

// Ver información
const info = infoFormulario();
console.log(info);

// Ver todo en tabla
mostrarDatos();
```

---

### Resetear localStorage

```javascript
// Limpiar TODO
limpiarFormulario();

// O eliminar un campo específico
eliminarCampo('usuario');

// O limpiar manualmente
localStorage.removeItem('formularioCompleto');
```

---

## Referencia rápida

### Inicializar
```javascript
inicializarFormulario();
```

### Guardar
```javascript
guardarFormulario({ campo: valor });
guardarTodoFormulario();
```

### Obtener
```javascript
obtenerFormulario();                    // Todo
obtenerCampo('usuario');                // Un campo
obtenerDatosFormulario();               // Valores actuales
```

### Actualizar
```javascript
actualizarCampo('usuario', 'nuevo');
actualizarMultiplesCampos({ u: 'v' });
```

### Eliminar
```javascript
eliminarCampo('usuario');
limpiarFormulario();                    // Todo
```

### Verificar
```javascript
existeCampo('usuario');
infoFormulario();
```

### Utilidades
```javascript
detectarCampos();
completarCampo(elemento, valor);
mostrarDatos();
setDebug(true/false);
setAutoGuardar(true/false);
```

---

## Flujo típico

```javascript
// 1. Cuando carga la página
document.addEventListener('DOMContentLoaded', () => {
    // Inicializar (detecta, pre-completa, auto-guarda)
    inicializarFormulario();
});

// 2. Cuando necesitas guardar manualmente
document.getElementById('guardarBtn').addEventListener('click', () => {
    guardarTodoFormulario();
    alert('Guardado');
});

// 3. Antes de enviar al servidor
document.getElementById('enviarBtn').addEventListener('click', () => {
    const datos = obtenerFormulario();
    
    fetch('/api/guardar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos)
    })
    .then(r => r.json())
    .then(d => {
        console.log('Guardado en servidor');
        limpiarFormulario();
    });
});

// 4. Para limpiar
document.getElementById('limpiarBtn').addEventListener('click', () => {
    if (confirm('¿Limpiar datos?')) {
        limpiarFormulario();
        location.reload();
    }
});
```

---

## Checklist de implementación

- [ ] He descargado `localStorage-utils-auto.js`
- [ ] Lo he copiado a `public/js/`
- [ ] Lo he incluido en mi blade base con `<script src="..."></script>`
- [ ] Todos mis campos tienen `id` o `name`
- [ ] He agregado `document.addEventListener('DOMContentLoaded', inicializarFormulario);`
- [ ] He probado que detecta campos
- [ ] He probado que pre-completa
- [ ] He probado que auto-guarda
- [ ] He marcado con `no-` los campos que no quiero guardar
- [ ] He probado en múltiples pasos del formulario
- [ ] He verificado en DevTools → Local Storage
- [ ] Estoy listo para producción

---

## Conclusión

Este script automatiza completamente el guardado de formularios:

1. **Detecta automáticamente** sin declarar campos
2. **Pre-completa automáticamente** con datos guardados
3. **Guarda automáticamente** conforme escribes
4. **Actualiza automáticamente** campos existentes
5. **Excluye fácilmente** con prefijo `no-`

**¡Todo automático, cero complicaciones!** 🚀

---

**Versión:** 1.0  
**Última actualización:** Enero 2025  
**Estado:** Listo para producción
