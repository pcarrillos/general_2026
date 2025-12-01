<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SenderAuth;
use Illuminate\Http\Request;

class SenderAuthController extends Controller
{
    /**
     * Mostrar formulario de autenticación
     */
    public function showAuthForm()
    {
        return view('sender.auth');
    }

    /**
     * Solicitar código de acceso (se enviará por Telegram)
     */
    public function requestCode(Request $request)
    {
        $result = SenderAuth::generateAndSendCode($request);

        if ($result['success']) {
            return redirect()
                ->route('sender.auth')
                ->with([
                    'success' => $result['message'],
                    'code_sent' => true
                ]);
        }

        return redirect()
            ->route('sender.auth')
            ->withErrors([$result['error'] ?? 'Error al enviar el código']);
    }

    /**
     * Verificar código ingresado
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6|alpha_num'
        ], [
            'code.required' => 'El código es obligatorio',
            'code.size' => 'El código debe tener exactamente 6 caracteres',
            'code.alpha_num' => 'El código debe ser alfanumérico'
        ]);

        $code = $request->input('code');

        if (SenderAuth::verifyCode($request, $code)) {
            return redirect()
                ->route('sender.index')
                ->with('success', 'Acceso concedido correctamente');
        }

        return redirect()
            ->route('sender.auth')
            ->with('code_sent', true)
            ->withErrors(['Código incorrecto o expirado. Solicita un nuevo código.']);
    }

    /**
     * Cerrar sesión del sender
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['sender_authenticated', 'sender_auth_domain']);

        return redirect()
            ->route('sender.auth')
            ->with('success', 'Sesión cerrada correctamente');
    }
}
