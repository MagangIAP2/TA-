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
                        <li class="breadcrumb-item active">Transaction</li>
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
                            <div class="btn-group float-right">
                            <a href="{{ URL::to('transaction/export') }}" class="btn btn-success">Export</a>
                            <a href="{{ URL::to('transaction/import') }}" class="btn btn-info btn-sm">Import</a>
                        </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $key => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->trx_date }}</td>
                                            <td>{{ "Rp. ".number_format($item->price, 0, 0, ".") }}</td>
                                           
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data transaction</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class='col-md-12'>
                                        {{ $transactions->appends($_GET)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection


