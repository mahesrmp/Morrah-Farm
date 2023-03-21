<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaPembeliController extends Controller


/* ============== Khusus beranda ============== */
{
    public function index(){
        return view('pembeli.beranda_index', [
            'title' => 'Selamat Datang Di Morrah Farm'
        ]);
    }


    /* ============== Khusus Produk ============== */
    public function product(){
        $produks = Produk::paginate(10);
        return view('pembeli.produk_index', [
            'title' => 'Produk Morrah Farm'
        ], compact('produks'));
    }

    public function cart(){
        return view('pembeli.keranjang_index', [
            'title' => 'Keranjang Anda'
        ]);
    }


    /* ============== Khusus Blog ============== */
    public function blog(){
        return view('pembeli.blog_index', [
            'title' => 'Blog Morrah Farm'
        ]);
    }


    /* ============== Khusus About ============== */
    public function about(){
        return view('pembeli.about_index', [
            'title' => 'About Morrah Farm'
        ]);
    }



    /* ============== Khusus Kontak ============== */
    public function contact(){
        return view('pembeli.contact_index', [
            'title' => 'Contact Us by Email'
        ]);
    }

}
