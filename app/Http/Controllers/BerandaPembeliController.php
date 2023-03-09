<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaPembeliController extends Controller
{
    public function index(){
        return view('pembeli.beranda_index', [
            'title' => 'Selamat Datang Sayang'
        ]);
    }

    public function product(){
        return view('pembeli.produk_index', [
            'title' => 'Produk Morrah Farm'
        ]);
    }

    public function cart(){
        return view('pembeli.keranjang_index', [
            'title' => 'Keranjang Anda'
        ]);
    }

    public function blog(){
        return view('pembeli.blog_index', [
            'title' => 'Blog Morrah Farm'
        ]);
    }
}
