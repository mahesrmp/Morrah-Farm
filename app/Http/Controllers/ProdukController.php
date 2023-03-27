<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreProdukRequest;
use \App\Models\Produk as Model;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{

    private $viewIndex = 'produk_index';
    private $viewCreate = 'produk_form';
    private $viewEdit = 'produk_form';
    private $viewShow = 'produk_show';
    private $routePrefix = 'produk';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produks = Model::paginate(20);
        return view('manager.' . $this->viewIndex, [
            'produks' => $produks,
            'routePrefix'   => $this->routePrefix,
            'title'         => 'Produk Morrah Farm'
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
            'route'     => $this->routePrefix .'.store',
            'button'    => 'SIMPAN',
            'title'     => 'Form tambah data pegawai',
        ];

        return view('manager.' . $this->viewCreate, $data);
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
        
        if($request->hasFile('gambar')) {
            $request->file('gambar')->move('productimage',$request->file('gambar')->getClientOriginalName());
            $produks->gambar = $request->file('gambar')->getClientOriginalName();
            $produks->save();
        }

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('manager.' . $this->viewShow, [
            'model' => Model::findOrFail($id),
            'title' => 'Detail Data Produk'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
