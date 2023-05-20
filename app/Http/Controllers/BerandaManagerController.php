<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BerandaManagerController extends Controller
{
    public function index()
    {
        $totalPesanans = Pesanan::where('status', 2)->count();
        $totalProducts = Produk::count();
        $totalAllUser = User::count();

        $totalCustomer = User::where('role', 'pembeli')->count();
        $totalPegawai = User::where('role', '<>', 'pembeli')->count();

        $total_harga = Pesanan::select(DB::raw("CAST(SUM(jumlah_harga) as int) as jumlah_harga"))
            ->where('status', '>=', 5)
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('jumlah_harga');

        $total_orderan = Pesanan::select(DB::raw("CAST(count(id) as int) as id"))
            ->where('status', '>=', 5)
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('id');

        $bulan = Pesanan::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulan');

        return view('manager.beranda_index', ['title' => 'Dashboard'], compact('totalPesanans', 'totalProducts', 'totalCustomer', 'totalPegawai', 'total_harga', 'bulan', 'total_orderan'));
    }

    public function customer()
    {

        $data = User::where('role', 'pembeli')->latest()->paginate(15);
        return view('manager.customer', [
            'data' => $data,
            'title' => 'Daftar Customer Morrah Farm'
        ]);
    }

    public function laporan()
    {

        $tanggal = Carbon::now();
        // $tanggal = date('Y-m-d'); // Ganti dengan tanggal yang diinginkan
    $laporan = PesananDetail::join('produks', 'pesanan_details.produk_id', '=', 'produks.id')
        ->select('pesanan_details.created_at as tanggal', 'produks.nama_produk', 'produks.harga', DB::raw('SUM(pesanan_details.jumlah) as total_jumlah'), DB::raw('SUM(pesanan_details.jumlah * produks.harga) as total_harga'))
        ->whereDate('pesanan_details.created_at', $tanggal)
        ->groupBy('pesanan_details.created_at', 'produks.nama_produk', 'produks.harga')
        ->get();

        return view('manager.laporan', [
            'title' => 'Laporan Penjualan',
            'laporan' => $laporan
        ]);


    }
}


