@extends('layouts.app_LTE')
@section('content')
    {{-- <div class="row">
        <div class="col-12">
            <form method="GET" action="">
                <div class="form-group">
                    <label for="bulan">Bulan:</label>
                    <input type="date" id="bulan" name="bulan" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    @if ($laporan->isEmpty())
                        <p>Tidak ada data penjualan untuk bulan tersebut.</p>
                    @else
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Tanggal</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah Terjual</th>
                                    <th>Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->bulan }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ formatRupiah($item->harga) }}</td>
                                        <td>{{ $item->jumlah_terjual }} Buah</td>
                                        <td>{{ formatRupiah($item->pendapatan) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Total Pembelian</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($laporan as $item)
                             <tr>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->jumlah_terjual }}</td>
                                <td>{{ $item->pendapatan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}




    <div class="col-md-12">
        <form method="GET" action="">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Date picker</h3>
                </div>
                <div class="card-body">
                    <!-- Date -->
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" id="bulan" name="bulan" class="form-control">

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Laporan Penjualan</h1>
            </div>
            <div class="card-body p-0">

                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Terjual</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $item)
                            <tr class="text-center">
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ formatRupiah($item->harga) }}</td>
                                <td>{{ $item->jumlah_terjual }} Buah</td>
                                <td>{{ formatRupiah($item->pendapatan) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <h1>Tidak Ada Data Penjualan di Bulan ini</h1>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endsection
