<?php

namespace Caminos\Http\Controllers;

use Illuminate\Http\Request;

use Caminos\Http\Requests;
use Caminos\Publicidad;
use Session;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Caminos\Http\Requests\PublicidadFormRequest;
use DB;

class PublicidadController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$publicidades=DB::table('publicidades')
    		->where('Descripcion','LIKE','%'.$query.'%')
    		->where('Estado','=','ACTIVO')
    		->paginate(7);
    		return view('publicidad.index',["publicidades"=>$publicidades,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	return view("publicidad.create");
    }

    public function store(PublicidadFormRequest $request)
    {
    	$publicidad=new Publicidad;
    	$publicidad->Descripcion=$request->get('Descripcion');
    	if(Input::hasFile('Imagen'))
        {
            $file=Input::file('Imagen');
            $file->move(public_path().'/img/portfolio/',$file->getClientOriginalName());
            $publicidad->Imagen=$file->getClientOriginalName();
        }
    	$publicidad->Estado='ACTIVO';

    	$publicidad->save();
    	return Redirect::to('publicidad');


    }

    public function show($id)
    {
    	
    }

    public function edit($id)
    {
    
        $publicidades=Publicidad::findOrFail($id);
    	return view("publicidad.edit",["publicidades"=>$publicidades]); 		
    }

    public function update(PublicidadFormRequest $request,$id)
    {
    	$publicidad=Publicidad::findOrFail($id);
    	$publicidad->Descripcion=$request->get('Descripcion');
    	if(Input::hasFile('Imagen'))
        {
            $file=Input::file('Imagen');
            $file->move(public_path().'/img/portfolio/',$file->getClientOriginalName());
            $publicidad->Imagen=$file->getClientOriginalName();
        }

    	$publicidad->update();
    	return Redirect::to('publicidad');
    }

    public function destroy($id)
    {
    	$publicidad=Publicidad::findOrFail($id);
    	$publicidad->Estado='INACTIVO';
    	$publicidad->update();
    return Redirect::to('/publicidad');
    }
}