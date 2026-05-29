<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;

class MatriculaCrudController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    // --- OPERACIONES ALUMNO ---
    public function storeAlumno(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|string|unique:alumnos,dni',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:alumnos,email',
            'estado_matricula' => 'required|in:matriculado,inactivo'
        ]);

        Alumno::create($validated);
        return redirect()->route('home')->with('success', 'Alumno registrado con éxito en HeidiSQL.')->with('tab', 'alumnos');
    }

    public function updateAlumno(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|unique:alumnos,dni,'.$id.',id_alumno',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:alumnos,email,'.$id.',id_alumno',
            'estado_matricula' => 'required|in:matriculado,inactivo'
        ]);

        $alumno->update($validated);
        return redirect()->route('home')->with('success', 'Fila de Alumno actualizada correctamente.')->with('tab', 'alumnos');
    }

    public function destroyAlumno($id)
    {
        Alumno::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Registro eliminado del sistema.')->with('tab', 'alumnos');
    }

    // --- OPERACIONES CURSO ---
    public function storeCurso(Request $request)
    {
        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'codigo_curso' => 'required|string|unique:cursos,codigo_curso',
            'creditos' => 'required|integer',
            'descripcion' => 'nullable|string'
        ]);

        Curso::create($validated);
        return redirect()->route('home')->with('success', 'Curso insertado correctamente.')->with('tab', 'cursos');
    }

    public function updateCurso(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'codigo_curso' => 'required|string|unique:cursos,codigo_curso,'.$id.',id_curso',
            'creditos' => 'required|integer',
            'descripcion' => 'nullable|string'
        ]);

        $curso->update($validated);
        return redirect()->route('home')->with('success', 'Curso actualizado con éxito.')->with('tab', 'cursos');
    }

    public function destroyCurso($id)
    {
        Curso::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Curso removido de la cuadrícula.')->with('tab', 'cursos');
    }

    // --- OPERACIONES PROFESOR ---
    public function storeProfesor(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255'
        ]);

        Profesor::create($validated);
        return redirect()->route('home')->with('success', 'Profesor registrado con éxito.')->with('tab', 'profesores');
    }

    public function updateProfesor(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255'
        ]);

        $profesor->update($validated);
        return redirect()->route('home')->with('success', 'Profesor modificado de forma correcta.')->with('tab', 'profesores');
    }

    public function destroyProfesor($id)
    {
        Profesor::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Profesor dado de baja del sistema.')->with('tab', 'profesores');
    }
}
