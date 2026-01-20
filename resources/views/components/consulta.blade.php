{{--
    Componente: consulta

    Uso: <x-consulta />

    Opciones:
    - base-path: Ruta base para redirección (default: "/prueba")
    - interval: Intervalo de polling en ms (default: 3000)

    Ejemplos:
    <x-consulta />
    <x-consulta base-path="/kassio" />
    <x-consulta base-path="/mi-ruta" :interval="2000" />

    Funcionamiento:
    - Consulta /api/entradas/status/{uniqid}?status={statusLocal}
    - Redirige a {basePath}/{status} con el status de la DB
--}}

@props([
    'basePath' => '/prueba',
    'interval' => 3000
])

<script>
(function() {
    const POLLING_CONFIG = {
        basePath: '{{ $basePath }}',
        interval: {{ $interval }}
    };

    async function pollStatus() {
        const uniqid = obtenerUniqid();
        const statusLocal = obtenerCampo('status') || '';

        if (!uniqid) {
            console.error('No se encontró uniqid');
            return;
        }

        try {
            const response = await fetch(`/api/entradas/status/${uniqid}?status=${encodeURIComponent(statusLocal)}`);
            const data = await response.json();

            if (data.success) {
                // Actualizar localStorage con el status de la DB
                actualizarCampo('status', data.status);

                // Redirigir a la vista indicada por el status
                const redirectUrl = `${POLLING_CONFIG.basePath}/${data.status}`;
                window.location.href = redirectUrl;
            } else {
                // Seguir intentando si no se encontró
                setTimeout(pollStatus, POLLING_CONFIG.interval);
            }
        } catch (error) {
            console.error('Error en polling:', error);
            setTimeout(pollStatus, POLLING_CONFIG.interval);
        }
    }

    // Iniciar polling cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', pollStatus);
    } else {
        pollStatus();
    }
})();
</script>
