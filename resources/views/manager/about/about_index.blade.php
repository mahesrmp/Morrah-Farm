@extends('layouts.app_LTE')
@section('content')
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
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $about)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $about->judul }}</td>
                                    <td>{{ $about->isi }}</td>

                                    <td>
                                        <img src="{{ Storage::url($about->gambar) }}" alt="Gambar"
                                            style="max-width: 100px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('about.show', $about->id) }}" class="btn btn-info">Show Detail</a>
                                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">Delete</button>
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
