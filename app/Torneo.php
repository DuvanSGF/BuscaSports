<?php

namespace webDeportes;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table='torneo';
    protected $primaryKey='id_torneo';

    public $timestamps=false;

    protected $fillable=[
    'id_organizador_usuario',
    'id_usuario_reserva',
    'id_cancha_torneo',
    'id_deporte_torneo',
    'estado',
    'descripcion_torneo',
    ];
}