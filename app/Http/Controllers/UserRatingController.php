<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Rating;
use Auth;
use Illuminate\Http\Request;

class UserRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Produk $produk)
    {
       //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $stars_rated = $request->input('rating');
        $stars_rated = $request->input('rating');
        $produk_id = $request->input('produk_id');
        $komentar = $request->input('komentar');
        $image = $request->input('image');

        $produk_check = Produk::where('id', $produk_id)->first();
        if ($produk_check) {
            $verfified_purchase = Pesanan::where('pesanans.user_id', Auth::id())
                ->join('pesanan_details', 'pesanans.id', 'pesanan_details.pesanan_id')
                ->where('pesanan_details.produk_id', $produk_id)->get();

            if ($verfified_purchase) {
                $existing_rating = Rating::where('user_id', Auth::id())->where('produk_id', $produk_id)->first();
                if ($existing_rating) {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'produk_id' => $produk_id,
                        'rating' => $stars_rated,
                        'komentar' => $komentar,
                        'image' => $image,
                    ]);
                }
                // return redirect()->back()->with('success', 'Terima kasih sudah memberikan penilain');
                return redirect()->route('pembeli.produk')->with('success', 'Terima kasih sudah memberikan penilain');
            } else {
                return redirect()->route('pembeli.produk')->with('error', 'Anda tidak bisa menilai produk ini tanpa membeli');
            }
        } else {
            return redirect()->back()->with('success', 'The link you Followed was broke');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
