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

$router->post('/api/register/masyarakat', 'AuthController@register_masyarakat');
$router->post('/api/login/masyarakat', 'AuthController@login_masyarakat');

$router->post('/api/register/petugas', 'AuthController@register_petugas');
$router->post('/api/login/petugas', 'AuthController@login_petugas');

$router->get('/api/get/rakyat', 'LaporanController@index');

$router->get('/api/lapor', 'LaporanController@GET_lapor');
$router->get('/api/lapor/id/{id}', 'LaporanController@GET_lapor_ID');
$router->get('/api/lapor/nik/{nik}', 'LaporanController@GET_lapor_NIK');
$router->post('/api/lapor', 'LaporanController@POST_lapor');
$router->delete('/api/lapor/{id}', 'LaporanController@DELETE_lapor');

$router->get('/api/lapor/{id_laporan}/tanggapan', 'LaporanController@GET_tanggapan');
$router->post('/api/lapor/tanggapan', 'LaporanController@POST_tanggapan');

$router->get('/api/kategori', 'LaporanController@GET_kategori');
$router->get('/api/kategori/{id}', 'LaporanController@GET_kategori_ID');
$router->post('/api/kategori', 'LaporanController@POST_kategori');
$router->put('/api/kategori/{id}', 'LaporanController@PUT_kategori');
$router->delete('/api/kategori/{id}', 'LaporanController@DELETE_kategori');

