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
                        <li class="breadcrumb-item active">Categories</li>
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
                        <div class="card-header">
                            List All Category
                            <a href="{{ URL::to('category/create') }}" class="btn btn-success float-right btn-sm">Tambah</a>
                        </div>
                            <div class="card-body">

                                {{--Menampilkan pesan sukses ketika create, edit dan delete --}}
                                @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <i class="fa fa-check"></i>
                                    {{ Session::get('success')}}
                                </div>
                                @endif

                                @if (Session::has('info'))
                                <div class="alert alert-info">
                                    <i class="fa fa-check"></i>
                                    {{ Session::get('info')}}
                                </div>
                                @endif
                                @if (Session::has('warning'))
                                <div class="alert alert-warning">
                                    <i class="fa fa-check"></i>
                                    {{ Session::get('warning')}}
                                </div>
                                @endif

                              <table class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Name</th>
                                          <th>Status</th>
                                          <th width="250px">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @forelse ($categories as $key => $item)
                                      <tr>
                                          <td>{{ $key + 1 }}</td>
                                          <td>{{ $item->name }}</td>
                                          <td>{{ $item->status }}</td>
                                          <td>
                                              <form action="{{ URL::to('category/delete/'.$item->id) }}" method="POST">
                                              @csrf
                                              <input type="hidden" name="_method" value="DELETE">
                                              <a href="{{ URL::to('category/'.$item->id) }}" class="btn btn-info" title="Deatil Category"><i class="fa fa-eye"></i></a>
                                              <a href="{{ URL::to('category/'.$item->id.'/edit') }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-alt"></i></button>
                                              </form>
                                          </td>
                                      </tr>
                                      @empty
                                      <tr>
                                          <td colspan="4" class="text-center">Belum ada data</td>
                                      </tr>
                                      @endforelse

                                  </tbody>
                              </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
