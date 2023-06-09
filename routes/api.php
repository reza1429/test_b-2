<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

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




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::group(['middleware' => 'auth.jwt'], function () {
Route::get('kendaraan/stok', [KendaraanController::class, 'getStokKendaraan']);
Route::get('kendaraan/penjualan', [KendaraanController::class, 'getPenjualanKendaraan']);
Route::get('kendaraan/belimotor/{id}', [KendaraanController::class, 'BeliMotor']);
Route::get('kendaraan/belimobil/{id}', [KendaraanController::class, 'BeliMobil']);
});