<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return view('greeting',['name'=>'Jame']);
});

Route::get('/home', function () {
    return ('<h1>Hello hà nội</h1>');
});

Route::group(['prefix' =>'admin'],function(){

    Route::group(['prefix'=>'product'], function(){
        Route::get('/getProduct','App\Http\Controllers\ProductController@getProducts')->name('admin.product.getProduct');
        Route::get('/getProductsbyBand','App\Http\Controllers\ProductController@getProductsbyBand')->name('admin.product.getProductsByBand');
        Route::get('/getProductsbyYear','App\Http\Controllers\ProductController@getProductsbyYear')->name('admin.product.getProductsByYear');
        Route::post('/insertProduct','App\Http\Controllers\ProductController@insertProduct')->name('admin.product.insertProduct');
        Route::get('/insertProduct','App\Http\Controllers\ProductController@forminsertProduct')->name('admin.product.forminsertProduct');
        Route::get('/updateProduct','App\Http\Controllers\ProductController@updateProduct');
        Route::get('/deleteProduct/{id}','App\Http\Controllers\ProductController@deleteProduct')->name('admin.product.deleteProduct');

    });
    
    Route::group(['prefix'=>'order'], function(){

    });
    Route::group(['prefix'=>'orderdetail'], function(){

    });
    Route::group(['prefix'=>'customer'], function(){
        Route::get('/getCustomer','App\Http\Controllers\CustomerController@getCustomers')->name('admin.customer.getCustomer');
        Route::get('/insertCustomer','App\Http\Controllers\CustomerController@insertCustomer')->name('admin.customer.insertCustomer');
        Route::post('/createCustomer','App\Http\Controllers\CustomerController@createCustomer')->name('admin.customer.createCustomer');
        Route::get('/editCustomer/{id}', 'App\Http\Controllers\CustomerController@editCustomer')->name('admin.customer.editCustomer');
        Route::post('/updateCustomer/{id}', 'App\Http\Controllers\CustomerController@updateCustomer')->name('admin.customer.updateCustomer');
        Route::get('/deleteCustomer/{id}', 'App\Http\Controllers\CustomerController@deleteCustomer')->name('admin.customer.deleteCustomer');
        Route::post('/destroyCustomer/{id}', 'App\Http\Controllers\CustomerController@destroyCustomer')->name('admin.customer.destroyCustomer');
    });

});