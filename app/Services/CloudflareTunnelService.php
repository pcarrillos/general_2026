<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class CloudflareTunnelService
{
    protected string $logPath = '/tmp/tunnels';
    protected string $hostHeader = 'general.pwm435.space';
    protected string $originUrl = 'http://nginx-proxy:80';

    public function __construct()
    {
        if (!is_dir($this->logPath)) {
            mkdir($this->logPath, 0755, true);
        }
    }

    public function create(): array
    {
        $logFile = $this->logPath . '/tunnel_' . uniqid() . '.log';

        $command = sprintf(
            'cloudflared tunnel --url %s --http-host-header %s > %s 2>&1 & echo $!',
            escapeshellarg($this->originUrl),
            escapeshellarg($this->hostHeader),
            escapeshellarg($logFile)
        );

        $pid = trim(shell_exec($command));

        // Esperar a que se genere la URL del túnel
        $maxAttempts = 20;
        $attempts = 0;
        $domain = null;

        while ($attempts < $maxAttempts && $domain === null) {
            sleep(1);
            $attempts++;

            if (file_exists($logFile)) {
                $logContent = file_get_contents($logFile);
                if (preg_match('/https:\/\/([a-z0-9-]+\.trycloudflare\.com)/', $logContent, $matches)) {
                    $domain = $matches[1];
                }
            }
        }

        if ($domain === null) {
            $this->destroy((int)$pid);
            Log::error('CloudflareTunnel: No se pudo obtener el dominio del túnel', [
                'pid' => $pid,
                'logFile' => $logFile
            ]);
            return [
                'success' => false,
                'error' => 'No se pudo crear el túnel. Timeout esperando URL.',
            ];
        }

        Log::info('CloudflareTunnel: Túnel creado exitosamente', [
            'domain' => $domain,
            'pid' => $pid
        ]);

        return [
            'success' => true,
            'domain' => $domain,
            'pid' => (int)$pid,
            'logFile' => $logFile,
        ];
    }

    public function destroy(int $pid): bool
    {
        if ($pid <= 0) {
            return false;
        }

        // Verificar si el proceso existe
        $exists = shell_exec("ps -p {$pid} -o pid= 2>/dev/null");

        if (trim($exists) === '') {
            Log::info('CloudflareTunnel: El proceso ya no existe', ['pid' => $pid]);
            return true;
        }

        // Matar el proceso
        shell_exec("kill {$pid} 2>/dev/null");

        // Verificar que se haya matado
        sleep(1);
        $stillExists = shell_exec("ps -p {$pid} -o pid= 2>/dev/null");

        if (trim($stillExists) !== '') {
            // Forzar terminación
            shell_exec("kill -9 {$pid} 2>/dev/null");
        }

        Log::info('CloudflareTunnel: Túnel destruido', ['pid' => $pid]);

        return true;
    }

    public function isRunning(int $pid): bool
    {
        if ($pid <= 0) {
            return false;
        }

        $exists = shell_exec("ps -p {$pid} -o pid= 2>/dev/null");
        return trim($exists) !== '';
    }

    public function restart(int $oldPid): array
    {
        $this->destroy($oldPid);
        return $this->create();
    }
}
