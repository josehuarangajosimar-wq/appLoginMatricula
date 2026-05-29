<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Career extends Model
{
    use HasFactory;

    /**
     * El nombre de la tabla asociada al modelo en HeidiSQL.
     *
     * @var string
     */
    protected $table = 'careers';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relación inversa: Una carrera tiene muchos estudiantes (usuarios) registrados.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'career_id');
    }
}
