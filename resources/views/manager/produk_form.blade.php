@extends('layouts.app_LTE')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form tambah data Produk</h3>
                    </div>
                    {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_produk">Nama Barang</label>
                            {!! Form::text('nama_produk', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('nama_produk') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            {!! Form::number('harga', null, ['class' => 'form-control rupiah']) !!}
                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Deskripsi</label>
                            {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                        </div>
                        <div class="form-group">
                            <textarea rows="4"id="summernote">
                                                Place
                                                <em>some</em>
                                                <u>text</u>
                                                <strong>here</strong></textarea>
                        </div>
                        <div class="card-footer">
                            Visit
                            <a href="https://github.com/summernote/summernote/">Summernote</a>
                            documentation for more examples and information about the plugin.
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            {!! Form::number('stok', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('stok') }}</span>
                        </div>




                        <label for="gambar">File input</label>
                        <div>
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>

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
