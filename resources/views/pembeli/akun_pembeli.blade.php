@extends('layouts.app_Coza')

@section('content')
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

            <div class="flex-w flex-c-m m-tb-10"></div>
        </div>
    </div>

    <div class="container rounded bg-white mt-5 mb-5">
    <form action="{{ route('akun-pembeli.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img src="{{ asset('profileFoto/') }}/{{ $user->foto }}" alt="Profile-img" style="border-radius: 110%; width: 250px; height: 250px;">
                    
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                    </div>
                    <div class="col-md-12"><label class="labels">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $user->alamat }}">
                    </div>
                    <div class="col-md-12"><label class="labels">No Telepon</label>
                        <input type="text" class="form-control"  name="nohp" value="{{ $user->nohp }}">
                    </div>
                    <div class="col-md-12"><label class="labels">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-12"><label class="labels">Password</label>
                        <input type="password" class="form-control"  name="password" value="{{ $user->password }}">
                    </div>
                    <div class="col-md-12"><label class="labels">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password_confirmation }}" />
                    </div>
                    <div class="col-md-12"><label class="labels">Upload Foto </label>
                        <input type="file" name="foto">
                    </div>
                </div>
                <div class="mt-5 text-center"><button type="submit"  class="btn btn-primary profile-button" >Save Profile</button></div>
            </div>
        </div>
        
    </div>
</div>
</div>
</form>
</div>
  
