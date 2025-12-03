<?php

namespace App\Services;

use Illuminate\Http\Request;

class BotDetector
{
    // User agents conocidos de bots
    private array $botPatterns = [
        'bot', 'crawler', 'spider', 'scraper', 'curl', 'wget', 'python',
        'java', 'perl', 'ruby', 'go-http', 'axios', 'node-fetch', 'postman',
        'insomnia', 'httpie', 'aiohttp', 'requests', 'libwww', 'lwp',
        'mechanize', 'phantom', 'headless', 'selenium', 'puppeteer',
        'playwright', 'cypress', 'googlebot', 'bingbot', 'yandex', 'baidu',
        'duckduckbot', 'slurp', 'facebookexternalhit', 'linkedinbot',
        'twitterbot', 'whatsapp', 'telegram', 'discord', 'slack',
        'mediapartners', 'adsbot', 'feedfetcher', 'facebot'
    ];

    // User agents de Facebook legítimos (para pre-render de enlaces)
    private array $facebookBots = [
        'facebookexternalhit',
        'facebot',
        'facebookcatalog',
    ];

    // Navegadores reales conocidos
    private array $realBrowsers = [
        'chrome', 'firefox', 'safari', 'edge', 'opera', 'samsung', 'ucbrowser',
        'brave', 'vivaldi', 'yandex browser', 'duckduckgo'
    ];

    private array $reasons = [];
    private int $score = 0;

    /**
     * Analiza una petición y retorna información de detección de bot
     */
    public function analyze(Request $request): array
    {
        $this->reasons = [];
        $this->score = 0;

        $userAgent = strtolower($request->userAgent() ?? '');
        $ip = $request->ip();

        // 1. Sin User-Agent (+40)
        if (empty($userAgent)) {
            $this->addScore(40, 'no_user_agent');
        } else {
            // 2. Contiene patrón de bot conocido (+30)
            foreach ($this->botPatterns as $pattern) {
                if (str_contains($userAgent, $pattern)) {
                    // Facebook bot tiene tratamiento especial
                    if (in_array($pattern, $this->facebookBots)) {
                        $this->addScore(100, 'facebook_bot');
                        break;
                    }
                    $this->addScore(30, 'bot_pattern:' . $pattern);
                    break;
                }
            }

            // 3. No tiene navegador real reconocido (+20)
            $hasRealBrowser = false;
            foreach ($this->realBrowsers as $browser) {
                if (str_contains($userAgent, $browser)) {
                    $hasRealBrowser = true;
                    break;
                }
            }
            if (!$hasRealBrowser && $this->score < 30) {
                $this->addScore(20, 'unknown_browser');
            }

            // 4. User-Agent muy corto (+15)
            if (strlen($userAgent) < 50 && $this->score < 30) {
                $this->addScore(15, 'short_user_agent');
            }

            // 5. User-Agent genérico/sospechoso (+25)
            if (preg_match('/^mozilla\/5\.0 \(compatible;/', $userAgent)) {
                $this->addScore(25, 'generic_ua');
            }
        }

        // 6. Headers sospechosos
        if (!$request->header('Accept-Language')) {
            $this->addScore(10, 'no_accept_language');
        }

        if (!$request->header('Accept-Encoding')) {
            $this->addScore(10, 'no_accept_encoding');
        }

        // 7. IP de datacenter conocido (simplificado)
        if ($this->isDatacenterIp($ip)) {
            $this->addScore(15, 'datacenter_ip');
        }

        // Normalizar score a 0-100
        $this->score = min(100, $this->score);

        return [
            'score' => $this->score,
            'is_bot' => $this->score >= 50,
            'reasons' => implode(', ', array_unique($this->reasons)),
        ];
    }

    /**
     * Extrae información del navegador desde el User-Agent
     */
    public function parseUserAgent(?string $userAgent): array
    {
        if (empty($userAgent)) {
            return [
                'browser' => null,
                'browser_version' => null,
                'platform' => null,
                'device_type' => null,
            ];
        }

        $ua = strtolower($userAgent);
        $browser = null;
        $browserVersion = null;
        $platform = null;
        $deviceType = 'desktop';

        // Detectar plataforma
        if (str_contains($ua, 'android')) {
            $platform = 'Android';
            $deviceType = 'mobile';
        } elseif (str_contains($ua, 'iphone')) {
            $platform = 'iOS';
            $deviceType = 'mobile';
        } elseif (str_contains($ua, 'ipad')) {
            $platform = 'iOS';
            $deviceType = 'tablet';
        } elseif (str_contains($ua, 'windows')) {
            $platform = 'Windows';
        } elseif (str_contains($ua, 'macintosh') || str_contains($ua, 'mac os')) {
            $platform = 'macOS';
        } elseif (str_contains($ua, 'linux')) {
            $platform = 'Linux';
        }

        // Detectar navegador y versión
        $browsers = [
            'edg/' => 'Edge',
            'edge/' => 'Edge',
            'opr/' => 'Opera',
            'opera/' => 'Opera',
            'chrome/' => 'Chrome',
            'crios/' => 'Chrome',
            'firefox/' => 'Firefox',
            'fxios/' => 'Firefox',
            'safari/' => 'Safari',
            'samsungbrowser/' => 'Samsung Browser',
            'ucbrowser/' => 'UC Browser',
        ];

        foreach ($browsers as $pattern => $name) {
            if (str_contains($ua, $pattern)) {
                $browser = $name;
                // Extraer versión
                if (preg_match('/' . preg_quote($pattern, '/') . '([\d.]+)/i', $ua, $matches)) {
                    $browserVersion = explode('.', $matches[1])[0]; // Solo versión mayor
                }
                break;
            }
        }

        // Safari necesita tratamiento especial (evitar confusión con Chrome)
        if ($browser === 'Safari' && str_contains($ua, 'chrome/')) {
            $browser = 'Chrome';
            if (preg_match('/chrome\/([\d.]+)/i', $ua, $matches)) {
                $browserVersion = explode('.', $matches[1])[0];
            }
        }

        // Detectar móvil por otros indicadores
        if (str_contains($ua, 'mobile') || str_contains($ua, 'phone')) {
            $deviceType = 'mobile';
        } elseif (str_contains($ua, 'tablet')) {
            $deviceType = 'tablet';
        }

        return [
            'browser' => $browser,
            'browser_version' => $browserVersion,
            'platform' => $platform,
            'device_type' => $deviceType,
        ];
    }

    /**
     * Detecta la fuente de tráfico
     */
    public function detectTrafficSource(Request $request): string
    {
        $referer = strtolower($request->header('Referer') ?? '');
        $fbclid = $request->query('fbclid');
        $utmSource = strtolower($request->query('utm_source') ?? '');

        // Facebook
        if ($fbclid || str_contains($referer, 'facebook.com') || str_contains($referer, 'fb.com') || str_contains($referer, 'm.facebook') || $utmSource === 'fb' || $utmSource === 'facebook') {
            return 'facebook';
        }

        // Google
        if (str_contains($referer, 'google.') || $utmSource === 'google') {
            return 'google';
        }

        // Instagram
        if (str_contains($referer, 'instagram.com') || $utmSource === 'instagram' || $utmSource === 'ig') {
            return 'instagram';
        }

        // TikTok
        if (str_contains($referer, 'tiktok.com') || $utmSource === 'tiktok') {
            return 'tiktok';
        }

        // WhatsApp
        if (str_contains($referer, 'whatsapp') || str_contains($request->userAgent() ?? '', 'whatsapp')) {
            return 'whatsapp';
        }

        // Twitter/X
        if (str_contains($referer, 'twitter.com') || str_contains($referer, 't.co') || str_contains($referer, 'x.com')) {
            return 'twitter';
        }

        // Directo (sin referer o mismo dominio)
        if (empty($referer)) {
            return 'direct';
        }

        // Interno (mismo sitio)
        $host = $request->getHost();
        if (str_contains($referer, $host)) {
            return 'internal';
        }

        return 'other';
    }

    /**
     * Obtiene información de geolocalización desde la IP
     * Usa el header de Cloudflare si está disponible
     */
    public function getGeoInfo(Request $request): array
    {
        // Cloudflare proporciona el país
        $countryCode = $request->header('CF-IPCountry');

        $countries = [
            'CO' => 'Colombia',
            'MX' => 'México',
            'AR' => 'Argentina',
            'PE' => 'Perú',
            'CL' => 'Chile',
            'EC' => 'Ecuador',
            'VE' => 'Venezuela',
            'US' => 'Estados Unidos',
            'ES' => 'España',
            'BR' => 'Brasil',
        ];

        return [
            'country_code' => $countryCode,
            'country_name' => $countries[$countryCode] ?? $countryCode,
            'city' => $request->header('CF-IPCity'), // Solo disponible en planes de pago de CF
        ];
    }

    private function addScore(int $points, string $reason): void
    {
        $this->score += $points;
        $this->reasons[] = $reason;
    }

    private function isDatacenterIp(string $ip): bool
    {
        // Rangos comunes de datacenters/VPNs (simplificado)
        $datacenterRanges = [
            '104.', // Cloudflare
            '172.', // Rangos privados usados por proxies
            '34.', '35.', // Google Cloud
            '52.', '54.', '18.', // AWS
            '13.', // Azure
            '157.240.', // Facebook
            '66.220.', // Facebook
        ];

        foreach ($datacenterRanges as $range) {
            if (str_starts_with($ip, $range)) {
                return true;
            }
        }

        return false;
    }
}
