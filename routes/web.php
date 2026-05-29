<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Redirección base del framework hacia la pantalla de acceso
Route::get('/', function () {
    return redirect()->route('login');
});

// Ecosistema nativo de autenticación clásica de Laravel
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Módulos de Integración para Google OAuth 2.0
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Módulos de Integración para GitHub OAuth 2.0
Route::get('auth/github', [LoginController::class, 'redirectToGithub'])->name('github.login');
Route::get('login/github/callback', [LoginController::class, 'handleGithubCallback']);
