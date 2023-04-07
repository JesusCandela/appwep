<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function registro(Request $request){
       $password_plano =$request->password;

       $password_encriptado = bcrypt($password_plano);

       $request->request->add(['password'=>$password_encriptado]);
       // creacion del usuario:empresa
       $user = User::create($request->all());
       $user->assignRole("empresa");

       $request->request->add(['password'=>$password_plano]);

        return $this->login($request);
    }
    public function login(Request $request){
        $input = $request->only("email","password");
        $token = null;
        if(!$token = JWTAuth::attempt($input)){
            return response()->json([
                'success' => false,
                'mensaje' => 'credenciales incorrectas'
            ], 401);
        }
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'user' => $user,
            'token' =>$token
        ], 200);

    }
    public function logout(Request $request){       
        JWTAuth::invalidate(JWTAuth::parseToken($request->token));
        return response()->json([
            'success' => true
        ], 200);
    }


}

