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
     * Dónde redirigir a los usuarios tras un inicio de sesión exitoso.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
    |--------------------------------------------------------------------------
    | PASARELA NATIVA DE GOOGLE OAUTH
    |--------------------------------------------------------------------------
    */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
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
                'email' => 'Fallo en la comunicación con la API de Google: ' . $e->getMessage()
            ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PASARELA NATIVA DE GITHUB OAUTH
    |--------------------------------------------------------------------------
    */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            
            // Si el correo de GitHub es privado, se genera uno ficticio institucional para evitar colisiones SQL
            $email = $githubUser->getEmail() ?? ($githubUser->getNickname() . '@github.com');

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            Auth::login($user);
            return redirect($this->redirectTo);

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Fallo en la comunicación con la API de GitHub: ' . $e->getMessage()
            ]);
        }
    }
}
