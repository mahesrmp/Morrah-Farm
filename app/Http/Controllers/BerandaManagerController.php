<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use App\Models\Kerbau;
use App\Models\Susu;
use DB;
use Illuminate\Http\Request;


class BerandaManagerController extends Controller
{
    public function index(){
        $totalPesanans = Pesanan::where('status', 2)->count();
        $totalProducts = Produk::count();
        $totalAllUser = User::count();

        $totalCustomer = User::where('role','pembeli')->count();
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

        return view('manager.beranda_index',['title' => 'Dashboard'], compact('totalPesanans', 'totalProducts', 'totalCustomer', 'totalPegawai', 'total_harga', 'bulan', 'total_orderan'));
    }

    public function customer(){

        $data = User::where('role', 'pembeli')->latest()->paginate(15);
        return view('manager.customer',[
            'data' => $data,
            'title' => 'Daftar Customer Morrah Farm'
        ]);
    }

    public function kerbau()
    {
        $kerbaus = Kerbau::all();
        return view('manager.kerbau',[
            'title' => 'Laporan Data Kerbau Jantan',
            'kerbaus' => $kerbaus
        ]);
    }
    public function susu()
    {
        $susus = Susu::all();
        return view('manager.susu',[
            'title' => 'Laporan Data Susu',
            'susus' => $susus
        ]);
    }

    public function sususearch(Request $request)
{
    $date = $request->input('date');

    if ($date) {
        $susus = Susu::whereDate('tanggal', $date)
                     ->get(['pelapor', 'jumlah_susu', 'tanggal']);
    } else {
        $susus = Susu::all(['pelapor', 'jumlah_susu', 'tanggal']);
    }

    return view('manager.susu', [
        'title' => 'Laporan Data Susu',
        'susus' => $susus
    ]);
}

public function kerbausearch(Request $request)
{
    $date = $request->input('date');

    if ($date) {
        $kerbaus = kerbau::whereDate('tanggal', $date)
                     ->get(['pelapor', 'jumlah_kerbau', 'tanggal']);
    } else {
        $kerbaus = Kerbau::all(['pelapor', 'jumlah_kerbau', 'tanggal']);
    }

    return view('manager.kerbau', [
        'title' => 'Laporan Data Kerbau',
        'kerbaus' => $kerbaus
    ]);
}

}
