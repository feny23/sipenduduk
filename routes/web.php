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

Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () {
    return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";
   
});

Route::get('home', function () {
    return view('home');
});

Route::get('/kartukeluarga', 'KartuKeluargaController@index')->name('kartukeluarga.index');  //routing lihat daftar kk
Route::get('/kartukeluarga/create', 'KartuKeluargaController@create')->name('kartukeluarga.create');
Route::post('/kartukeluarga/create', 'KartuKeluargaController@store')->name('kartukeluarga.store');
Route::get('/kartukeluarga/{id}', 'KartuKeluargaController@show')->name('kartukeluarga.show');
Route::get('/kartukeluarga/{id}/edit', 'KartuKeluargaController@edit')->name('kartukeluarga.edit');
Route::patch('/kartukeluarga/{id}', 'KartuKeluargaController@update')->name('kartukeluarga.update');
Route::delete('/kartukeluarga/{id}', 'KartuKeluargaController@destroy')->name('kartukeluarga.destroy');

Route::get('/penduduk', 'PendudukController@index')->name('penduduk.index');  //routing lihat daftar kk
Route::get('/penduduk/create', 'PendudukController@create')->name('penduduk.create');
Route::post('/penduduk/create', 'PendudukController@store')->name('penduduk.store');
Route::get('/penduduk/{id}', 'PendudukController@show')->name('penduduk.show');
Route::get('/penduduk/{id}/edit', 'PendudukController@edit')->name('penduduk.edit');
Route::patch('/penduduk/{id}', 'PendudukController@update')->name('penduduk.update');
Route::delete('/penduduk/{id}', 'PendudukController@destroy')->name('penduduk.destroy');

Route::get('/laporan', 'LaporanController@index')->name('laporan.index');

Route::get('/laporan/tampil', 'LaporanController@tampil')->name('laporan.tampil');
Route::get('/laporan/cari','LaporanController@cari')->name('laporan.cari');

Route::get('/anggotakeluarga/{id}', 'AnggotaKeluargaController@index')->name('anggotakeluarga.index');  //routing lihat daftar kk
Route::get('/anggotakeluarga/{id}/create', 'AnggotaKeluargaController@create')->name('anggotakeluarga.create');
Route::post('/anggotakeluarga/create', 'AnggotaKeluargaController@store')->name('anggotakeluarga.store');
