
@extends('../main')

@section('title','Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Laporan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">1. Penduduk usia produktif (15 - 64 tahun)</strong>
                        </div>
                        <div class="card-body">
                   
     
                    <br>
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Nomor Kartu Keluarga</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($penduduk as $pd)
                      <tr>
                     
                        <td>{{ $pd->nama }}</td>
                        <td>{{ $pd->nik }}</td>
                        <td>{{ $pd->kartu_keluarga->no }}</td>
                        <td>{{ $pd->tanggal_lahir }}</td>
                       <td> {{\Carbon\Carbon::parse($pd->tanggal_lahir)->age}} Tahun</td>
                      </tr>
                  
                    @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
               

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


@endsection