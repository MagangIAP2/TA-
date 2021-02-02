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
                
                <div class="card-body">
                  <div class="table-responsive">
                  <form action="{{route('tambah.store')}}" method="post">
                  @csrf
                    <div class="form-group">
                        <label for="lingkar_perut_kanan">Lingkar Perut Kanan -> kiri</label>
                        <input type="text" name="lingkar_perut_kanan" class="form-control" id="lingkar_perut_kanan" aria-describedby="emailHelp" placeholder="Lingkar Perut Kanan -> Kiri">
                        <!-- <small id="lingkar_perut_kanan"  class="form-text text-muted"> -->
                    </div>
                    <div class="form-group">
                        <label for="lingkar_perut_atas">lingkar perut atas -> bawah</label>
                        <input type="text" name="lingkar_perut_atas" class="form-control" id="exampleInputPassword1" placeholder="lingkar perut atas -> bawah">
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
  </div>
  
  @endsection
  @section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  
  @endsection