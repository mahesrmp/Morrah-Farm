<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaProduksiController extends Controller
{
    public function index(){
        return view('produksi.beranda_index');
    }
}
