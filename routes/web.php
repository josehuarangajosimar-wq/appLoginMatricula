<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatriculaCrudController;

Route::get('/', function () { return redirect()->route('login'); });

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Pasarela OAuth Google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
// CORRECCIÓN: Se le asigna un nombre explícito (google.callback) para evitar fallos del framework
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

// Rutas Web de Control Operacional (CRUDs)
Route::prefix('gestion')->group(function () {
    // Alumnos
    Route::post('/alumnos/store', [MatriculaCrudController::class, 'storeAlumno'])->name('alumnos.store');
    Route::put('/alumnos/update/{id}', [MatriculaCrudController::class, 'updateAlumno'])->name('alumnos.update');
    Route::delete('/alumnos/destroy/{id}', [MatriculaCrudController::class, 'destroyAlumno'])->name('alumnos.destroy');
    
    // Cursos
    Route::post('/cursos/store', [MatriculaCrudController::class, 'storeCurso'])->name('cursos.store');
    Route::put('/cursos/update/{id}', [MatriculaCrudController::class, 'updateCurso'])->name('cursos.update');
    Route::delete('/cursos/destroy/{id}', [MatriculaCrudController::class, 'destroyCurso'])->name('cursos.destroy');
    
    // Profesores
    Route::post('/profesores/store', [MatriculaCrudController::class, 'storeProfesor'])->name('profesores.store');
    Route::put('/profesores/update/{id}', [MatriculaCrudController::class, 'updateProfesor'])->name('profesores.update');
    Route::delete('/profesores/destroy/{id}', [MatriculaCrudController::class, 'destroyProfesor'])->name('profesores.destroy');
});