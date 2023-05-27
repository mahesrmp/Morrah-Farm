@extends('layouts.app_LTE')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Slider</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('home-sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Slider</label>
                            <input name="nama_slider" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Nama Slider">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Deksirpis Singkat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Gambar (*resolusi gambar harus berukuran 1920 x 930)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @if ($postCount < $maxPostCount)
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @else
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Slider</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Slider</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $slider->nama_slider }}</td>
                                    <td>{{ $slider->deskripsi }}</td>
                                    <td><img src="{{ asset('images/' . $slider->gambar) }}" alt="{{ $slider->nama_slider }}"
                                            height="100" width="100"></td>
                                    <td>
                                        <form action="{{ route('home-sliders.destroy', $slider->id) }}" method="POST">
                                            <a class="btn btn-primary"
                                                href="{{ route('home-sliders.edit', $slider->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
