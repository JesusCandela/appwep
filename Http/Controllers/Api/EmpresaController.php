<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Controllers\File;
use Illuminate\Support\Str;

class EmpresaController extends Controller
{
    public function store(Request $request){
         // tratamiento de imagen 64 a png para la foto de la empresa

        $image  =   $request->urlfoto;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $urlfoto = "foto_".Str::slug($request->razonsocial).".png";
        \File::put(public_path('/img/empresa/' . $urlfoto), base64_decode($image));

        // tratamiento de imagen 64 a png para el logo
        $image  =   $request->urllogo;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $urllogo = "logo_".Str::slug($request->razonsocial).".png";
        \File::put(public_path('/img/empresa/' . $urllogo), base64_decode($image));


        // datos que recivimos desde la app movil para ingresar 
        $empresa = new Empresa($request->all());
        $empresa->urlfoto =$urlfoto;
        $empresa->urllogo = $urllogo;
        $empresa->slug = Str::slug($request->razonsocial);
        $empresa->slug = Str::slug($request->razonsocial);
        $empresa->save();

        if(!empty($empresa)){
            return response()->json(['success'=>true,'empresa'=>$empresa], 200);
        }else{
            return response()->json(['success'=>false], 200);

        }

    }


    public function update(Request $request,$id){
        // tratamiento de imagen 64 a png
        if(!empty($request->urlfoto)){
            $image  =   $request->urlfoto;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $urlfoto = "foto_".Str::slug($request->razonsocial).".png";
            \File::put(public_path('/img/empresa/' . $urlfoto), base64_decode($image));
            $empresa->urlfoto = $urlfoto;
        }

        if(!empty($request->urllogo)){
            $image  =   $request->urllogo;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $urllogo = "logo_".Str::slug($request->razonsocial).".png";
            \File::put(public_path('/img/empresa/' . $urllogo), base64_decode($image));
            $empresa->urllogo = $urllogo;
        }
        // data
        $empresa = Empresa::findOrFail($id);
        $empresa->fill($request->all());       
        $empresa->slug     =   Str::slug($request->razonsocial);
        $empresa->save();


        if(!empty($empresa)){
            return response()->json(['success'=>true,'empresa'=>$empresa], 200);
        }else{
            return response()->json(['success'=>false], 200);

        }

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
        
        return response()->json(['success'=>true], 200);

    }




}
