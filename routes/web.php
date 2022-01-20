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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/latest-ketinggian-air/{limit}', 'HomeController@getLatestKetinggianAir');
Route::get('/latest-spillway', 'HomeController@getLatestSpillway');

Route::get('/prediksi', 'HomeController@prediksi');
Route::get('/do-prediction', 'HomeController@doPrediksi');

Route::get('/generate-dataset', 'HomeController@generate_dataset');

// Status IoT
Route::get('/status-iot','StatusIotController@index');
Route::get('/status-iot/create','StatusIotController@create');
Route::post('/status-iot/store','StatusIotController@store');
Route::get('/status-iot/{id}/edit','StatusIotController@edit');
Route::put('/status-iot/{id}/update','StatusIotController@update');
Route::delete('/status-iot/{id}/destroy','StatusIotController@destroy');

// Spillway
Route::get('/spillway','SpillwayController@index');

// Ketinggian Air
Route::get('/ketinggian-air','KetinggianAirController@index');
