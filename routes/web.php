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

Route::get('/', 'HomeController@index')->name('home');
Route::post('set','HomeController@set')->name('set');
Route::post('clean','HomeController@clean')->name('clean');
Route::post('ajax/getJson','Ajax\AjaxController@getJson')->name('ajax');
