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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::group(['middleware' => ['checkRole:1']], function () {
        Route::get('/penjualan/transaksi/{id}', 'PenjualanController@get_transaksi');
        Route::get('/penjualan/transaksi', 'PenjualanController@transaksi');
        Route::post('/peramalan/hitung', 'PeramalanController@hitung_peramalan');
    });
    Route::group(['middleware' => ['checkRole:1,3']], function () {
        Route::get('/penjualan/kasir', 'PenjualanController@kasir');
        Route::post('penjualan/add', 'PenjualanController@add')->name('penjualan.add');
        Route::get('/penjualan/delete/{id}', 'PenjualanController@delete_keranjang');
        Route::get('/penjualan/riwayat', 'PenjualanController@riwayat');
        Route::get('/peramalan/riwayat', 'PeramalanController@riwayat');
        Route::resource('/penjualan', 'PenjualanController');
        Route::resource('/peramalan', 'PeramalanController');
        Route::resource('/menu', 'MenuController');
    });

    Route::group(['middleware' => ['checkRole:1,2']], function () {
        Route::resource('/bahan-baku', 'BahanBakuController');
        Route::resource('/stok', 'StokController');
        Route::patch('/user/change_password/{id}', 'UserController@change_password')->name('user.change_password');
        Route::resource('/user', 'UserController');
    });
    Route::group(['middleware' => ['checkRole:2']], function () {
        Route::resource('/resep', 'ResepController');
    });

    Route::resource('/user', 'UserController')->only(['update', 'show']);
});
