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

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/page/{view}', 'HomeController@returnView')->name('returnView');

	Route::resources([
	    'users' => 'UsersController',
	    'peliculas' => 'PeliculasController',
	    'generos' => 'GenerosController',
	    'categorias' => 'CategoriasController',
	    'ventas' => 'VentasController',
	    'rentas' => 'RentasController',
	    'credenciales' => 'CredencialesController'
	]);

	// Users
	Route::get('/perfil', 'UsersController@perfil')->name('perfil');
	Route::post('/actualizar/imagen/{user}', 'UsersController@updateImage')->name('imagen');

	// Películas
	Route::get('/inventario', 'PeliculasController@inventario')->name('inventario');
	Route::get('/obtenerCopias/{pelicula}', 'PeliculasController@obtenerCopias');
	Route::delete('/borrarInventario/{inventario}', 'PeliculasController@borrarInventario')->name('borrarInventario');

});