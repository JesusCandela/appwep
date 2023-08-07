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

    public function like($id)
    {
        // Obtener la foto con el ID proporcionado
        $foto = Foto::findOrFail($id);

        // Incrementar el contador de likes en 1
        $foto->likes += 1;

        // Guardar los cambios en la base de datos
        $foto->save();

        return redirect()->back()->with('success', '¡Diste like a la foto!');
    }
}


