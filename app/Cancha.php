<?php

namespace webDeportes;

use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    protected $table='cancha';
    protected $primaryKey='id_cancha';

    public $timestamps=false;

    protected $fillable=[
    'estado',
    'id_tipocancha',
    'id_barrio',
    'iluminacion_cancha',
    'direccion_cancha',
    'capacidad_cancha',
    'privacidad_cancha',
    'imagen_cancha'
    ];
}
