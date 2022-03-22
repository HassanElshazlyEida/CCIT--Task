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
Route::group(['middleware' => 'guest'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    // Payment Plan
    Route::get('payment_plan', 'UserController@payment_plan')->name('payment_plan');
    // API LOGIN METHODS
    Route::group(['prefix' => 'sign-up/{method}'], function () {
        Route::get('redirect', 'Auth\LoginAPIMethodsController@ApiRedirect')->name('sign-up.redirect')->where(['method' => 'facebook|google']);
        Route::get('callback', 'Auth\LoginAPIMethodsController@ApiCallback')->name('sign-up.callback')->where(['method' => 'facebook|google']);
    });

});
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

