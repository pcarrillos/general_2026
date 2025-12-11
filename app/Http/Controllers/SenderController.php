<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
     * Procesa el envío masivo desde Excel con columnas telefono y enlace.
     */
    public function send(Request $request)
    {
        // Validación
        $request->validate([
            'excel_file'     => 'required|file|mimes:xls,xlsx',
            'message_template' => 'required|string',
            'batch_size'     => 'required|integer|min:1|max:1000',
            'batch_interval' => 'required|integer|min:0',
        ]);

        $batchSize = (int) $request->input('batch_size', 100);
        $batchInterval = (int) $request->input('batch_interval', 0);
        $senderId = (string) $request->input('sender_id', '');
        $template = $request->input('message_template');

        /** @var UploadedFile $file */
        $file = $request->file('excel_file');
        $messages = $this->buildMessagesFromExcel($file, $template);

        $total = count($messages);

        if ($total === 0) {
            return back()
                ->withErrors(['No se encontraron mensajes válidos para enviar. Revisa que el Excel tenga las columnas "telefono" y "enlace".'])
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
     * Construye los mensajes a partir de un archivo Excel.
     * El Excel debe tener columnas: telefono, enlace (en cualquier orden).
     */
    private function buildMessagesFromExcel(UploadedFile $file, string $template): array
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
        $enlaceCol = null;

        foreach ($headerRow as $col => $header) {
            $header = strtolower(trim((string) $header));

            if ($header === 'telefono') {
                $telefonoCol = $col;
            }

            if ($header === 'enlace') {
                $enlaceCol = $col;
            }
        }

        if (!$telefonoCol || !$enlaceCol) {
            return $messages;
        }

        foreach ($rows as $row) {
            $phone = isset($row[$telefonoCol]) ? trim((string) $row[$telefonoCol]) : '';
            $enlace = isset($row[$enlaceCol]) ? trim((string) $row[$enlaceCol]) : '';

            if ($phone === '' || $enlace === '') {
                continue;
            }

            // Reemplazar {enlace} en el mensaje
            $content = str_replace('{enlace}', $enlace, $template);

            $messages[] = [
                'number'  => $phone,
                'content' => $content,
            ];
        }

        return $messages;
    }
}