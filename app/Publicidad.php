<?php

namespace Caminos;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $table='publicidades';
    protected $primayKey='Id';
    public $timestamps=true;

    protected $fillable=[
    'Descripcion',
    'Imagen'
    ];
    protected $guarded=[
    
    ];


}
