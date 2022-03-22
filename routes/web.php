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





/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

 // API LOGIN METHODS
Route::group(['prefix' => 'sign-up/{method}'], function () {
    Route::get('redirect', 'Auth\LoginAPIMethodsController@ApiRedirect')->name('sign-up.redirect')->where(['method' => 'facebook|google']);
    Route::get('callback', 'Auth\LoginAPIMethodsController@ApiCallback')->name('sign-up.callback')->where(['method' => 'facebook|google']);
});
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'CheckSubscribe'], function () {
        // Payment Plan
        Route::get('customer/subscribe', 'Transactions\PaymentController@payment_plan')->name('payment_plan');
        Route::get('customer/pay', 'Transactions\PaymentController@pay')->name('pay');
    });

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth','role:administrator'],'prefix'=>'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::POST('user/status','UserController@status')->name('user.status');
	// Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

