<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'password',
        'rol', // abogado, cliente, admin
    ];

    protected $hidden = ['password'];

    protected $attributes = [
        'rol' => 'abogado',
    ];

    // Relaciones
    public function casos()
    {
        return $this->hasMany(Caso::class, 'usuario_id');
    }
}
