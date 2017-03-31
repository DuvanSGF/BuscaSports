<?php

namespace webDeportes;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table='barrio';
    protected $primaryKey='id_barrio';

    public $timestamps=false;

    protected $fillable=[
    'id_comuna',
    'nombre_barrio'
    ];
}
