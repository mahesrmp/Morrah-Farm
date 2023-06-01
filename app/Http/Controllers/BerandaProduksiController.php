<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BerandaProduksiController extends Controller
{
    public function index(){
        return view('produksi.beranda_index',[
            'title' => 'Dahsboard Produksi'
        ]);
    }

    public function customer(){

        $data = User::where('role', 'pembeli')->latest()->paginate(15);
        $models = User::with('pembeli', 'user')->latest()->paginate(20);
        return view('produksi.customer',[
            'models' => $models,
            'data' => $data,
            'title' => 'Daftar Customer Morrah Farm'
        ]);
    }
}
