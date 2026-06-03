<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;

/*
|--------------------------------------------------------------------------
| ═════════════════════════════════════════════════════════════════════════
| CYBER NEON CRIMSON MATRIX — TOPOLOGÍA DE ENRUTAMIENTO PERIMETRAL V6.0
| ═════════════════════════════════════════════════════════════════════════
|--------------------------------------------------------------------------
| Este archivo centraliza los vectores de acceso y los pipelines analíticos 
| de la Escuela de TI - SENATI. Los endpoints se encuentran encapsulados 
| según su nivel de privilegio para garantizar la atomicidad transaccional y
| mitigar vectores de intrusión en el clúster de bases de datos.
|
*/

// ═════════════════════════════════════════════════════════════════════════
// 1. CONTROLADORES PERIMETRALES DE REDIRECCIÓN CORE
// ═════════════════════════════════════════════════════════════════════════
/**
 * Vector de entrada raíz.
 * Realiza un desvío inmediato y transparente hacia la pasarela unificada de acceso (Login).
 */
Route::get('/', function () { 
    return redirect()->route('login'); 
});

// ═════════════════════════════════════════════════════════════════════════
// 2. SUBSISTEMA DE AUTENTICACIÓN PÚBLICA (MIDDLEWARE GUEST)
// ═════════════════════════════════════════════════════════════════════════
Route::middleware(['guest'])->group(function () {
    
    // --- Vectores de Acceso Tradicional (Login Local) ---
    /** Rendeziar el Portal Transaccional y Captura de Credenciales */
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    /** Procesar Intento de Login con mitigación contra fuerza bruta */
    Route::post('/login', [LoginController::class, 'login']);

    // --- Subsistema de Registro e Inicialización de Expedientes (Register) ---
    /** Renderizar Formulario de Inscripción en CSS Grid Matrix */
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    /** Ingestar de forma atómica el User de Autenticación y Alumno en InnoDB */
    Route::post('/register', [RegisterController::class, 'register']);

    // --- Subsistema de Recuperación de Tokens de Seguridad (Passwords) ---
    /** Desplegar interfaz SOC HUD de validación de cuentas caídas */
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    /** Inyectar Token Criptográfico visado a la bandeja de entrada institucional */
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // ─── PASARELA FEDERADA INTERACTIVA OAUTH GOOGLE CLOUD ───
    /** Redirección inicial e inicio de handshake con Google APIs */
    Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
    /** Callback asíncrono para triage e inicio seguro de sesión */
    Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

    // ─── PASARELA FEDERADA CORPORATIVA MICROSOFT AZURE AD ───
    /** Redirección inicial e inicio de handshake con el Directorio Activo */
    Route::get('auth/microsoft', [LoginController::class, 'redirectToMicrosoft'])->name('microsoft.login');
    /** Vista del Selector Corporativo Homologado en modo Local Development */
    Route::get('auth/microsoft/select-account', [LoginController::class, 'showMicrosoftSelector'])->name('microsoft.selector.view');
    /** Callback asíncrono de validación de tokens JWT de Microsoft */
    Route::get('login/microsoft/callback', [LoginController::class, 'handleMicrosoftCallback'])->name('microsoft.callback');

});

// ═════════════════════════════════════════════════════════════════════════
// 3. SUBSISTEMA PRIVADO DE ALTA INGENIERÍA (MIDDLEWARE AUTH HARDENED)
// ═════════════════════════════════════════════════════════════════════════
Route::middleware(['auth'])->group(function () {

    // --- Clausura Perimetral de Sesiones Activas ---
    /** Destruir tokens, revocar privilegios y purgar cookies del navegador */
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- Centro de Comando General (Dashboard HUD) ---
    /** Extrae las colecciones vivas de HeidiSQL y dibuja los páneles analíticos */
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ═════════════════════════════════════════════════════════════════════════
    // 4. CLÚSTER RELACIONAL OPERACIONAL (PIPELINE CRUD TRANSACTIONAL)
    // ═════════════════════════════════════════════════════════════════════════
    // Estos endpoints conectan de forma milimétrica tu home.blade.php con HeidiSQL
    
    // --- Módulo Operacional: Expedientes de Alumnos ---
    Route::prefix('gestion/alumnos')->group(function () {
        /** Guardar expediente manual desde ventana modal */
        Route::post('/store', [AlumnoController::class, 'store'])->name('alumnos.store');
        /** Aplicar parche/actualización mediante mapeo de JavaScript en el modal */
        Route::put('/update/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
        /** Purga forzada física del registro de la tabla relacional */
        Route::delete('/destroy/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
    });

    // --- Módulo Operacional: Catálogo de Cursos (Mallas ETI) ---
    Route::prefix('gestion/cursos')->group(function () {
        /** Guardar nueva asignatura tecnológica en el B-Tree */
        Route::post('/store', [CursoController::class, 'store'])->name('cursos.store');
        /** Aplicar parche/actualización de créditos y códigos curriculares */
        Route::put('/update/{id}', [CursoController::class, 'update'])->name('cursos.update');
        /** Eliminar asignatura rompiendo dependencias vía CASCADE en InnoDB */
        Route::delete('/destroy/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    });

    // --- Módulo Operacional: Plana de Instructores Senior ---
    Route::prefix('gestion/profesores')->group(function () {
        /** Vincular nuevo docente calificado al clúster */
        Route::post('/store', [ProfesorController::class, 'store'])->name('profesores.store');
        /** Modificar la ficha técnica y especialidad industrial del ingeniero */
        Route::put('/update/{id}', [ProfesorController::class, 'update'])->name('profesores.update');
        /** Retirar de forma permanente al docente de las planificaciones horarias */
        Route::delete('/destroy/{id}', [ProfesorController::class, 'destroy'])->name('profesores.destroy');
    });

});