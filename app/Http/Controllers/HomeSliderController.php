<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeSliderRequest;
use App\Http\Requests\UpdateHomeSliderRequest;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeSliderController extends Controller
{
    private $viewIndex = 'home_slider_index';
    private $viewCreate = 'home_slider_form';
    private $viewEdit = 'home_slider_form';
    private $viewShow = 'produk_show';
    private $routePrefix = 'homeslider';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSlider::paginate(20);
        return view('manager.home_slider.' . $this->viewIndex, [
            'sliders' => $sliders,
            'routePrefix'   => $this->routePrefix,
            'title'         => 'Slider Home User'
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
            'model'     => new HomeSlider(),
            'method'    => 'POST',
            'route'     => $this->routePrefix . '.store',
            'button'    => 'SIMPAN',
            'title'     => 'Form Tambah Slider',
        ];

        return view('manager.home_slider.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeSliderRequest $request)
    {
        $requestData = $request->validated();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = $request->file('gambar')->store('public/homeslider');
        }
        HomeSlider::create($requestData);
        flash('Data berhasil didaftarkan');
        return redirect()->route('homeslider.index')->with('success', 'Slider berhasil ditambahkan');








        // $request->validate([
        //     'nama_slider' => 'required',
        //     'deskripsi' => 'required',
        //     'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ]);

        // $produks = HomeSlider::create([
        //     'nama_slider' => $request->nama_slider,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $request->gambar,
        // ]);

        // if($request->hasFile('gambar')) {
        //     $request->file('gambar')->move('assets/homeslider',$request->file('gambar')->getClientOriginalName());
        //     $produks->gambar = $request->file('gambar')->getClientOriginalName();
        //     $produks->save();
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlider $id)
    {
        // $produks = [
        //     'model'     => HomeSlider::findOrFail($homeSlider),
        //     'method'    => 'PUT',
        //     'route'     => [$this->routePrefix . '.update', $homeSlider,],
        //     'button'    => 'UPDATE',
        //     'title'     => 'Form Update Home Sldier',
        // ];

        // return view('manager.home_slider.' . $this->viewEdit, $produks);


        $data = [
            'model'     => HomeSlider::FindOrFail($id),
            'method'    => 'PUT',
            'route'     => [$this->routePrefix . '.update', $id],
            'button'    => 'UPDATE',
            'title'     => 'Form Update Home Sldier',

        ];

        return view('manager.home_slider.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeSliderRequest $request, $id)
    {
    
        $requestData = $request->validated();
        $model = HomeSlider::findOrFail($id);
        if ($request->hasFile('gambar')) {
            if($model->gambar != null && Storage::exists($model->gambar)){
                Storage::delete($model->gambar);
            }
            $requestData['gambar'] = $request->file('gambar')->store('public');
        }
        $model->fill($requestData);
        $model->save();
        return redirect()->route('produk.index')->with('success', 'Slider Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = HomeSlider::firstOrFail();
        $model->delete();
        return back()->with('success', 'Slider berhasil dihapus.');
    }
}
