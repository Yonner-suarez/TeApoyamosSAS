<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Caso extends Model
{
    use Notifiable;

    protected $table = 'casos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',       // abierto, en_progreso, cerrado
        'usuario_id',   // abogado o usuario asignado
        'reporte',      // campo de texto con el contenido del reporte
        'fecha_inicio',
        'fecha_cierre',
    ];

    protected $attributes = [
        'estado' => 'abierto',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_cierre' => 'datetime',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    protected $auditEnabled = false;
}
