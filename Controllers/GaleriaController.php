<?php
namespace App\Http\Controllers;
use App\Models\Foto;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{

    public function index()
    {
        // Obtener todas las fotos desde la base de datos
     

        $fotos = Foto::all();

        return view('galeria.index', compact('fotos'));
    }

    public function like(Request $request, Foto $foto)
    {
        $foto->update(['likes'=>$foto->likes+1]);
        return $foto;

    }
}


