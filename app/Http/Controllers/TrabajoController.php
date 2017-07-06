<?php

namespace Caminos\Http\Controllers;
use Illuminate\Http\Request;

use Caminos\Http\Requests;
use Caminos\Trabajo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Caminos\Http\Requests\TrabajoFormRequest;
use DB;

class TrabajoController extends Controller
{
 public function __construct(){
            $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$trabajo=DB::table('trabajos as trab')
            ->join('tipotrabajos as t','trab.tipotrabajoId','=','t.id')
            ->select('t.Descripcion as tipoTrabDescripcion','trab.DescripcionCorta','trab.Imagen','trab.Cliente','trab.Fecha')
    		->where('DescripcionCorta','LIKE','%'.$query.'%')
    		->orwhere('Cliente','LIKE','%'.$query.'%')
            ->where('Estado','=',1)
    		->orderBy('id','desc')
    		->paginate(7);
    		return view('trabajo.index',["trabajos"=>$trabajo,"searchText"=>$query]);
    	}

    }

    public function create()
    {
    	$tipotrabajos=DB::table('tipotrabajos')->where('Estado','=',1)->get();
        return view("trabajo.create",["tipotrabajos"=>$tipotrabajos]);
    }

    public function store(TrabajoFormRequest $request)
    {
    	$trabajo=new Trabajo;
    	$trabajo->tipotrabajoId=$request->get('tipotrabajoId');
    	$trabajo->DescripcionLarga=$request->get('DescripcionLarga');
    	$trabajo->DescripcionCorta=$request->get('DescripcionCorta');
    	if(Input::hasFile('Imagen'))
    	{
    		$file=Input::file('Imagen');
    		$file->move(public_path().'/img/portfolio/',$file->getClientOriginalName());
    		$trabajo->Imagen=$file->getClientOriginalName();
    	}
    	if(Input::hasFile('Audio'))
    	{
    		$file=Input::file('Audio');
    		$file->move(public_path().'/mp3/',$file->getClientOriginalName());
    		$trabajo->Audio=$file->getClientOriginalName();
    	}
    	$trabajo->Cliente=$request->get('Cliente');
    	$trabajo->Fecha=$request->get('Fecha');
    	$trabajo->Estado=1;

    	$trabajo->save();
    	return Redirect::to('trabajo');


    }

    public function show($id)
    {
    	return view("trabajo.show",["trabajo"=>Trabajo::findOrFail($id)]);
    	
    }

    public function edit($id)
    {
        $trabajo=Trabajo::findOrFail($id);
        $tipotrabajos=DB::table('tipotrabajos')->where('Estado','=',1)->get();


        return view("trabajo.edit",["trabajos"=>$trabajo,"tipotrabajos"=>$tipotrabajos]);
            
    }

    public function update(TrabajoFormRequest $request,$id)
    {
    	$trabajo=Trabajo::findOrFail($id);

    	$trabajo->tipotrabajoId=$request->get('tipotrabajoId');
    	$trabajo->DescripcionLarga=$request->get('DescripcionLarga');
    	$trabajo->DescripcionCorta=$request->get('DescripcionCorta');
    	if(Input::hasFile('Imagen'))
    	{
    		$file=Input::file('Imagen');
    		$file->move(public_path().'/img/portfolio/',$file->getClientOriginalName());
    		$trabajo->Imagen=$file->getClientOriginalName();
    	}
    	if(Input::hasFile('Audio'))
    	{
    		$file=Input::file('Audio');
    		$file->move(public_path().'/mp3/',$file->getClientOriginalName());
    		$trabajo->Audio=$file->getClientOriginalName();
    	}
    	$trabajo->Cliente=$request->get('Cliente');
    	$trabajo->Fecha=$request->get('Fecha');
    	$trabajo->Estado=1;

    	$trabajo->update();
    	return Redirect::to('trabajo');
    }

    public function destroy($id)
    {
    	$trabajo=Trabajo::findOrFail($id);
    	$trabajo->Estado=0;
    	$trabajo->update();
    	return Redirect::to('trabajo');
    }}