<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/listajson', [App\Http\Controllers\Api\JsonController::class, 'index']);
Route::post('/registro',[App\Http\Controllers\Api\AuthController::class, 'registro']);
Route::post('/login',[App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/logout',[App\Http\Controllers\Api\AuthController::class, 'logout']);
Route::post('/increment-likesempresa/{empresa}', [App\Http\Controllers\FrontController::class, 'incrementLikesempresa'])->name('increment.Likesempresa');
Route::post('/increment-likeslugar/{lugar}', [App\Http\Controllers\FrontController::class, 'incrementLikeslugar'])->name('increment.Likeslugar');
Route::group(['middleware'=>["jwt.auth"]],function () {
    Route::post('/logout',[App\Http\Controllers\Api\AuthController::class, 'logout']);
    ///empresa admin
    Route::resource('/empresasapi',App\Http\Controllers\Api\EmpresaController::class);
});