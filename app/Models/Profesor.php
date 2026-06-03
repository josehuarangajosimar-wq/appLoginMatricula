<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'id_profesor'; // NECESARIO: Mapeo SQL
    protected $fillable = ['nombre', 'apellidos', 'especialidad'];
}