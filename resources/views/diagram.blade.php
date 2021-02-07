    @extends('admin.admin')
    @section('content')

    <div class="content-wrapper">

        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hi MOMS!</h1>
            </div>
            <div class="col-sm-6">
                <!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Diagram</li>
                </ol> -->
            </div>
            </div>
        </div>
        </div>

        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Grafik Perkembangan Janin</div>
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
                text: 'Rumus Johnson'
            },

            subtitle: {
                text: 'gestional ager'
            },

            yAxis: {
                title: {
                    text: 'Weight baby'
                },
                labels: {
                    formatter: function () {
                        return this.value ;
                    }
                }
            },

            xAxis: {
                categories:[22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42],
            },
            
            

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.9,
                    borderWidth: 0
                }
            },
            // Edit data pasti buat diagram disini, yg aman jangan di edit. itu dari database
            // Mulai dari line 125 - 156
            // Kecuali 140 - 144 

            series: [{
                name: 'Merah Bawah',
                // ini gua tambhahin 1 biar ada sampe minggu ke 5 ,
                // kalo nanti ada minggu ke 6 sampe seterusnya lu tambh aja semuanya 
                data: [430, 501, 600, 660, 760, 875, 1005, 1153, 1319, 1502, 1702, 1918, 
                2146, 2383, 2622, 2859, 3083, 3288, 3462, 3597, 3685],
                lineColor: 'red',
                color: 'red'
            },{
                name: 'Kuning Bawah',
                data: [530, 601, 700, 760, 860, 975, 1105, 1253, 1419, 1602, 1802, 2018, 
                2246, 2483, 2722, 2959, 3183, 3388, 3562, 3697, 3785],
                lineColor:'yellow'
                // #99d65c
            },{
                name: 'Hijau Bawah',
                data: [630, 701, 800, 860, 960, 1075, 1205, 1353, 1519, 1702, 1902, 2118, 
                2346, 2583, 2822, 3059, 3283, 3488, 3662, 3797, 3885],
                lineColor:'#99d65c'
            },{
                // ini dari database 
                name: 'Aman',
                data: {!! json_encode($total) !!},
                // data: [1500, 1900, 2400, 3400],
                lineColor:'blue'
            },{
                name: 'Hijau Atas',
                data: [730, 801, 900, 960, 1060, 1175, 1305, 1453, 1619, 1802, 2002, 2218, 
                2446, 2683, 2922, 3159, 3383, 3588, 3762, 3897, 3985],
                lineColor: '#99d65c'
            },{
                name: 'Kuning Atas',
                data: [830, 901, 1000, 1060, 1160, 1275, 1405, 1553, 1719, 1902, 2102, 2318, 
                2546, 2783, 3022, 3259, 3483, 3688, 3862, 3997, 4085],
                lineColor:'yellow'
            },{
                name: 'Merah Atas',
                data: [930, 1001, 1100, 1160, 1260, 1375, 1505, 1653, 1819, 2002, 2202, 2418, 
                2646, 2883, 3122, 3359, 3583, 3788, 3962, 4097, 4185],
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


    <!-- data berat bayi
    // 400, 600 , 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200, 2400, 2600, 2800, 3000, 3200, 3400, 3600, 3800, 4000, 4200, 4400, 4600, 4800, 5000 -->
