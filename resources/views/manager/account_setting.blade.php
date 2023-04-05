@extends('layouts.app_LTE')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('akun-manager.update', $manager->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table border="1">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="name" value="{{ $manager->name }}" /></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="{{ $manager->alamat }}" /></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td><input type="number" name="nohp" value="{{ $manager->nohp }}" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="{{ $manager->email }}" /></td>
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
                        <div class="mb-3">
                            <label for="image" class="form-label">Masukkan Foto</label>
                            @if ($manager->photo)
                            <img src="{{ route('user.photo', ['id' => $manager->id]) }}" class="img-preview img-fluid mb-3 col-sm-5">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5"> 
                            @endif
                            
                            <input class="form-control" type="file" id="image" name="image"
                                onchange="previewImage()">
                        </div>
                        {{-- @if ($manager->photo)
                        <img src="{{ route('user.photo', ['id' => $manager->id]) }}" alt="Foto Profil" width="100">
                    @else
                        <span>Belum ada foto profil</span>
                    @endif
                    <input type="file" name="photo"> --}}
                    </td>
                </tr>
            </table>


            <!-- Tombol submit untuk mengirim form -->
            <button type="submit" class="btn-primary mt-3 mb-3">Update</button>
        </form>
    </div>

    <script>
        //menampilkan preview foto 
        function previewImage {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFReader){
                imgPreview.src = oFReader.target.result;
            }
        }
    </script>
@endsection
