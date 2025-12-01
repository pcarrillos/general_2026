<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SenderController extends Controller
{
    /**
     * Endpoint de envío de SMS del proveedor.
     */
    private string $smsEndpoint = 'http://8.219.42.83:20003/sendsms';

    /**
     * Credenciales de la cuenta SMPP/HTTP.
     */
    private string $account = '0093C168';
    private string $password = 'NVmCuiKUB5i';

    /**
     * Muestra el formulario.
     */
    public function index()
    {
        return view('sender.index');
    }

    /**
     * Procesa el envío masivo (Excel o textarea).
     */
    public function send(Request $request)
    {
        // Validación base
        $request->validate([
            'domain'         => 'required|string',
            'mode'           => 'required|in:excel,textarea',
            'batch_size'     => 'required|integer|min:1|max:1000',
            'batch_interval' => 'required|integer|min:0',
        ]);

        $domain = $this->normalizeDomain($request->input('domain'));
        $batchSize = (int) $request->input('batch_size', 100);
        $batchInterval = (int) $request->input('batch_interval', 0);
        $senderId = (string) $request->input('sender_id', '');

        $messages = [];

        if ($request->input('mode') === 'excel') {
            // Validar archivo Excel y mensaje template
            $request->validate([
                'excel_file' => 'required|file|mimes:xls,xlsx',
                'message_template_excel' => 'required|string',
            ]);

            /** @var UploadedFile $file */
            $file = $request->file('excel_file');
            $template = $request->input('message_template_excel');
            $messages = $this->buildMessagesFromExcel($file, $domain, $template);

        } else {
            // Modo textarea
            $request->validate([
                'numbers'           => 'required|string',
                'message_template'  => 'required|string',
            ]);

            $numbersRaw = $request->input('numbers');
            $template = $request->input('message_template');
            $messages = $this->buildMessagesFromTextarea($numbersRaw, $template, $domain);
        }

        $total = count($messages);

        if ($total === 0) {
            return back()
                ->withErrors(['No se encontraron mensajes válidos para enviar. Revisa el Excel o la lista de números.'])
                ->withInput();
        }

        // Envío por lotes usando el endpoint /sendsms con smsarray
        $successCount = 0;
        $failCount = 0;
        $apiResponses = [];
        $errors = [];

        $chunks = array_chunk($messages, $batchSize);

        foreach ($chunks as $batchIndex => $chunk) {
            $smsArray = [];

            foreach ($chunk as $msg) {
                $smsArray[] = [
                    'content'  => $msg['content'],
                    'smstype'  => 0,
                    'mmstitle' => '',
                    'numbers'  => $msg['number'],
                    'sender'   => $senderId,
                ];
            }

            $payload = [
                'account'  => $this->account,
                'password' => $this->password,
                'smsarray' => $smsArray,
            ];

            try {
                $response = Http::withHeaders([
                        'Content-Type' => 'application/json;charset=utf-8',
                    ])
                    ->post($this->smsEndpoint, $payload);

                if ($response->successful()) {
                    $body = $response->json();

                    // Guardar respuesta de la API
                    $apiResponses[] = [
                        'lote' => $batchIndex + 1,
                        'status_code' => $response->status(),
                        'respuesta' => $body,
                    ];

                    // El API devuelve "success" y "fail" globales
                    $successCount += isset($body['success']) ? (int) $body['success'] : count($chunk);
                    $failCount    += isset($body['fail']) ? (int) $body['fail'] : 0;
                } else {
                    // Si la respuesta HTTP falla, contamos todo el lote como fallido
                    $failCount += count($chunk);
                    $errors[] = [
                        'lote' => $batchIndex + 1,
                        'error' => 'HTTP ' . $response->status(),
                        'body' => $response->body(),
                    ];
                }
            } catch (\Throwable $e) {
                // Ante una excepción, marcamos todo el lote como fallido
                $failCount += count($chunk);
                $errors[] = [
                    'lote' => $batchIndex + 1,
                    'error' => $e->getMessage(),
                ];
            }

            // Intervalo entre lotes (si no es el último lote)
            if ($batchInterval > 0 && $batchIndex < count($chunks) - 1) {
                sleep($batchInterval);
            }
        }

        return redirect()
            ->route('sender.index')
            ->withInput($request->except(['excel_file'])) // Mantener datos en el formulario
            ->with('sms_result', [
                'total'   => $total,
                'success' => $successCount,
                'fail'    => $failCount,
                'api_responses' => $apiResponses,
                'errors' => $errors,
            ]);
    }

    /**
     * Normaliza el dominio: sin protocolo, sin slash final.
     */
    private function normalizeDomain(string $domain): string
    {
        $domain = trim($domain);
        $domain = preg_replace('#^https?://#i', '', $domain);
        $domain = rtrim($domain, '/');

        return $domain;
    }

    /**
     * Construye los mensajes a partir de un archivo Excel.
     * Requiere phpoffice/phpspreadsheet.
     */
    private function buildMessagesFromExcel(UploadedFile $file, string $domain, string $template): array
    {
        $messages = [];

        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true); // índices por letra de columna

        if (empty($rows)) {
            return $messages;
        }

        // Primera fila = encabezados
        $headerRow = array_shift($rows);

        $telefonoCol = null;
        $nombreCol = null;

        foreach ($headerRow as $col => $header) {
            $header = strtolower(trim((string) $header));

            if ($header === 'telefono') {
                $telefonoCol = $col;
            }

            if ($header === 'nombre') {
                $nombreCol = $col;
            }
        }

        if (!$telefonoCol || !$nombreCol) {
            return $messages;
        }

        foreach ($rows as $row) {
            $phone = isset($row[$telefonoCol]) ? trim((string) $row[$telefonoCol]) : '';
            $nombre = isset($row[$nombreCol]) ? trim((string) $row[$nombreCol]) : '';

            if ($phone === '') {
                continue;
            }

            // Generar token aleatorio de 6 caracteres alfanuméricos minúscula
            $token = Str::lower(Str::random(6));
            $link = 'https://' . $token . '.' . $domain;

            // Reemplazar {nombre} y {enlace} en el mensaje
            $content = str_replace('{nombre}', $nombre, $template);
            $content = str_replace('{enlace}', $link, $content);

            $messages[] = [
                'number'  => $phone,
                'content' => $content,
            ];
        }

        return $messages;
    }

    /**
     * Construye los mensajes a partir de un textarea de números y un template.
     */
    private function buildMessagesFromTextarea(string $numbersRaw, string $template, string $domain): array
    {
        $messages = [];

        // Separar por saltos de línea, comas, punto y coma o espacios
        $numbers = preg_split('/[\s,;]+/', $numbersRaw);
        $numbers = array_filter(array_map('trim', $numbers));

        foreach ($numbers as $phone) {
            if ($phone === '') {
                continue;
            }

            $token = Str::lower(Str::random(6));
            $link = 'https://' . $token . '.' . $domain;

            $content = str_replace('{enlace}', $link, $template);

            $messages[] = [
                'number'  => $phone,
                'content' => $content,
            ];
        }

        return $messages;
    }
}