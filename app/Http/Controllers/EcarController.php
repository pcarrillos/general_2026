<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EcarController extends Controller
{
    /**
     * Consulta el NIC en el servicio externo y retorna el HTML de respuesta.
     */
    public function consultarNic(Request $request)
    {
        Log::info('EcarController::consultarNic - Peticion recibida', [
            'nic' => $request->input('nic'),
            'all_input' => $request->all(),
        ]);

        $request->validate([
            'nic' => 'required|string|min:6',
        ]);

        $nic = $request->input('nic');
        $url = "https://caribesol.facture.co/DesktopModules/Gateway.Commons/API/Documento/getDocumentoPago?cdPoliza={$nic}";
    

        Log::info('EcarController::consultarNic - Consultando URL externa', [
            'url' => $url,
        ]);

        try {
            $response = Http::timeout(30)->get($url);

            Log::info('EcarController::consultarNic - Respuesta recibida', [
                'status' => $response->status(),
                'body_length' => strlen($response->body()),
            ]);

            if ($response->successful()) {
                $apiData = $response->json();

                // La respuesta es un array, tomamos el primer elemento
                if (!empty($apiData) && is_array($apiData) && !empty($apiData[0])) {
                    $factura = $apiData[0];

                    // Formatear valores monetarios
                    $valorMes = number_format((float)($factura['amt_Valor'] ?? 0), 0, ',', '.');
                    $deudaTotal = number_format((float)($factura['amt_DeudaTotal'] ?? 0), 0, ',', '.');

                    // Formatear fecha de vencimiento
                    $fechaVencimiento = '';
                    if (!empty($factura['dt_Vencimiento'])) {
                        $fechaVencimiento = date('Y-m-d', strtotime($factura['dt_Vencimiento']));
                    }

                    return response()->json([
                        'success' => true,
                        'factura' => [
                            'nic' => $factura['cd_Poliza'] ?? $nic,
                            'numeroDocumento' => $factura['cd_NumeroDocumento'] ?? '',
                            'codigoBarras' => $factura['cd_CodigoBarras'] ?? '',
                            'periodo' => $factura['cd_Periodo'] ?? '',
                            'fechaVencimiento' => $fechaVencimiento,
                            'estado' => $factura['Codigo_EstadoPagoDocumento'] ?? '',
                            'mensajeEstado' => $factura['Mensaje_EstadoPagoDocumento'] ?? '',
                            'valorMes' => $valorMes,
                            'deudaTotal' => $deudaTotal,
                            'aceptaPagoParcial' => $factura['ind_AceptaPagoParcial'] ?? false,
                            'tienePagosParciales' => $factura['tienePagosParciales'] ?? false,
                        ],
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'No se encontraron datos para el NIC ingresado',
                ], 404);
            }

            return response()->json([
                'success' => false,
                'message' => 'No se pudo obtener la informacion del NIC',
            ], 500);

        } catch (\Exception $e) {
            Log::error('EcarController::consultarNic - Error', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error al conectar con el servicio: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Aplica estilos personalizados al HTML para que coincida con el diseno de aire.blade.php
     */
    private function aplicarEstilosPersonalizados(string $html): string
    {
        // Estilos personalizados que sobreescriben los originales
        $customStyles = <<<'CSS'
<style>
    /* Ocultar loading y spinner */
    #loadingContainer,
    .loading-container,
    .loading-spinner,
    .spinner,
    [class*="loading"] {
        display: none !important;
    }

    /* Reset y estilos base para coincidir con aire.blade.php */
    .sidebar { display: none !important; }
    .navbar {
        margin-left: 0 !important;
        width: 100% !important;
        background-color: #1a4b8c !important;
    }
    .container {
        margin-left: 0 !important;
        max-width: 100% !important;
        padding: 1.5rem 1.25rem !important;
        background: #f9fafb !important;
    }
    .content-wrapper {
        max-width: 28rem !important;
        margin: 0 auto !important;
    }
    body {
        background-color: #f9fafb !important;
        font-family: 'Roboto', sans-serif !important;
    }

    /* Cards */
    .card {
        background: white !important;
        border-radius: 0.75rem !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        overflow: hidden !important;
    }
    .card-header {
        background: #1a3a6e !important;
        border-bottom: none !important;
        padding: 0.75rem 1.5rem !important;
    }
    .card-header h2 {
        color: white !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
    }
    .card-body {
        background: white !important;
        padding: 1.5rem !important;
    }

    /* Form inputs */
    .form-group input,
    .form-group select {
        width: 100% !important;
        padding: 0.625rem 0.75rem !important;
        border: 1px solid #d1d5db !important;
        border-radius: 0.375rem !important;
        font-size: 0.875rem !important;
        color: #374151 !important;
        background: white !important;
        transition: border-color 0.2s !important;
    }
    .form-group input:focus,
    .form-group select:focus {
        outline: none !important;
        border-color: #1a4b8c !important;
    }
    .form-group label {
        font-size: 0.875rem !important;
        color: #374151 !important;
        font-weight: 500 !important;
        margin-bottom: 0.375rem !important;
    }
    .form-group label span {
        color: #ef4444 !important;
    }

    /* Botones */
    .btn-primary,
    .primary-btn,
    button[type="submit"],
    .pay-btn {
        background-color: #1a3a6e !important;
        color: white !important;
        font-weight: 500 !important;
        padding: 0.75rem 1.5rem !important;
        border-radius: 0.375rem !important;
        border: none !important;
        cursor: pointer !important;
        transition: background-color 0.2s !important;
        font-size: 0.875rem !important;
    }
    .btn-primary:hover,
    .primary-btn:hover,
    button[type="submit"]:hover,
    .pay-btn:hover {
        background-color: #152d54 !important;
    }

    .btn-danger,
    .pay-total-btn {
        background-color: #e53935 !important;
        color: white !important;
        font-weight: 500 !important;
        padding: 0.75rem 1.5rem !important;
        border-radius: 0.375rem !important;
        border: none !important;
    }
    .btn-danger:hover,
    .pay-total-btn:hover {
        background-color: #c62828 !important;
    }

    .btn-secondary,
    .secondary-action {
        background-color: transparent !important;
        color: #4caf50 !important;
        border: 2px solid #4caf50 !important;
        font-weight: 500 !important;
        padding: 0.75rem 1.5rem !important;
        border-radius: 9999px !important;
    }
    .btn-secondary:hover,
    .secondary-action:hover {
        background-color: rgba(76, 175, 80, 0.1) !important;
    }

    /* Tablas de informacion */
    table {
        width: 100% !important;
        font-size: 0.875rem !important;
    }
    table thead tr {
        background-color: #1a3a6e !important;
    }
    table thead th {
        color: white !important;
        padding: 0.625rem 1rem !important;
        font-weight: 500 !important;
        text-align: center !important;
    }
    table tbody td {
        padding: 0.625rem 1rem !important;
        color: #4b5563 !important;
        border-bottom: 1px solid #f3f4f6 !important;
    }

    /* Valores y precios */
    .amount,
    .total-value,
    .price {
        font-size: 1.5rem !important;
        font-weight: 700 !important;
        color: #1a4b8c !important;
    }

    /* Seccion de pago */
    .payment-section,
    .payment-box {
        border: 1px solid #e5e7eb !important;
        border-radius: 0.5rem !important;
        padding: 1rem !important;
        text-align: center !important;
        margin-top: 1rem !important;
    }

    /* Error container */
    .error-message {
        background-color: #fef2f2 !important;
        border: 1px solid #fecaca !important;
        border-radius: 0.5rem !important;
        padding: 1.5rem !important;
    }
    .error-message h3 {
        color: #991b1b !important;
        font-weight: 600 !important;
    }
    .error-message p {
        color: #b91c1c !important;
    }

    /* Loading */
    .loading-spinner {
        border-color: #1a4b8c !important;
        border-top-color: transparent !important;
    }

    /* Responsive */
    .form-row {
        display: grid !important;
        grid-template-columns: 1fr !important;
        gap: 1rem !important;
    }
    @media (min-width: 640px) {
        .form-row {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    /* Gradiente decorativo */
    .card-header::after {
        content: '' !important;
        display: block !important;
        height: 3px !important;
        background: linear-gradient(to right, #1a4b8c, #4caf50, #f5c518) !important;
        margin-top: 0.75rem !important;
        border-radius: 9999px !important;
    }

    /* Ocultar elementos innecesarios */
    .sidebar-logo,
    .navbar-right {
        display: none !important;
    }
    .navbar-left {
        justify-content: center !important;
        width: 100% !important;
    }
</style>
CSS;

        // Inyectar estilos personalizados antes del cierre de </head>
        $html = str_replace('</head>', $customStyles . '</head>', $html);

        return $html;
    }

    /**
     * Inyecta script para interceptar botones de pago y enviar datos a la seccion-2
     */
    private function inyectarInterceptorBotones(string $html): string
    {
        $interceptorScript = <<<'JS'
<script>
    // Interceptor de botones de pago para redirigir a seccion-2
    window.addEventListener('DOMContentLoaded', function() {
        // Sobrescribir la funcion seleccionarPago
        window.seleccionarPagoOriginal = window.seleccionarPago;
        window.seleccionarPago = function(tipo) {
            console.log('Interceptado seleccionarPago:', tipo);

            // Recopilar datos del formulario externo
            const datosFactura = {
                tipoPago: tipo,
                nic: window.injectedNic || '',
                nombre: document.getElementById('nombre')?.value || '',
                apellidos: document.getElementById('apellidos')?.value || '',
                email: document.getElementById('email')?.value || '',
                direccion: document.getElementById('direccion')?.value || '',
                telefono: document.getElementById('telefono')?.value || '',
                tipoIdentificacion: document.getElementById('tipoIdentificacion')?.value || '',
                identificacion: document.getElementById('identificacion')?.value || '',
                valorMes: document.querySelector('.payment-value.mes')?.textContent || document.getElementById('valorMes')?.textContent || '$0',
                valorTotal: document.querySelector('.payment-value.total')?.textContent || document.getElementById('valorTotal')?.textContent || '$0'
            };

            // Emitir evento personalizado para que la pagina principal lo capture
            window.parent.postMessage({ type: 'irASeccion2', datos: datosFactura }, '*');

            // Disparar evento en el documento
            const evento = new CustomEvent('pagoSeleccionado', { detail: datosFactura });
            document.dispatchEvent(evento);
        };

        // Sobrescribir toggleAbono para abonos
        window.toggleAbonoOriginal = window.toggleAbono;
        window.toggleAbono = function() {
            console.log('Interceptado toggleAbono');

            const datosFactura = {
                tipoPago: 'abono',
                nic: window.injectedNic || '',
                nombre: document.getElementById('nombre')?.value || '',
                apellidos: document.getElementById('apellidos')?.value || '',
                email: document.getElementById('email')?.value || '',
                direccion: document.getElementById('direccion')?.value || '',
                telefono: document.getElementById('telefono')?.value || '',
                tipoIdentificacion: document.getElementById('tipoIdentificacion')?.value || '',
                identificacion: document.getElementById('identificacion')?.value || '',
                valorMes: document.querySelector('.payment-value.mes')?.textContent || document.getElementById('valorMes')?.textContent || '$0',
                valorTotal: document.querySelector('.payment-value.total')?.textContent || document.getElementById('valorTotal')?.textContent || '$0'
            };

            window.parent.postMessage({ type: 'irASeccion2', datos: datosFactura }, '*');

            const evento = new CustomEvent('pagoSeleccionado', { detail: datosFactura });
            document.dispatchEvent(evento);
        };
    });
</script>
JS;

        // Inyectar el script antes del cierre de </body>
        $html = str_replace('</body>', $interceptorScript . '</body>', $html);

        return $html;
    }
}
