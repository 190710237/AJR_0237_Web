<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::post('login_api', 'Api\AuthController@login_api');

Route::group(['middleware' => 'auth:api'], function() {
    // Customer
    Route::get('customer', 'CustomerController@index');
    Route::get('customer/{id}', 'CustomerController@show');
    Route::post('customer', 'CustomerController@store');
    Route::put('customer/{id}', 'CustomerController@update');
    Route::delete('customer/{id}', 'CustomerController@destroy');

    Route::post('logout', 'Api\AuthController@logout');
    Route::post('updatePassword', 'Api\AuthController@updatePassword');
    Route::get('account', 'Api\AuthController@show');
});

Route::get('/transaksis/laporan/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanTransaksi']);
Route::get('/transaksis/laporan-customer/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanCustomer']);
Route::get('/transaksis/laporan-driver/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanDriver']);
Route::get('/transaksis/laporan-performa/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanPerforma']);
Route::get('/transaksis/laporan-mobil/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanMobil']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
