<?php

use Illuminate\Support\Facades\Route;
/*
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name' => 'admin']);
$role = Role::create(['name' => 'empresa']);
$role = Role::create(['name' => 'cliente']);
*/
Auth::routes();
Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/rutas', [App\Http\Controllers\FrontController::class, 'rutas']);
Route::get('/ruta/{ruta}', [App\Http\Controllers\FrontController::class, 'ruta']);
Route::get('/{empresa}', [App\Http\Controllers\FrontController::class, 'empresa']);
Route::get('/lugar/{lugar}', [App\Http\Controllers\FrontController::class, 'lugar']);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' => ['auth','role:admin']], function(){
    // ruta de administracion    
    Route::resource('/ruta', App\Http\Controllers\Admin\RutaController::class);  
    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);  
    Route::resource('/empresa', App\Http\Controllers\Admin\EmpresaController::class); 
    Route::resource('/lugar', App\Http\Controllers\Admin\LugarController::class); 
    Route::resource('/foto', App\Http\Controllers\Admin\FotoController::class); 
    Route::resource('/user', App\Http\Controllers\Admin\UserController::class);   

});

Route::group(['prefix'=>'empresa','middleware' => ['auth','role:empresa']], function(){
    // ruta de empresa
    Route::resource('/empresas', App\Http\Controllers\Empresa\EmpresaController::class); 
});

