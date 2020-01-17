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

Route::get('/', 'NotaController@index')->name('Inicio');

Route::post('/agregar', 'NotaController@store')->name('agregar');

Route::get('/editar/{id}', 'NotaController@edit')->name('editar');

Route::put('/update/{id}', 'NotaController@update')->name('update');

Route::delete('eliminar/{id}','NotaController@destroy')->name('eliminar');