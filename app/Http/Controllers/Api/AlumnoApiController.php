<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoApiController extends Controller
{
    /**
     * GET /api/alumnos
     * Retorna el listado completo de registros para la evidencia técnica.
     */
    public function index()
    {
        return response()->json(Alumno::all(), 200);
    }

    /**
     * POST /api/alumnos
     * Registra un nuevo alumno validando las restricciones únicas de base de datos.
     */
    public function store(Request $request)
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

        $alumno = Alumno::create($validated);
        return response()->json(['status' => 'success', 'message' => 'Alumno registrado con éxito', 'data' => $alumno], 201);
    }

    /**
     * GET /api/alumnos/{id}
     * Busca y retorna una entidad específica. Maneja el error 404 de forma nativa.
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['status' => 'error', 'message' => 'Error 404: Alumno no localizado en el sistema'], 404);
        }
        return response()->json($alumno, 200);
    }

    /**
     * PUT /api/alumnos/{id}
     * Actualiza los datos de la fila controlando excepciones de duplicidad de DNI o Correo.
     */
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['status' => 'error', 'message' => 'Error 404: Alumno no localizado en el sistema'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'fecha_nacimiento' => 'sometimes|required|date',
            'dni' => 'sometimes|required|string|unique:alumnos,dni,' . $id . ',id_alumno',
            'direccion' => 'sometimes|required|string|max:255',
            'telefono' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|unique:alumnos,email,' . $id . ',id_alumno',
            'estado_matricula' => 'sometimes|required|in:matriculado,inactivo'
        ]);

        $alumno->update($validated);
        return response()->json(['status' => 'success', 'message' => 'Fila actualizada de forma impecable', 'data' => $alumno], 200);
    }

    /**
     * DELETE /api/alumnos/{id}
     * Remueve físicamente el registro de la cuadrícula de datos.
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['status' => 'error', 'message' => 'Error 404: Registro no encontrado'], 404);
        }
        $alumno->delete();
        return response()->json(['status' => 'success', 'message' => 'Fila eliminada correctamente de HeidiSQL'], 200);
    }
}
