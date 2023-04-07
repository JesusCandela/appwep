<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Lugar;
use App\Models\Empresa;
class FrontController extends Controller
{
    public function index(){
        $rutas = Ruta::OrderBy("visitas","DESC")->take(3)->get();
        $lugares = Lugar::OrderBy("visitas","DESC")->take(3)->get();
        $empresas = Empresa::OrderBy("visitas","DESC")->take(3)->get();
        return view('welcome', compact("rutas","lugares","empresas"));
    }
    public function rutas(){
        $rutas = Ruta::OrderBy("nombre","DESC")->get();
        return view('front.rutas', compact("rutas"));
    }
    public function ruta($ruta){
        $ruta = Ruta::whereSlug($ruta)->first();
        $ruta->increment("visitas");
        return view('front.ruta', compact("ruta"));
    }

    public function lugar($lugar){
        $lugar = Lugar::whereSlug($lugar)->first();
        $lugar->increment("visitas");
        return view('front.lugar', compact("lugar"));
    }

    public function empresa($empresa){
        $empresa = Empresa::whereSlug($empresa)->first();
        $empresa->increment("visitas");
        return view('front.empresa', compact("empresa"));
    }


}
