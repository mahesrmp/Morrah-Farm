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
        return view('produksi.customer',[
            'data' => $data,
            'title' => 'Daftar Customer Morrah Farm'
        ]);
    }
}
