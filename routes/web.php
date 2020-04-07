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
Route::get('/products/{id}','ProductController@show');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
  Route::get('/products','ProductController@index'); //para listar todos los productos
  Route::get('/products/create','ProductController@create'); //para mostrar el fomulario del nuevo produuto
  Route::post('/products','ProductController@store'); //para guardar los datos del formulario en la base de datos
  Route::get('/products/{id}/edit','productController@edit');//muesta el formulario para al edicion
  Route::post('/products/{id}/edit','ProductController@update');//para ediatr y actualizar en la bd
  Route::get('/products/{id}/delete','ProductController@delete');

  Route::get('/products/{id}/images','ImageController@index');//listado de imagenes
  Route::post('/products/{id}/images','ImageController@store');//agregar nuevas Imagenes
  Route::delete('/products/{id}/images','ImageController@destroy');//eliminar

  Route::get('products/{id}/images/select/{image}','ImageController@select'); //par destacar una imagen
});
