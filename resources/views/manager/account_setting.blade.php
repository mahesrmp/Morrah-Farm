@extends('layouts.app_LTE')

@section('content')
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Foto</th>
        </tr>
        <tr>
            @foreach ($data as $item)
                {{-- <td>{{ $data->name }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->notelp }}</td>
            <td>{{ $data->foto }}</td> --}}
            {{ $item->name}}
            @endforeach
            
        </tr>
        

    </table>

    {{-- <form method="POST" action="{{ route('users.update', $data_admin->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $data_admin->name }}">

    <label for="email">Email</label>
    <input type="email" name="email" value="{{ $data_admin->alamat }}">

    <button type="submit">Update</button>
</form> --}}
@endsection
