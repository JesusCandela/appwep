<?php

namespace App\Http\Controllers\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Foto;
use Illuminate\Support\Str;
use Auth;
class EmpresaFotoController extends Controller
{
    public function show(){

    }
    public function create(){
        $user = Auth::user();
        $empresa = $user->Empresa()->pluck('razonsocial', 'id');
        return view('empresa.foto.create', compact('empresa'));
    }


    public function store(Request $request){
        $request->validate(['nombre' => 'required|min:3|max:255|unique:fotos,nombre','orden'=> 'required|integer|min:1',]);
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
        $foto->empresa_id  =   $request->empresa_id;
        $foto->save();
        return redirect('/empresa/empresas/foto');

    }

    public function edit($id){
        $foto =      Foto::findOrFail($id);
        $lugar   =      Lugar::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('empresa.foto.edit',compact('foto','empresa'));
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
        
        $foto->empresa_id  =   $request->empresa_id;
        $foto->save();
        return redirect('/empresa/empresas/foto');
    }

    public function destroy($id){
        $foto = Foto::findOrFail($id);
        //foto
        $borrar = public_path('/img/foto/'.$foto->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        
        $foto->delete();
        return redirect('/empresa/empresas/foto');
    }
    public function indexGaleria()
    {
        $fotos = Foto::all();
        return view('foto.index', compact('fotos'));
    }
    
    public function like($id)
    {
        $foto = Foto::findOrFail($id);
        $foto->likes++;
        $foto->save();

        return back()->with('success', '¡Diste like a la foto!');
    }
    public function index(){
        $user = Auth::user();
        $empresas = $user->Empresa()->pluck('id');
        $fotos = Foto::whereIn('empresa_id',$empresas)->get();
        return view("empresa.foto.index",compact("fotos"));
    }
}
