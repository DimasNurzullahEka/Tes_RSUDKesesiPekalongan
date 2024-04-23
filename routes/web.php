<?php

use App\Http\Controllers\Booking_Controller;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::resource('mobil', MobilController::class);
Route::get('/search', [MobilController::class, 'search'])->name('search');
// Route untuk menampilkan daftar peminjaman
Route::get('/bookings', [Booking_Controller::class, 'index'])->name('bookings.index');

// Route untuk menampilkan formulir pemesanan baru
Route::get('/bookings/create', [Booking_Controller::class, 'create'])->name('bookings.create');

// Route untuk menyimpan pemesanan baru ke database
Route::post('/bookings', [Booking_Controller::class, 'store'])->name('bookings.store');

// Tambahkan rute lainnya sesuai kebutuhan
