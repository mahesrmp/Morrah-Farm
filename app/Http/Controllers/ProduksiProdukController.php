<?php

namespace App\Http\Controllers;

use App\Models\ImageDetail;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use \App\Models\Produk as Model;
use App\Models\Produk;
use App\Models\Rating;
use App\Traits\HasFormatRupiah;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RealRashid\SweetAlert\Facades\Alert;
use Redirect;

class ProduksiProdukController extends Controller
{

    use HasFormatRupiah;
    use HasFactory;

    private $viewIndex = 'produk_index';
    private $viewCreate = 'produk_form';
    private $viewEdit = 'produk_form';
    private $viewShow = 'produk_show';
    private $routePrefix = 'produksiproduk';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $produks = Model::all();
        // $rating = Rating::where('produk_id', $produks->id)->get;
        return view('produksi.produk.' . $this->viewIndex, [
            'produks' => $produks,
            // 'rating' => $rating,
            'routePrefix'   => $this->routePrefix,
            'title'         => 'Produk Morrah Farm',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model'     => new Model(),
            'method'    => 'POST',
            'route'     => $this->routePrefix . '.store',
            'button'    => 'SIMPAN',
            'title'     => 'Form tambah produk',
        ];

        return view('produksi.produk.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $produks = Produk::create([
            'nama_produk' => $request->nama_produk,
            'gambar' => $request->gambar,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan
        ]);

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('productimage', $request->file('gambar')->getClientOriginalName());
            $produks->gambar = $request->file('gambar')->getClientOriginalName();
            $produks->save();
        }
        Alert::success('Yeee', 'Berhasil Menambahkan Produk');
        return redirect()->route('produksiproduk.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $produk = Produk::where('id', $id)->first();
        $ratings = Rating::where('produk_id', $produk->id)->get();
        $rating_sum = Rating::where('produk_id', $produk->id)->sum('rating');
        $user_rating = Rating::where('produk_id', $produk->id)->where('user_id', Auth::id())->first();
        $reviews = Rating::where('produk_id', $produk->id)->get();
        if ($ratings->count() > 0) {
            $rating_value =  $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        $jumlah = PesananDetail::all();
        return view('manager.' . $this->viewShow, [
            'produk' => $produk,
            'title' => 'Detail Data Produk',
            'ratings' => $ratings,
            'rating_sum' => $rating_sum,
            'rating_value' => $rating_value,
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks = [
            'model'     => Model::findOrFail($id),
            'method'    => 'PUT',
            'route'     => [$this->routePrefix . '.update', $id,],
            'button'    => 'UPDATE',
            'title'     => 'Form Update data Produk',
        ];

        return view('produksi.produk.' . $this->viewEdit, $produks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_produk' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $product = Produk::findOrFail($id); // Menggunakan findOrFail agar memberikan 404 Not Found jika produk tidak ditemukan
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->keterangan = $request->keterangan;

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('productimage', $request->file('gambar')->getClientOriginalName());
            $product->gambar = $request->file('gambar')->getClientOriginalName();
        }

        // Perbarui stok hanya jika ada perubahan pada input stok
        if ($product->stok != $request->stok) {
            $product->stok = $request->stok;
        }

        $product->save(); // Menggunakan save() untuk menyimpan perubahan pada model

        return redirect()->route('produksiproduk.index')->with('success', 'Data Produk Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        Alert::success('Yeee', 'Berhasil Menghapus Produk');
        return back();
    }
}
