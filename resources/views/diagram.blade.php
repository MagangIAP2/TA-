    @extends('admin.admin')
    @section('content')

    <div class="content-wrapper">

        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hi !</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Diagram</li>
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
                    <div class="card-header">Sales Graph</div>
                    <div class="card-body" id="chart-diagram">
                    {{-- {!! $usersChart->container() !!} --}}
                    </div>
                </div>
                </div>
                <a href=""> View Digaram</a>
                <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">Latest Transaction</div>
                    <div class="card-body">
                        <div class="table-responsive"> -->
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Lingkar Perut Kanan</th>
                                <th>Lingkar Perut Atas</th>
                                <th>Lingkar Total</th>
                                <th>Minggu Ke</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>1</td>
                                <td>{{$data->lingkar_perut_kanan}} cm</td>
                                <td>{{$data->lingkar_perut_atas}} cm</td>
                                <td>{{$data->lingkar_total}} cm</td>
                                <td>{{$data->minggu_ke}}</td>
                                <td><td>

                                </td>
                            </tr>
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

    <script>
      Highcharts.chart('chart-diagram', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Average Temperature'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: {!! json_encode($minggu) !!}
    },
    yAxis: {
        title: {
            text: 'Centimeter (Cm)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Minimal',
        data: [7.0, 6.9, 9.5]
    },
    {
        name: 'Aman',
        data: {!! json_encode($total) !!}
    },
    {
        name: 'Maksimal',
        data: [25, 45, 65]
    }]
});

    </script>

    {{-- {!! $usersChart->script() !!} --}}

    @endsection
