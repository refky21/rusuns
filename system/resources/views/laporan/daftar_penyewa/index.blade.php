@extends('shared._layout')
@section('PageTitle', 'Resume Penyewa')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')

<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Resume Penyewa</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('/home');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Resume Penyewa</li>
         </ol>
	   </div>
</div>

<div class="row">
        <div class="col-lg-12">
		  <!-- Mulai Data -->
          <div class="card">
            <div class="card-header text-white bg-dark">
            <div class="row">
                <div class="col-md-6">
                    Resume Penyewa
                </div>
                <div class="col-md-6 text-right">
                <!--  -->
                </div>
            </div>
            
            </div>
            <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-12" style="font-weight:bold; font-size:18px;text-align:center;margin-bottom:10px;">
                        Laporan Daftar Penyewa<br>
                        Keadaan Per Tanggal : <?= $tanggal;?>
                    </div>
                   
                   
                </div>
            </form>
              
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="thead-secondary shadow-secondary">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Unit</th>
                      <th scope="col">No ID</th>
                      <th scope="col">Penyewa</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Jml Penghuni</th>
                      <th scope="col">Tgl Masuk</th>
                      <th scope="col">Tgl Keluar</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                <?php 
                    $i = 1;
                    $penghuni = 0;
                if($data != null){
                 ?>
                 @foreach($data as $d)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$d->Nama_Unit}}</td>
                     <td>{{$d->No_Reg}}</td>
                     <td>{{$d->Nama}}</td>
                     <td>{{$d->Ktp_Alamat}}</td>
                     <td>{{$d->Ktp_Nik}}</td>
                     <td>{{$d->Jml_Penghuni}}</td>
                     <td>{{\Carbon\Carbon::parse($d->Tgl_Check_In)->format('d F Y')}}</td>
                     <td>{{$d->Tgl_Check_Out}}</td>
                  </tr>

                  <?php
                    $penghuni += $d->Jml_Penghuni;
                  ?>
                @endforeach
                <?php } else{ ?>
                    <tr>
                        <td colspan ='9' > <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <div class="alert-icon">
            <i class="icon-exclamation"></i>
              </div>
              <div class="alert-message">
                <span><strong>Perhatian!</strong> Anda Belum Memilih Rusun.</span>
              </div>
      </div></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan="6" class="text-right">Jumlah Penghuni</th>
                    <th >{{$penghuni}}</th>
                    <th colspan="6">Jiwa</th>
                </tr>
                  </tbody>
                </table>
             </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                    
                      
                    </div>
                </div>
                
            </div>
          </div>


          <!-- Selesai -->
        </div>
      </div>

@endsection


@section('footer')
<!-- Footer Script -->

@endsection