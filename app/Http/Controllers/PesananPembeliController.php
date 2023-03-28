<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use Auth;

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


    public function pesan(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();

        $pesanan = new Pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status = 0;
        $pesanan->jumlah_harga = $produk->harga*$request->jumlah_pesan;
        $pesanan->save();

        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        $pesanan_detail = new PesananDetail;
        $pesanan_detail->produk_id = $produk->id;
        $pesanan_detail->pesanan_id = $pesanan_baru->id;
        $pesanan_detail->jumlah = $request->jumlah_pesanan;
        $pesanan_detail->jumlah_harga = $produk->harga*$request->jumlah_pesanan;
        $pesanan_detail->save();

        return redirect()->route('home');

    }
}
