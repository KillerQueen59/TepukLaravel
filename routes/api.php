<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

//User
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');

//Pupuk
Route::get('pupuk','PupukController@pupuk');
Route::get('pupuk/{id}','PupukController@pupukByID');
Route::post('pupuk','PupukController@pupukSave');
Route::put('pupuk/{pupuk}','PupukController@pupukUpdate');
Route::delete('pupuk/{pupuk}','PupukController@pupukDelete');
