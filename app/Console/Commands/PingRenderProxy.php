<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PingRenderProxy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'render:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar ping a los proxies de Render para mantenerlos despiertos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $proxyUrls = env('RENDER_PROXY_URLS');

        if (!$proxyUrls) {
            $this->error('RENDER_PROXY_URLS no está configurado en .env');
            Log::warning('RENDER_PROXY_URLS no está configurado en .env');
            return 1;
        }

        // Convertir string con URLs separadas por coma en array
        $urls = array_map('trim', explode(',', $proxyUrls));

        $this->info("Enviando ping a " . count($urls) . " proxy/proxies...");
        $this->newLine();

        $successCount = 0;
        $errorCount = 0;

        foreach ($urls as $index => $proxyUrl) {
            if (empty($proxyUrl)) {
                continue;
            }

            $this->info("[" . ($index + 1) . "/" . count($urls) . "] Enviando ping a: {$proxyUrl}");

            try {
                $response = Http::timeout(5)->get($proxyUrl);

                $this->info("    ✓ Ping exitoso - HTTP {$response->status()}");
                $successCount++;

                Log::info('Ping exitoso al proxy de Render', [
                    'url' => $proxyUrl,
                    'status' => $response->status()
                ]);
            } catch (\Exception $e) {
                $this->error("    ✗ Error: {$e->getMessage()}");
                $errorCount++;

                Log::error('Error al hacer ping al proxy de Render', [
                    'url' => $proxyUrl,
                    'error' => $e->getMessage()
                ]);
            }

            $this->newLine();
        }

        // Resumen
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->info("Resumen:");
        $this->info("  Total proxies: " . count($urls));
        $this->info("  Exitosos: {$successCount}");
        $this->info("  Errores: {$errorCount}");
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

        Log::info('Keep-alive completado', [
            'total_proxies' => count($urls),
            'success' => $successCount,
            'errors' => $errorCount
        ]);

        return $errorCount > 0 ? 1 : 0;
    }
}
