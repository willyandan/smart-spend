<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('dispesa')->group(function(){
	Route::get('/', 'ExpenseController@get');
	Route::post('cadastrar', 'ExpenseController@create');
	Route::post('atualizar/{id}', 'ExpenseController@update');
	Route::post('deletar/{id}', 'ExpenseController@delete');
});

Route::prefix('ganhos')->group(function(){
	Route::post('cadastrar', 'WinningsController@create');
});
