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

Auth::routes();

Route::name('client.')->namespace('Client')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/posts/{slug}', 'PostController@show')->name('show');
});

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        //CRUD Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('get_users_datatable', 'UserController@getDatatableIndex')
                ->name('datatable.index');
        });
        Route::resource('users', 'UserController')->except([
            'create',
            'store',
            'show',
        ]);

        //CRUD Posts
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('get_posts_datatables', 'PostController@getDatatableIndex')
                ->name('datatable.index');
        });
        Route::resource('posts', 'PostController');
    });

    Route::namespace('Auth')->group(function () {
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::middleware('guest:admin')->group(function () {
            Route::get('login', 'LoginController@showLoginForm')->name('login');
            Route::post('login', 'LoginController@login')->name('login');
        });
    });
});
