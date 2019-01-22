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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'PlaceController@hotels')->name('home');
Route::get('/places', 'PlaceController@show')->name('places');
Route::get('/hotels', 'PlaceController@hotels')->name('hotels');
Route::get('/beaches', 'PlaceController@beaches')->name('beaches');
Route::get('/sights', 'PlaceController@sights')->name('sights');
Route::get('/food', 'PlaceController@food')->name('food');

Route::post('/places', 'PlaceController@store')->name('add_new_place');
Route::post('/places/update', 'PlaceController@update')->name('edit_place');
Route::post('/places/delete', 'PlaceController@destroy')->name('delete_place');


