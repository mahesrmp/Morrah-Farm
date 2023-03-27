<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Carbon\Carbon;

class PesananPembeliController extends Controller
{

    private $routePrefix = 'pesanan';
    public function index($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('pembeli.produk_detail', [
            'title' => 'Detail Produk'
        ], compact('produk'));
    }


    public function pesan(Request $request)
    {
        dd('mantap');
    }
}
