<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use DB;
use Illuminate\Http\Request;


class BerandaManagerController extends Controller
{
    public function index(){
        $totalPesanans = Pesanan::count();
        $totalProducts = Produk::count();
        $totalAllUser = User::count();

        $totalCustomer = User::where('role','pembeli')->count();
        $totalPegawai = User::where('role', '<>', 'pembeli')->count(); 

        $total_harga = Pesanan::select(DB::raw("CAST(SUM(jumlah_harga) as int) as jumlah_harga"))
        ->where('status', '>=', 5)
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('jumlah_harga');

        $bulan = Pesanan::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('manager.beranda_index',['title' => 'Dashboard'], compact('totalPesanans', 'totalProducts', 'totalCustomer', 'totalPegawai', 'total_harga', 'bulan'));
    }

    public function customer(){

        $data = User::where('role', 'pembeli')->latest()->paginate(15);
        return view('manager.customer',[
            'data' => $data,
            'title' => 'Daftar Customer Morrah Farm'
        ]);
    }
}
