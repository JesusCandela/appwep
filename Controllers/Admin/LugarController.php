<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Foto;
use App\Models\Ruta;
use Illuminate\Support\Str;
use Image;


class LugarController extends Controller
{
    public function index(){
        $lugars = Lugar::all();
        return view("admin.lugar.index",compact("lugars"));
    }
    public function create(){
        $rutas  =   Ruta::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('admin.lugar.create',compact("rutas"));
    }

    public function store(Request $request){

        $lugar = new Lugar($request->all());
        
        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'lugar_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/lugar/'.$nuevonombre));

            $lugar->urlfoto = $nuevonombre;
        }
        

        if($request->estado){
            $lugar->estado = 1;
        }else{
            $lugar->estado = 0;
        }


        $lugar->ruta_id  =   $request->ruta_id;
       
        $lugar->slug     =   Str::slug($request->nombre);
        $lugar->save();
        return redirect('/admin/lugar');

    }

    public function edit($id)
{
    $lugar = Lugar::with('Foto')->findOrFail($id);
    $rutas = Ruta::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

    return view('admin.lugar.edit', compact('lugar', 'rutas'));
}

    public function update(Request $request,$id){

        $lugar = Lugar::findOrFail($id);
        $lugar->fill($request->all());

        $foto_anterior     = $lugar->urlfoto;
      


        if($request->hasFile('urlfoto')){

            $lugarAnterior = public_path('/img/lugar/'.$foto_anterior);
            if(file_exists($lugarAnterior)){ unlink(realpath($lugarAnterior)); }

            $imagen = $request->file('urlfoto');
            
            $nuevonombre = 'lugar_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/lugar/'.$nuevonombre));

            $lugar->urlfoto = $nuevonombre;
        }
      
        if($request->estado){
            $lugar->estado = 1;
        }else{
            $lugar->estado = 0;
        }
        
        $lugar->ruta_id  =   $request->ruta_id;
        $lugar->slug     =   Str::slug($request->nombre);
        $lugar->save();
        return redirect('/admin/lugar');
    }

    public function destroy($id){
        $lugar = Lugar::findOrFail($id);
        //foto
        $borrar = public_path('/img/lugar/'.$lugar->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
       
        
        $lugar->delete();
        return redirect('/admin/lugar');
    }
}
