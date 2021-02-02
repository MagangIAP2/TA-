@extends('admin.admin')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Modul Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Edit Product</div>

                        {!! Form::model($product, ['method' => 'PATCH', 'route' => ['product.update', $product->id], 'files' => true]) !!}

                        <div class="card-body">
                            <?php
                              $errors = Session::get('errors');
                              if(!empty($errors)){ ?>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <?php } ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('Category') }}
                                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Pilih Category']) }}
                                    </div>

                                    {{-- <select name ="category_id" class="form-control">
                                        <option value="" selected>Pilih Category --}}
                                    <div class="form-group">
                                        {{ Form::label('Name') }}
                                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Produk']) }}

                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('Price') }}
                                        {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => '0']) }}

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('SKU') }}
                                        {{ Form::text('aku', null, ['class' => 'form-control', 'placeholder' => 'Kode Produk']) }}
    
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Status') }}
                                        {{ Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Pilih Status']) }}
                                    </div>

                                    
                                    <div class="form-group">
                                        {{ Form::label('Image Sebelumnya') }}
                                        <br/>
                                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid">
                                        <br/>
                                        <small><i>Kosongkan gambar jika tidak ingin mengubah foto produk</i></small>
                                        {{ Form::file('image', ['class' => 'form-control', 'accept' => 'image/*']) }}

                                    </div>
                                </div>
                            </div>
                        


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('Description') }}
                                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Deskripsi Produk', 'rows' => 4]) }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}"
                                class="btn btn-default">Kembali</a>
                            <button type="submit" class="btn btn-success float-right">Update</button>
                        </div>
                        
                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
