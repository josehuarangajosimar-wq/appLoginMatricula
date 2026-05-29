<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Redirección automática de la raíz de la aplicación hacia el login.
 * Evita que la página cargue en texto plano o vacía si el usuario entra a la URL base.
 */
Route::get('/', function () {
    return redirect()->route('login');
});

/**
 * Ecosistema nativo de rutas de autenticación de Laravel.
 * Registra de forma interna los endpoints para:
 * - Login tradicional (GET/POST)
 * - Registro institucional (GET/POST)
 * - Recuperación y reset de contraseñas de seguridad
 */
Auth::routes();

/**
 * Ruta del panel de control principal (Dashboard) post-autenticación.
 * Carga el módulo donde se muestra el estado del estudiante y el identificador relacional.
 */
Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Rutas oficiales de integración para la API de Google OAuth 2.0 (Socialite)
 * Mapeadas con la sintaxis exacta de Laravel 11:
 * * 1. google.login -> Redirecciona al estudiante hacia la pasarela oficial de Google.
 * 2. Callback -> Endpoint receptor donde Google devuelve el token y el correo validado.
 * Coincide exactamente con tu URI autorizada de Google Cloud Console.
 */
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
