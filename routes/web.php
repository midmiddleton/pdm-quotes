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

Route::get('/get-quote', 'QuoteController@create');

Route::get('/quotes/list', 'QuoteController@index');

Route::post('/quotes/store', 'QuoteController@store')->name('quote.store');

Route::delete('/quotes/delete/{id}', 'QuoteController@delete')->name('quote.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
