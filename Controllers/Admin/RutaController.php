<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruta;
use Illuminate\Support\Str;
use Image;

class RutaController extends Controller
{
    public function index(){
        $rutas = Ruta::all();
        return view("admin.ruta.index",compact("rutas"));
    }
    public function create(){
        return view('admin.ruta.create');
    }

    public function store(Request $request){

        $ruta = new Ruta($request->all());
        
        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'ruta_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/ruta/'.$nuevonombre));

            $ruta->urlfoto = $nuevonombre;
        }
        $ruta->slug     =   Str::slug($request->nombre);
        $ruta->save();
        return redirect('/admin/ruta');

    }

    public function edit($id){
        $ruta = Ruta::findOrFail($id);
        return view('admin.ruta.edit',compact('ruta'));
    }

    public function update(Request $request,$id){

        $ruta = Ruta::findOrFail($id);
        $ruta->fill($request->all());

        $foto_anterior     = $ruta->urlfoto;


        if($request->hasFile('urlfoto')){

            $rutaAnterior = public_path('/img/ruta/'.$foto_anterior);
            if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

            $imagen = $request->file('urlfoto');
            
            $nuevonombre = 'ruta_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/ruta/'.$nuevonombre));

            $ruta->urlfoto = $nuevonombre;
        }
        $ruta->slug     =   Str::slug($request->nombre);
        $ruta->save();
        return redirect('/admin/ruta');
    }

    public function destroy($id){
        $ruta = Ruta::findOrFail($id);
        $borrar = public_path('/img/ruta/'.$ruta->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $ruta->delete();
        return redirect('/admin/ruta');
    }



}
