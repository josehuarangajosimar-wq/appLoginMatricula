<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Atributos habilitados para inyección masiva segura.
     * Sincronizados con los flujos criptográficos del panel Neón Rojo.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'career_id',
    ];

    /**
     * Atributos ocultos durante los procesos de serialización o respuestas de APIs.
     * Protege el hash y tokens perimetrales contra fugas de información.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión estricta de tipos de datos en tiempo de ejecución.
     * Garantiza el hashing Bcrypt nativo en Laravel 10/11 de forma inmutable.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación Directa: Un registro de usuario pertenece a una Carrera Tecnológica de la Escuela de TI.
     * Mapea de forma asíncrona la asignación del bloque según el simulador financiero.
     */
    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class, 'career_id');
    }

    /**
     * Relación Inversa: Monitorea múltiples sesiones activas concurrentes.
     * Permite al controlador perimetral purgar cookies y tokens duplicados en el SOC.
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'user_id');
    }

    /**
     * Scope de Auditoría Avanzada: Filtra usuarios pertenecientes a la corporación SENATI.
     */
    public function scopeOnlyInstitutional(Builder $query): Builder
    {
        return $query->where('email', 'LIKE', '%@senati.pe');
    }
}