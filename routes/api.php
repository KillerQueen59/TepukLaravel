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
Route::get('pupuk','Api\PupukController@pupuk');
Route::get('pupuk/{id}','Api\PupukController@pupukByID');
Route::get('pupuk/organik','Api\PupukController@pupukByOrganik');
Route::get('pupuk/anorganik','Api\PupukController@pupukByAnorganik');
Route::post('pupuk/create','Api\PupukController@pupukSave');
Route::post('pupuk/update','Api\PupukController@pupukUpdate');
Route::post('pupuk/delete','Api\PupukController@pupukDelete');

//Order
Route::post('orders/create','Api\OrderController@create')->middleware('jwtAuth');
Route::post('orders/delete','Api\OrderController@delete')->middleware('jwtAuth');
Route::post('orders/update','Api\OrderController@update')->middleware('jwtAuth');
Route::get('orders','Api\OrderController@orders')->middleware('jwtAuth');

//Payment
Route::post('payments/create','Api\PaymentController@create')->middleware('jwtAuth');
Route::post('payments/delete','Api\PaymentController@delete')->middleware('jwtAuth');
Route::post('payments/update','Api\PaymentController@update')->middleware('jwtAuth');
Route::get('payments','Api\PaymentController@payments')->middleware('jwtAuth');

//Shipping
Route::post('shippings/create','Api\ShippingController@create')->middleware('jwtAuth');
Route::post('shippings/update','Api\ShippingController@update')->middleware('jwtAuth');
Route::get('shippings','Api\ShippingController@shippings')->middleware('jwtAuth');
