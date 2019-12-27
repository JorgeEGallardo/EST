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

Route::get('/', 'get@getTypes');
Route::get('/estilista/{id}', 'get@getUser');
Route::get('/doSale/{idworker}/{idtype}', 'post@postSale');
Auth::routes();
Route::get('/admin', 'get@getData');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/table', 'get@getTables')->name('home');
