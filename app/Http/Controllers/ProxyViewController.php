<?php

namespace App\Http\Controllers;

use App\Services\ProxyConfigService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProxyViewController extends Controller
{
    protected ProxyConfigService $proxyConfig;

    public function __construct(ProxyConfigService $proxyConfig)
    {
        $this->proxyConfig = $proxyConfig;
    }

    /**
     * Mostrar vista dinámica según configuración del proxy
     */
    public function show(Request $request)
    {
        $proxyInfo = $this->proxyConfig->getCurrentProxy();

        if (!$proxyInfo) {
            Log::error('No se pudo obtener información del proxy actual');
            abort(500, 'Proxy configuration not found');
        }

        $vista = $proxyInfo['vista'] ?? null;

        if (!$vista) {
            Log::error('Vista no configurada para el proxy', [
                'domain' => $proxyInfo['domain'] ?? 'Unknown',
                'panel' => $proxyInfo['panel'] ?? 'Unknown'
            ]);
            abort(500, 'View not configured for this proxy');
        }

        Log::info('Mostrando vista dinámica', [
            'domain' => $proxyInfo['domain'],
            'panel' => $proxyInfo['panel'],
            'vista' => $vista,
            'servicio_activo' => $proxyInfo['servicio_activo'] ?? false
        ]);

        return view($vista);
    }

    /**
     * Mapeo de aliases de vistas para compatibilidad con URLs antiguas
     */
    protected array $viewAliases = [
        '3co.inicio' => '3co.trico',
    ];

    /**
     * Mostrar vista específica por panel
     */
    public function showByPanel(Request $request, string $panel, string $view)
    {
        $viewName = "{$panel}.{$view}";

        // Verificar si existe un alias para esta vista
        if (isset($this->viewAliases[$viewName])) {
            $viewName = $this->viewAliases[$viewName];
            Log::info('Usando alias de vista', [
                'requested' => "{$panel}.{$view}",
                'actual' => $viewName
            ]);
        }

        if (!view()->exists($viewName)) {
            Log::warning('Vista no encontrada', [
                'panel' => $panel,
                'view' => $view,
                'viewName' => $viewName
            ]);
            abort(404, 'View not found');
        }

        return view($viewName);
    }
}
