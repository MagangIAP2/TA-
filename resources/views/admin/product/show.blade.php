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
                        <li class="breadcrumb-item active">Detail</li>
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
                        <div class="card-header">Detail Product</div>

                        
                        <div class="card-body">
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('Category') }}
                                        {{ Form::text('category_id', $product->category->name, ['class' => 'form-control', 'placeholder' => 'Pilih Category', 'disabled' => 'disabled']) }}
                                    </div>

                                    {{-- <select name ="category_id" class="form-control">
                                        <option value="" selected>Pilih Category --}}
                                    <div class="form-group">
                                        {{ Form::label('Name') }}
                                        {{ Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Nama Produk','disabled' => 'disabled']) }}

                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('Price') }}
                                        {{ Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => '0','disabled' => 'disabled']) }}

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('SKU') }}
                                        {{ Form::text('aku', $product->aku, ['class' => 'form-control', 'placeholder' => 'Kode Produk','disabled' => 'disabled']) }}
    
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Status') }}
                                        {{ Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $product->status, ['class' => 'form-control', 'placeholder' => 'Pilih Status','disabled' => 'disabled']) }}
                                    </div>

                                    
                                    <div class="form-group">
                                        {{ Form::label('Image') }}
                                        <br/>
                                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid">
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('Description') }}
                                        {{ Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Deskripsi Produk', 'rows' => 4,'disabled' => 'disabled']) }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}"
                                class="btn btn-default">Kembali</a>
                        </div>
                        

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
