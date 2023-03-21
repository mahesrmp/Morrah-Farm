@extends('layouts.app_LTE')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center">{{ $title }}</h1>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    @forelse ($data as $data)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $title }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead">
                                                <b>{{ $data->name }}</b>
                                            </h2>
                                            <p class="text-muted text-sm">
                                                <b>Bergabung:</b>{{ $data->created_at->translatedFormat('d F Y') }}
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small">
                                                    <span class="fa-li">
                                                        <i class="fas fa-lg fa-building"></i>
                                                    </span> Address:{{ $data->alamat }}
                                                </li>
                                                <li class="small">
                                                    <span class="fa-li">
                                                        <i class="fas fa-lg fa-phone"></i>
                                                    </span>{{ $data->nohp }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="assets/dist/img/user1-128x128.jpg" alt="user-avatar"
                                                class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1>Belum Ada Data Customer</h1>
                    @endforelse
                </div>
            </div>
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">2</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
