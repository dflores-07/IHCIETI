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
Route::get('/Registro_Pitch', 'PitchController@Registro_Pitch');
Route::get('/create_mipymes', 'mipymeController@create_mipymes');
Route::get('/cerrar-sesion', ['as'=>'close_envento','uses'=>'Auth\LoginController@closed']);
//Route::get('/evento', ['as'=>'envento','uses'=>'Auth\RegisterController@email'])->name('Inscricion');
