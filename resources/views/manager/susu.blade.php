@extends('layouts.app_LTE')
@section('content')
<h1>{{ $title }}</h1>
<!-- Form Pencarian -->
<form action="{{ route('susu.search') }}" method="GET">
    <div class="form-group">
        <label for="date">Tanggal:</label>
        <input type="date" name="date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

<!-- Tabel Data Susu -->
<table class="table">
    <thead>
        <tr>
            <th>Nama Pelapor</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <!-- Tambahkan kolom lain sesuai kebutuhan -->
        </tr>
    </thead>
    <tbody>
        @if ($susus->isEmpty())
            <tr>
                <td colspan="3">Tidak ada data yang ditemukan.</td>
            </tr>
        @else
            @foreach ($susus as $susu)
                <tr>
                    <td>{{ $susu->pelapor }}</td>
                    <td>{{ $susu->jumlah_susu }}</td>
                    <td>{{ $susu->tanggal }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        @endif
    </tbody>
</table>


@endsection