<?php

namespace Caminos\Http\Controllers;
use Illuminate\Http\Request;

use Caminos\Http\Requests;
use Caminos\TipoTrabajo;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Caminos\Http\Requests\TipoTrabajoFormRequest;
use DB;

class TipoTrabajoController extends Controller
{
 public function __construct(){
            $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$tipoTrabajos=DB::table('tipotrabajos')
    		->where('Descripcion','LIKE','%'.$query.'%')
    		->where('Estado','=','ACTIVO')
    		->orderBy('id','desc')
    		->paginate(7);
    		return view('tipoTrabajos.index',["tipotrabajos"=>$tipoTrabajos,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	return view("tipoTrabajos.create");
    }

    public function store(TipoTrabajoFormRequest $request)
    {
    	$tipotrabajo=new TipoTrabajo;
    	$tipotrabajo->Descripcion=$request->get('Descripcion');
    	$tipotrabajo->Estado='ACTIVO';

    	$tipotrabajo->save();
    	return Redirect::to('tipotrabajo');


    }

    public function show($id)
    {
    	return view("tipoTrabajos.show",["tipotrabajos"=>TipoTrabajo::findOrFail($id)]);
    	
    }

    public function edit($id)
    {
    
    	return view("tipoTrabajos.edit",["tipotrabajos"=>TipoTrabajo::findOrFail($id)]);
    		
    }

    public function update(TipoTrabajoFormRequest $request,$id)
    {
    	$tipotrabajo=TipoTrabajo::findOrFail($id);
    	$tipotrabajo->Descripcion=$request->get('Descripcion');
    	$tipotrabajo->update();
        return Redirect::to('tipotrabajo');
    }

    public function destroy($id)
    {
    	  // $tipotrabajo=TipoTrabajo::findOrFail($id);
    	  // $tipotrabajo->Estado='INACTIVO';
    	  // $tipotrabajo->update();
    	   // return Redirect::to('tipotrabajo');   
        
    }
}