<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Centro de Comando: Orquestación de datos académicos.
     * Extrae las colecciones desde InnoDB y las inyecta en el HUD principal.
     */
    public function index()
    {
        try {
            // Extracción de colecciones relacionales
            $data = [
                'alumnos'    => Alumno::orderBy('id_alumno', 'DESC')->get(),
                'cursos'     => Curso::all(),
                'profesores' => Profesor::all(),
            ];

            return view('home', $data);

        } catch (\Exception $e) {
            // Registro de error en el sistema de logs para diagnóstico inmediato
            Log::critical('Fallo en la carga del Tablero de Comando: ' . $e->getMessage());
            
            return view('home', [
                'alumnos' => collect([]),
                'cursos' => collect([]),
                'profesores' => collect([])
            ])->withErrors(['error' => 'No fue posible sincronizar el motor de datos.']);
        }
    }
}