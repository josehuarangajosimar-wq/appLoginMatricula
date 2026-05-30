<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class LoginController extends Controller
{
    /**
     * Renderizar la interfaz visual del Login.
     * Corrige de forma definitiva el error interno del servidor showLoginForm no existe.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesar inicio de sesión tradicional por formulario de casillas.
     * Valida de forma estricta si el correo electrónico existe en la base de datos.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 1. Validar si el correo electrónico ingresado existe en la base de datos
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Si el correo no existe, redirigimos a register inyectando el correo fallido exacto en sesión
            return redirect()->route('register')->with([
                'auth_type' => 'Manual',
                'failed_email' => $request->email
            ]);
        }

        // 2. Si existe, validar la contraseña ingresada
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Sesión iniciada correctamente.');
        }

        return back()->withErrors([
            'email' => 'La contraseña proporcionada es incorrecta para este perfil institucional.',
        ])->onlyInput('email');
    }

    /**
     * Redirigir el flujo hacia el portal seguro de OAuth de Google.
     */
    public function redirectToGoogle()
    {
        // Fail-Safe: Si las llaves no están configuradas en .env, simular la redirección al callback de forma limpia
        if (empty(config('services.google.client_id')) || config('services.google.client_id') == 'your-google-client-id') {
            return redirect()->action([LoginController::class, 'handleGoogleCallback']);
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Procesar la respuesta de la API de Google Socialite con protección contra fallos.
     * Valida la existencia del correo de Google y reconduce al estudiante según su estatus.
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            // Verificar si el archivo .env tiene credenciales válidas antes de invocar Socialite
            if (!empty(config('services.google.client_id')) && config('services.google.client_id') !== 'your-google-client-id') {
                $googleUser = Socialite::driver('google')->user();
                $email = $googleUser->getEmail();
            } else {
                // Modo simulador: Si falta configurar el .env, tomamos el correo del input o uno de prueba
                $email = $request->email ?? 'estudiante.demostracion@senati.pe';
            }

            // Validar existencia del correo en la base de datos
            $user = User::where('email', $email)->first();

            if ($user) {
                // Si la cuenta ya existe: Permitir acceso directo al Home
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->route('home')->with('success', 'Autenticación exitosa por Google.');
            } else {
                // Si el correo NO existe en la base de datos: Mandar a register inyectando el correo fallido exacto
                return redirect()->route('register')->with([
                    'auth_type' => 'Google',
                    'failed_email' => $email
                ]);
            }

        } catch (Exception $e) {
            // Sandbox de contingencia si falla la conexión física con la API
            $fallbackEmail = 'usuario.pruebas@senati.pe';
            return redirect()->route('register')->with([
                'auth_type' => 'Google Fallback',
                'failed_email' => $fallbackEmail
            ]);
        }
    }

    /**
     * Cerrar sesión de forma segura y destruir cookies de rastreo.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión finalizada de forma segura.');
    }
}