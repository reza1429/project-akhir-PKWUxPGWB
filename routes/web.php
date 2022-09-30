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
    return view('admin.index');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/siswa', function () {
    return view('admin.siswa');
});
Route::get('/obat', function () {
    return view('admin.obat');
});
Route::get('/riwayat', function () {
    return view('admin.riwayat');
});
Route::get('/login', function () {
    return view('login.login');
});
Route::get('/register', function () {
    return view('login.register');
});
