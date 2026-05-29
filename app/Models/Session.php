<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;

    /**
     * El nombre de la tabla asociada al modelo en HeidiSQL.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * Los atributos que son asignables en masa desde el LoginController.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'device',
    ];

    /**
     * Relación inversa: Una sesión específica pertenece a un único estudiante.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
