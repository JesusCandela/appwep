<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Foto;
use Illuminate\Support\Str;

class FotoController extends Controller
{
    public function index(){
        $fotos = Foto::all();
        return view("admin.foto.index",compact("fotos"));
    }
    public function create(){
        $lugar  =   Lugar::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('admin.foto.create',compact("lugar"));
    }

    public function store(Request $request){

        $foto = new Foto($request->all());
        
        if($request->hasFile('urlfoto')){
            $urlfoto = $request->file('urlfoto');
            $ruta   = public_path('/img/foto/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);            
            $foto->urlfoto =$request->file('urlfoto')->getClientOriginalName();
        }

        if($request->tipo){
            $foto->tipo = 1;
        }else{
            $foto->tipo = 0;
        }
        $foto->lugar_id  =   $request->lugar_id;
        $foto->save();
        return redirect('/admin/foto');

    }

    public function edit($id){
        $foto =      Foto::findOrFail($id);
        $lugar   =      Lugar::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('admin.foto.edit',compact('foto','lugar'));
    }

    public function update(Request $request,$id){

        $foto = Foto::findOrFail($id);
        $foto->fill($request->all());
        $foto_anterior     = $foto->urlfoto;
        if($request->hasFile('urlfoto')){

            $fotoAnterior = public_path('/img/foto/'.$foto_anterior);
            if(file_exists($fotoAnterior)){ unlink(realpath($fotoAnterior)); }

            $urlfoto = $request->file('urlfoto');
            $ruta   = public_path('/img/foto/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);            
            $foto->urlfoto  =   $request->file('urlfoto')->getClientOriginalName();
        }
        if($request->tipo){
            $foto->tipo = 1;
        }else{
            $foto->tipo = 0;
        }
        $foto->lugar_id  =   $request->lugar_id;
        $foto->save();
        return redirect('/admin/foto');
    }

    public function destroy($id){
        $foto = Foto::findOrFail($id);
        //foto
        $borrar = public_path('/img/foto/'.$foto->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        
        $foto->delete();
        return redirect('/admin/foto');
    }
}
