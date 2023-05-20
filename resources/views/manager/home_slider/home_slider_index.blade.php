@extends('layouts.app_LTE')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="text-center">{{ $title }}</h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <a href="{{ route($routePrefix . '.create') }}">
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-user-plus"></i>Tambah
                        Produk</button></a>
                <div class="mt-3"></div>
                <div class="row">
                    @foreach ($sliders as $slider)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="text-muted text-sm"><b>Nama Slider: </b>{{ $slider->nama_slider }}</p>
                                            <p class="text-muted text-sm"><b>Deskripsi: </b>{{ $slider->deskripsi }}</p>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ \Storage::url($slider->gambar ?? 'image/noimage.jpg') }}"
                                                alt="slider-img" class="img img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        {!! Form::open([
                                            'route' => [$routePrefix . '.destroy', $slider->id],
                                            'method' => 'DELETE',
                                            'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                        ]) !!}
                                        <a href="{{ route($routePrefix . '.edit', $slider->id) }}"
                                            class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        {{ Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm ']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
