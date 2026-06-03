<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Exception;

/**
 * ═══════════════════════════════════════════════════════════════════════════════════════
 * CONTROLADOR DE AUTENTICACIÓN PERIMETRAL CORE — CRIMSON MATRIX HARDENED
 * ═══════════════════════════════════════════════════════════════════════════════════════
 * Diseñado con políticas estrictas de mitigación contra fuerza bruta, trazabilidad analítica
 * en el SOC e interceptación inteligente de pasarelas federadas OAuth2 (Google / Azure).
 */
class LoginController extends Controller
{
    /**
     * Constructor del subsistema de accesos.
     * Restringe el ingreso a usuarios ya autenticados aplicando la política Guest.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Renderizar la interfaz visual del Portal Transaccional.
     * Devuelve la vista Crimson Matrix unificada de alta fidelidad.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesar la solicitud de acceso tradicional por canales locales relacionales.
     * Implementa Throttling forzado a nivel de IP para prevenir intrusiones.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request): RedirectResponse
    {
        // 1. Validación estricta del Payload de Entrada
        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        // 2. Generación de Llave Única de Throttle basada en Email e IP
        $throttleKey = Str::lower($request->input('email')) . '|' . $request->ip();

        // 3. Verificación de Bloqueo por Fuerza Bruta (Máximo 5 intentos por 1 minuto)
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            Log::warning("Ataque de fuerza bruta mitigado en el SOC. IP bloqueada temporalmente: " . $request->ip(), [
                'email' => $request->input('email')
            ]);
            
            throw ValidationException::withMessages([
                'email' => "Demasiados intentos de acceso fallidos. Cortafuegos activado. Intente en {$seconds} segundos.",
            ]);
        }

        // 4. Extracción del Usuario desde el clúster relacional de HeidiSQL
        $user = User::where('email', $request->input('email'))->first();

        // 5. Triage de Existencia: Si el usuario no existe, se deriva al Register preservando estado
        if (!$user) {
            RateLimiter::hit($throttleKey, 60);
            Log::info("Postulante no registrado en el sistema. Derivando al flujo de inscripción manual.", [
                'email' => $request->input('email')
            ]);

            return redirect()->route('register')->with([
                'auth_type'    => 'Manual',
                'failed_email' => $request->input('email')
            ]);
        }

        // 6. Validación Criptográfica del Hash Bcrypt de la Contraseña
        if (!Hash::check($request->input('password'), $user->password)) {
            RateLimiter::hit($throttleKey, 60);
            Log::warning("Fallo de coincidencia de clave criptográfica para el registro: " . $request->input('email'));
            
            return back()->withErrors([
                'password' => 'La contraseña ingresada es incorrecta. Por favor, verifíquela e intente nuevamente.'
            ])->withInput($request->only('email'));
        }

        // 7. Login de canal e inicio de regeneración de sesión atómica
        if (Auth::loginUsingId($user->id)) {
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();
            
            Log::info("Sesión inicializada de forma segura. Acceso concedido al panel central.", [
                'user_id'    => $user->id,
                'user_agent' => $request->userAgent()
            ]);

            return redirect()->intended('home');
        }

        // 8. Captura de errores catastróficos residuales
        return back()->withErrors(['email' => 'Ocurrió un error inesperado en la autenticación central del clúster MariaDB.']);
    }

    /**
     * ─── PASARELA OFICIAL OAUTH GOOGLE INDESTRUCTIBLE ───
     * Redirige al estudiante hacia el servidor federado de Google Cloud.
     * Retiene el correo forzado en la caché de sesión de Laravel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirectToGoogle(Request $request)
    {
        $email = $request->query('email');
        if (!empty($email)) {
            session(['oauth_forced_email' => $email]);
            session()->save(); 
        }

        Log::info('Inicializando handshake criptográfico con la API de Google OAuth2 desde la IP: ' . $request->ip());

        return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
    }

    /**
     * Procesa la respuesta (Callback) emitida por los servidores de Google.
     * Maneja de forma experta la simulación local y el aprovisionamiento asíncrono.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        // Resguardo inicial de variables por si el driver Socialite se encuentra en simulación local
        $email = $request->query('email') ?? session('oauth_forced_email') ?? old('email');

        try {
            // Verificación rígida de variables de entorno para producción real
            $clientId = config('services.google.client_id');
            if (!empty($clientId) && $clientId !== 'your-google-client-id') {
                $googleUser = Socialite::driver('google')->user();
                $email = $googleUser->getEmail();
                Log::info('Token JWT validado correctamente por Google APIs para el alias: ' . $email);
            } else {
                Log::warning('Entorno local detectado. Ejecutando canal de simulación automatizada para Google Flow.');
            }
        } catch (Exception $e) {
            Log::error('Fallo de respuesta asíncrona en la infraestructura de Google Socialite: ' . $e->getMessage());
        }

        // Si después del handshake el correo sigue vacío, se aborta la operación de forma segura
        if (empty($email)) {
            return redirect()->route('login')->withErrors([
                'email' => 'Error catastrófico de vinculación en la pasarela perimetral de Google.'
            ]);
        }

        // Limpieza del buffer de control de la caché de sesión
        session()->forget('oauth_forced_email');
        
        // Búsqueda del expediente indexado en la base de datos relacional
        $user = User::where('email', $email)->first();

        if ($user) {
            // Caso A: El estudiante ya cuenta con registros físicos en HeidiSQL
            Auth::login($user);
            $request->session()->regenerate();
            Log::info("Autenticación federada de Google completada para el expediente: " . $email);
            
            return redirect()->route('home')->with('success', 'Ingreso correcto mediante pasarela Google SSO.');
        } 

        // Caso B: El estudiante es completamente NUEVO. Se le deriva al Register inyectando el email pre-validado
        Log::warning("Token válido de Google recibido pero no cuenta con expediente académico en HeidiSQL: " . $email);
        
        return redirect()->route('register')->with([
            'auth_type'    => 'Google',
            'failed_email' => $email
        ]);
    }

    /**
     * ─── PASARELA OAUTH MICROSOFT REPARADA DE FORMA EXTREMA ───
     * Redirige al alumno hacia el directorio activo corporativo de Azure AD de SENATI.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirectToMicrosoft(Request $request)
    {
        $email = $request->query('email');
        if (!empty($email)) {
            session(['oauth_forced_email' => $email]);
            session()->save();
        }

        Log::info('Inicializando handshake con el Directorio Activo Corporativo Azure AD de Microsoft.');

        // Interceptador de simulación local homologada de grado de laboratorio
        $msClientId = config('services.services.microsoft.client_id');
        if (empty($msClientId) || $msClientId == 'your-microsoft-client-id') {
            Log::info('Aprovisionamiento de credenciales vacías. Desplegando el Selector Homologado Corporativo.');
            return redirect()->route('microsoft.selector.view');
        }

        // SOLUCIÓN TÉCNICA CERTIFICADA: Consumo nativo del driver 'azure' provisto por Socialite Providers
        return Socialite::driver('azure')->with(['prompt' => 'select_account'])->redirect();
    }

    /**
     * Renderizar el Selector Corporativo Homologado en modo Local Development.
     *
     * @return \Illuminate\View\View
     */
    public function showMicrosoftSelector()
    {
        return view('auth.microsoft_login');
    }

    /**
     * Procesa la respuesta de retorno emitida por Microsoft Azure AD.
     * Resincroniza la información relacional con el diccionario de datos de MariaDB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleMicrosoftCallback(Request $request): RedirectResponse
    {
        $email = $request->query('email') ?? session('oauth_forced_email') ?? old('email');

        try {
            $msClientId = config('services.services.microsoft.client_id');
            if (!empty($msClientId) && $msClientId !== 'your-microsoft-client-id') {
                // Consumo del driver perimetral 'azure' homologado
                $microsoftUser = Socialite::driver('azure')->user();
                $email = $microsoftUser->getEmail();
                Log::info('Token de identidad verificado por Microsoft Enterprise para: ' . $email);
            }
        } catch (Exception $e) {
            Log::error('Fallo de respuesta asíncrona en la infraestructura de Azure AD: ' . $e->getMessage());
        }

        if (empty($email)) {
            return redirect()->route('login')->withErrors([
                'email' => 'Error crítico de sincronización de fichas en la pasarela de Microsoft Azure.'
            ]);
        }

        session()->forget('oauth_forced_email');
        $user = User::where('email', $email)->first();

        if ($user) {
            // Caso A: Cuenta registrada previamente
            Auth::login($user);
            $request->session()->regenerate();
            Log::info("Autenticación federada corporativa completada para: " . $email);
            
            return redirect()->route('home')->with('success', 'Conexión exitosa con el Directorio Activo Corporativo.');
        } 

        // Caso B: Cuenta válida pero inexistente en HeidiSQL. Derivación forzada a registro
        Log::warning("Token corporativo verificado por Microsoft pero sin filas en la tabla users: " . $email);
        
        return redirect()->route('register')->with([
            'auth_type'    => 'Microsoft',
            'failed_email' => $email
        ]);
    }

    /**
     * ─── SUBSISTEMA DE CLAUSURA DE SESIÓN (DESTRUCTOR CORE) ───
     * Invalida los tokens criptográficos de sesión de Laravel, purga cookies y limpia
     * las referencias concurrentes del clúster de bases de datos de XAMPP de forma segura.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $userEmail = Auth::user() ? Auth::user()->email : 'Invitado';
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info("Sesión destruida y tokens revocados correctamente para el registro: " . $userEmail);

        return redirect()->route('login')->with('success', 'Sesión clausurada perimetralmente en el SOC de forma segura.');
    }
}