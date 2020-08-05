<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('get_users_datatable', 'UserController@getDatatableIndex')
                ->name('datatable.index');
        });
        Route::resource('users', 'UserController')->except([
            'create',
            'store',
            'show'
        ]);
    });

    Route::namespace('Auth')->group(function () {
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::middleware('guest:admin')->group(function () {
            Route::get('login', 'LoginController@showLoginForm')->name('login');
            Route::post('login', 'LoginController@login')->name('login');
        });
    });
});
