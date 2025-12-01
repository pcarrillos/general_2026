<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $table = 'parametros';

    protected $fillable = [
        'Panel',
        'Nombre',
        'Proxy',
        'ChatIds',
        'Estado',
        'Fecha_inicio',
        'Fecha_fin',
        'Vista_inicial',
        'Vista_final',
        'Servicio',
        'Plantilla',
    ];

    protected $casts = [
        'Plantilla' => 'array',
        'Fecha_inicio' => 'date',
        'Fecha_fin' => 'date',
    ];

    /**
     * Obtener configuración por proxy
     * Busca por coincidencia exacta o por dominio+ruta
     */
    public static function getByProxy(string $proxy): ?self
    {
        // Primero intentar coincidencia exacta
        $parametro = self::where('Proxy', $proxy)->first();

        if ($parametro) {
            return $parametro;
        }

        // Si no hay coincidencia exacta Y el valor NO incluye "/" (es solo dominio),
        // buscar registros que comiencen con ese dominio
        // Esto permite que "central.pwm435.space" coincida con "central.pwm435.space/3co"
        if (strpos($proxy, '/') === false) {
            return self::where('Proxy', 'LIKE', $proxy . '%')->first();
        }

        // Si incluye "/" y no hubo coincidencia exacta, no encontrado
        return null;
    }

    /**
     * Obtener configuración por dominio y ruta
     * Busca el proxy cuyo valor coincida como prefijo de la petición
     *
     * Ejemplo:
     * - Proxy en DB: cancelsecurecardif.onrender.com/3co
     * - Petición: cancelsecurecardif.onrender.com/3co/cardif
     * - Resultado: Coincide ✓
     */
    public static function getByDomainAndPath(string $host, string $path): ?self
    {
        // Limpiar la ruta (quitar / inicial si existe)
        $cleanPath = ltrim($path, '/');

        // Construir el valor completo de la petición: dominio/ruta
        $fullRequest = $cleanPath ? "{$host}/{$cleanPath}" : $host;

        // Buscar todos los proxies que coincidan con el dominio
        $parametros = self::where('Proxy', 'LIKE', $host . '%')->get();

        // Si no hay ninguno, retornar null
        if ($parametros->isEmpty()) {
            return null;
        }

        // Buscar el proxy más específico que coincida como prefijo
        $bestMatch = null;
        $longestMatch = 0;

        foreach ($parametros as $parametro) {
            $proxyValue = $parametro->Proxy;

            // Verificar si la petición comienza con el valor del proxy
            if (str_starts_with($fullRequest, $proxyValue)) {
                $matchLength = strlen($proxyValue);

                // Guardar el match más largo (más específico)
                if ($matchLength > $longestMatch) {
                    $longestMatch = $matchLength;
                    $bestMatch = $parametro;
                }
            }
        }

        return $bestMatch;
    }

    /**
     * Obtener configuración por panel
     */
    public static function getByPanel(string $panel): ?self
    {
        return self::where('Panel', $panel)->first();
    }

    /**
     * Verificar si el servicio está activo
     */
    public function isServicioActivo(): bool
    {
        return $this->Servicio === 'Activo';
    }

    /**
     * Verificar si el estado está activo
     */
    public function isEstadoActivo(): bool
    {
        return $this->Estado === 'Activo';
    }

    /**
     * Obtener la vista que debe mostrarse
     */
    public function getVista(): string
    {
        return $this->isServicioActivo() ? $this->Vista_inicial : $this->Vista_final;
    }

    /**
     * Obtener los chat IDs como array
     */
    public function getChatIdsArray(): array
    {
        return array_map('trim', explode(',', $this->ChatIds));
    }
}
