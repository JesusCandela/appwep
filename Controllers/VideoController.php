<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;
use App\Models\Empresa;
use Auth;
class VideoController extends Controller
{   
    
    public function store(Request $request)
    {
            $request->validate([
                  'titulo' => 'required',
                  'url_video' => 'required|mimes:mp4|max:3000', // Max 3MB
                  'empresa_id' => 'required',
               ]);
                
            $videoPath = $request->file('url_video')->store('videos', 'public');

            $video = new Video([
                'titulo' => $request->titulo,
                'url_video' => $videoPath,
                'empresa_id' => $request->empresa_id,
            ]);

            $video->save();

        return redirect()->route('video.index')
                        ->with('success', 'Video subido exitosamente.');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('empresa')) {
            $empresas = $user->Empresa()->pluck('id');;
            $videos = Video::whereIn('empresa_id',$empresas)->get();
        } else {
            $videos = Video::all();
        }

        return view('empresa.video.index', compact('videos'));
    }

    public function create()
        {
        $user = Auth::user();

        if ($user->hasRole('empresa')) {
            $empresas = $user->Empresa()->pluck('razonsocial', 'id');
        } else {
            $empresas = Empresa::pluck('razonsocial', 'id');
        }

        return view('empresa.video.create', compact('empresas'));
        }
    public function edit($id)
        {
        $video = Video::findOrFail($id);

        // Verificar si el usuario actual tiene permiso para editar este video
        if ($video->empresa->user_id === Auth::user()->id) {
            return view('empresa.video.edit', compact('video'));
        } else {
            // Redirigir si el usuario no tiene permisos
            return redirect()->route('video.index')->with('error', 'No tienes permiso para editar este video.');
        }
        }

    public function update(Request $request, $id)
        {
            
            $video = Video::findOrFail($id);
            $video_anterior     = $video->url_video;
            $video->fill($request->all());
            
            if($request->hasFile('url_video')){
                /*$videoAnterior = public_path('/videos'.$video_anterior);
                if(file_exists($videoAnterior)){ unlink(realpath($vidoeAnterior)); }
    
                $url_video = $request->file('url_video');
                $ruta   = public_path('/videos'.$request->file('url_video')->getClientOriginalName());
                copy($url_video->getRealPath(),$ruta);            
                $video->url_video  =   $request->file('url_video')->getClientOriginalName();*/
                Storage::disk('public')->delete($video_anterior);
                $path = $request->file('url_video')->store('videos', 'public');
                $video->url_video=$path;
            }
            
            //$video->empresa_id  =   $request->empresa_id;
            $video->save();
          

            return redirect()->route('video.index')->with('success', 'Video actualizado correctamente.');
       
        }
        public function destroy(Request $request, Video $video){
            $video_anterior     = $video->url_video;
            $video->delete();
            Storage::disk('public')->delete($video_anterior);
          
            return redirect()->route('video.index');
        }

}