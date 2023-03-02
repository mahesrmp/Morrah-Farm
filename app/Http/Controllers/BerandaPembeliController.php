<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaPembeliController extends Controller
{
    public function index(){
        return view('pembeli.beranda_index');
    }
}
