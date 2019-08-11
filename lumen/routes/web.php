<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Log;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/customers', 'CustomersController@index');
$router->get('/customers/{customerId}', 'CustomersController@view');
$router->post('/customers', 'CustomersController@create');
$router->put('/customers/{customerId}', 'CustomersController@update');
$router->delete('/customers/{customerId}', 'CustomersController@delete');

