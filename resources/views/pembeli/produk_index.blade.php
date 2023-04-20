@extends('layouts.app_Coza')

@section('content')
    <div class="bg0 m-t-25 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

                <div class="flex-w flex-c-m m-tb-10"></div>
            </div>
        </div>

        <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assetuser/images/bg-02.jpg');">
            <h2 class="ltext-105 cl0 txt-center">
                Produk
            </h2>
        </section>

        <div class="bg0 m-t-25 p-b-140">
            <div class="container">
                <div class="row ">
                    @foreach ($produks as $produk)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women card col-sm-4">

                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ url('productimage') }}/{{ $produk->gambar }}" alt="IMG-PRODUCT"
                                        style="width:300px; height:200px;" class="card-img-top mt-4">
                                    <a href="#"
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                                        data-toggle="modal" data-target="#myModal{{ $produk->id }}">
                                        Detail
                                    </a>

                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                    <p class="card-text">
                                        <strong>Harga :</strong> Rp.{{ number_format($produk->harga) }} <br>
                                        <strong>Stok :</strong> {{ $produk->stok }} <br>
                                        <hr>
                                        <strong>Keterangan : {{ $produk->keterangan }}</strong> <br>
                                    </p>
                                    @if (Auth::user())
                                        @if ($produk->stok <= 0)
                                            <p class="text-danger">*Maaf, stok sudah habis.</p>
                                            <a href="{{ url('pembeli/keranjang') }}/{{ $produk->id }}" class="btn btn-primary disabled"><i
                                                    class="zmdi zmdi-shopping-cart"></i> Pesan</a>
                                        @else
                                            <a href="{{ url('pembeli/keranjang') }}/{{ $produk->id }}" class="btn btn-primary"><i
                                                    class="zmdi zmdi-shopping-cart"></i> Pesan</a>
                                        @endif
                                    @else
                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="{{ route('login') }}" class="btn-addwish-b2 dis-block pos-relative">
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
    </div>
    <!-- Modal -->
    @foreach ($produks as $produk)
        <div class="modal modalCard fade" id="myModal{{ $produk->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal1 -->
                    <div class="">
                        <div class="container">
                            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                                <div class="row">
                                    <div>
                                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                                            <div class="wrap-slick3 flex-sb flex-w">
                                                <div class="wrap-slick3-dots"></div>
                                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                                <div class="gallery-lb">
                                                    <div class="item-slick3"
                                                        data-thumb="{{ url('productimage') }}/{{ $produk->gambar }}">
                                                        <div class="wrap-pic-w pos-relative">
                                                            <img src="{{ url('productimage') }}/{{ $produk->gambar }}"
                                                                alt="IMG-PRODUCT">

                                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                href="{{ url('productimage') }}/{{ $produk->gambar }}">
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
                                                {{ $produk->nama_barang }}
                                            </h4>

                                            <span class="mtext-106 cl2">
                                                Rp.{{ number_format($produk->harga) }} / Liter
                                            </span>

                                            <p class="stext-102 cl3 p-t-23">
                                                {{ $produk->keterangan }}
                                            </p>

                                            <form action="{{ url('pesan') }}/{{ $produk->id }}" method="post">
                                                @csrf
                                                <div class="p-t-33">
                                                    <div class="flex-w flex-r-m p-b-10">
                                                        <div class="size-203 flex-c-m respon6">
                                                            Jumlah
                                                        </div>
                                                        <div class="size-204 respon6-next">
                                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                                <div
                                                                    class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                                </div>
                                                                <input class="mtext-104 cl3 txt-center num-product"
                                                                    type="number" name="num-product" value="1">

                                                                <div
                                                                    class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-w flex-r-m p-b-10">
                                                        <div class="size-204 flex-w flex-m respon6-next">
                                                            @if (Auth::user())
                                                                <button type="submit"
                                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">Add
                                                                    to cart</button>
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
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
