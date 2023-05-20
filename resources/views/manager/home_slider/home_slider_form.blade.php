@extends('layouts.app_LTE')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Slider</h3>
                    </div>
                    {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_slider">Nama Slider</label>
                            {!! Form::text('nama_slider', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('nama_slider') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                        </div>
                        <label for="gambar">Gambar (*Resolusi Gambar harus 1920 x 930)</label>
                        <div>
                            {{-- <img id="img" src="assets/homeslider/choose.png" alt="" height="100px"> --}}
                            @if ($model->foto != null)
                                <div class="m-3">
                                    <img src="{{ \Storage::url($model->foto) }}" alt="Profil" width="200px">
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="input">
                                <label class="custom-file-label" for="exampleInputFile">*Resolusi Gambar harus 1920 x
                                    930</label>
                            </div>
                        </div>
                        <span class="text-danger">{{ $errors->first('gambar') }}</span>
                    </div>
                    <div class="card-footer">
                        {!! Form::submit($button, ['class' => 'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let img = document.getElementById('img');
        let input = document.getElementById('input');

        input.onchange = (e) => {
            if (input.files[0])
                img.src = URL.createObjectURL(input.files[0]);
        };
    </script>
@endsection
