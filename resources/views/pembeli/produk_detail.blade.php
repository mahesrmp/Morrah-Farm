{{-- @extends('layouts.app_Coza')

@section('content')
    <div class="bg0 m-t-25 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

                <div class="flex-w flex-c-m m-tb-10"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('pembeli.produk') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('pembeli.produk') }}">Produk</a></li>
                                <li class="breadcrumb-item">Check Out</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('productimage') }}/{{ $produk->gambar }}" width="445px"
                                        alt="">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <h3>{{ $produk->nama_barang }}</h3>
                                    <table class="table table-borderless">
                                        <form action="{{ url('/pesan-process/' . $produk->id) }}" method="POST">
                                            <tr>
                                                <td>Harga</td>
                                                <td>:</td>
                                                <td>Rp. {{ number_format($produk->harga) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>:</td>
                                                <td>{{ $produk->stok }}</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td>{{ $produk->keterangan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Pengirim</td>
                                                <td>:</td>
                                                <td>
                                                    <textarea name="address" id="" cols="40" rows="7" style="resize: none" required
                                                        value={{ old('address') }}></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Pesan</td>
                                                <td>:</td>
                                                <td>
                                                    @csrf
                                                    <input type="number" name="jumlah_pesan" class="form-control" required
                                                        min="1" value="{{ old('jumlah_pesan') }}">
                                                    <button type="submit" class="btn btn-primary mt-2"><i
                                                            class="zmdi zmdi-shopping-cart"></i>add cart</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.app_Coza')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <div class="bg0 m-t-15 p-b-50"></div>
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="slick3 gallery-lb">
                                <div class="item-slick3">
                                    <div class="wrap-pic-w pos-relative">
                                        <img height="550px" width="200px"
                                            src="{{ url('productimage') }}/{{ $produk->gambar }}" alt="IMG-PRODUCT">
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
                            {{ $produk->nama_produk }}
                        </h4>
                        <span class="mtext-106 cl2">
                            {{ formatRupiah($produk->harga) }}
                        </span> <br>
                        <span class="mtext-102 cl3 p-t-23">
                            Stok:{{ $produk->stok }}
                        </span>
                        <form action="{{ url('/pesan-process/' . $produk->id) }}" method="POST">
                            <!--  -->
                            <div class="p-t-23">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Jumlah
                                    </div>
                                    <div class="size-204 respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="jumlah_pesan" value="1" required>
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Pengiriman
                                    </div>
                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="address" required>
                                                <option>Alamat Pengiriman</option>
                                                <option>Ambil Ke Tempat</option>
                                                <option>KBT Tarutung</option>
                                                <option>KBT Medan</option>
                                                <option>KBT Siantar</option>
                                                <option>KBT Porsea</option>
                                                <option>KBT Balige</option>
                                                <option>KBT Silimbat</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        @if (Auth::user())
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <a href=""><button class="btn btn-primary">
                                                            Add to Cart
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-success js-show-modal1">
                                                        Beri Penilaian
                                                    </button>
                                                </div>
                                                <form>
                                                    <!-- Modal1 -->
                                                    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
                                                        <div class="overlay-modal1 js-hide-modal1"></div>
                                                        <div class="container">
                                                            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                                                                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                                                                    <img src="assetuser/images/icons/icon-close.png"
                                                                        alt="CLOSE">
                                                                </button>
                                                                <div class="tab-pane ">
                                                                    <div class="row">
                                                                        <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                                            <div class="p-b-30 m-lr-15-sm">
                                                                                <!-- Add review -->
                                                                                <form class="w-full"
                                                                                    action="{{ url('/add-rating') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="produk_id"
                                                                                        value="{{ $produk->id }}">
                                                                                    <h5 class="mtext-108 cl2 p-b-7">
                                                                                        Komentar Anda sangat berharga bagi
                                                                                        kami
                                                                                    </h5>
                                                                                    <div
                                                                                        class="flex-w flex-m p-t-50 p-b-23">
                                                                                        <span class="stext-102 cl3 m-r-16">
                                                                                            Berikan Rating
                                                                                        </span>
                                                                                        <span
                                                                                            class="wrap-rating fs-25 cl11 pointer">
                                                                                            <i
                                                                                                class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                            <i
                                                                                                class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                            <i
                                                                                                class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                            <i
                                                                                                class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                            <i
                                                                                                class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                            <input class="dis-none"
                                                                                                type="number"
                                                                                                name="rating">
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="row p-b-25">
                                                                                        <div class="col-12 p-b-5">
                                                                                            <label class="stext-102 cl3"
                                                                                                for="review">Review
                                                                                                Anda</label>
                                                                                            <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="komentar"></textarea>
                                                                                        </div>
                                                                                        <div class="col-sm-6 p-b-5">
                                                                                            <label class="stext-102 cl3"
                                                                                                for="name">Gambar yang
                                                                                                anda
                                                                                                Beli</label>
                                                                                            <input
                                                                                                class="size-111 bor8 stext-102 cl2 p-lr-20"
                                                                                                id="name"
                                                                                                type="file"
                                                                                                name="image">
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                        Kirim
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                @else
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <a href="{{ route('login') }}" class="btn btn-primary">
                                                Add to cart
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('login') }}" class="btn btn-success">
                                                Beri Penilaian
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                            information</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $produk->keterangan }}
                            </p>
                        </div>
                    </div>
                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            0.79 kg
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            110 x 33 x 100 cm
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Materials
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            60% cotton
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Color
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            Black, Blue, Grey, Green, Red, White
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            XL, L, M, S
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bor10 m-t-30 p-t-10 p-b-10">
            <div class="tab01">
                <div class="p-t-20">
                    <div class="tab-pane ">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-12 m-lr-25">
                                <div class="p-b-30 m-lr-15-sm">
                                    <div class="m-b-10">
                                        <h1>Penilaian Produk</h1>
                                    </div>
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="assetuser/images/avatar-01.jpg" alt="AVATAR">
                                        </div>
                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    Ariana Grande
                                                </span>
                                            </div>
                                            <div class="flex-w flex-sb-m">
                                                <span class="fs-18 cl11">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <p>dinilai tanggal : 21 April 2022</p>
                                            </div>
                                            <p class="stext-102 cl6 mt-3">
                                                Quod autem in homine praestantissimum atque optimum est, id deseruit.
                                                Apud ceteros autem philosophos
                                            </p>
                                            <div class="mt-3 col-md-1">
                                                <img width="80px" height="80px" src="assetuser/images/avatar-01.jpg"
                                                    alt="review">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
