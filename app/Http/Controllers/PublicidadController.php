<?php

namespace Caminos\Http\Controllers;

use Illuminate\Http\Request;

use Caminos\Http\Requests;
use Caminos\Publicidad;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Caminos\Http\Requests\PublicidadFormRequest;
use DB;

class PublicidadController extends Controller
{
 public function __construct(){

    }
    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$publicidades=DB::table('publicidades')
    		->where('Descripcion','LIKE','%'.$query.'%')
    		->where('Estado','=',1)
    		->orderBy('id','desc')
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
    	$publicidad->Estado=1;

    	$publicidad->save();
    	return Redirect::to('publicidad');


    }

    public function show($id)
    {
    	return view("publicidad.show",["publicidades"=>Publicidad::findOrFail($id)]);
    	
    }

    public function edit($id)
    {
    
    	return view("publicidad.edit",["publicidades"=>Publicidad::findOrFail($id)]);
    		
    }

    public function update(PublicidadFormRequest $request,$id)
    {
    	$publicidad=new Publicidad;
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
    	$publicidad->Estado=0;
    	$publicidad->update();
    	return Redirect::to('publicidad');
    }}