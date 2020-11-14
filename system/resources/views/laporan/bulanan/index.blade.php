@extends('shared._layout')
@section('PageTitle', 'Laporan Bulanan')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')

<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Laporan Bulanan</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('/home');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Bulanan</li>
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
                    Laporan Bulanan
                </div>
                <div class="col-md-6 text-right">
                <!--  -->
                </div>
            </div>
            
            </div>
            <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Bulan</label>
                            </div>
                            <select class="custom-select" name="Bulan_Id" onchange="this.form.submit()">
                            <option value="">Pilih Bulan</option>
                              @foreach($bulan as $bul)
                                <option <?php if($bul->Bulan_Id == $Bulan_Id){ echo 'selected'; } ?> value="{{ $bul->Bulan_Id }}">{{ $bul->Nama_Bulan }}</option>
                               
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
                            </div>
                            <select class="custom-select" name="Tahun_Id" onchange="this.form.submit()">
                            <option value="">Pilih Tahun</option>
                            @foreach($tahun as $tah)
                                <option <?php if($tah->tahun_id == $Tahun_Id){ echo 'selected'; } ?> value="{{ $tah->tahun_id }}">{{ $tah->nama_tahun }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="col-md-4">

                    </div>
                   
                </div>
            </form>
              
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="thead-secondary shadow-secondary">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Unit</th>
                      <th scope="col">Nama Penyewa</th>
                      <th scope="col">U Sewa</th>
                      <th scope="col">Listrik</th>
                      <th scope="col">Air</th>
                      <th scope="col">Kebersihan</th>
                      <th scope="col">Denda</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  $unit = 0 ;
                  $lis = 0;
                  $air = 0;
                  $keber = 0;
                  $denda = 0;
                  $tot = 0;
                  foreach($data as $d){ ?>
                  <tr>
                      <td >{{$i++}}</td>
                      <td >{{$d->Nama_Unit}}</td>
                      <td >{{$d->Nama_Penyewa}}</td>
                      <td class="text-right">{{number_format($d->Jml_Unit,0,',','.')}}</td>
                      <td class="text-right" >{{number_format($d->Jml_Lis,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Jml_Air,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Jml_Kebersihan,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Jml_Denda,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Jml_Total,0,',','.')}}</td>
                    </tr>
                
                  <?php 
                $unit += $d->Jml_Unit;
                $lis += $d->Jml_Lis;
                $air += $d->Jml_Air;
                $keber += $d->Jml_Kebersihan;
                $denda += $d->Jml_Denda;
                $tot += $d->Jml_Total;
                } ?>
                <tr>
                    <td class="text-right" colspan="3">TOTAL</td>
                    <td class="text-right" >{{number_format($unit,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($lis,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($air,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($keber,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($denda,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($tot,0,',','.')}}</td>
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