<?php
use Illuminate\Support\Facades\Route;
// Route::middleware('web')->namespace('Ixiaozi\Multi\Controllers')->group([], function(){
//     Route::get('/test', IndexController::class . '@index');
// });

Route::group(['middleware'=>'web', 'namespace'=>'Ixiaozi\Multi\Controllers', 'prefix' => 'admin'],function(){

	Route::group(['prefix'=> ''], function(){
		Route::get('/',  'IndexController@index');
		Route::get('/welcome',  'IndexController@welcome');
	});
	

	Route::group(['prefix'=> 'category'], function(){
		Route::get('/',  'CategoryController@index');
	});

	Route::group(['prefix'=> 'system'], function(){
		Route::get('/',  'SystemController@index');
		Route::get('/category',  'SystemController@category');
	});


});