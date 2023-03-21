@extends('layouts.app_LTE')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Hai, {{ Auth::user()->name }}</h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Orderan Terbaru</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart" style="color:white"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Lihat
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalProducts }}</h3>
                    <p>Total Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars" style="color:white"></i>
                </div>
                <a href="{{ route('produk.index') }}" class="small-box-footer">
                    Lihat
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalCustomer }}</h3>
                    <p>Jumlah Customer</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus" style="color:white"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Lihat
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalPegawai }}</h3>
                    <p>Jumlah Karyawan</p>
                </div>
                <div class="icon">
                    {{-- <i class="fas fa-chart-pie"></i> --}}
                    <i class="fa-sharp fa-solid fa-users" style="color:white"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">
                    Lihat
                    <i class="fas fa-arrow-circle-right"></i>

                </a>
            </div>
        </div>
    </div>
    @endsection
