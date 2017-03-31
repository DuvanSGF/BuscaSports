<?php

namespace webDeportes;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table='reserva';
    protected $primaryKey='id_reserva';

    public $timestamps=false;

    protected $fillable=[
    'estado',
    'id_usuario_reserva',
    'id_deporte_reserva',
    'id_cancha_reserva',
    'dia_reserva',
    'equipo1_reserva',
    'equipo2_reserva',
    'descripcion_reserva',
    ];
}
