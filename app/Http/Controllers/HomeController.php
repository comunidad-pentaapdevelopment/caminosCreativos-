<?php

namespace Caminos\Http\Controllers;

use Caminos\Http\Requests;
use Illuminate\Http\Request;
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
        $trab=Trabajo::all();
        $tipot=TipoTrabajo::all();
        
        return view('welcome',compact('trab','tipot'));
    }
}
