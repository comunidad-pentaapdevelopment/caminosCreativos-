<?php

namespace Caminos\Http\Controllers;

use Caminos\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

use Caminos\Trabajo;
use Caminos\TipoTrabajo;
use Caminos\Publicidad;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajos=DB::table('trabajos as trab')
            ->join('tipotrabajos as tipTrab','trab.tipotrabajoId','=','tipTrab.id')
            ->select('trab.id','tipTrab.Descripcion as TipoTrabajo','trab.DescripcionCorta','trab.Cliente','trab.Fecha','trab.Imagen','trab.Audio')
            ->where('trab.Estado','=',1)
            ->orderBy('TipoTrabajo')
            ->paginate(7);
        $tipoDeTrabajos=TipoTrabajo::all();
        $publicidades=Publicidad::where('Estado',1)->get();

        $ultimosTrabajos=Trabajo::where('Estado',1)->orderBy('id','desc')->take(6)->get();


        
        return view('welcome',compact('trabajos','tipoDeTrabajos','publicidades','ultimosTrabajos'));
    }
}
