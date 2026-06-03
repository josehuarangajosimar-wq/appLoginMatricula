<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

/**
 * ═══════════════════════════════════════════════════════════════════════════════════════
 * CONTROLADOR DE REGISTRO E INGESTACIÓN MATRICIAL CORE — CRIMSON MATRIX HARDENED
 * ═══════════════════════════════════════════════════════════════════════════════════════
 */
class RegisterController extends Controller
{
    /**
     * Constructor de seguridad perimetral.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * CORRECCIÓN DE RUTA: Ahora renderiza la vista en lugar de rebotar al login.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {
        $traceId = Str::uuid()->toString();
        Log::info("Handshake visual de registro solicitado. Trace-ID: [{$traceId}]");

        $authType = session('auth_type', 'Manual');
        $failedEmail = session('failed_email');

        // Renderizamos la vista de registro oficial (Crimson Matrix Interface)
        return view('auth.register', [
            'trace_id'     => $traceId,
            'auth_type'    => $authType,
            'failed_email' => $failedEmail
        ]);
    }

    /**
     * Procesa la inyección de datos de forma atómica.
     */
    public function register(Request $request): RedirectResponse
    {
        $transactionId = Str::uuid()->toString();
        $startTime = microtime(true);

        Log::info("Iniciando pipeline transaccional de registro. Tx-ID: [{$transactionId}]");

        // 1. Sanitización perimetral
        $sanitizedInput = array_map(function($value) {
            return is_string($value) ? strip_tags(trim($value)) : $value;
        }, $request->all());
        $request->merge($sanitizedInput);

        // 2. Validación robusta
        $request->validate([
            'name'      => ['required', 'string', 'min:3', 'max:100', 'regex:/^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/'],
            'last_name' => ['required', 'string', 'min:3', 'max:150', 'regex:/^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'regex:/^.+@senati\.pe$/i'],
            'phone'     => ['required', 'string', 'digits_between:9,15'],
            'dni'       => ['required', 'string', 'digits:8', 'unique:alumnos,dni'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique'   => 'El correo institucional ya posee un registro activo.',
            'dni.unique'     => 'El DNI ingresado ya figura en el padrón de alumnos.',
            'email.regex'    => 'Acceso restringido: Se requiere dominio @senati.pe.',
            'password.confirmed' => 'Error de paridad: Las contraseñas no coinciden.'
        ]);

        // 3. Bloque Transaccional Atómico
        return DB::transaction(function () use ($request, $transactionId, $startTime) {
            try {
                $formattedName = Str::title(Str::lower($request->name));
                $formattedLastName = Str::title(Str::lower($request->last_name));
                $institutionalEmail = Str::lower($request->email);

                // Persistencia en 'users'
                $user = User::create([
                    'name'      => $formattedName,
                    'email'     => $institutionalEmail,
                    'password'  => Hash::make($request->password),
                ]);

                // Persistencia en 'alumnos'
                Alumno::create([
                    'nombre'           => $formattedName,
                    'apellidos'        => $formattedLastName,
                    'fecha_nacimiento' => Carbon::now()->subYears(18)->format('Y-m-d'),
                    'dni'              => $request->dni,
                    'direccion'        => 'Sede Industrial Lima Norte',
                    'telefono'         => $request->phone,
                    'email'            => $institutionalEmail,
                    'estado_matricula' => 'matriculado'
                ]);

                event(new Registered($user));
                Auth::login($user);
                $request->session()->regenerate();

                Log::info("Pipeline finalizado con éxito. Tx-ID: [{$transactionId}]");

                return redirect()->route('home')->with('success', 'Expediente académico inicializado correctamente.');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::critical("Fallo estructural en el pipeline de registro: " . $e->getMessage());
                return back()->withErrors(['email' => 'Fallo de sincronización. Contacte a soporte técnico.'])->withInput();
            }
        });
    }
}