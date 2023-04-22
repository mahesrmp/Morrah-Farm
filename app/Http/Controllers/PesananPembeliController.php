<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;

class PesananPembeliController extends Controller
{

    public function index($id)
    {
        $produk = Produk::where('id', $id)->first();
        $jumlah = PesananDetail::all();

        return view('pembeli.produk_detail', [
            'title' => 'Detail Pemesanan Produk'
        ], compact('produk', 'jumlah'));
    }


    public function pesan(Request $request, $id)
    {
        $request->input();
        $produk     = Produk::where('id', $id)->first();
        $tanggal    = Carbon::now();

        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek order detail

        // Validate whether it exceeds the stock quantity
        if ($request->jumlah_pesan > $produk->stok) {
            return redirect('pembeli/keranjang/' . $id)->with('toast_error', 'Anda sudah melebihi batas stok');
        } elseif (!empty($cek_pesanan)) {
            $cek_pesanan_detail   = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $cek_pesanan->id)->first();
            if (!empty($cek_pesanan_detail)) {
                if ($request->jumlah_pesan + $cek_pesanan_detail->jumlah > $produk->stok) {
                    return redirect()->back()->with('toast_info', 'Stok yang ada dipesanan anda, sudah melebihi stok yang tersedia. Silahkan cek kerangjang anda!');
                }
            }
        }

        // Cek Validation
        $cek_order = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // Save to database pesanan
        if (empty($cek_order)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(1000, 9999);
            $pesanan->address = $request->address;
            $pesanan->produk_id = $produk->id;
            $pesanan->jumlah_pesan = $request->jumlah_pesan;
            $pesanan->save();
        }

        // Save to database pesanan_detail

        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek order detail
        $cek_pesanan_detail   = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->produk_id = $produk->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $produk->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail   = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah         = $pesanan_detail->jumlah + $request->jumlah_pesan;

            // Harga sekarang
            $harga_pesanan_detail_baru      = $produk->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga   = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // total number
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $produk->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('keranjang')->with('toast_success', 'Berhasil Menambah Keranjang');
    }

    public function cart()
    {
        
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pembeli.keranjang_index', [
            "title" => 'Check Out'
        ], compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        // Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('keranjang')->with('toast_error', 'Berhasil Menghapus dari keranjang');;
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            return redirect()->route('akun-pembeli.edit', $user)->with('toast_error', 'Lengkapi Alamat Anda');
        }

        if(empty($user->nohp))
        {
            return redirect()->route('akun-pembeli.edit', $user)->with('toast_error', 'Lengkapi No Hp Anda');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
            $produk->stok = $produk->stok-$pesanan_detail->jumlah;
            $produk->update();
        }


        return redirect('history/'.$pesanan_id)->with('success', 'CheckOut berhasil silahkan lakukan pembayaran');
    }
}
