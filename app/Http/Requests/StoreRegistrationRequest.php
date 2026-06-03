<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreRegistrationRequest extends FormRequest
{
    // Autorizamos la solicitud (true para todos los usuarios)
    public function authorize(): bool 
    { 
        return true; 
    }

    // Reglas de validación a nivel de servidor (Hardened)
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'min:3', 'max:100', 'regex:/^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/'],
            'apellidos' => ['required', 'string', 'min:3', 'max:150'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^.+@senati\.pe$/i'],
            'telefono'  => ['required', 'string', 'digits_between:9,15'],
            'dni'       => ['required', 'string', 'digits:8', 'unique:alumnos,dni'],
            'password'  => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ];
    }

    // Mensajes de error personalizados para mejor UX
    public function messages(): array
    {
        return [
            'email.regex'    => 'Solo se permiten correos institucionales (@senati.pe).',
            'dni.digits'     => 'El DNI debe contener exactamente 8 dígitos.',
            'password.min'   => 'La contraseña debe tener al menos 8 caracteres, incluir números, mayúsculas y símbolos.',
        ];
    }
}