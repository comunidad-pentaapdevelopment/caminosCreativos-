<?php

namespace Caminos\Http\Controllers;

use Illuminate\Http\Request;
use Caminos\Http\Requests;
use Caminos\Publicidad;
use Caminos\Http\Requests\PublicidadFormRequest;
use DB;


class PublicidadController extends Controller
{
    //
    public function store(PublicidadFormRequest $request)
    {
    	$publicidad = new Publicidad;
    	$publicidad ->Descripcion=$request->get('Descripcion');
    	$publicidad ->Imagen=$request->get('Imagen');
    	$publicidad->save();

    	return Redirect::to('/publicidad');
    }
}
