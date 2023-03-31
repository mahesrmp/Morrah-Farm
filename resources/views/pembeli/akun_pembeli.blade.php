@extends('layouts.app_Coza')

@section('content')
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

            <div class="flex-w flex-c-m m-tb-10"></div>
        </div>
    </div>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assetuser/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Akun Pembeli
        </h2>
    </section>

    <div class="container mt-5">
        <form action="{{ route('akun-pembeli.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table border="1">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="name" value="{{ $user->name }}" /></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="{{ $user->alamat }}" /></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td><input type="number" name="nohp" value="{{ $user->nohp }}" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="{{ $user->email }}" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td>Confirmasi Password</td>
                    <td><input type="password" name="password_confirmation" /></td>
                </tr>
                <tr>
                    <td>Foto Profil</td>
                    <td>
                        @if ($user->photo)
                            <img src="{{ route('user.photo', ['id' => $user->id]) }}" alt="Foto Profil" width="100">
                        @else
                            <span>Belum ada foto profil</span>
                        @endif
                        <input type="file" name="photo">
                    </td>
                </tr>
            </table>


            <!-- Tombol submit untuk mengirim form -->
            <button type="submit" class="btn-primary mt-3 mb-3">Update</button>
        </form>
    </div>
    {{-- <form class="container">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No Telepon</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Foto</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}
@endsection
