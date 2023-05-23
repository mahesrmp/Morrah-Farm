<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\HomeSlider;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaPembeliController extends Controller


/* ============== Khusus beranda ============== */
{
    public function index()
    {
        $slidershome = HomeSlider::all();
        return view('pembeli.beranda_index', [
            'title' => 'Selamat Datang Di Morrah Farm',
            'sliders' => $slidershome
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

    /* ============== Khusus Blog ============== */
    public function blog()
    {
        $blogs = Blog::all();
        return view('pembeli.blog_index', [
            'title' => "Blog Pembeli"
        ], compact('blogs'));
    }

    public function blogdetail($id)
    {
        $products = Produk::take(3)->get();
        $blog = Blog::where('id', $id)->first();
        return view('pembeli.detail_blog', [
            'title' => 'Detail Blog',
            'blog' => $blog,
            'produks' => $products
        ]);
    }
    /* ============== Khusus About ============== */
    public function about()
    {
        return view('pembeli.about_index', [
            'title' => 'About Morrah Farm'
        ]);
    }

        /* ============== Khusus visi dan misi ============== */
        public function visimisi()
        {
            return view('pembeli.visimisi', [
                'title' => 'Visi dan Misi Morrah Farm'
            ]);
        }

        public function galeri()
        {
            return view('pembeli.galeri', [
                'title' => 'Galeri Morrah Farm'
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
