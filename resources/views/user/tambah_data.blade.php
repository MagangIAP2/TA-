@extends('admin.admin')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Data Pasien</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Pasien</li>
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
                    <h3 style="padding-left: 10px">Menggunakan Rumus Johnson</h3>
                    <div class="card-body">
                    <div class="table-responsive">
                    <form action="{{route('tambah.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="tfu">Tinggi Fundus Uteri</label>
                            <input type="text" name="tfu" class="form-control" id="tfu" aria-describedby="emailHelp" placeholder="Tingi Fundus Uteri Dalam Cm">
                            <!-- <small id="lingkar_perut_kanan"  class="form-text text-muted"> -->
                        </div>
                        <div class="form-group">
                            <label for="x">Nilai [ X ]</label>
                            <input type="text" name="x" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nilai [ X ]">
                            <span> X = 13 jika bagian tubuh janin (biasanya kepala) belum masuk panggul</span> <br>
                            <span> X = 12 jika bagian tubuh janin sudah berada di pintu panggul</span><br>
                            <span> X = 11 jika bagian tubuh janin sudah masuk panggul</span>
                        </div>
                        <div class="form-group">
                            <label for="minggu_ke">minggu ke</label>
                            <input type="text" name="minggu_ke" class="form-control" id="exampleInputPassword1" placeholder="Minggu Ke">
                        </div>
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                <div class="card">
                    <h3 style="padding-left: 10px">Upload Dokumen</h3>
                    <div class="card-body">
                    <div class="table-responsive">
                    <form action="{{route('tambah.dokumen.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                            <!-- <small id="lingkar_perut_kanan"  class="form-text text-muted"> -->
                        </div>
                        <div class="form-group">
                            <label for="dokumen">Upload Dokumen</label>
                            <input type="file" name="dokumen" class="form-control" id="dokumen" >
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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

@endsection
