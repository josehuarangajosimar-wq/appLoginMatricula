<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Alumno;
use Exception;

class LoginController extends Controller
{
    /**
     * Procesar inicio de sesión tradicional por credenciales.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirigir con la pestaña por defecto cargada
            return redirect()->intended('home')->with('success', 'Sesión iniciada correctamente.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Redirigir el flujo hacia el portal de OAuth de Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Procesar la respuesta de la API de Google y validar existencia.
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail();

            // Buscar si el usuario existe en nuestra base de datos
            $user = User::where('email', $email)->first();

            if ($user) {
                // El usuario ya existe, iniciamos sesión directamente
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->route('home')->with('success', 'Bienvenido al Portal Académico de la Escuela de TI.');
            } else {
                // El usuario NO existe, bloqueamos el acceso y enviamos al registro con un mensaje personalizado
                return redirect()->route('register')->with('google_error', 'La cuenta de Google (' . $email . ') no se encuentra registrada en nuestro sistema de matrículas. Por favor, realice su registro en este formulario primero.');
            }

        } catch (Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Hubo un error al intentar conectarse con los servidores de autenticación de Google.',
            ]);
        }
    }

    /**
     * Cerrar sesión en el ecosistema.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión finalizada de forma segura.');
    }
}