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
                        Laporan Resume Penyewa (Tagihan vs Pembayaran)<br>
                        Keadaan Per Tanggal : <?= $tanggal;?>
                    </div>
                   
                   
                </div>
            </form>
              
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="thead-secondary shadow-secondary">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">No. ID</th>
                      <th scope="col">Penyewa</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Nama Unit</th>
                      <th scope="col">Tgl Masuk</th>
                      <th scope="col">Jml Tagihan</th>
                      <th scope="col">Jml Pembayaraan</th>
                      <th scope="col">Jml Tunggakan</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php 
                  $i = 1;
                  $tag = 0;
                  $bay = 0;
                  $tung = 0;
                  @endphp
                 @foreach($data as $d)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$d->Kode_Sewa}}</td>
                     <td>{{$d->Nama_Penyewa}}</td>
                     <td>{{$d->Alamat}}</td>
                     <td>{{$d->Nama_Unit}}</td>
                     <td>{{$d->Tgl_Masuk}}</td>
                     <td class="text-right">{{number_format($d->Tagihan,0,',','.')}}</td>
                     <td class="text-right">{{number_format($d->Pembayaran,0,',','.')}}</td>
                     <td class="text-right">{{number_format($d->Tunggakan,0,',','.')}}</td>
                  </tr>

                  @php
                  $tag += $d->Tagihan;
                  $bay += $d->Pembayaran;
                  $tung += $d->Tunggakan;
                  @endphp
                @endforeach
                
                <tr>
                    <td class="text-right" colspan="6">TOTAL</td>
                    <td class="text-right" >{{number_format($tag,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($bay,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($tung,0,',','.')}}</td>
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