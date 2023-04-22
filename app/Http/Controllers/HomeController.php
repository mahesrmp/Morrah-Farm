<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'title' => 'selamat datang'
        ]);
    }

    public function produk()
    {
        return view();
    }

    public function upload($id)
    {
        $dataPesan = Pesanan::find($id);
        return view('pembeli.upload', [
            "title" => 'Upload Gambar'
        ], compact('dataPesan'));
    }

    public function uploadProcess(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'gambar' => 'required',
        ]);

        $dataPesanan = Pesanan::where('id', $id)->first();

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('productimage/', $request->file('gambar')->getClientOriginalName());
            $dataPesanan->gambar = $request->file('gambar')->getClientOriginalName();
            $dataPesanan->status = 2;
            $dataPesanan->update();
        }

        return redirect()->route('history.detail')->with('toast_success', 'Gambar sudah berhasil dikirim');
    }
}
