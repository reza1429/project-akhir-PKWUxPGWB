<?php

use App\Http\Controllers\UserAuth;
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

Route::get('register', [UserAuth::class, 'register'])->name('register');
Route::post('register', [UserAuth::class, 'register_action'])->name('register.action');
Route::get('login', [UserAuth::class, 'login'])->name('login');
Route::post('login', [UserAuth::class, 'login_action'])->name('login.action');

Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
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
    Route::get('password', [UserAuth::class, 'password'])->name('password');
    Route::post('password', [UserAuth::class, 'password_action'])->name('password.action');
    Route::get('logout', [UserAuth::class, 'logout'])->name('logout');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
