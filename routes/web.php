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

Route::middleware('auth')->group(function(){
Route::post('categories/store','CategoryController@store');
Route::get('categories','CategoryController@index');
Route::get('categories/{id}/show','CategoryController@show');
Route::get('categories/{id}/edit','CategoryController@edit');
Route::get('categories/create','CategoryController@create');
Route::put('categories/{id}/update','CategoryController@update');
Route::delete('categories/{id}/destroy','CategoryController@destroy');


Route::get('blogs/','BlogController@index');
Route::get('blogs/create','BlogController@create');
Route::get('blogs/{id}/edit','BlogController@edit');
Route::get('blogs/{id}/show','BlogController@show');
Route::post('blogs/store','BlogController@store');
Route::put('blogs/{id}/update','BlogController@update');
Route::delete('blogs/{id}/destroy','BlogController@destroy');


Route::get('tags/','TagController@index');
Route::get('tags/create','TagController@create');
Route::get('tags/{id}/edit','TagController@edit');
Route::post('tags/store','TagController@store');
Route::delete('tags/{id}/destroy','TagController@destroy');
Route::put('tags/{id}/update','TagController@update');
});