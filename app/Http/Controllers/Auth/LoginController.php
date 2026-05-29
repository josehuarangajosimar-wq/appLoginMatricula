<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirección por defecto tras un inicio de sesión válido.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirige el flujo del cliente hacia el servidor seguro de Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Recibe el token de respuesta de Google e inicia la sesión del estudiante.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Busca si el correo ya existe, sino lo registra automáticamente en la base de datos
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            Auth::login($user);
            return redirect($this->redirectTo);

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Error de conexión con la API de Google: ' . $e->getMessage()
            ]);
        }
    }
}