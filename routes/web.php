<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfiguracionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TpvController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'admin'], function () {
    Route::get('configuracion',[ConfiguracionController::class,'index']);
    Route::get('terminal',[TpvController::class,'index']);
    Route::get('ventas',[VentaController::class,'index']);
});


