@extends('layouts.peternak')

@section('content')
<<<<<<< HEAD
<div class="row justify-content-center">
=======
<div class="container">
    <div class="row justify-content-center">
>>>>>>> a6a4e9056533d47960c7298a2b957e66475ec8e8
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Hai, {{ Auth::user()->name }}</h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
