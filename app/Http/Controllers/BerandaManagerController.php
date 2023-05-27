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

    public function laporan(Request $request)
    {

        $bulan = $request->input('bulan');

        $query = DB::table('pesanan_details')
            ->join('pesanans', 'pesanan_details.pesanan_id', '=', 'pesanans.id')
            ->join('produks', 'pesanan_details.produk_id', '=', 'produks.id')
            ->select(
                DB::raw('DATE_FORMAT(pesanans.created_at, "%Y-%m-%d") as bulan'),
                'produks.nama_produk',
                'produks.harga',
                DB::raw('SUM(pesanan_details.jumlah) as jumlah_terjual'),
                DB::raw('SUM(pesanan_details.jumlah * pesanan_details.jumlah_harga) as pendapatan')
            )
            ->where('pesanans.status', 5)
            ->groupBy('bulan', 'produks.nama_produk', 'produks.harga')
            ->orderBy('bulan');

        if ($bulan) {
            $query->where(DB::raw('DATE_FORMAT(pesanans.created_at, "%Y-%m-%d")'), '=', $bulan);
        }

        $laporan = $query->get();

        return view('manager.laporan',[
            'title' => 'Laporan Penjualan'
        ])->with('laporan', $laporan);

    }
}
