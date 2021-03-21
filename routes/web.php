<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/get/rakyat', 'LaporanController@index');
$router->post('/api/lapor', 'LaporanController@lapor');

$router->post('/register', 'MasyarakatController@register');
$router->post('/api/login', 'MasyarakatController@login');


