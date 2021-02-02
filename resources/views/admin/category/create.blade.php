@extends('admin.admin')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Modul Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ URL::to('category') }}">Category</a></li>
                        <li class="breadcrumb-item active"></li>
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
                        <div class="card-header">Create Category</div>
                        <form action="{{ URL::to('category/store') }}" method="post">
                            @csrf
                            <div class="card-body">
                              <?php
                              $errors = Session::get('errors');
                              if(!empty($errors)){ ?>
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach($errors->all() as $error)
                                  <li>{{ $error}}</li>
                                  @endforeach
                                </ul>
                              </div>
                              
                              <?php } ?>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer">
                              <a href="{{ URL::to('category') }}" class="btn btn-default">Kembali</a>
                              <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
