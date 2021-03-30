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

$router->get('/api/get/laporan/jakarta', 'LaporanController@GET_JAKARTA_LAPOR');
$router->get('/api/get/laporan/bali', 'LaporanController@GET_BALI_LAPOR');
$router->get('/api/get/laporan/aceh', 'LaporanController@GET_ACEH_LAPOR');
$router->get('/api/get/laporan/yogyakarta', 'LaporanController@GET_YOGYAKARTA_LAPOR');
$router->get('/api/get/laporan/papua', 'LaporanController@GET_PAPUA_LAPOR');
$router->get('/api/get/laporan/sulawesi', 'LaporanController@GET_SULAWESI_LAPOR');

$router->get('/api/lapor', 'LaporanController@GET_lapor');
$router->get('/api/lapor/id/{id}', 'LaporanController@GET_lapor_ID');
$router->get('/api/lapor/nik/{nik}', 'LaporanController@GET_lapor_NIK');
$router->post('/api/lapor', 'LaporanController@POST_lapor');
$router->delete('/api/lapor/{id}', 'LaporanController@DELETE_lapor');
$router->put('/api/lapor/{id}/selesai', 'LaporanController@DONE_lapor');

$router->get('/api/lapor/{id_laporan}/tanggapan', 'LaporanController@GET_tanggapan');
$router->post('/api/lapor/tanggapan', 'LaporanController@POST_tanggapan');

$router->get('/api/kategori', 'LaporanController@GET_kategori');
$router->get('/api/kategori/{id}', 'LaporanController@GET_kategori_ID');
$router->post('/api/kategori', 'LaporanController@POST_kategori');
$router->put('/api/kategori/{id}', 'LaporanController@PUT_kategori');
$router->delete('/api/kategori/{id}', 'LaporanController@DELETE_kategori');

$router->get('/api/get/petugas', 'PetugasController@GET_petugas');
$router->post('/api/post/petugas', 'PetugasController@POST_petugas');
$router->put('/api/petugas/{id}', 'PetugasController@PUT_petugas');
$router->delete('/api/petugas/{id}', 'PetugasController@DELETE_petugas');

$router->get('/api/get/rakyat', 'MasyarakatController@GET_masyarakat');
$router->post('/api/post/rakyat', 'MasyarakatController@POST_masyarakat');
$router->put('/api/rakyat/{id}', 'MasyarakatController@PUT_masyarakat');
$router->delete('/api/rakyat/{id}', 'MasyarakatController@DELETE_masyarakat');