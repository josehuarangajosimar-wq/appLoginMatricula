<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * Tabla asociada en la base de datos de HeidiSQL.
     *
     * @var string
     */
    protected $table = 'alumnos';

    /**
     * Llave primaria personalizada definida por el entregable de SENATI.
     *
     * @var string
     */
    protected $primaryKey = 'id_alumno';
    
    /**
     * Atributos asignables de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'fecha_nacimiento', 
        'dni', 
        'direccion', 
        'telefono', 
        'email', 
        'estado_matricula'
    ];

    /**
     * Relación uno a muchos hacia la tabla relacional de Matrículas.
     */
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_alumno', 'id_alumno');
    }
}
