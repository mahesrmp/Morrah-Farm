@extends('layouts.app_Coza')

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                @foreach ($sliders as $slider)
                    <div class="item-slick1 bg-overlay1"
                        style="background-image: url({{ asset('images/' . $slider->gambar) }}" alt="{{ $slider->nama_slider }} );"
                        data-thumb="{{ asset('images/' . $slider->gambar) }}" alt="{{ $slider->nama_slider }}" data-caption="Men’s Wear">
                        <div class="container h-full">
                            <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                    <span class="ltext-202 txt-center cl0 respon2">
                                        {{ $slider->nama_slider }}
                                    </span>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
                                    data-delay="800">
                                    <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                        {{ $slider->deskripsi }}
                                    </h2>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                    @if (Auth::user())
                                        <a href="{{ route('pembeli.produk') }}"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                            Shop Now
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                            Shop Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="wrap-slick1-dots p-lr-10"></div>
        </div>
    </section>
    <!-- Banner -->
    <div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="assetuser/images/banner-04.jpg" alt="IMG-BANNER">
                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Women
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="assetuser/images/banner-05.jpg" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Men
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="assetuser/images/banner-07.jpg" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Watches
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="assetuser/images/banner-08.jpg" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Bags
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="assetuser/images/banner-09.jpg" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Accessories
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10 mb-5">
                <h3 class="ltext-103 cl5">
                    Testimoni
                </h3>
            </div>
            {{-- Testimoni --}}
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
                        <img width="80px" height="80px" src="assetuser/images/avatar-01.jpg" alt="review">
                    </div>
                </div>
            </div>
            {{-- Testimoni --}}
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
                        <img width="80px" height="80px" src="assetuser/images/avatar-01.jpg" alt="review">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
