<?php
use App\Http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
/*
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name' => 'admin']);
$role = Role::create(['name' => 'empresa']);
$role = Role::create(['name' => 'cliente']);
*/
Auth::routes();
use App\Http\Controllers\GaleriaController;

Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::post('/galeria/like/{foto}', [GaleriaController::class, 'like'])->name('galeria.like');
Route::post('/increment-likesempresa/{empresa}', [App\Http\Controllers\FrontController::class, 'incrementLikesempresa'])->name('increment.Likesempresa');
Route::post('/increment-likeslugar/{lugar}', [App\Http\Controllers\FrontController::class, 'incrementLikeslugar'])->name('increment.Likeslugar');
Route::post('/increment-likesruta/{ruta}', [App\Http\Controllers\FrontController::class, 'incrementLikesruta'])->name('increment.Likesruta');


/* apartado para errores */
Route::get('/error/{code}', function ($code) {
    $errorMessage = "Lo sentimos, ha ocurrido un error.";
    if ($code === '404') {
        $errorMessage = "La página que buscas no se encuentra.";
    } elseif ($code === '500') {
        $errorMessage = "Ha ocurrido un error en el servidor.";
    }

    return view('errors', [
        'errorCode' => $code,
        'errorMessage' => $errorMessage,
    ]);
})->name('errors');


Route::get('/', function () {return view('entrada'); })->name('entrada');

Route::get('/welcome', [App\Http\Controllers\FrontController::class, 'index'])->name('welcome');

Route::get('/rutas', [App\Http\Controllers\FrontController::class, 'rutas']);
Route::get('/ruta/{ruta}', [App\Http\Controllers\FrontController::class, 'ruta']);
Route::get('/cliente/empresas', [App\Http\Controllers\FrontController::class, 'empresas']);
Route::get('/cliente/{empresa}', [App\Http\Controllers\FrontController::class, 'empresa']);
Route::get('/lugares', [App\Http\Controllers\FrontController::class, 'lugares']);
Route::get('/lugar/{lugar}', [App\Http\Controllers\FrontController::class, 'lugar']);
// routes/web.php



//Route::get('/verificar_email/{id}/{token}', [App\Http\Controllers\Auth\VerificationapiController::class]);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' => ['auth','role:admin']], function(){
    // ruta de administracion    
    Route::resource('/ruta', App\Http\Controllers\Admin\RutaController::class);  
    //Route::resource('/post', App\Http\Controllers\Admin\PostController::class);  
    Route::resource('/empresa', App\Http\Controllers\Admin\EmpresaController::class); 
    Route::resource('/lugar', App\Http\Controllers\Admin\LugarController::class); 
    Route::resource('/foto', App\Http\Controllers\Admin\FotoController::class)->names('fotosadmin'); 
    Route::resource('/user', App\Http\Controllers\Admin\UserController::class);
    Route::post('/foto/{id}/like', [App\Http\Controllers\FrontController::class, 'likeFoto'])->name('foto.like');
    Route::resource('img/empresa/fotos', App\Http\Controllers\Admin\FotoEmpresaAdminController::class)->names('fotosEmpresaAdmin'); 

    
     

});


Route::group(['prefix'=>'empresa','middleware' => ['auth','role:empresa']], function(){
    // ruta de empresa
    Route::resource('/empresas', App\Http\Controllers\Empresa\EmpresaController::class)->only(['index','create','store','update','destroy','edit']); 
    Route::resource('/empresas/foto', App\Http\Controllers\Empresa\EmpresaFotoController::class);
    Route::resource('/empresas/video', App\Http\Controllers\VideoController::class);
    

});