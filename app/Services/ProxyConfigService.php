<?php

namespace App\Services;

use App\Models\Parametro;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProxyConfigService
{
    protected int $cacheTtl = 300; // 5 minutos

    public function __construct()
    {
        //
    }

    /**
     * Obtener toda la configuración de proxies desde DB
     */
    public function getConfig(): ?array
    {
        return Cache::remember('proxy_config', $this->cacheTtl, function () {
            $parametros = Parametro::all();

            if ($parametros->isEmpty()) {
                Log::error('No hay configuraciones de proxies en la base de datos');
                return null;
            }

            $proxies = [];
            foreach ($parametros as $parametro) {
                $proxies[] = [
                    'domain' => $parametro->Proxy,
                    'name' => $parametro->Nombre,
                    'panel' => $parametro->Panel,
                    'enabled' => $parametro->isEstadoActivo(),
                    'chat_ids' => $parametro->getChatIdsArray(),
                    'servicio_activo' => $parametro->isServicioActivo(),
                    'vista' => $parametro->getVista(),
                    'vista_inicial' => $parametro->Vista_inicial,
                    'vista_final' => $parametro->Vista_final,
                    'fecha_inicio' => $parametro->Fecha_inicio,
                    'fecha_fin' => $parametro->Fecha_fin,
                ];
            }

            return ['proxies' => $proxies, 'log_blocked_requests' => true];
        });
    }

    /**
     * Obtener información de un proxy por dominio
     */
    public function getProxyByDomain(string $domain): ?array
    {
        return Cache::remember("proxy_domain_{$domain}", $this->cacheTtl, function () use ($domain) {
            $parametro = Parametro::getByProxy($domain);

            if (!$parametro) {
                return null;
            }

            return [
                'domain' => $parametro->Proxy,
                'name' => $parametro->Nombre,
                'panel' => $parametro->Panel,
                'enabled' => $parametro->isEstadoActivo(),
                'chat_ids' => $parametro->getChatIdsArray(),
                'servicio_activo' => $parametro->isServicioActivo(),
                'vista' => $parametro->getVista(),
                'vista_inicial' => $parametro->Vista_inicial,
                'vista_final' => $parametro->Vista_final,
                'fecha_inicio' => $parametro->Fecha_inicio,
                'fecha_fin' => $parametro->Fecha_fin,
            ];
        });
    }

    /**
     * Obtener el proxy actual de la petición
     */
    public function getCurrentProxy(): ?array
    {
        if (app()->bound('current_proxy')) {
            return app('current_proxy');
        }
        return null;
    }

    /**
     * Obtener el nombre del proxy actual
     */
    public function getCurrentName(): ?string
    {
        $proxy = $this->getCurrentProxy();
        return $proxy['name'] ?? null;
    }

    /**
     * Obtener todos los chat_ids del proxy actual
     */
    public function getCurrentChatIds(): array
    {
        $proxy = $this->getCurrentProxy();
        $chatIds = $proxy['chat_ids'] ?? [];
        return is_array($chatIds) ? $chatIds : [];
    }

    /**
     * Obtener el dominio del proxy actual
     */
    public function getCurrentDomain(): ?string
    {
        $proxy = $this->getCurrentProxy();
        return $proxy['domain'] ?? null;
    }

    /**
     * Verificar si un dominio está permitido
     */
    public function isDomainAllowed(string $domain): bool
    {
        $proxy = $this->getProxyByDomain($domain);

        if (!$proxy) {
            return false;
        }

        return $proxy['enabled'] ?? false;
    }

    /**
     * Obtener todos los proxies habilitados
     */
    public function getEnabledProxies(): array
    {
        $config = $this->getConfig();

        if (!$config || !isset($config['proxies'])) {
            return [];
        }

        return array_filter($config['proxies'], function ($proxy) {
            return ($proxy['enabled'] ?? false) === true;
        });
    }

    /**
     * Obtener todos los chat_ids de todos los proxies habilitados
     */
    public function getAllEnabledChatIds(): array
    {
        $proxies = $this->getEnabledProxies();
        $allChatIds = [];

        foreach ($proxies as $proxy) {
            if (isset($proxy['chat_ids']) && is_array($proxy['chat_ids'])) {
                $allChatIds = array_merge($allChatIds, $proxy['chat_ids']);
            }
        }

        return array_unique($allChatIds);
    }

    /**
     * Limpiar caché de configuración
     */
    public function clearCache(): void
    {
        Cache::forget('proxy_config');

        // Limpiar cachés individuales de dominios
        $parametros = Parametro::all();
        foreach ($parametros as $parametro) {
            Cache::forget("proxy_domain_{$parametro->Proxy}");
            Cache::forget("telegram_template_{$parametro->Proxy}");
        }

        Log::info('Caché de configuración de proxies limpiada');
    }

    /**
     * Recargar configuración (limpiar caché)
     */
    public function reload(): ?array
    {
        $this->clearCache();
        return $this->getConfig();
    }

    /**
     * Obtener estadísticas de proxies
     */
    public function getStats(): array
    {
        $config = $this->getConfig();

        if (!$config || !isset($config['proxies'])) {
            return [
                'total' => 0,
                'enabled' => 0,
                'disabled' => 0
            ];
        }

        $total = count($config['proxies']);
        $enabled = count(array_filter($config['proxies'], fn($p) => $p['enabled'] ?? false));

        return [
            'total' => $total,
            'enabled' => $enabled,
            'disabled' => $total - $enabled
        ];
    }

    /**
     * Obtener todas las plantillas de Telegram desde configuración PHP
     */
    public function getTemplatesConfig(): ?array
    {
        $plantillas = config('plantillas');

        if (!$plantillas || empty($plantillas)) {
            Log::error('No se encontraron plantillas en config/plantillas.php');
            return null;
        }

        return $plantillas;
    }

    /**
     * Obtener plantilla de mensaje de Telegram para un dominio específico
     */
    public function getTelegramTemplate(string $domain): ?array
    {
        return Cache::remember("telegram_template_{$domain}", $this->cacheTtl, function () use ($domain) {
            // Obtener el parámetro del dominio para saber el nombre del panel
            $parametro = Parametro::getByProxy($domain);

            if (!$parametro) {
                Log::warning("No se encontró configuración para el dominio {$domain}");
                return $this->getDefaultTelegramTemplate();
            }

            // Obtener plantilla según el nombre del panel
            $plantillas = $this->getTemplatesConfig();

            if (!$plantillas || !isset($plantillas[$parametro->Panel])) {
                Log::warning("No se encontró plantilla para el panel {$parametro->Panel}");
                return $this->getDefaultTelegramTemplate();
            }

            return $plantillas[$parametro->Panel];
        });
    }

    /**
     * Obtener plantilla de mensaje del proxy actual
     */
    public function getCurrentTelegramTemplate(): ?array
    {
        $domain = $this->getCurrentDomain();

        if (!$domain) {
            Log::warning('No se pudo obtener el dominio actual para la plantilla de Telegram');
            return $this->getDefaultTelegramTemplate();
        }

        return $this->getTelegramTemplate($domain);
    }

    /**
     * Obtener plantilla por defecto
     */
    public function getDefaultTelegramTemplate(): ?array
    {
        $plantillas = $this->getTemplatesConfig();

        if (!$plantillas || empty($plantillas)) {
            return null;
        }

        // Retornar la primera plantilla como default
        return reset($plantillas);
    }

    /**
     * Obtener plantilla por nombre específico
     */
    public function getTemplateByName(string $templateName): ?array
    {
        $plantillas = $this->getTemplatesConfig();

        if (!$plantillas || empty($plantillas)) {
            Log::warning("No se encontraron plantillas al buscar: {$templateName}");
            return null;
        }

        if (isset($plantillas[$templateName])) {
            Log::info("Plantilla '{$templateName}' encontrada");
            return $plantillas[$templateName];
        }

        Log::warning("Plantilla '{$templateName}' no encontrada en las plantillas disponibles");
        return null;
    }

    /**
     * Limpiar caché de plantillas
     * Nota: Las plantillas ahora usan config() de Laravel.
     * Para recargar, ejecutar: php artisan config:clear
     */
    public function clearTemplatesCache(): void
    {
        // Limpiar cachés individuales de plantillas por dominio
        $parametros = Parametro::all();
        foreach ($parametros as $parametro) {
            Cache::forget("telegram_template_{$parametro->Proxy}");
        }
        Log::info('Caché de plantillas de Telegram limpiada');
    }

    /**
     * Recargar configuración y plantillas (limpiar todos los cachés)
     */
    public function reloadAll(): array
    {
        $this->clearCache();
        $this->clearTemplatesCache();

        return [
            'proxy_config' => $this->getConfig(),
            'telegram_templates' => $this->getTemplatesConfig()
        ];
    }
}
