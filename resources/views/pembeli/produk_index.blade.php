@extends('layouts.app_Coza')

@section('content')
<<<<<<< HEAD
<div class="bg0 m-t-23 p-b-140">
=======
<<<<<<< HEAD
>>>>>>> edfc661b4ec6d2226697971b2d8816d94f9bc6e3
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

            <div class="flex-w flex-c-m m-tb-10"></div>
<<<<<<< HEAD
            <div class="dis-none panel-search w-full p-t-10 p-b-15"></div>
            <div class="dis-none panel-filter w-full p-t-10"></div>
=======
        </div>
    </div>

    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assetuser/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Produk
        </h2>
    </section>
=======
>>>>>>> 800baf57a34ebe5d7b8087d23d8109557657c798
    <div class="bg0 m-t-25 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>
                <div class="flex-w flex-c-m m-tb-10"></div>
            </div>
            <div class="row isotope-grid">
                @foreach ($produks as $produk)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ url('productimage') }}/{{ $produk->gambar }}" alt="IMG-PRODUCT">
                                <a href="{{ url('detailproduk') }}/{{ $produk->id }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Detail
                                </a>
                                </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <span class="stext-105 cl3">
                                        {{ $produk->nama_produk }}
                                    </span>
                                    <span class="stext-105 cl3">
                                        Rp.{{ number_format($produk->harga) }}
                                    </span>
                                </div>


                                @if (Auth::user())
                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="{{ route('pembeli.keranjang') }}"
                                            class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                    </div>
                                @else
                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="{{ route('login') }}"
                                            class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                    </div>
                                @endif

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="{{ url('detailproduk') }}/{{ $produk->id }}"
                                        class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
>>>>>>> edfc661b4ec6d2226697971b2d8816d94f9bc6e3
        </div>


    </div>
    </div>
@endsection
