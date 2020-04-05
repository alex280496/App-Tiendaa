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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','TestController@index');

Route::get('/admin/products','ProductController@index'); //para listar todos los productos
Route::get('/admin/products/create','ProductController@create'); //para mostrar el fomulario del nuevo produuto
Route::post('/admin/products','ProductController@store'); //para guardar los datos del formulario en la base de datos

Route::get('/admin/products/{id}/edit','productController@edit');//muesta el formulario para al edicion
Route::post('/admin/products/{id}/edit','ProductController@update');//para ediatr y actualizar en la bd 
