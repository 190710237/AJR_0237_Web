<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PemilikMobilController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TransaksiController;

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeteranganJadwalController;

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
})->name('welcome');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/post', [LoginController::class, 'login'])->name('login-post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/post', [RegisterController::class, 'register'])->name('register-post');

Route::group(['middleware' => ['auth', 'access:manager,admin,cs,customer']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [CustomerController::class, 'index'])->name('profile');
    Route::get('/profile/edit/{id}', [CustomerController::class, 'edit'])->name('edit-profile');
    Route::post('/profile/update/{id}', [CustomerController::class, 'update'])->name('update-profile');

    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');
    Route::get('/mobil/create', [MobilController::class, 'create'])->name('create-mobil');
    Route::post('/mobil/store', [MobilController::class, 'store'])->name('store-mobil');
    Route::get('/mobil/edit/{id}', [MobilController::class, 'edit'])->name('edit-mobil');
    Route::post('/mobil/update/{id}', [MobilController::class, 'update'])->name('update-mobil');
    Route::get('/mobil/delete/{id}', [MobilController::class, 'destroy'])->name('delete-mobil');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('create-pegawai');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('store-pegawai');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('edit-pegawai');
    Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('update-pegawai');
    Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('delete-pegawai');

    Route::get('/driver', [DriverController::class, 'index'])->name('driver');
    Route::get('/driver/create', [DriverController::class, 'create'])->name('create-driver');
    Route::post('/driver/store', [DriverController::class, 'store'])->name('store-driver');
    Route::get('/driver/edit/{id}', [DriverController::class, 'edit'])->name('edit-driver');
    Route::post('/driver/update/{id}', [DriverController::class, 'update'])->name('update-driver');
    Route::get('/driver/delete/{id}', [DriverController::class, 'destroy'])->name('delete-driver');

    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('create-jadwal');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('store-jadwal');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('edit-jadwal');
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('update-jadwal');
    Route::get('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('delete-jadwal');

    Route::get('/pemilik', [PemilikMobilController::class, 'index'])->name('pemilik');
    Route::get('/pemilik/create', [PemilikMobilController::class, 'create'])->name('create-pemilik');
    Route::post('/pemilik/store', [PemilikMobilController::class, 'store'])->name('store-pemilik');
    Route::get('/pemilik/edit/{id}', [PemilikMobilController::class, 'edit'])->name('edit-pemilik');
    Route::post('/pemilik/update/{id}', [PemilikMobilController::class, 'update'])->name('update-pemilik');
    Route::get('/pemilik/delete/{id}', [PemilikMobilController::class, 'destroy'])->name('delete-pemilik');

    Route::get('/promo', [PromoController::class, 'index'])->name('promo');
    Route::get('/promo/create', [PromoController::class, 'create'])->name('create-promo');
    Route::post('/promo/store', [PromoController::class, 'store'])->name('store-promo');
    Route::get('/promo/edit/{id}', [PromoController::class, 'edit'])->name('edit-promo');
    Route::post('/promo/update/{id}', [PromoController::class, 'update'])->name('update-promo');
    Route::get('/promo/delete/{id}', [PromoController::class, 'destroy'])->name('delete-promo');

    Route::get('/sewa-mobil', [MobilController::class, 'index_sewa'])->name('sewa-mobil');

    Route::get('/detail-mobil/{id}', [MobilController::class, 'show'])->name('detail-mobil');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/detail-transaksi/{id}', [TransaksiController::class, 'show'])->name('detail-transaksi');
    Route::get('/transaksi/bayar/{id}', [TransaksiController::class, 'bayar'])->name('bayar-transaksi');
    Route::post('/transaksi/upload/{id}', [TransaksiController::class, 'upload_pembayaran'])->name('upload-pembayaran');

    Route::get('/transaksi-cs', [TransaksiController::class, 'index_cs'])->name('transaksi-cs');
    Route::get('/detail-transaksi-cs/{id}', [TransaksiController::class, 'show_cs'])->name('detail-transaksi-cs');
    
    Route::get('/transaksi/create/{id}', [TransaksiController::class, 'create'])->name('create-transaksi');
    Route::post('/transaksi/harga/{id}', [TransaksiController::class, 'cek_harga'])->name('harga-transaksi');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('store-transaksi');
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('edit-transaksi');
    Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('update-transaksi');
    Route::get('/transaksi/delete/{id}', [TransaksiController::class, 'destroy'])->name('delete-transaksi');
});
