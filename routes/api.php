<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\JabatanController;
use App\Http\Controllers\API\RiwayatPendidikanController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('password', function(){
    return bcrypt('wiwi');
});

    //PEAGAWAI
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/{pegawais}', [PegawaiController::class, 'show']);
//menyimpan dan menambah
Route::post('/pegawai', [PegawaiController::class, 'store']);
//hapus
Route::delete('/pegawai/{pegawais}', [PegawaiController::class, 'destroy']);
//update
Route::patch('/pegawai/{pegawais}', [PegawaiController::class, 'update']);

    //JABATAN
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/{jabatans}', [JabatanController::class, 'show']);
//menyimpan dan menambah
Route::post('/jabatan', [JabatanController::class, 'store']);
//hapus
Route::delete('/jabatan/{jabatans}', [JabatanController::class, 'destroy']);
//update
Route::patch('/jabatan/{jabatans}', [JabatanController::class, 'update']);

    //RIWAYAT PENDIDIKAN
Route::get('/riwayatpendidikan', [RiwayatPendidikanController::class, 'index']);
Route::get('/riwayatpendidikan/{riwayatpendidikans}', [RiwayatPendidikanController::class, 'show']);
//menyimpan dan menambah
Route::post('/riwayatpendidikan', [RiwayatPendidikanController::class, 'store']);
//hapus
Route::delete('/riwayatpendidikan/{riwayatpendidikans}', [RiwayatPendidikanController::class, 'destroy']);
//update
Route::patch('/riwayatpendidikan/{riwayatpendidikans}', [RiwayatPendidikanController::class, 'update']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router){
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});