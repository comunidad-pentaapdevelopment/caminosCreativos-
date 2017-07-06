<?php

namespace Caminos;

use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
     protected $table='tipotrabajos';
    protected $primayKey='id';
    public $timestamps=false;

    protected $fillable=[
    'Descripcion',
    'Estado'
    
    ];
    protected $guarded=[
    
    ];


}
