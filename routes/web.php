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
//role 1 = admin
//role 2 = member

Route::get('pengguna/login', 'UsersController@login');
Route::get('pengguna/logout', 'UsersController@logout');
Route::post('pengguna/registrasi', 'UsersController@registrasi');
Route::post('pengguna/validasi', 'UsersController@cekLogin');
Route::get('/', 'DashboardController@index');

Route::group(['middleware' => ['role:1']], function () {
Route::get('/buku/list', 'BukuController@index');
Route::get('/buku/add', 'BukuController@add');
Route::get('/rak/list', 'RakController@index');
Route::get('/rak/list/{id?}', 'RakController@edit');
Route::get('/rak/update/{id?}', 'RakController@createAndUpdateRak');
Route::post('/rak/add', 'RakController@createAndUpdateRak');
Route::get('/log/transaksi', 'UsersController@transaksi');

Route::get('/pengguna/list', 'UsersController@index');
Route::get('/pesanan/list', 'TransaksiController@pesanan');
Route::get('/penerimaan/list', 'TransaksiController@penerimaan');
Route::post('/order/proses/{id?}', 'TransaksiController@keluar');
Route::post('/penerimaan/proses/{id?}', 'TransaksiController@masuk');
Route::get('/penyesuaian', 'TransaksiController@adjustmentSaldo');
Route::post('/penyesuaian/baru', 'TransaksiController@adjustmentMasuk');
});

Route::group(['middleware' => ['role:2']], function () {
    Route::get('/produk/list', 'TransaksiController@index');
    Route::get('/pengguna/transaksi', 'UsersController@transaksi');
    Route::get('/produk/cek/{id?}', 'TransaksiController@cekStok');
    Route::post('/order/{id?}', 'TransaksiController@order');
});
