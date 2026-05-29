<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlumnoApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Registro explícito del recurso RESTful completo para Postman
Route::apiResource('alumnos', AlumnoApiController::class);
