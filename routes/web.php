<?php
use Illuminate\Support\Facades\Route;
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
Auth::routes();


// when render first time project redirect
Route::get('/', function () {
    return redirect('login');
});

Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {

    Route::get('/', 'DashboardController@index');


    //Customers

    Route::get('customers', 'CustomerController@index');
    Route::get('customers/create', 'CustomerController@create');
    Route::post('customers/save', 'CustomerController@save');
    Route::get('customers/edit/{id}', 'CustomerController@edit');
    Route::post('customers/update', 'CustomerController@update');
    Route::get('customers/remove/{id}', 'CustomerController@remove');
    Route::get('customers/images/{id}', 'CustomerController@images');
    Route::post('customers/images/save', 'CustomerController@imagessave');
    Route::get('customers/images/delete/{id}', 'CustomerController@save');
    //Product
    Route::get('products', 'ProductController@index');
    Route::get('products/create', 'ProductController@create');
    Route::post('products/save', 'ProductController@save');
    Route::get('products/edit/{id}', 'ProductController@edit');
    Route::post('products/update', 'ProductController@update');
    Route::get('products/remove/{id}', 'ProductController@remove');
    //Brands
    Route::get('catalog/brands', 'BrandController@index');
    Route::get('catalog/brands/create', 'BrandController@create');
    Route::post('catalog/brands/save', 'BrandController@save');
    Route::get('catalog/brands/edit/{id}', 'BrandController@edit');
    Route::post('catalog/brands/update', 'BrandController@update');
    Route::get('catalog/brands/remove/{id}', 'BrandController@remove');
    //Colors
    Route::get('catalog/color', 'ColorController@index');
    Route::get('catalog/color/create', 'ColorController@create');
    Route::post('catalog/color/save', 'ColorController@save');
    Route::get('catalog/color/edit/{id}', 'ColorController@edit');
    Route::post('catalog/color/update', 'ColorController@update');
    Route::get('catalog/color/remove/{id}', 'ColorController@remove');
    //Category
    Route::get('catalog/categories', 'CategoryController@index');
    Route::get('catalog/categories/create', 'CategoryController@create');
    Route::post('catalog/categories/save', 'CategoryController@save');
    Route::get('catalog/categories/edit/{id}', 'CategoryController@edit');
    Route::post('catalog/categories/update', 'CategoryController@update');
    Route::get('catalog/categories/remove/{id}', 'CategoryController@remove');
    //Order Status
    Route::get('catalog/orderstatus', 'OrderStatusController@index');
    Route::get('catalog/orderstatus/create', 'OrderStatusController@create');
    Route::post('catalog/orderstatus/save', 'OrderStatusController@save');
    Route::get('catalog/orderstatus/edit/{id}', 'OrderStatusController@edit');
    Route::post('catalog/orderstatus/update', 'OrderStatusController@update');
    Route::get('catalog/orderstatus/remove/{id}', 'OrderStatusController@remove');

    //Orders
    Route::get('orders/index/{status_id}', 'OrderController@index');
    Route::get('orders/create', 'OrderController@create');
    Route::post('orders/save', 'OrderController@save');
    Route::get('orders/edit/{id}', 'OrderController@edit');
    Route::post('orders/update', 'OrderController@update');
    Route::get('orders/remove/{id}', 'OrderController@remove');
    Route::get('orders/view/{id}', 'OrderController@view');
    Route::get('orders/export/', 'OrderController@export');
    Route::get('orders/orderstatus/{id}/{status_id}', 'OrderController@orderstatus');
    Route::get('shipment/create/{id}/{status_id}', 'ShipmentController@create');
    Route::get('orders/barcode/{id}', 'ShipmentController@barcode');

    //Users
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/save', 'UserController@save');
    Route::get('users/edit/{id}', 'UserController@edit');
    Route::post('users/update', 'UserController@update');
    Route::get('users/remove/{id}', 'UserController@remove');
    //Shipment
    Route::get('catalog/shipment', 'ShipmentCompanies@index');
    Route::get('catalog/shipment/create', 'ShipmentCompanies@create');
    Route::post('catalog/shipment/save', 'ShipmentCompanies@save');
    Route::get('catalog/shipment/edit/{id}', 'ShipmentCompanies@edit');
    Route::post('catalog/shipment/update', 'ShipmentCompanies@update');
    Route::get('catalog/shipment/remove/{id}', 'ShipmentCompanies@remove');
    //Settings
    Route::get('settings', 'SettingsController@index');
    Route::get('settings/update', 'SettingsController@update');
    //Shipmentss
    Route::get('shipmentscompanies', 'ShipmentCompanyController@index');
    Route::get('shipmentscompanies/edit/{id}', 'ShipmentCompanyController@edit');
    Route::post('shipmentscompanies/update', 'ShipmentCompanyController@update');
    Route::get('shipmentscompanies/remove/{id}', 'ShipmentCompanyController@remove');


});

//require __DIR__.'/auth.php';
Route::get('logout', 'LoginController@logout');
