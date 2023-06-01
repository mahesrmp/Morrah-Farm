<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\KerbauController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AkunPembeliController;
use App\Http\Controllers\BerandaManagerController;
use App\Http\Controllers\BerandaPembeliController;
use App\Http\Controllers\PesananPembeliController;
use App\Http\Controllers\ProduksiProdukController;
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
        Route::get('/akun-manager/{id}/edit', [AdminAkunSettingController::class, 'edit'])->name('akun-manager.edit');
        Route::put('/akun-manager/{id}', [AdminAkunSettingController::class, 'update'])->name('akun-manager.update');

        //BLOGS
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.manager');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/post', [BlogController::class, 'store'])->name('blog.store');
        // Route untuk menampilkan halaman edit blog
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');

        // Route untuk menghandle aksi update blog
        Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');

        // Route untuk menghandle aksi hapus blog
        Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

        Route::get('/order-details', [PesanController::class, 'orderDetails'])->name('order.detail');
        Route::get('/confirm-order-process/{id}', [PesanController::class, 'confirmOrdersProcess'])->name('order.confirm.process');
        Route::get('/result-file/{id}', [PesanController::class, 'resultFile'])->name('result.file');

        Route::get('/confirm-photo', [PesanController::class, 'confirmPhoto'])->name('confirm.photo');
        Route::post('/confirm-photo-process/{id}', [PesanController::class, 'confirmPhotoProcess'])->name('confirm.photo.process');

        Route::get('/tracking', [PesanController::class, 'tracking'])->name('order.tracking');
        Route::get('/form-tracking/{id}', [PesanController::class, 'formTracking'])->name('form.tracking');
        Route::post('/form-tracking-process/{id}', [PesanController::class, 'formTrackingProcess'])->name('form.tracking.process');

        Route::get('/order-finish', [PesanController::class, 'orderResult'])->name('order.finish');
        Route::get('/order-finish/{id}', [PesanController::class, 'orderResultUpload'])->name('order.finish.upload');

        Route::get('kerbau', [BerandaManagerController::class, 'kerbau'])->name('manager.kerbau');
        Route::get('susu', [BerandaManagerController::class, 'susu'])->name('manager.susu');
        Route::get('/susu/search', 'BerandaManagerController@sususearch')->name('susu.search');
        Route::get('/kerbau/search', 'BerandaManagerController@kerbausearch')->name('kerbau.search');

    });



    //PRODUKSI
    Route::prefix('produksi')->middleware(['auth', 'auth.produksi'])->group(function () {
        //ini route khusus untuk produksi
        Route::get('beranda', [BerandaProduksiController::class, 'index'])->name('produksi.beranda');
        Route::get('customer', [BerandaProduksiController::class, 'customer'])->name('produksi.customer');
     //   Route::resource('produk', ProduksiProdukController::class);
    });

    //PETERNAK
    Route::prefix('peternak')->middleware(['auth', 'auth.peternak'])->group(function () {
        //ini route khusus untuk peternak
        Route::get('beranda', [BerandaPeternakController::class, 'index'])->name('peternak.beranda');
         //Route::get('peternak', [KerbauController::class, 'index'])->name('peternak.kerbau.blade');
        // Route::get('peternak', [SusuPeternakController::class, 'index'])->name('peternak.susu.blade');
        Route::resource('kerbau', KerbauController::class);
        Route::resource('susu', SusuController::class);

    });

    // Route::prefix('pembeli')->middleware(['auth', 'auth.pembeli'])->group(function () {
    //     //ini route khusus untuk pembeli
    //     Route::get('beranda', [BerandaPembeliController::class, 'index'])->name('pembeli.beranda');
    // });

    //USER
    Route::get('/beranda', [BerandaPembeliController::class, 'index'])->name('pembeli.beranda');
    Route::get('produk', [BerandaPembeliController::class, 'product'])->name('pembeli.produk');
    // Route::get('detailproduk/{id}', [PesananPembeliController::class, 'index'])->name('pembeli.detailproduk');
    // Route::post('pesan/{id}', [PesananPembeliController::class, 'pesan']);

    Route::get('blog', [BerandaPembeliController::class, 'blog'])->name('pembeli.blog');
    Route::get('about', [BerandaPembeliController::class, 'about'])->name('pembeli.about');
    Route::get('contact', [BerandaPembeliController::class, 'contact'])->name('pembeli.contact');

    // Routing untuk menampilkan form edit user
    Route::get('/akun-pembeli/{id}', [AkunPembeliController::class, 'edit'])->name('akun-pembeli.edit');

    // Routing untuk memperbarui data user
    Route::put('/akun-pembeli/{id}', [AkunPembeliController::class, 'update'])->name('akun-pembeli.update');

    // Route::get('/email', [EmailController::class, 'kirim']);
    // Route::get('/attach', [EmailController::class, 'attach']);


    Route::get('/pembeli/keranjang/{id}', [PesananPembeliController::class, 'index'])->name('pembeli.pesan.produk');
    Route::post('pesan-process/{id}', [PesananPembeliController::class, 'pesan']);
    Route::get('keranjang', [PesananPembeliController::class, 'cart'])->name('pembeli.keranjang');
    Route::delete('check-out/{id}', [PesananPembeliController::class, 'delete']);
    Route::get('konfirmasi-check-out', [PesananPembeliController::class, 'konfirmasi']);


    Route::get('/history/{id}', [HistoryController::class, 'historyDetail'])->name('history');
    Route::get('pesanan', [HistoryController::class, 'index'])->name('history.detail');
    Route::get('pesanan/{id}', [HistoryController::class, 'detail']);

    Route::get('/upload/{id}', [HomeController::class, 'upload'])->name('upload');
    Route::post('/upload-process/{id}', [HomeController::class, 'uploadProcess'])->name('upload.process');

    Route::get('/review', [ReviewController::class, 'index'])->name('review');
    Route::get('/berikan-ulasan/{id}', [ReviewController::class, 'store'])->name('berikan.ulasan');
    Route::post('/berikan-ulasan-process/{id}', [ReviewController::class, 'storeReviewProcess'])->name('berikan.ulasan.process');


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