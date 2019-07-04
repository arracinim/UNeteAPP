<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viajeReservado extends Model
{
    protected $table = "viajeReservado";
    protected $fillable = [
        'hora_de_salida', 'origen', 'destino', 'punto_de_encuentro', 'id_oferta','id_vehiculo','id_reserva'
    ];


}
