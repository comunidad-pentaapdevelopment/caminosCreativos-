<?php

namespace Caminos\Http\Controllers;

use Illuminate\Http\Request;

use Caminos\Http\Requests;
use Caminos\TipoTrabajo;
use Caminos\Trabajo;

class HomeController extends Controller
{
    public function index(){
    	$tipot=TipoTrabajo::all();
    	$trab=Trabajo::all();
    	return view('welcome',compact('tipot','trab'));
    }
}
