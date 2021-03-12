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

Route::get('/', 'SiteController@index');
Route::get('/about-us', 'SiteController@about');
Route::get('/contact-us', 'SiteController@contact');
Route::post('/contact', 'ContactUsController@store');
Route::get('/what-we-offer', 'SiteController@offer');
Route::get('/my-orders', 'SiteController@myOrder')->middleware('can:isCustomer');
Route::get('/my-transactions', 'SiteController@transaction')->middleware('can:isCustomer');
Route::get('/paid-orders', 'SiteController@paidOrders')->middleware('can:isCustomer');
Route::get('/receipt/{uuid}', 'SiteController@receipt')->middleware('can:isCustomer');
Route::get('/dashboard', 'SiteController@dashboard');
Route::post('/special-service/create', 'SpecialServiceController@store')->name('sendRequest');
Route::post('/track-my-order', 'SiteController@checkOrderStatus');

Route::get('/auth-login', function () {
    return view('pages.auth.login');
});

Route::get('/auth-register', function () {
    return view('pages.auth.register');
});

Route::get('/auth-forgot-password', function () {
    return view('pages.auth.forgot_password');
});

Route::get('/auth-password-reset/{uuid}', 'UserController@settings');
Route::post('/auth-password-reset/{id}', 'UserController@password');

Route::post('/auth-login', 'UserController@login');
Route::post('/site-login', 'UserController@siteLogin');
Route::post('/site-register', 'UserController@siteRegister');
Route::get('/logout', 'UserController@logout');

Route::get('/user-dashboard', 'DashboardController@index');
Route::get('/user-profile', function () {
    if (Auth::guest()) {
        //is a guest so redirect
        return redirect('/auth-login');
    }
    return view('pages.user.profile');
});
Route::get('/user-profile/{uuid}', 'UserController@editProfile');
Route::post('/user-profile/{id}', 'UserController@profileSettings');

// Riders
Route::get('/create-rider', 'RiderController@create');
Route::post('/create-rider', 'RiderController@store');
Route::get('/manage-rider', 'RiderController@index');
Route::get('/edit-rider/{uuid}', 'RiderController@edit');
Route::get('/update-rider/{uuid}', 'RiderController@updateDetails');
Route::post('/update-rider/{id}', 'RiderController@update');
Route::post('/delete-rider', 'RiderController@destroy');
Route::get('/rider-accidents/{id}', 'RiderController@riderAccidents');
Route::post('/update-bike-accident', 'RiderController@updateBikeAccident');

// Bike
Route::get('/create-bike', 'BikeController@create');
Route::post('/create-bike', 'BikeController@store');
Route::get('/manage-bike', 'BikeController@index');
Route::get('/bike-details/{uuid}', 'BikeController@bikeDetails');
Route::get('/edit-bike/{uuid}', 'BikeController@edit');
Route::post('/update-bike/{id}', 'BikeController@update');
Route::get('/bike-uploads/{uuid}', 'BikeController@uploadedFiles');

// Maintenance
Route::get('/bike-maintenance', 'MaintenanceController@index');
Route::post('/update-bike-maintenance', 'MaintenanceController@store');
Route::get('/edit-bike-maintenance/{uuid}', 'MaintenanceController@edit');

// Accident
Route::get('/bike-accident', 'AccidentController@index');
Route::post('/update-accident-info', 'AccidentController@store');
Route::get('/edit-bike-accident/{uuid}', 'AccidentController@edit');

// Customers
Route::get('/create-customer', 'CustomerController@create');
Route::post('/create-customer', 'CustomerController@store');
Route::get('/manage-customer', 'CustomerController@index');
Route::get('/edit-customer/{uuid}', 'CustomerController@edit');
Route::get('/update-customer/{uuid}', 'CustomerController@updateDetails');
Route::post('/update-customer/{id}', 'CustomerController@update');
Route::post('/delete-customer', 'CustomerController@destroy');

// Admin
Route::get('/create-admin', 'AdminController@create');
Route::post('/create-admin', 'AdminController@store');
Route::get('/manage-admin', 'AdminController@index');
Route::get('/edit-admin/{uuid}', 'AdminController@edit');
Route::post('/delete-admin', 'AdminController@destroy');

// Transactions
Route::get('/generate-transaction/{uuid}', 'TransactionController@create');
Route::post('/generate-transaction', 'TransactionController@store');
Route::get('/all-transactions', 'TransactionController@index');
Route::get('/transaction-detail/{uuid}', 'TransactionController@edit');
Route::post('/payment', 'SiteController@payment');


// Orders
Route::get('/create-order', 'PackageController@create');
Route::post('/create-order', 'PackageController@store');
Route::get('/pending-orders', 'PackageController@show');
Route::get('/order-details/{uuid}', 'PackageController@edit');

// Customer create order
Route::post('/make-order', 'IncompleteOrderController@store');
Route::get('/incomplete-orders', 'IncompleteOrderController@index');
Route::get('/incomplete-order-details/{uuid}', 'IncompleteOrderController@edit');
Route::post('/incomplete-order/{id}', 'PackageController@assignRiderToIncompleteOrder');
Route::get('/all-order', 'PackageController@index');
Route::get('/deleted-orders', 'PackageController@deletedOrders');
Route::get('/deleted-order-details/{uuid}', 'PackageController@deletedOrderDetails');
Route::post('/delete-order/{id}', 'PackageController@destroy');
Route::post('/complete-order', 'PackageController@completeOrder');
Route::post('/update-status/{id}', 'PackageController@updateStatus');

// SLA Clients
Route::get('/manage-sla-clients', 'SLAController@index');
Route::post('/add-sla-client', 'SLAController@store');
Route::post('/fund-customer-account', 'FundController@store');

// Receipts
Route::get('/generate-receipt/{uuid}', 'TransactionController@generateReceipt');
Route::get('/send-receipt/{uuid}', 'TransactionController@sendReceipt');
Route::get('/view-receipts', 'TransactionController@viewReceipts');

// Paystack
Route::get('/verify-transactions/{reference}', 'PaymentController@handleGatewayCallback');
Route::get('/customer-transactions/{ref}', 'PaymentController@customerGatewayCallback');
// Google distance matrix
Route::post('/distance-matrix', 'SiteController@distanceMatrix');