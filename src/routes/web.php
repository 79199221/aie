<?php
use Illuminate\Support\Facades\Route;
// Route::middleware('web')->namespace('Ixiaozi\Multi\Controllers')->group([], function(){
//     Route::get('/test', IndexController::class . '@index');
// });

Route::group([
    'middleware'=>'web',
    'namespace'=>'Ixiaozi\Aie\Controllers',
    'as' => 'aie::',
],function(){
    Route::group(['prefix'=> 'aie'], function(){
        Route::get('/',  'IndexController@index');
    });
    
});