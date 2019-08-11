<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'AppController@version');

Route::get('/customers', 'CustomersController@index')->name('customers.index');
Route::get('/customers/{customer}', 'CustomersController@view')->name('customers.view');
Route::post('/customers', 'CustomersController@create')->name('customers.create');
Route::put('/customers/{customer}', 'CustomersController@update')->name('customers.put');
Route::delete('/customers', 'CustomersController@delete')->name('customers.delete');
