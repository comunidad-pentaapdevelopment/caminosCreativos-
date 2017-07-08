<?php

namespace Caminos;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
     protected $table='trabajos';
    protected $primayKey='id';
    public $timestamps=false;

    protected $fillable=[
   
    'tipotrabajoId',
    'DescripcionLarga',
    'DescripcionCorta',
    'Imagen',
    'Audio',
    'Cliente',
    'Fecha',
    'Estado'
    ];
    protected $guarded=[
    
    ];


}
