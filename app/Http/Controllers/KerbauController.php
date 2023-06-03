<?php

namespace App\Http\Controllers;

use App\Models\Kerbau;
use Illuminate\Http\Request;

class KerbauController extends Controller
{
    private $viewIndex = 'kerbau_index';
    private $viewCreate = 'kerbau_form';
    private $viewEdit = 'kerbau_form';
    private $viewShow = 'kerbau_show';
    private $routePrefix = 'kerbau';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerbaus = Kerbau::paginate(20);
        return view('peternak.' . $this->viewIndex, [
            'kerbaus' => $kerbaus,
            'routePrefix'   => $this->routePrefix,
            'title'         => 'Laporan Data Kerbau Jantan'
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
            'model'     => new Kerbau(),
            'method'    => 'POST',
            'route'     => $this->routePrefix .'.store',
            'button'    => 'SIMPAN',
            'title'     => 'Form tambah data kerbau',
        ];

        return view('peternak.' . $this->viewCreate, $data);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'pelapor' => 'required',
            'tanggal' => 'required',
            'jumlah_kerbau' => 'required|numeric',
        ]);

        $kerbaus = Kerbau::create([
            'pelapor' => $request->pelapor,
            'tanggal' => $request->tanggal,
            'jumlah_kerbau' => $request->jumlah_kerbau,
        ]);
        
        return redirect()->route('kerbau.index')->with('success', 'Kerbau berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('peternak.' . $this->viewShow, [
            'model' => Kerbau::findOrFail($id),
            'title' => 'Detail Data Kerbau'
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
        $kerbaus = [
            'model'     => Kerbau::findOrFail($id),
            'method'    => 'PUT',
            'route'     => [$this->routePrefix .'.update', $id,],
            'button'    => 'UPDATE',
            'title'     => 'Form Update data Kerbau',
        ];

        return view('peternak.' . $this->viewEdit, $kerbaus);
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
            'pelapor' => 'required',
            'tanggal' => 'required',
            'jumlah_kerbau' => 'required|numeric',
        ]);

        $kerbaus = Kerbau::where('id', $id)->first();
        $kerbaus->pelapor = $request->pelapor;
        $kerbaus->tanggal = $request->tanggal;
        $kerbaus->jumlah_kerbau = $request->jumlah_kerbau;
        return redirect()->route('kerbau.index')->with('success','Data Kerbau Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerbaus = Kerbau::findOrFail($id);
        $kerbaus->delete();
        return back()->with('success','Data Kerbau Berhasil dihapus');
    }

    // public function filter(Request $request){
    //     $start_date =$request->start_date;
    //     $end_date =$request->end_date;

    //     $users= User::whereDate('created_at','>=',$start_date)
    //                 ->whereDate('created_at','<=',$end_date)
    //                 ->get();

    //     return view('index', compact('users'));
    // }
}