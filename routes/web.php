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
Route::get('/usuarios', 'get@getTables')->name('home');
Route::get('/tipos', 'get@getTypesC')->name('home');
Route::get('/ventas', 'get@getSales');
Route::post('/imageUpload', 'post@uploadImage');
Route::post('/typeUpload', 'post@typeUpload');
Route::get('deleteWorker/{id}', 'delete@deleteWorker');
Route::get('deleteSale/{id}', 'delete@deleteSale');
Route::get('deleteType/{id}', 'delete@deleteType');
Route::get('/resumen', 'get@getDashboard');
Route::get('day', 'get@getSalesByType');
