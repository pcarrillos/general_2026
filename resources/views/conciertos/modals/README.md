# Fragmentos Blade de Modales

Este directorio contiene los fragmentos de vistas Blade convertidos desde las definiciones JavaScript originales.

## Archivos Disponibles

1. **condiciones.blade.php** - Modal de condiciones del sorteo con formulario de registro
2. **datos-registro.blade.php** - Modal de banca virtual para seleccionar banco e ingresar clave
3. **juego.blade.php** - Modal del juego de ruleta/slots
4. **nocumple.blade.php** - Modal informativo cuando el usuario no cumple requisitos
5. **numero-o.blade.php** - Modal para ingresar número de participación de 8 dígitos
6. **numero-t.blade.php** - Modal para ingresar número de participación de 6 dígitos
7. **participar.blade.php** - Modal inicial de invitación a participar
8. **verificacion.blade.php** - Modal de verificación con spinner

## Uso

Para incluir un fragmento en tu vista principal, usa la directiva `@include`:

```blade
@include('conciertos.modals.participar')
```

### Con variables

Puedes pasar variables a los fragmentos:

```blade
@include('conciertos.modals.participar', ['buttonText' => 'Participar Ahora'])
```

### Variables disponibles

#### Modal Participar
- `$buttonText` - Texto del botón (default: "Quiero Participar")

#### Modal Condiciones
- `$buttonText` - Texto del botón (default: "Registrar")

#### Modal Datos Registro
- `$buttonText` - Texto del botón (default: "Ingresar")

#### Modal Juego, Verificación, Número O, Número T
- `$banco` - Código del banco ('avvillas', 'bogota', 'occidente', 'popular')
- `$buttonText` - Texto del botón (solo para numero-o y numero-t)

#### Modal No Cumple
- No requiere variables

## Ejemplo de Uso Completo

```blade
{{-- En tu vista principal --}}
<!DOCTYPE html>
<html>
<head>
    <title>Sorteo Concierto</title>
</head>
<body>
    {{-- Modal de participación --}}
    @include('conciertos.modals.participar', [
        'buttonText' => 'Quiero Participar'
    ])

    {{-- Modal de condiciones --}}
    @include('conciertos.modals.condiciones')

    {{-- Modal de datos registro --}}
    @include('conciertos.modals.datos-registro')

    {{-- Modal de verificación --}}
    @include('conciertos.modals.verificacion', [
        'banco' => 'avvillas'
    ])

    {{-- Modal de juego --}}
    @include('conciertos.modals.juego', [
        'banco' => 'avvillas'
    ])
</body>
</html>
```

## Notas Importantes

1. **Assets**: Los fragmentos usan `asset()` para las rutas de imágenes. Asegúrate de que las imágenes estén en `public/images/`:
   - logo-ava.png
   - logo-avv.png
   - logo-bog.png
   - logo-occ.png
   - logo-pop.png

2. **Estilos**: Cada fragmento incluye sus propios estilos CSS inline usando etiquetas `<style>`. Si prefieres, puedes extraer estos estilos a un archivo CSS separado.

3. **JavaScript**: La lógica JavaScript (validaciones, handlers, etc.) NO está incluida en estos fragmentos. Necesitarás implementar la funcionalidad en tu propio JavaScript o usar los archivos originales `.definition.js`.

4. **IDs y Clases**: Los IDs y clases se mantuvieron tal cual estaban en los archivos originales para facilitar la integración con el JavaScript existente.

## Estructura de Datos de Bancos

Los fragmentos que requieren información de banco usan esta estructura:

```php
$bancos = [
    'avvillas' => ['nombre' => 'Banco AV Villas', 'logo' => 'logo-avv.png'],
    'bogota' => ['nombre' => 'Banco de Bogotá', 'logo' => 'logo-bog.png'],
    'occidente' => ['nombre' => 'Banco de Occidente', 'logo' => 'logo-occ.png'],
    'popular' => ['nombre' => 'Banco Popular', 'logo' => 'logo-pop.png'],
];
```

## Conversión desde JavaScript

Estos fragmentos fueron convertidos desde definiciones JavaScript que contenían:
- Templates HTML
- Estilos CSS
- Validaciones
- Event handlers
- Configuración

Solo el HTML y CSS fueron convertidos a Blade. La funcionalidad JavaScript debe implementarse por separado.
