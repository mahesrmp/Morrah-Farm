@extends('layouts.app_LTE')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('about.create') }}" class="btn btn-primary">Tambah About</a>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
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
                                        <a href="{{ route('about.show', $about->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
