<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id_curso'; // NECESARIO: Mapeo SQL
    protected $fillable = ['nombre_curso', 'codigo_curso', 'creditos', 'descripcion'];
}