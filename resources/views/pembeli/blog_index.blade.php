@extends('layouts.app_Coza')
@section('content')
<style>
    .grid-container{
        display: grid;
        justify-content: center;
    }
</style>
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

            <div class="flex-w flex-c-m m-tb-10"></div>
        </div>
    </div>
    
    <section class="bg-img1 txt-center p-lr-56 p-tb-92" style="background-image: url('assetuser/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Blog
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-85 p-b-50">
        <div class="grid-container">
            <div class="row" >
            @foreach ($blogs as $blog)
                <div class="col-md-6 " >
                        <!-- item blog -->
    
                    <div class="card card-solid" style="box-shadow: 0 5px 9px 0 rgba(0,0,0,0.2); border-radius:20px">
                        <div class="card-body pb-5">
                            <center>
                            <img src="{{ url('blogFotos') }}/{{ $blog->gambar }}" alt="Blog-img"  width="300px" height="300px">
                            </center>

                            <div class="p-t-32">
                                <h4 class="p-b-15">
                                    <a class="ltext-108 cl2 hov-cl1 trans-04">
                                        {{ $blog->judul }}
                                    </a>
                                </h4>

                                <p class="stext-117 cl6">
                                   {{ $blog->isi }}
                                </p>

                                <div class="flex-w flex-sb-m p-t-18">
                                    <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                        <span>
                                            <span class="cl4">By :</span> {{ $blog->user->name}}
                                            <span class="cl12 m-l-4 m-r-6">| Created at :</span> {{ date('d m Y', strtotime($blog->created_at)) }}
                                        </span>

                                    </span>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <br>
                </div>
                    <br>

                    @endforeach
            </div>

                 <!-- Pagination -->
                 <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                                1
                            </a>

                            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                                2
                            </a>
                        </div>
                    
                
        </div>
    </section>
@endsection
