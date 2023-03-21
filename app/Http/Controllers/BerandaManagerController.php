<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;


class BerandaManagerController extends Controller
{
    public function index(){
        $totalProducts = Produk::count();
        $totalAllUser = User::count();

        $totalCustomer = User::where('role','pembeli')->count();
        $totalPegawai = User::where('role', '<>', 'pembeli')->count(); 

        return view('manager.beranda_index',['title' => 'Dashboard'], compact('totalProducts', 'totalCustomer', 'totalPegawai'));
    }

    public function customer(){

        $data = User::where('role', 'pembeli')->latest()->paginate(15);
        return view('manager.customer',[
            'data' => $data,
            'title' => 'Daftar Customer Morrah Farm'
        ]);
    }
}
