@extends('layouts.app_Coza')

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
                                                            class="zmdi zmdi-shopping-cart"></i> add cart</button>

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
@endsection
