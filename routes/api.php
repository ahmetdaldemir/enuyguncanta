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

Route::group(['prefix' => 'v1'], function () {
    Route::resource('save_customer', 'CustomerController');
    Route::resource('save_product', 'ProductController');
    Route::resource('cities', 'CityController');
    Route::get('get_state/{id}', 'CityController@getstate');
    Route::post('get_customer', 'ApiController@getcustomer');
    Route::post('get_products', 'ApiController@getproducts');
//    Route::resource('get_customer', 'ApiController');
});
