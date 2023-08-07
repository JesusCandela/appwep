<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationapiController extends Controller
{
    public function verificarEmail(Request $request)
    {
        $email = $request->input('email');
    
        // Consulta en la base de datos si existe un registro con el email ingresado
        $usuario = Usuario::where('email', $email)->first();
    
        if ($usuario) {
            // Si el email ya está registrado, devuelve una respuesta con un mensaje de error
            return response()->json(['success' => false, 'mensaje' => 'El correo electrónico ya está registrado']);
        } else {
            // Si el email no está registrado, devuelve una respuesta con éxito
            return response()->json(['success' => true]);
        }
    }
    

}
