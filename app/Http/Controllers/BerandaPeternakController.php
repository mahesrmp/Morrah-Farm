<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaPeternakController extends Controller
{
    public function index(){
        return view('peternak.beranda_index');
    }
}
