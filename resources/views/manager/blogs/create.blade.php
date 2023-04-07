@extends('layouts.app_LTE')

@section('content')
    <div class="container">
        <h1>Tambah Data Blog</h1>
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" required>
            </div>
            <!-- Tambahkan field-field lain sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('blog.manager') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
