@extends('layouts.app_Coza')

@section('content')
<div class="container">
    <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>

        <div class="flex-w flex-c-m m-tb-10"></div>
    </div>
</div>
<div class="container">
    @foreach ($reviewer as $item)
        <div style="border:1px solid rgb(35, 48, 224); margin:10px 0;" >
            <p  class="text-muted" style="padding: 5px 0 0 5px"><img src="profileFoto/{{ $item->user->foto }}" style="border-radius: 50%;display:inline-block;" width="50px;" height="50px;" alt=""> {{ $item->user->name }}</p>
            <p class="text-muted">{{ $item->updated_at }} | Variasi : {{ $item->produk->nama_produk }}</p>
            <div style="padding: 0 20px;" style="display:inline-block;">
                @if($item->img2 != null)
                <a href="productimage/{{ $item->img2 }}" data-sub-html="Demo Description">
                    <img class="img-responsive thumbnail" src="productimage/{{ $item->img2 }}" width="100px"
                    alt="{{ $item->img2 }}">
                </a>
                @endif
                @if($item->video != null)
                <a href="upload/{{ $item->video }}" data-sub-html="Demo Description">
                    <video src="upload/{{ $item->video }}" height="100px" width="100px"></video>
                </a>
                @endif
            </div>
            <p class="text-dark">Ulasan : {{ $item->review }}</p>
        </div>
    @endforeach
</div>
@endsection