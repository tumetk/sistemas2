<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/






Route::group(['prefix' =>'productos','namespace'=>'Front'],function()
{
	Route::get('/',['as'=>'productos','uses'=>'ProductosController@index']);
	Route::get('/{id_producto}/{id_proveedor}',['as'=>'productos.detalle','uses'=>'ProductosController@select']);
	Route::post('/agregar/{id_producto}/{id_proveedor}/{id_cliente}',['as'=>'productos.agregar','uses'=>'ProductosController@agregarCarrito']);

});

Route::group(['prefix'=>'carrito', 'namespace' =>'Front'],function(){
	Route::post('/eliminar/{id_producto}/{id_pedido}',['as'=>'carrito.eliminar','uses'=>'CarritoController@eliminarProducto']);
	Route::get('/{id}',['as'=>'carrito','uses'=>'CarritoController@index']);
	Route::post('/confirmar/{id_pedido}',['as'=>'carrito.confirmar','uses'=>'CarritoController@confirmar']);
});

Route::group(['prefix'=> 'reportes','namespace' =>'Back'],function(){
	Route::get('/',['as'=>'reportes','uses'=>'ReporteController@index']);
	Route::get('/{id}',['as'=>'reporte.select','uses'=>'ReporteController@select']);
});

Route::group(['prefix'=>'cotizar','namespace'=>'Front'],function(){
	Route::get('/',['as'=>'cotizar','uses'=>'ReservarController@index']);
	Route::get('/confirmar',['as'=>'cotizar.confirmar','uses'=>'ReservarController@confirmarCotizacion']);
	Route::get('/finalizar',['as'=>'cotizar.finalizar','uses'=>'ReservarController@finCotizacion']);
	Route::post('/{id_servicio}',['as'=>'cotizar.agregar','uses'=>'ReservarController@agregarServicio']);

});
Route::get('/', function () {
	return redirect()->route('auth.login');
});
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
	Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
	Route::get('logout', ['as' => 'auth.logout' , 'uses' => 'AuthController@getLogout']);
});
