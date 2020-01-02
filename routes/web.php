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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('users', 'UsersController')->middleware('auth');
Route::post('users/store', 'UsersController@store')->middleware('auth');
Route::get('users/delete/{id}', 'UsersController@destroy')->middleware('auth');


Route::resource('albarans', 'AlbaraController')->middleware('auth');
Route::resource('clients', 'ClientController')->middleware('auth');
Route::resource('pressupostos', 'PressupostController')->middleware('auth');
