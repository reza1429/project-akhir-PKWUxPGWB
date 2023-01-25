<?php

use App\Http\Controllers\UserAuth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Counter;
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
    // Route::get('/', function () {
    //     return view('admin.dashboard');
    // });
    // Route::resource('', [DashboardController::class, 'index']);
    // Route::resource('siswa', [PasienController::class, 'index']);
    // Route::resource('guru', [GuruController::class, 'index']);
    // Route::resource('karyawan', [KaryawanController::class, 'index']);
    // Route::resource('riwayat', [HistoryController::class, 'index']);
    Route::get('', [DashboardController::class, 'index']);
    Route::get('siswa', [PasienController::class, 'index']);
    Route::get('guru', [GuruController::class, 'index']);
    Route::get('karyawan', [KaryawanController::class, 'index']);
    Route::get('riwayat', [HistoryController::class, 'index']);

    Route::get('password', [UserAuth::class, 'password'])->name('password');
    Route::post('password', [UserAuth::class, 'password_action'])->name('password.action');
    Route::get('logout', [UserAuth::class, 'logout'])->name('logout');
});

// Auth::routes();

// Route::get('s_siswa', 'PostController@search_siswa');
Route::get('/s_siswa', [PostController::class, 'search_siswa']);
// Route::get('siswa', Counter::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
