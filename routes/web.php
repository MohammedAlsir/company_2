<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');
Route::get('services/services/{id?}', 'App\Http\Controllers\HomeController@services')->name('services');
Route::post('services', 'App\Http\Controllers\HomeController@cart_store')->name('cart.store');
Route::get('services/cart', 'App\Http\Controllers\HomeController@cart_show')->name('cart.show');
// Route::post('services/cart', 'App\Http\Controllers\HomeController@cart_done')->name('cart.done');
Route::post('services/cart/{id}', 'App\Http\Controllers\HomeController@cart_update')->name('cart.update');
Route::get('request', 'App\Http\Controllers\HomeController@cart_request')->name('cart.request');
Route::get('orders', 'App\Http\Controllers\HomeController@orders')->name('orders');
Route::post('orders', 'App\Http\Controllers\HomeController@orders_with_id')->name('orders');






Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', 'App\Http\Controllers\Dashboard\MainController@index')->name('admin');
Route::group(['prefix' => 'admin'], function () {
    Route::resource('sections', 'App\Http\Controllers\Dashboard\SectionController');
    Route::resource('services', 'App\Http\Controllers\Dashboard\ServiceController');
    Route::resource('users', 'App\Http\Controllers\Dashboard\UsersController');
    Route::get('profile', 'App\Http\Controllers\Dashboard\UsersController@profile')->name('profile');
    Route::put('profile/edit/{id}', 'App\Http\Controllers\Dashboard\UsersController@profile_edit')->name('profile.edit');
    Route::resource('setting', 'App\Http\Controllers\Dashboard\SettingController');
    Route::resource('orders', 'App\Http\Controllers\Dashboard\OrdersController');

    Route::get('orders-accepted', 'App\Http\Controllers\Dashboard\OrdersController@accepted')->name('orders.accepted');
    Route::get('orders-rejected', 'App\Http\Controllers\Dashboard\OrdersController@rejected')->name('orders.rejected');
    Route::get('orders-pending', 'App\Http\Controllers\Dashboard\OrdersController@pending')->name('orders.pending');

    Route::get('orders-accepted/{id}', 'App\Http\Controllers\Dashboard\OrdersController@accepted_order')->name('accepted');
    Route::get('orders-rejected/{id}', 'App\Http\Controllers\Dashboard\OrdersController@rejected_order')->name('rejected');
});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
