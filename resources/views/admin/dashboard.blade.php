    @extends('admin.admin')
    @section('content')

    <div class="content-wrapper">

        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hi BUNDA  {{auth()->user()->nama_lengkap}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            </div>
        </div>
        </div>

        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- <a href="{{route('diagram', $datas->user_id)}}" class="btn btn-primary m-1" type="button">Lihat Diagram</a> --}}
                <div class="card">
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tinggi Fundus Uteri</th>
                                <th>Nilai [ X ]</th>
                                <th>Taksiran berat janin</th>
                                <th>Minggu Ke</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                        @forelse ($datas as $data)
                            @if ($data->user_id == auth()->user()->id)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$data->tfu}} cm</td>
                                    <td>{{$data->x}} cm</td>
                                    <td>{{$data->tbh}} cm</td>
                                    <td>{{$data->minggu_ke}}</td>
                                    <td>
                                        <a href="{{route('diagram', $data->user_id)}}" class="btn btn-primary"> View Diagram</a>
                                        <form action="{{route('delete', $data->id)}}" method="post" style="display: inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> Hapus Data </button>
                                        </form>

                                    </td>
                                </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data transaction</td>
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
        </div>
    </div>

    @endsection
    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
    @endsection
