<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Foto;
use Illuminate\Support\Str;
use Auth;


class FotoEmpresaAdminController extends Controller
{
   
    public function create(){
        $empresa  =   Empresa::orderBy('razonsocial','ASC')->pluck('razonsocial','id');

        return view('admin.empresa.fotos.create',compact("empresa"));
    }


    public function store(Request $request){

        $foto = new Foto($request->all());
        
        if($request->hasFile('urlfoto')){
            $urlfoto = $request->file('urlfoto');
            $ruta   = public_path('/img/foto/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);            
            $foto->urlfoto =$request->file('urlfoto')->getClientOriginalName();
        }

        $foto->empresa_id  =   $request->empresa_id;
        $foto->save();
        return redirect('/admin/img/empresa/fotos');

    }

    public function edit($id){
        $foto =      Foto::findOrFail($id);
        $empresa   =      Empresa::orderBy('razonsocial','ASC')->pluck('razonsocial','id');

        return view('admin.empresa.fotos.edit',compact('foto','empresa'));
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
        return redirect('/admin/img/empresa/fotos');
    }

    public function destroy($id){
        $foto = Foto::findOrFail($id);
        //foto
        $borrar = public_path('/img/foto/'.$foto->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        
        $foto->delete();
        return redirect('/admin/img/empresa/fotos');
    }
    public function indexGaleria()
    {
        $fotos = Foto::all();
        return view('foto.empresa.index', compact('fotos'));
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
                return view("admin.empresa.fotos.index",compact("fotos"));
    }
}
