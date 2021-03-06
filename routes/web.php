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


Route::prefix('admin')->group(function () {


Route::get('login', 'Auth\AdminLoginController@index')->name('admin.login');

Route::post('login_store', 'Auth\AdminLoginController@login')->name('admin.store');

Route::get('dashboard', 'AdminHomeController@index')->name('admin.dashboard');

Route::post('logout', 'AdminHomeController@logout')->name('admin.logout');

});



