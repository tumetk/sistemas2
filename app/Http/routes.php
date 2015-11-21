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




Route::post('/buy/{cart}',['as'=>'buy','namespace'=>'Front', 'uses'=> 'SalesController@buyProducts']);

Route::group(['prefix' => 'cart','namespace' =>'Front'],function(){
	Route::get('{id}',['as'=>'shoppingCart','uses'=>'ShoppingCartController@viewCart']);
	Route::post('{id}/add/{product}',['as'=>'shoppingCart.addProduct','uses'=>'ShoppingCartController@addProduct']);
	Route::post('{id}/delete/{product}',['as'=>'shoppingCart.deleteProduct','uses'=>'ShoppingCartController@deleteProduct']);
	Route::post('deleteAll',['as'=>'shoppingCart.deleteAll','uses'=> 'ShoppingCartController@deleteAll']);
});

Route::get('/',['as'=>'cotizar' ,'namespace'=>'Front', 'uses'=>'Front\CotizarController@cotizarServicesIndex']);

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
/*Route::get('/', function () {
	return redirect()->route('auth.login');
});*/
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
	Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
	Route::get('logout', ['as' => 'auth.logout' , 'uses' => 'AuthController@getLogout']);
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
	Route::get('/', function () {
		return redirect()->route('admin.index');
	});
	Route::get('index',['as' => 'admin.index', 'uses' => 'AdminController@index']);
	Route::group(['middleware' => 'check_permissions'], function() {
		Route::group(['prefix' => 'users', 'middleware' =>'self_edit'], function() {
			Route::get('list', ['as' => 'admin.users.list', 'uses' => 'UserController@UsersList']);
			Route::get('create', ['as' => 'admin.users.create', 'uses' => 'UserController@getUsersCreate']);
			Route::post('create', ['as' => 'admin.users.create', 'uses' => 'UserController@postUsersCreate']);
			Route::get('edit/{id}' , ['as' => 'admin.users.edit', 'uses' => 'UserController@getUsersEdit']);
			Route::post('edit/{id}' , ['as' => 'admin.users.edit' , 'uses' => 'UserController@postUsersEdit']);
			Route::get('delete/{id}', ['as' => 'admin.users.delete' , 'uses' => 'UserController@deleteUser']);
		});
		Route::group(['prefix' => 'groups'], function() {
			Route::get('list', ['as' => 'admin.groups.list', 'uses' => 'GroupController@GroupsList']);
			Route::get('create', ['as' => 'admin.groups.create', 'uses' => 'GroupController@getGroupsCreate']);
			Route::post('create', ['as' => 'admin.groups.create', 'uses' => 'GroupController@postGroupsCreate']);
			Route::get('edit/{id}', ['as' => 'admin.groups.edit', 'uses' => 'GroupController@getGroupsEdit']);
			Route::post('edit/{id}', ['as' => 'admin.groups.edit', 'uses' => 'GroupController@postGroupsEdit']);
			Route::get('delete/{id}', ['as' => 'admin.groups.delete', 'uses' => 'GroupController@deleteGroup']);
		});
		Route::group(['prefix' => 'permissions'], function() {
			Route::get('list', ['as' => 'admin.permissions.list', 'uses' => 'PermissionController@permissionsList']);
			Route::get('create', ['as' => 'admin.permissions.create', 'uses' => 'PermissionController@getpermissionsCreate']);
			Route::post('create', ['as' => 'admin.permissions.create', 'uses' => 'PermissionController@postpermissionsCreate']);
			Route::get('edit/{id}', ['as' => 'admin.permissions.edit', 'uses' => 'PermissionController@getpermissionsEdit']);
			Route::post('edit/{id}', ['as' => 'admin.permissions.edit', 'uses' => 'PermissionController@postpermissionsEdit']);
			Route::get('delete/{id}', ['as' => 'admin.permissions.delete', 'uses' => 'PermissionController@deletepermission']);
		});
	});
});