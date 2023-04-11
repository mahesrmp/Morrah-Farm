@extends('layouts.app_Coza')
@section('content')
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

            <div class="flex-w flex-c-m m-tb-10"></div>
        </div>
    </div>

    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assetuser/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Blog
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <!-- item blog -->
                        {{-- @foreach ($blog as $item)
                            <table>
                                <tr>
                                    <td>gambar</td>
                                    <td>{{ asset($item->gambar) }}</td>
                                </tr>
                                <tr>
                                    <td>judul</td>
                                    <td>{{ $item->judul }}</td>
                                </tr>
                                <tr>
                                    <td>Isi</td>
                                    <td>{{ $item->isi }}</td>
                                </tr>
                            </table>
                        @endforeach --}}
                        @foreach ($blogs as $item)
                            <div class="p-b-63">
                                <a href="blog-detail.html" class="hov-img0 how-pos5-parent">
                                    <img src="{{ asset('blogFotos/' . $item->gambar) }}" alt="IMG-BLOG">

                                    <div class="flex-col-c-m size-123 bg9 how-pos5">
                                        <span class="ltext-107 cl2 txt-center">
                                            22
                                        </span>

                                        <span class="stext-109 cl3 txt-center">
                                            Jan 2018
                                        </span>
                                    </div>
                                </a>

                                <div class="p-t-32">
                                    <h4 class="p-b-15">
                                        <a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
                                            8 Inspiring Ways to Wear Dresses in the Winter
                                        </a>
                                    </h4>

                                    <p class="stext-117 cl6">
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
                                    </p>

                                    <div class="flex-w flex-sb-m p-t-18">
                                        <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                            <span>
                                                <span class="cl4">By</span> Admin
                                                <span class="cl12 m-l-4 m-r-6">|</span>
                                            </span>

                                            <span>
                                                StreetStyle, Fashion, Couple
                                                <span class="cl12 m-l-4 m-r-6">|</span>
                                            </span>

                                            <span>
                                                8 Comments
                                            </span>
                                        </span>

                                        <a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                            Continue Reading

                                            <i class="fa fa-long-arrow-right m-l-9"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- item blog -->
                        <div class="p-b-63">
                            <a href="blog-detail.html" class="hov-img0 how-pos5-parent">
                                <img src="assetuser/images/blog-05.jpg" alt="IMG-BLOG">

                                <div class="flex-col-c-m size-123 bg9 how-pos5">
                                    <span class="ltext-107 cl2 txt-center">
                                        18
                                    </span>

                                    <span class="stext-109 cl3 txt-center">
                                        Jan 2018
                                    </span>
                                </div>
                            </a>

                            <div class="p-t-32">
                                <h4 class="p-b-15">
                                    <a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
                                        The Great Big List of Men’s Gifts for the Holidays
                                    </a>
                                </h4>

                                <p class="stext-117 cl6">
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                    himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
                                </p>

                                <div class="flex-w flex-sb-m p-t-18">
                                    <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                        <span>
                                            <span class="cl4">By</span> Admin
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>

                                        <span>
                                            StreetStyle, Fashion, Couple
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>

                                        <span>
                                            8 Comments
                                        </span>
                                    </span>

                                    <a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                        Continue Reading

                                        <i class="fa fa-long-arrow-right m-l-9"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- item blog -->
                        <div class="p-b-63">
                            <a href="blog-detail.html" class="hov-img0 how-pos5-parent">
                                <img src="assetuser/images/blog-06.jpg" alt="IMG-BLOG">

                                <div class="flex-col-c-m size-123 bg9 how-pos5">
                                    <span class="ltext-107 cl2 txt-center">
                                        16
                                    </span>

                                    <span class="stext-109 cl3 txt-center">
                                        Jan 2018
                                    </span>
                                </div>
                            </a>

                            <div class="p-t-32">
                                <h4 class="p-b-15">
                                    <a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
                                        5 Winter-to-Spring Fashion Trends to Try Now
                                    </a>
                                </h4>

                                <p class="stext-117 cl6">
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                    himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
                                </p>

                                <div class="flex-w flex-sb-m p-t-18">
                                    <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                        <span>
                                            <span class="cl4">By</span> Admin
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>

                                        <span>
                                            StreetStyle, Fashion, Couple
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>

                                        <span>
                                            8 Comments
                                        </span>
                                    </span>

                                    <a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                        Continue Reading

                                        <i class="fa fa-long-arrow-right m-l-9"></i>
                                    </a>
                                </div>
                            </div>
                        </div> --}}

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
                </div>


            </div>
        </div>
    </section>
@endsection
