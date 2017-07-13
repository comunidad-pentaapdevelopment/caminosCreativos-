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
    	if ($request) 
        {
            $query=trim($request->get('searchText'));
            $trabajos=DB::table('trabajos as trab')
            ->join('tipotrabajos as tipTrab','trab.tipotrabajoId','=','tipTrab.id')
            ->select('trab.id','tipTrab.Descripcion as TipoTrabajo','trab.DescripcionCorta','trab.Cliente','trab.Fecha','trab.Imagen','trab.Audio')
            ->where('trab.Estado','=',1)
           ->where('trab.DescripcionCorta','LIKE','%'.$query.'%')
            // 	->orwhere('trab.Cliente','LIKE','%'.$query.'%')
            ->orderBy('trab.id','desc')
            ->paginate(7);
            return view('trabajo.index',["trabajos"=>$trabajos,"searchText"=>$query]);
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
    		$file->move(public_path().'/audios/',$file->getClientOriginalName());
    		$trabajo->Audio=$file->getClientOriginalName();
    	}else{
            $trabajo->Audio="NoAudio.mp3";
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
        $trabajos=Trabajo::findOrFail($id);
        $tipotrabajos=DB::table('tipotrabajos')->where('Estado','=',1)->get();


        return view("trabajo.edit",["trabajos"=>$trabajos,"tipotrabajos"=>$tipotrabajos]);
            
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
    		$file->move(public_path().'/audios/',$file->getClientOriginalName());
    		$trabajo->Audio=$file->getClientOriginalName();
    	}else{
            $trabajo->Audio="NoAudio.mp3";
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