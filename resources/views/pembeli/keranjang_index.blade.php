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
                    <a href="{{ route('pembeli.produk') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
                <div class="col-md-12 mt-3">
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
                            <h4><i class="fa fa-shopping-cart">Check Out</i></h4>
                            @if (!empty($pesanan))
                                <p class="text-end">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Alamat</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{ url('productimage') }}/{{ $pesanan_detail->produk->gambar }}"
                                                style="width: 100px; height:100px;" class="card-img-top"
                                                alt="product image" />
                                        </td>
                                        <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                                        <td>{{ $pesanan_detail->jumlah }} buah</td>
                                        <td>Rp. {{ number_format($pesanan_detail->produk->harga) }}</td>
                                        <td>{{ $pesanan_detail->pesanan->address }}</td>
                                        <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                        <td>
                                            <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}"
                                                method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Ingin Menghapus Produk?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <td class="text-end" colspan="6"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                @if (count($pesanan_details) > 0)
                                    <td>
                                        <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success"
                                            onclick="return confirm('Yakin Mau CheckOut?');">
                                            <i class="fa fa-shopping-cart"></i> Check Out</a>
                                    </td>
                                @endif
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.app_Coza')
@section('content')
    <div class="bg0 m-t-10 p-b-30"></div>
    {{-- <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1 text-center">Gambar</th>
                                    <th class="column-2 text-center">Nama Produk</th>
                                    <th class="column-3 text-center">Harga Satuan</th>
                                    <th class="column-4 text-center">Jumlah</th>
                                    <th class="column-5 text-center">Total</th>
                                    <th class="column-6 text-center">Aksi</th>
                                </tr>
                                @foreach ($pesanan_details as $pesanan_detail)
                                    <tr class="table_row">
                                        <td class="column-1 text-center">
                                            <div class="how-itemcart1">
                                                <img src="{{ url('productimage') }}/{{ $pesanan_detail->produk->gambar }}"
                                                    alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2 text-center">{{ $pesanan_detail->produk->nama_produk }}</td>
                                        <td class="column-3 text-center">{{ formatRupiah($pesanan_detail->produk->harga) }}</td>
                                        <td class="column-4 text-center">
                                            {{ $pesanan_detail->jumlah }}
                                        </td>
                                        <td class="column-5 text-center">{{ formatRupiah($pesanan_detail->jumlah_harga) }}</td>
                                        <td class="text-center">
                                            <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Ingin Menghapus Produk?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>
                            @if (count($pesanan_details) > 0)
                                <a href="{{ url('konfirmasi-check-out') }}"
                                    onclick="return confirm('Yakin Mau CheckOut?');">
                                    <div
                                        class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                        Chek Out
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}

    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1 text-center">Produk</th>
                                    <th class="column-2 text-center">Nama Produk</th>
                                    <th class="column-3 text-center">Harga</th>
                                    <th class="column-4 text-center">Jumlah</th>
                                    <th class="column-5 text-center">Total</th>
                                    <th class="column-5 text-center"></th>
                                </tr>
                                @foreach ($pesanan_details as $pesanan_detail)
                                    <tr class="table_row">
                                        <td class="column-1 text-center">
                                            <div class="how-itemcart1">
                                                <img src="{{ url('productimage') }}/{{ $pesanan_detail->produk->gambar }}"
                                                    alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2 text-center">{{ $pesanan_detail->produk->nama_produk }}</td>
                                        <td class="column-3 text-center">{{ formatRupiah($pesanan_detail->produk->harga) }}
                                        </td>
                                        <td class="column-4 text-center">
                                            {{ $pesanan_detail->jumlah }}
                                        <td class="column-5 text-center">{{ formatRupiah($pesanan_detail->jumlah_harga) }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Ingin Menghapus Produk?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Total Pesanan
                        </h4>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>
                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>
                        @if (count($pesanan_details) > 0)
                            <a href="{{ url('konfirmasi-check-out') }}" onclick="return confirm('Yakin Mau CheckOut?');">
                                <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                    Proceed to Checkout
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
