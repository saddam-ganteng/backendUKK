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

$router->post('/register', 'MasyarakatController@register');
$router->post('/api/login', 'MasyarakatController@login');

$router->get('/api/get/rakyat', 'LaporanController@index');

$router->get('/api/lapor', 'LaporanController@GET_lapor');
$router->post('/api/lapor', 'LaporanController@POST_lapor');
$router->delete('/api/lapor/{id}', 'LaporanController@DELETE_lapor');

$router->get('/api/kategori', 'LaporanController@GET_kategori');
$router->get('/api/kategori/{id}', 'LaporanController@GET_kategori_ID');
$router->post('/api/kategori', 'LaporanController@POST_kategori');
$router->put('/api/kategori/{id}', 'LaporanController@PUT_kategori');
$router->delete('/api/kategori/{id}', 'LaporanController@DELETE_kategori');

