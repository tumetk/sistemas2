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

Route::get('/',function(){
	return view('welcome');
});


Route::post('/buy/{cart}',['as'=>'buy','namespace'=>'Front', 'uses'=> 'SalesController@buyProducts']);

Route::group(['prefix' => 'cart','namespace' =>'Front'],function(){
	Route::get('{id}',['as'=>'shoppingCart','uses'=>'ShoppingCartController@viewCart']);
	Route::post('{id}/add/{product}',['as'=>'shoppingCart.addProduct','uses'=>'ShoppingCartController@addProduct']);
	Route::post('{id}/delete/{product}',['as'=>'shoppingCart.deleteProduct','uses'=>'ShoppingCartController@deleteProduct']);
	Route::post('deleteAll',['as'=>'shoppingCart.deleteAll','uses'=> 'ShoppingCartController@deleteAll']);
});

Route::post('/cotizar',['as'=>'cotizar' ,'namespace'=>'Front', 'uses'=>'Front\CotizarController@cotizarServices']);


