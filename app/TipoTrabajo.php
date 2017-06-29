<?php

namespace Caminos;

use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
     protected $table='tipotrabajos';
    protected $primayKey='Id';
    public $timestamps=true;

    protected $fillable=[
    'Descripcion',
    
    ];
    protected $guarded=[
    
    ];


}
