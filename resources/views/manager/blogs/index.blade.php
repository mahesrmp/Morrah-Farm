@extends('layouts.app_LTE')

@section('content')
    <div class="container">
        <h1>Halaman Blog Manager</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    @foreach ($blogs as $blog)
        <table border="1">
            <tr>
                <td>
                    {{ $blog->judul }}
                </td>
                <td>
                    {{ $blog->isi }}
                </td>
                <td>
                    {{ $blog->gambar }}
                </td>
                <td>
                    {{ $blog->created_at }}
                </td>
                <td>{{ $blog->user->name }}</td>
                <td>
                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('blog.delete', $blog->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        </table>
    @endforeach
@endsection
