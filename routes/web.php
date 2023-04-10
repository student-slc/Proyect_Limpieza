<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CamaristasController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\ChoteleraController;
use App\Http\Controllers\HotelesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


/* Auth::routes(['register' => false]); */
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//===============================================================HOTELES
///--------------------------------------SHOW--------------------------------------------------------------------
Route::get('/hoteles/{nombre}','App\Http\Controllers\HotelesController@show')->name('hoteles.show');
///--------------------------------------CREATE--------------------------------------------------------------------
Route::get('/hoteles/create/{hotele}','App\Http\Controllers\HotelesController@create')->name('hoteles.create');
///--------------------------------------STORE--------------------------------------------------------------------
Route::post('/hoteles/create/{nombre}','App\Http\Controllers\HotelesController@store')->name('hoteles.store');
///--------------------------------------DESTROY--------------------------------------------------------------------
Route::delete('/hoteles/delete/{hotele}','App\Http\Controllers\HotelesController@destroy')->name('hoteles.destroy');
///--------------------------------------EDIT--------------------------------------------------------------------
Route::get('/hoteles/edit/{hotele}','App\Http\Controllers\HotelesController@edit')->name('hoteles.edit');
///--------------------------------------UPDATE--------------------------------------------------------------------
Route::patch('/hoteles/edit/{hotele}','App\Http\Controllers\HotelesController@update')->name('hoteles.update');







Route::group(['middleware' =>['auth']],function(){
Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('blogs', BlogController::class);
Route::resource('camaristas', CamaristasController::class);
Route::resource('cuestionario', CuestionarioController::class);
Route::resource('cadenahotelera', ChoteleraController::class);
//Route::resource('hoteles', HotelesController::class);
});
