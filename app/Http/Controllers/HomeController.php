<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Carga masiva de colecciones para alimentar las pestañas interactivas de la vista
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        $profesores = Profesor::all();
        
        return view('home', compact('alumnos', 'cursos', 'profesores'));
    }
}
