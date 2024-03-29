<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Empresa;
use App\Models\Lugar;
use App\Models\Foto;
use App\Models\Video;

class JsonController extends Controller
{
    public function index(){
        $listarutas     = Ruta::all();
        $listaempresas  = Empresa::all();
        $listalugares   = Lugar::all();
        $listafotos     = Foto::all();
        $listavideo     = Video::all();
        $data = [
            'success' => true,
            'listarutas' => $listarutas,
            'listaempresas' => $listaempresas,
            'listalugares' => $listalugares,
            'listafotos' => $listafotos,
            'listavideo'=> $listavideo,
        ];
        return response()->json($data, 200);

    }
}
