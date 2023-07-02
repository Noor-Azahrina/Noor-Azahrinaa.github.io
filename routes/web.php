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
    return view('index');
});

//Route Untuk Data Absensi
Route::get('/absensi', 'AbsensiController@absensitampil');
Route::post('/absensi/tambah', 'AbsensiController@absensitambah');
Route::get('/absensi/hapus/{nis}', 'AbsensiController@absensihapus');
Route::put('/absensi/edit/{nis}', 'AbsensiController@absensiedit');

//Route Untuk Data Absensi
Route::get('/home', function(){return view('view_home');});

//Route Untuk Balasan
Route::get('/balasan', 'BalasanController@balasantampil');
Route::post('/balasan/tambah', 'BalasanController@balasantambah');
Route::get('/balasan/hapus/{nis_siswa}', 'BalasanController@balasanhapus');
Route::put('/balasan/edit/{nis_siswa}', 'BalasanController@balasanedit');

//Route Untuk Biodata
Route::get('/biodata', 'BiodataController@biodatatampil');
Route::post('/biodata/tambah', 'BiodataController@biodatatambah');
Route::get('/biodata/hapus/{nis_siswa}', 'BiodataController@biodatahapus');
Route::put('/biodata/edit/{nis_siswa}', 'BiodataController@biodataedit');

//Route Untuk Data Pembimbing
Route::get('/pembimbing', 'PembimbingController@pembimbingtampil');
Route::post('/pembimbing/tambah', 'PembimbingController@pembimbingtambah');
Route::get('/pembimbing/hapus/{id_pembimbing}', 'PembimbingController@pembimbinghapus');
Route::put('/pembimbing/edit/{id_pembimbing}', 'PembimbingController@pembimbingedit');



