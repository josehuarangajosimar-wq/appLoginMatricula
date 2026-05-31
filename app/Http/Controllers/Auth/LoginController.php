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
    public function showLoginForm() { return view('auth.login'); }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // SOLUCIÓN: Redirección fail-safe con el correo específico
            return redirect()->route('register')->with([
                'auth_type' => 'Manual',
                'failed_email' => $request->email
            ]);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors(['email' => 'Acceso denegado: Credenciales incorrectas.']);
    }

    // CORRECCIÓN: Se añade Request $request para poder leer el email de la interfaz
    public function redirectToGoogle(Request $request)
    {
        if (empty(config('services.google.client_id')) || config('services.google.client_id') == 'your-google-client-id') {
            // CORRECCIÓN: Redirige usando la ruta con nombre y arrastra el email de forma segura
            return redirect()->route('google.callback', ['email' => $request->query('email')]);
        }
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            if (!empty(config('services.google.client_id')) && config('services.google.client_id') !== 'your-google-client-id') {
                $googleUser = Socialite::driver('google')->user();
                $email = $googleUser->getEmail();
            } else {
                // CORRECCIÓN: Captura el email enviado a través de la query string del simulador
                $email = $request->query('email') ?? 'arijosetalcaokarenraul54@gmail.com';
            }

            $user = User::where('email', $email)->first();

            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('home');
            } else {
                return redirect()->route('register')->with([
                    'auth_type' => 'Google',
                    'failed_email' => $email
                ]);
            }
        } catch (Exception $e) {
            return redirect()->route('register')->with(['auth_type' => 'Sistema', 'failed_email' => 'usuario@externo.com']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}