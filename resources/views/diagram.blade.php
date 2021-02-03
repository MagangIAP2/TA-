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
    {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
        Highcharts.chart('chart-diagram', {

            title: {
                text: 'Solar Employment Growth by Sector, 2010-2016'
            },

            subtitle: {
                text: 'Source: thesolarfoundation.com'
            },

            yAxis: {
                title: {
                    text: 'Number of Employees'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2017'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },
            // Edit data pasti buat diagram disini, yg aman jangan di edit. itu dari database
            series: [{
                name: 'Merah Bawah',
                data: [500, 1000, 1500, 2500],
                lineColor: 'red',
                color: 'red'
            },{
                name: 'Kuning Bawah',
                data: [800, 1300, 1800, 2800],
                lineColor:'yellow'
                // #99d65c
            },{
                name: 'Hijau Bawah',
                data: [1200, 1600, 2100, 3100],
                lineColor:'#99d65c'
            },{
                name: 'Aman',
                data: {!! json_encode($total) !!},
                // data: [1500, 1900, 2400, 3400],
                lineColor:'green'
            },{
                name: 'Hijau Atas',
                data: [1800, 2200, 2700, 3700],
                lineColor: '#99d65c'
            },{
                name: 'Kuning Atas',
                data: [2100, 2500, 3100, 4000],
                lineColor:'yellow'
            },{
                name: 'Merah Atas',
                data: [2400, 2800, 3400, 4300],
                lineColor:'red'
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>

    {{-- {!! $usersChart->script() !!} --}}

    @endsection
