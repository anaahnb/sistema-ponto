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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home", "HomeController@index")->name("home");
// Route::get("/", "HomeController@index")->name("home");

Route::get('index', 'AuthController@index')->name('auth.index');
Route::get('show', 'AuthController@show')->name('auth.show');
Route::post('update/{id}','AuthController@update')->name('auth.update');
Route::get('edit/{id}', 'AuthController@edit')->name('auth.edit');
Route::get('destroy/{id}', 'AuthController@destroy')->name('auth.destroy');