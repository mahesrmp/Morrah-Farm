<?php

use App\Http\Controllers\BerandaManagerController;
use App\Http\Controllers\BerandaPembeliController;
use App\Http\Controllers\BerandaPeternakController;
use App\Http\Controllers\BerandaProduksiController;
use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => 'prevent-back-history'], function () {




    Route::prefix('manager')->middleware(['auth', 'auth.manager'])->group(function () {
        //ini route khusus untuk Manager

        Route::get('beranda', [BerandaManagerController::class, 'index'])->name('manager.beranda');
        Route::resource('user', UserController::class);
    });


    Route::prefix('produksi')->middleware(['auth', 'auth.produksi'])->group(function () {
        //ini route khusus untuk produksi

        Route::get('beranda', [BerandaProduksiController::class, 'index'])->name('produksi.beranda');
    });


    Route::prefix('peternak')->middleware(['auth', 'auth.peternak'])->group(function () {
        //ini route khusus untuk peternak
        Route::get('beranda', [BerandaPeternakController::class, 'index'])->name('peternak.beranda');
    });

    Route::prefix('pembeli')->middleware(['auth', 'auth.pembeli'])->group(function () {
        //ini route khusus untuk pembeli
        Route::get('beranda', [BerandaPembeliController::class, 'index'])->name('pembeli.beranda');
    });


    Route::get('logout', function () {
        Auth::logout();
    });




    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
}); //prevent-back-history