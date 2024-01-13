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

//route resource
Route::resource('/Pelanggans', \App\Http\Controllers\PelangganController::class);
Route::get('/Pelanggans/{id}/edit', 'PelanggansController@edit')->name('Pelanggans.edit');
Route::put('/Pelanggans/{id}', 'PelanggansController@update')->name('Pelanggans.update');
Route::get('/Pelanggans/{id}', 'PelanggansController@destroy')->name('Pelanggans.destroy');
