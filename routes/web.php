<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LaporanController;

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
    return view('home', [
        "title" => "home"
    ]);
});
Route::get('/home', function () {
    return view('home');
});



// ->name('login')->middleware('auth')

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/owner', [DashboardController::class, 'indexowner']);
Route::get('/waiter', [DashboardController::class, 'indexdapur']);
Route::get('/tambahmenu', [MenuController::class, 'tambahmenu']);
Route::post('/insertmenu', [MenuController::class, 'insertmenu']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/about', [MenuController::class, 'index2']);
Route::get('/transaksi', [KeranjangController::class, 'index']);
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporanowner', [LaporanController::class, 'indexowner']);
Route::post('/laporan/generate', [LaporanController::class, 'generate']);
Route::post('/laporan/generate/owner', [LaporanController::class, 'generateowner']);

Route::get('/tampilkandata/{id}', [MenuController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [MenuController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('delete');

Route::post('/simpan-keranjang', [KeranjangController::class, 'saveKeranjang']);

Route::get('/print-nota/{created_at}', [KeranjangController::class, 'printNota'])->name('print.nota');

Route::delete('/delete-keranjang/{index}', [KeranjangController::class, 'hapusItem']);