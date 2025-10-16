<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Solicitud extends Model
{
    use Notifiable;

    protected $table = 'solicitudes';
    /**
     * Campos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_completo',
        'correo',
        'telefono',
        'experiencia',
        'hoja_vida',
        'estado',
    ];

    /**
     * Valores por defecto.
     *
     * @var array
     */
    protected $attributes = [
        'estado' => 'pendiente',
    ];
}
