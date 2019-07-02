<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $fillable = [
        'hora_de_salida', 'origen', 'destino', 'punto_de_encuentro', 'puestos_disponibles','id_estudiante','id_vehiculo'
    ];
}
