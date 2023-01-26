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

// use Illuminate\Routing\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::resource('barangs', 'BarangController')->middleware('auth');
Route::resource('pelanggans', 'PelangganController')->middleware('auth');
Route::resource('suppliers', 'SupplierController')->middleware('auth');
Route::resource('penjualans', 'PenjualanController')->middleware('auth');
Route::resource('pembelians', 'PembelianController')->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
