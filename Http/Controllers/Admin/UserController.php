<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("admin.user.index",compact("users"));
    }
    

    

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $user = User::findOrFail($id);
        //$user->fill($request->all());
        if($request->activo){
            $user->activo = 1;
        }else{
            $user->activo = 0;
        }
        $user->save();
        return redirect('/admin/user');
    }

}
