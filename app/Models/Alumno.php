<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno'; // NECESARIO: Mapeo SQL
    public $incrementing = true;
    
    protected $fillable = [
        'nombre', 'apellidos', 'fecha_nacimiento', 'dni', 
        'direccion', 'telefono', 'email', 'estado_matricula'
    ];
}