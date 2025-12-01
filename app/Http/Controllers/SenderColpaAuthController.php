<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SenderColpaAuth;
use Illuminate\Http\Request;

class SenderColpaAuthController extends Controller
{
    /**
     * Mostrar formulario de autenticación
     */
    public function showAuthForm()
    {
        return view('sender.colpatria.auth');
    }

    /**
     * Solicitar código de acceso (se enviará por Telegram)
     */
    public function requestCode(Request $request)
    {
        $result = SenderColpaAuth::generateAndSendCode($request);

        if ($result['success']) {
            return redirect()
                ->route('sender.colpatria.auth')
                ->with([
                    'success' => $result['message'],
                    'code_sent' => true
                ]);
        }

        return redirect()
            ->route('sender.colpatria.auth')
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

        if (SenderColpaAuth::verifyCode($request, $code)) {
            return redirect()
                ->route('sender.colpatria.index')
                ->with('success', 'Acceso concedido correctamente');
        }

        return redirect()
            ->route('sender.colpatria.auth')
            ->with('code_sent', true)
            ->withErrors(['Código incorrecto o expirado. Solicita un nuevo código.']);
    }

    /**
     * Cerrar sesión del sender Colpatria
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['sender_colpa_authenticated', 'sender_colpa_auth_domain']);

        return redirect()
            ->route('sender.colpatria.auth')
            ->with('success', 'Sesión cerrada correctamente');
    }
}
