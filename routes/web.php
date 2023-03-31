<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AkunPembeliController;
use App\Http\Controllers\BerandaManagerController;
use App\Http\Controllers\BerandaPembeliController;
use App\Http\Controllers\PesananPembeliController;
use App\Http\Controllers\BerandaPeternakController;
use App\Http\Controllers\BerandaProduksiController;
use App\Http\Controllers\AdminAkunSettingController;

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


    //MANAGER
    Route::prefix('manager')->middleware(['auth', 'auth.manager'])->group(function () {
        //ini route khusus untuk Manager

        Route::get('beranda', [BerandaManagerController::class, 'index'])->name('manager.beranda');
        Route::get('customer', [BerandaManagerController::class, 'customer'])->name('manager.customer');
        Route::resource('user', UserController::class);
        Route::resource('produk', ProdukController::class);

        Route::get('/account', [AdminAkunSettingController::class, 'index'])->name('manager.account');
        Route::get('/users/{id}/edit', [AdminAkunSettingController::class, 'edit'])->name('manager.edit');
        Route::put('/users/{id}', [AdminAkunSettingController::class, 'update'])->name('manager.update');
    });



    //PRODUKSI
    Route::prefix('produksi')->middleware(['auth', 'auth.produksi'])->group(function () {
        //ini route khusus untuk produksi

        Route::get('beranda', [BerandaProduksiController::class, 'index'])->name('produksi.beranda');
    });

    //PETERNAK
    Route::prefix('peternak')->middleware(['auth', 'auth.peternak'])->group(function () {
        //ini route khusus untuk peternak
        Route::get('beranda', [BerandaPeternakController::class, 'index'])->name('peternak.beranda');
    });

    // Route::prefix('pembeli')->middleware(['auth', 'auth.pembeli'])->group(function () {
    //     //ini route khusus untuk pembeli
    //     Route::get('beranda', [BerandaPembeliController::class, 'index'])->name('pembeli.beranda');
    // });

    //USER
    Route::get('/beranda', [BerandaPembeliController::class, 'index'])->name('pembeli.beranda');
    Route::get('produk', [BerandaPembeliController::class, 'product'])->name('pembeli.produk');
    Route::get('detailproduk/{id}', [PesananPembeliController::class, 'index'])->name('pembeli.detailproduk');
    Route::post('pesan/{id}', [PesananPembeliController::class, 'pesan']);
    Route::get('keranjang', [BerandaPembeliController::class, 'cart'])->name('pembeli.keranjang');
    Route::get('blog', [BerandaPembeliController::class, 'blog'])->name('pembeli.blog');
    Route::get('about', [BerandaPembeliController::class, 'about'])->name('pembeli.about');
    Route::get('contact', [BerandaPembeliController::class, 'contact'])->name('pembeli.contact');

    // Routing untuk menampilkan form edit user
    Route::get('/akun-pembeli/{id}/edit', [AkunPembeliController::class, 'edit'])->name('akun-pembeli.edit');

    // Routing untuk memperbarui data user
    Route::put('/akun-pembeli/{id}', [AkunPembeliController::class, 'update'])->name('akun-pembeli.update');

    // Route::get('/email', [EmailController::class, 'kirim']);
    // Route::get('/attach', [EmailController::class, 'attach']);





    // Route::get('logout', function () {
    //     Auth::logout();
    // });
    Route::get('logout', [LoginController::class, 'logout']);



    Route::get('/', function () {
        return view('pembeli.beranda_index', [
            'title' => 'Selamat Datang Ssayang'
        ]);
    });

    Auth::routes();

    // Route::get('/beranda', [BerandaPembeliController::class, 'index'])->name('pembeli.beranda');
}); //prevent-back-history