<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'career_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
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
     * Relación directa: Un estudiante pertenece a una carrera profesional.
     * Requerido para mapear el curso seleccionado dinámicamente.
     */
    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class, 'career_id');
    }

    /**
     * Relación: Un usuario posee múltiples registros de sesión activos.
     * Requerido por tu LoginController para registrar el dispositivo (User-Agent) sin errores.
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'user_id');
    }
}
