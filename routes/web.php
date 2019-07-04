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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Rutas de vehiculos*/
Route::get('/vehiculos', 'VehiculoController@index')->name('vehiculos.index');
Route::get('/vehiculos/registrar', 'VehiculoController@create')->name('vehiculos.create');
Route::post('/vehiculos/registrar-vehiculo', 'VehiculoController@store')->name('vehiculos.store');
Route::delete('/vehiculos/eliminar-vehiculo/{vehiculo}', 'VehiculoController@destroy')->name('vehiculos.destroy');
Route::get('/vehiculos/mostrar/{id}', 'VehiculoController@show')->name('vehiculos.show');
Route::get('/vehiculos/editar/{id}', 'VehiculoController@edit')->name('vehiculos.edit');
Route::put('/vehiculos/editar/{id}', 'VehiculoController@update')->name('vehiculos.update');
/*Fin rutas de vehiculos*/

/*Rutas de viajes*/
Route::get('/viajes/ofrecer', 'ViajeController@index')->name('viajes.register');
Route::post('/viajes/ofrecer', 'ViajeController@store')->name('viajes.store');
/*Fin rutas de viajes*/

/*Ruta modificar Perfil*/
Route::get('/users/modificar', 'ModificarPerfilController@edit')->name('users.edit');
Route::put('/users/modificar/{id}', 'ModificarPerfilController@update')->name('users.update');

