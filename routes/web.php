<?php

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
    return view('auth/login');
});

Route::resource('lugar/barrio','BarrioController');
Route::resource('lugar/cancha','CanchaController');
Route::resource('equipos/reserva','ReservaController');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::resource('seguridad/usuario','UsuarioController');
Route::get('/{slug?}', 'HomeController@index');
