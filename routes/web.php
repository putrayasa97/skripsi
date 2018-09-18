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

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/pegawai/anggota', 'PegawaiController@anggota')->name('anggota');
Route::get('/pegawai/anggota/form', 'PegawaiController@anggotaform')->name('anggota.form');
Route::post('/pegawai/anggota/insert', 'PegawaiController@anggotainsert')->name('anggota.insert');
Route::get('/pegawai/anggota/edit/{id}', 'PegawaiController@anggotaedit')->name('anggota.edit');
Route::put('/pegawai/anggota/{id}', 'PegawaiController@anggotaupdate')->name('anggota.update');
Route::delete('/pegawai/anggota/delete/{id}', 'PegawaiController@anggotadelete')->name('anggota.delete');

Route::get('/pemilik/paket', 'PemilikController@paket')->name('paket');
Route::post('/pemilik/paket/insert', 'PemilikController@paketinsert')->name('paket.insert');
Route::get('/pemilik/paket/edit/{id}', 'PemilikController@paketedit')->name('paket.edit');
Route::get('/pemilik/paket/detail/{id}', 'PemilikController@paketdetail')->name('paket.detail');
Route::put('/pemilik/paket/{id}', 'PemilikController@paketupdate')->name('paket.update');
Route::delete('/pemilik/paket/delete/{id}', 'PemilikController@paketdelete')->name('paket.delete');
Route::post('/pemilik/paket/inserttarif', 'PemilikController@inserttarif')->name('paket.inserttarif');
Route::get('/pemilik/paket/edittarif/{id}', 'PemilikController@edittarif')->name('paket.edittarif');
Route::get('/pemilik/paket/gettarif/{id}', 'PemilikController@gettarif')->name('paket.gettarif');
Route::put('/pemilik/paket/updatetarif/{id}', 'PemilikController@updatetarif')->name('paket.updatetarif');
Route::delete('/pemilik/paket/deletetarif/{id}', 'PemilikController@deletetarif')->name('paket.deletetarif');

