@extends('layouts.peternak')

@section('content')
<<<<<<< HEAD
<div class="row justify-content-center">
=======
<div class="container">
    <div class="row justify-content-center">
>>>>>>> e176096d08c44579ff6be3ac46ebcb95aeec014d
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
 