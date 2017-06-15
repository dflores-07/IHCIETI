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
    return redirect()->route('createLeader');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Registro_Pitch', 'PitchController@Registro_Pitch');
//Cambios hechos por Anwar
Route::get('/create-project/{id}', ['as'=>'createProject','uses'=>'ProjectController@create']);
Route::post('/create-project', ['as'=>'saveProject','uses'=>'ProjectController@store']);
//lideres y miembros
Route::get('/create-leader', ['as'=>'createLeader','uses'=>'mipymeController@createLeader']);
Route::get('/create-members/{acount}/{token}', ['as'=>'createMembers','uses'=>'mipymeController@createMembers']);
Route::post('/create-leader', ['as'=>'saveLeader','uses'=>'mipymeController@store']);

Route::get('/finish/{id}', ['as'=>'fin','uses'=>'mipymeController@fin']);

//Reportes
Route::get('/reportes/pdf-lideres-proyectos', ['as'=>'pdfLeaderProject','uses'=>'ProjectController@pdfLeaderProject']);
Route::get('/reportes/excel-lideres-proyectos', ['as'=>'pdfLeaderProject','uses'=>'ProjectController@excelLeaderProject']);

//configuracion
Route::post('/municipios', ['as'=>'muni','uses'=>'mipymeController@muni']);
// Fin de cambios

Route::get('/cerrar-sesion', ['as'=>'close_envento','uses'=>'Auth\LoginController@closed']);
//Route::get('/evento', ['as'=>'envento','uses'=>'Auth\RegisterController@email'])->name('Inscricion');
