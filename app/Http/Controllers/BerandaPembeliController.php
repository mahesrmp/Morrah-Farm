<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaPembeliController extends Controller


/* ============== Khusus beranda ============== */
{
    public function index()
    {
        return view('pembeli.beranda_index', [
            'title' => 'Selamat Datang Di Morrah Farm'
        ]);
    }


    /* ============== Khusus Produk ============== */
    public function product()
    {
        $produks = Produk::paginate(10);
        return view('pembeli.produk_index', [
            'title' => 'Produk Morrah Farm'
        ], compact('produks'));
    }

    // public function cart()
    // {
    //     $cartItem = Cart::all();
    //     return view('pembeli.keranjang_index', [
    //         'title' => 'Keranjang Anda'
    //     ], compact('cartItem'));
    // }


    // // Fungsi untuk menambahkan produk ke keranjang
    // public function addToCart($id)
    // {
    //     // Cek apakah user sudah login
    //     if (Auth::check()) {
    //         // Ambil data produk berdasarkan ID
    //         $produks = Produk::find($id);

    //         // Cek apakah produk ada
    //         if ($produks) {
    //             // Cek apakah produk sudah ada di keranjang
    //             $cartItem = Cart::where('produk_id', $id)->where('user_id', Auth::user()->id)->first();
    //             if ($cartItem) {
    //                 // Jika sudah ada, tambahkan jumlah
    //                 $cartItem->jumlah += 1;
    //                 $cartItem->save();
    //             } else {
    //                 // Jika belum ada, buat item baru di keranjang
    //                 $cartItem = new Cart();
    //                 $cartItem->user_id = Auth::user()->id;
    //                 $cartItem->produk_id = $id;
    //                 $cartItem->jumlah = 1;
    //                 $cartItem->save();
    //             }

    //             // Redirect ke halaman keranjang
    //             return redirect()->route('pembeli.keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    //         } else {
    //             // Redirect ke halaman produk jika produk tidak ditemukan
    //             return redirect()->route('pembeli.produk')->with('error', 'Produk tidak ditemukan');
    //         }
    //     } else {
    //         // Redirect ke halaman login jika user belum login
    //         return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
    //     }
    // }


    /* ============== Khusus Blog ============== */
    public function blog()
    {
        $blogs = Blog::all();
        return view('pembeli.blog_index', [
            'title' => "Blog Pembeli"
        ], compact('blogs'));
    }


    /* ============== Khusus About ============== */
    public function about()
    {
        return view('pembeli.about_index', [
            'title' => 'About Morrah Farm'
        ]);
    }



    /* ============== Khusus Kontak ============== */
    public function contact()
    {
        return view('pembeli.contact_index', [
            'title' => 'Contact Us by Email'
        ]);
    }
}