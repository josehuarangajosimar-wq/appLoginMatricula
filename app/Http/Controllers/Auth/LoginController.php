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
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Dónde redirigir a los usuarios tras un inicio de sesión exitoso.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Crear una nueva instancia del controlador de inicio de sesión.
     * Se elimina el middleware auth redundante sobre el método logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redireccionar el flujo de autenticación hacia la API de Google OAuth.
     * Lee de forma nativa las configuraciones del service provider.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Procesar la respuesta de retorno (Callback) oficial de los servidores de Google.
     * Valida el token, recupera el perfil del alumno e inicia sesión de forma relacional.
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            // Recuperar el perfil del usuario autenticado de forma segura desde Google
            $googleUser = Socialite::driver('google')->user();

            // Buscar si el correo electrónico institucional ya existe en HeidiSQL
            // Si no existe, realiza el alta automatizada con una clave encriptada aleatoria
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            // Registrar el dispositivo (User-Agent) en el almacenamiento de la sesión web
            $device = $request->header('User-Agent');
            $request->session()->put("device", $device);

            // Autenticar al usuario dentro de la sesión activa de Laravel
            Auth::login($user);

            // Redirección exitosa directa al Dashboard
            return redirect($this->redirectTo);

        } catch (\Exception $e) {
            // En caso de error o token expirado, retorna al login notificando el fallo
            return redirect()->route('login')->withErrors([
                'email' => 'Error de sincronización con la pasarela de Google: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * El usuario ha sido autenticado correctamente mediante el formulario clásico.
     * Se ejecuta automáticamente tras un inicio de sesión tradicional exitoso.
     */
    protected function authenticated(Request $request, $user)
    {
        $device = $request->header('User-Agent');
        $request->session()->put("device", $device);
    }
}