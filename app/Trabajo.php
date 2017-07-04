<?php

namespace Caminos;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
     protected $table='trabajos';
    protected $primayKey='Id';
    public $timestamps=true;

    protected $fillable=[
   
    'tipotrabajoId',
    'DescripcionLarga',
    'DescripcionCorta',
    'Imagen',
    'Audio',
    'Cliente',
    'Fecha'
    ];
    protected $guarded=[
    
    ];


}
