<?php

use App\Http\Controllers\UserAuth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginSiswaController;
use App\Http\Controllers\UserController;
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
Route::get('/', function () {
    return view('login.login');
});
// admin
Route::get('register', [UserAuth::class, 'register'])->name('register');
Route::post('register', [UserAuth::class, 'register_action'])->name('register.action');
Route::get('login', [UserAuth::class, 'login'])->name('login');
Route::post('login', [UserAuth::class, 'login_action'])->name('login.action');

// siswa
Route::get('register_lainnya', [LoginSiswaController::class, 'register_siswa'])->name('register_lainnya');
Route::post('register_lainnya', [LoginSiswaController::class, 'register_siswa_action'])->name('register_siswa.action');
Route::get('login_lainnya', [LoginSiswaController::class, 'login_siswa'])->name('login_lainnya');
Route::post('login_lainnya', [LoginSiswaController::class, 'login_siswa_action'])->name('login_siswa.action');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['checkrole:0'])->group(function(){
        // Route::get('/', function () {
            //     return view('admin.dashboard');
            // });
            // Route::resource('', [DashboardController::class, 'index']);
            // Route::resource('siswa', [PasienController::class, 'index']);
            // Route::resource('guru', [GuruController::class, 'index']);
            // Route::resource('karyawan', [KaryawanController::class, 'index']);
            // Route::resource('riwayat', [HistoryController::class, 'index']);
            Route::get('dashboard', [DashboardController::class, 'index']);
            Route::resource('siswa', PasienController::class);
            Route::get('siswa/create/{id_siswa}', [PasienController::class, 'create']);
            Route::get('siswa/{id_siswa}/hapus', [PasienController::class, 'hapus'])->name('siswa.hapus');
            Route::resource('guru', GuruController::class);
            Route::get('guru/create/{id_guru}', [GuruController::class, 'create']);
            Route::get('guru/{id_guru}/hapus', [GuruController::class, 'hapus'])->name('guru.hapus');
            Route::resource('karyawan', KaryawanController::class);
            Route::get('karyawan/create/{id_karyawan}', [KaryawanController::class, 'create']);
            Route::get('karyawan/{id_karyawan}/hapus', [KaryawanController::class, 'hapus'])->name('karyawan.hapus');
            Route::resource('riwayat', HistoryController::class);
            
            // admin
            
        });
        
        Route::middleware(['checkrole:1'])->group(function(){
            
            Route::get('home_siswa', [UserController::class, 'siswa'])->name('home_siswa');
            // siswa
            // Route::get('password_siswa', [LoginSiswaController::class, 'password_siswa'])->name('password_siswa');
            // Route::post('password_siswa', [LoginSiswaController::class, 'password_siswa_action'])->name('password_siswa.action');
            // Route::get('logout_siswa', [LoginSiswaController::class, 'logout_siswa'])->name('logout_siswa');
            // Route::get('password_siswa', [UserAuth::class, 'password'])->name('password_siswa');
            // Route::post('password_siswa', [UserAuth::class, 'password_action'])->name('password_siswa.action');
            // Route::get('logout_siswa', [UserAuth::class, 'logout'])->name('logout_siswa');
            
        });
        Route::middleware(['checkrole:2'])->group(function(){
            
            Route::get('home_guru', [UserController::class, 'guru'])->name('home_guru');
            // siswa
            // Route::get('password_siswa', [LoginSiswaController::class, 'password_siswa'])->name('password_siswa');
            // Route::post('password_siswa', [LoginSiswaController::class, 'password_siswa_action'])->name('password_siswa.action');
            // Route::get('logout_siswa', [LoginSiswaController::class, 'logout_siswa'])->name('logout_siswa');
            // Route::get('password_siswa', [UserAuth::class, 'password'])->name('password_siswa');
            // Route::post('password_siswa', [UserAuth::class, 'password_action'])->name('password_siswa.action');
            // Route::get('logout_siswa', [UserAuth::class, 'logout'])->name('logout_siswa');
            
        });
        Route::middleware(['checkrole:3'])->group(function(){
            
            Route::get('home_karyawan', [UserController::class, 'karyawan'])->name('home_karyawan');
            // siswa
            // Route::get('password_siswa', [LoginSiswaController::class, 'password_siswa'])->name('password_siswa');
            // Route::post('password_siswa', [LoginSiswaController::class, 'password_siswa_action'])->name('password_siswa.action');
            // Route::get('logout_siswa', [LoginSiswaController::class, 'logout_siswa'])->name('logout_siswa');
            // Route::get('password_siswa', [UserAuth::class, 'password'])->name('password_siswa');
            // Route::post('password_siswa', [UserAuth::class, 'password_action'])->name('password_siswa.action');
            // Route::get('logout_siswa', [UserAuth::class, 'logout'])->name('logout_siswa');
            
        });
        Route::get('password', [UserAuth::class, 'password'])->name('password');
        Route::post('password', [UserAuth::class, 'password_action'])->name('password.action');
        Route::get('logout', [UserAuth::class, 'logout'])->name('logout');
});
// Auth::routes();

// Route::get('s_siswa', 'PostController@search_siswa');
Route::get('/s_siswa', [PostController::class, 'search_siswa']);
Route::get('/s_guru', [PostController::class, 'search_guru']);
Route::get('/s_karyawan', [PostController::class, 'search_karyawan']);
// Route::get('siswa', Counter::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
