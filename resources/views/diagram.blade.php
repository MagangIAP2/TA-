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
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="card">

                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tinggi Fundus Uteri</th>
                                <th>Nilai [ X ]</th>
                                <th>Taksiran berat janin</th>
                                <th>Minggu Ke</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>#</td>
                                <td>{{$data->tfu}} cm</td>
                                <td>{{$data->x}} cm</td>
                                <td>{{$data->tbh}} cm</td>
                                <td>{{$data->minggu_ke}}</td>
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
        text: 'Taksiran Berat Janin'
    },
    subtitle: {
        text: 'Tugas Akhir Arif Ariyanto S.Kom'
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
        data: [1000, 2500, 3000]
    },
    {
        name: 'Aman',
        data: {!! json_encode($total) !!}
    },
    {
        name: 'Maksimal',
        data: [7000, 8000, 9000]
    }]
});

    </script>

    {{-- {!! $usersChart->script() !!} --}}

    @endsection
