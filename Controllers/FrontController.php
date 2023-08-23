<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Lugar;
use App\Models\Empresa;
use App\Models\Foto;
use App\Models\Video;

class FrontController extends Controller
{
    public function index(){
        $rutas = Ruta::OrderBy("visitas","DESC")->take(3)->get();
        $lugares = Lugar::OrderBy("visitas","DESC")->take(3)->get();
        $empresas = Empresa::OrderBy("visitas","DESC")->take(3)->get();
        return view('welcome', compact("rutas","lugares","empresas"));
    }
    public function rutas(){
        $rutas = Ruta::OrderBy("nombre","DESC")->paginate(6);
        return view('front.rutas', compact("rutas"));
    }
    public function empresas(){
        $empresas = Empresa::OrderBy("visitas","DESC")->paginate(6);
        return view('front.empresas', compact("empresas"));
    }
    public function ruta($ruta){
        $ruta = Ruta::whereSlug($ruta)->first();
        $ruta->increment("visitas");
        return view('front.ruta', compact("ruta"));
    }
    public function lugares(){
        $lugares = lugar::OrderBy("nombre","DESC")->paginate(6);
        return view('front.lugares', compact("lugares"));
    }
    public function lugar($lugar){
        $lugar = Lugar::whereSlug($lugar)->first();
        $lugar->increment("visitas");
        return view('front.lugar', compact("lugar"));
    }

    public function empresa($empresa){
        $empresa = Empresa::whereSlug($empresa)->firstOrFail();
        //dd($empresa->Foto);
        $fotos=Foto::where('empresa_id','=',$empresa->id)->get();
        $videos=Video::where('empresa_id','=',$empresa->id)->get();
        
        if($empresa){
            $empresa->increment("visitas");
            
        return view('front.empresa', compact("fotos","empresa","videos"));
        }else{
            return redirect()->route('errors', ['code' => 404]);
        }
        
    }
    public function incrementLikesempresa(Request $request, Empresa $empresa) {
        $empresa->update(['likes'=>$empresa->likes+1]);
        return $empresa;
        //return redirect()->back()->with('success', '¡Diste like a la foto!');
    }
    public function incrementLikeslugar(Request $request, Lugar $lugar) {
     
        $lugar->update(['likes'=>$lugar->likes+1]);
        
       return $lugar;
    }
    public function incrementLikesruta(Request $request, Ruta $ruta) {
        $ruta->update(['likes'=>$ruta->likes+1]);
        return $ruta;
        //return redirect()->back()->with('success', '¡Diste like a la foto!');
    }


}
