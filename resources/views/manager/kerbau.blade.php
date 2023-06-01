@extends('layouts.app_LTE')
@section('content')
<h1>{{ $title }}</h1>
<!-- Form Pencarian -->
<form action="{{ route('kerbau.search') }}" method="GET">
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
            <th>Jumlah Kerbau</th>
            <th>Tanggal</th>
            <!-- Tambahkan kolom lain sesuai kebutuhan -->
        </tr>
    </thead>
    <tbody>
        @if ($kerbaus->isEmpty())
            <tr>
                <td colspan="3">Tidak ada data yang ditemukan.</td>
            </tr>
        @else
            @foreach ($kerbaus as $kerbau)
                <tr>
                    <td>{{ $kerbau->pelapor }}</td>
                    <td>{{ $kerbau->jumlah_kerbau }}</td>
                    <td>{{ $kerbau->tanggal }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection