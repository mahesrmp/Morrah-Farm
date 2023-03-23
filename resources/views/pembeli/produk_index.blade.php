@extends('layouts.app_Coza')

@section('content')
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
                                <a href="#"
								class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <span class="stext-105 cl3">
                                        {{ $produk->nama_barang }}
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>
        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="assetuser/images/icons/icon-close.png" alt="CLOSE">
                </button>
                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" 
                                    data-thumb="{{ url('productimage') }}/{{ $produk->gambar }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="assetuser/images/original.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="assetuser/images/original.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Lightweight Jacket
                            </h4>

                            <span class="mtext-106 cl2">
                                Rp32.000 / Liter
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
                                ornare feugiat.
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Ukuran
                                    </div>
                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Ukuran/botol</option>
                                                <option>1 Liter</option>
                                                <option>2 Liter</option>
                                                <option>3 Liter</option>
                                                <option>4 Liter</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Rasa
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Pilih Rasa</option>
                                                <option>Original</option>
                                                <option>Mocca</option>
                                                <option>Strawberry</option>
                                                <option>Cokelat</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                        @if (Auth::user())
                                            <a href="">
                                                <button
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
                                                    Add to cart
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}">
                                                <button
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                    Add to cart
                                                </button>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
