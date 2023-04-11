@extends('layouts.app_LTE')

@section('content')
    <div class="container">
        <h1>Edit Blog</h1>
        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $blog->judul }}">
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea class="form-control" id="isi" name="isi">{{ $blog->isi }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="{{ $blog->gambar }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection