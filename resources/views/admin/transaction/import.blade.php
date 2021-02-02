@extends('admin.admin')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Modul Transaction</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ URL::to('category') }}">Transaction</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <div class="card-header">Import Transaction</div>
                            {{ Form::open(['url' => 'transaction/store_import', 'files' => true]) }}

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
                                    {{ Form::label('File') }}
                                    {{ Form::file('transaction_import', ['class' => 'form-control', 'accept' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel']) }}
                                </div>

                            </div>
                            <div class="card-footer">
                              <a href="{{ URL::to('transaction') }}" class="btn btn-default">Kembali</a>
                              <button type="submit" class="btn btn-success float-right">Import</button>
                            </div>
                            {{ form::close() }}
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
