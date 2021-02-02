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
                        <li class="breadcrumb-item active">Product</li>
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
                            List All Product
                            <a href="{{ route('product.create') }}" class="btn btn-success float-right btn-sm">Tambah</a>
                        </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('Category') }}
                                            {{ Form::select('category_id', $categories, $cat_id, ['class' => 'form-control', 'placeholder' => 'All Category', 'id' =>'category_id']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('Keyword') }}
                                            {{ Form::text('Keyword', $keyword, ['class' => 'form-control', 'placeholder' => 'Enter keyword', 'id' => 'keyword']) }}

                                        </div>
                                    </div>
                                </div>

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

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>SKU</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th width="250px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $key => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ "Rp. ".number_format($item->price, 0, 0, ".") }}</td>
                                            <td>{{ $item->aku }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="width:100px"><img style="width: 100%, height: 100px" src="{{ asset('storage/'.$item->image) }}" class="img-fluid rounded-circle"/></td>
                                            <td>
                                                {{ Form::open(['route' => ['product.destroy', $item->id], 'method' => 'DELETE']) }}
                                                <a href="{{ route('product.show', $item->id) }}" class="btn btn-info" title="Detail Product"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-success" title="Edit Product"><i class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Product"><i class="fa fa-trash-alt"></i></button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data product</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class='col-md-12'>
                                        {{ $products->appends($_GET)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
\
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $("#category_id").change(function(){
            filter();
        });
        $("#keyword").keypress(function(event){
            if(event.keyCode == 13){ // untuk enter 113
            filter();
            }
        });

        var filter = function(){
            var valueCategory = $("#category_id").val();
            var valuekeyword = $("#keyword").val();
            window.location.replace("{{ route('product.index') }}?category=" + valueCategory + "&keyword=" +valuekeyword);
        }
    })
</script>
@endsection
