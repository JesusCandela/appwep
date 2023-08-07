<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Foto;
use App\Models\Ruta;
use Illuminate\Support\Str;
use Image;
use Auth;


class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::all();
        return view("admin.empresa.index",compact("empresas"));
    }
    public function create(){
        $rutas  =   Ruta::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('admin.empresa.create',compact("rutas"));
    }

    public function store(Request $request){

        $empresa = new empresa($request->all());
        
        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'empresa_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/empresa/'.$nuevonombre));

            $empresa->urlfoto = $nuevonombre;
        }
        if($request->hasFile('urllogo')){

            $imagen = $request->file('urllogo');
            $nuevonombre = 'logo_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(200,200,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/empresa/'.$nuevonombre));

            $empresa->urllogo = $nuevonombre;
        }

        if($request->estado){
            $empresa->estado = 1;
        }else{
            $empresa->estado = 0;
        }

        if($request->publicacion){
            $empresa->publicacion = 1;
        }else{
            $empresa->publicacion = 0;
        }

        $empresa->ruta_id  =   $request->ruta_id;
        $empresa->user_id  =   Auth::user()->id;
        $empresa->slug     =   Str::slug($request->razonsocial);
        $empresa->save();
        return redirect('/admin/empresa');

    }

    public function edit($id){
        $empresa =      Empresa::findOrFail($id);
        $rutas   =      Ruta::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('admin.empresa.edit',compact('empresa','rutas'));
    }

    public function update(Request $request,$id){

        $empresa = Empresa::findOrFail($id);
        $empresa->fill($request->all());

        $foto_anterior     = $empresa->urlfoto;
        $logo_anterior     = $empresa->urllogo;


        if($request->hasFile('urlfoto')){

            $empresaAnterior = public_path('/img/empresa/'.$foto_anterior);
            if(file_exists($empresaAnterior)){ unlink(realpath($empresaAnterior)); }

            $imagen = $request->file('urlfoto');
            
            $nuevonombre = 'empresa_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/empresa/'.$nuevonombre));

            $empresa->urlfoto = $nuevonombre;
        }
        if($request->hasFile('urllogo')){

            $empresaAnterior = public_path('/img/empresa/'.$foto_anterior);
            if(file_exists($empresaAnterior)){ unlink(realpath($empresaAnterior)); }

            $imagen = $request->file('urllogo');
            
            $nuevonombre = 'logo_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(200,200,function($constraint){ $constraint->upsize();  })
            ->save( public_path('/img/empresa/'.$nuevonombre));

            $empresa->urllogo = $nuevonombre;
        }

        if($request->estado){
            $empresa->estado = 1;
        }else{
            $empresa->estado = 0;
        }
        
        $empresa->ruta_id  =   $request->ruta_id;
        $empresa->slug     =   Str::slug($request->razonsocial);
        $empresa->save();
        return redirect('/admin/empresa');
    }

    public function destroy($id){
        $empresa = Empresa::findOrFail($id);
        //foto
        $borrar = public_path('/img/empresa/'.$empresa->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        //logo
        $borrar = public_path('/img/empresa/'.$empresa->urllogo);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        
        $empresa->delete();
        return redirect('/admin/empresa');
    }
}
