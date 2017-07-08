<?php

namespace Caminos;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $table='publicidades';
    protected $primayKey='id';
    public $timestamps=false;

    protected $fillable=[
    'Descripcion',
    'Imagen',
    'Estado'
    ];
    protected $guarded=[
    
    ];


}
