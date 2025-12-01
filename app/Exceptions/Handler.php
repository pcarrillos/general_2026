<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * Personaliza las respuestas de error para NO exponer información sensible
     */
    public function render($request, Throwable $e)
    {
        // Si está en producción y detrás de proxy, ocultar detalles
        if (config('app.env') === 'production' && config('app.behind_proxy', false)) {
            return $this->renderProductionError($request, $e);
        }

        return parent::render($request, $e);
    }

    /**
     * Renderizar errores en producción sin exponer información sensible
     */
    protected function renderProductionError(Request $request, Throwable $e): JsonResponse
    {
        $statusCode = 500;
        $message = 'Server Error';

        if ($e instanceof HttpExceptionInterface) {
            $statusCode = $e->getStatusCode();
            $message = $this->getStatusMessage($statusCode);
        }

        // NO incluir stack trace, archivos, o rutas
        return response()->json([
            'error' => $message,
            'status' => $statusCode,
            // NO incluir: 'message', 'file', 'line', 'trace', etc.
        ], $statusCode);
    }

    /**
     * Obtener mensaje genérico según código de estado
     */
    protected function getStatusMessage(int $statusCode): string
    {
        return match ($statusCode) {
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            422 => 'Unprocessable Entity',
            429 => 'Too Many Requests',
            500 => 'Internal Server Error',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            default => 'Error',
        };
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * NO exponer campos o validaciones específicas en producción
     */
    protected function invalidJson($request, \Illuminate\Validation\ValidationException $exception)
    {
        if (config('app.env') === 'production' && config('app.behind_proxy', false)) {
            return response()->json([
                'error' => 'Validation Error',
                'status' => 422,
                // NO incluir detalles de validación
            ], 422);
        }

        return parent::invalidJson($request, $exception);
    }
}
