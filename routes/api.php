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

Route::post('/role', 'RoleController@store');
Route::post('/auth-login', 'UserController@login');
Route::post('/create-order', 'OrderController@store');
Route::post('/auth-register', 'UserController@register');
Route::get('/logout', 'UserController@logout');
Route::post('/cat', 'CategoryController@store');

// Orders
Route::get('/create-order', 'OrderController@create');
Route::post('/create-order', 'OrderController@store');
Route::get('/pending-orders', 'OrderController@show');
Route::get('/order-details/{uuid}', 'OrderController@edit');

// Customer create order
Route::post('/site-order', 'IncompleteOrderController@store');
Route::get('/incomplete-orders', 'IncompleteOrderController@index');
Route::get('/incomplete-order-details/{uuid}', 'IncompleteOrderController@edit');
Route::post('/incomplete-order/{id}', 'OrderController@assignRiderToIncompleteOrder');
Route::get('/all-orders', 'OrderController@index');
Route::get('/deleted-orders', 'OrderController@deletedOrders');
Route::get('/deleted-order-details/{uuid}', 'OrderController@deletedOrderDetails');
Route::post('/delete-order/{id}', 'OrderController@destroy');
Route::post('/complete-order', 'OrderController@completeOrder');
Route::post('/update-status/{id}', 'OrderController@updateStatus');
