<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * Tabla asociada en la base de datos de HeidiSQL.
     *
     * @var string
     */
    protected $table = 'cursos';

    /**
     * Llave primaria personalizada definida por el entregable de SENATI.
     *
     * @var string
     */
    protected $primaryKey = 'id_curso';

    /**
     * Atributos asignables de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_curso', 
        'codigo_curso', 
        'creditos', 
        'descripcion'
    ];

    /**
     * Relación uno a muchos hacia la tabla de Matrículas.
     */
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_curso', 'id_curso');
    }

    /**
     * Relación uno a muchos hacia el calendario de Horarios.
     */
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_curso', 'id_curso');
    }
}
