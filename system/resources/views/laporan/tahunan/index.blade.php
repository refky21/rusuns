@extends('shared._layout')
@section('PageTitle', 'Laporan Tahunan')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')

<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Laporan Tahunan</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('/home');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Tahunan</li>
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
                    Laporan Tahunan
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
                                <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
                            </div>
                            <select class="custom-select" name="Tahun_Id" onchange="this.form.submit()">
                            <option value="">Pilih Tahun</option>
                            @foreach($tahun as $tah)
                                <option <?php if($tah->tahun_id == $Tahun_Id){ echo 'selected'; } ?> value="{{ $tah->tahun_id }}">{{ $tah->nama_tahun }}</option>
                            @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Komponen</label>
                            </div>
                            <select class="custom-select" name="Item_Id" onchange="this.form.submit()">
                            <option value="">Pilih Komponen</option>
                              @foreach($item as $it)
                                <option <?php if($it->Item_Pembayaran_Id == $Item_Id){ echo 'selected'; } ?> value="{{ $it->Item_Pembayaran_Id }}">{{ $it->Nama_Item }}</option>
                               
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
                      <th scope="col">Nama</th>
                      <th scope="col">Januari</th>
                      <th scope="col">Februari</th>
                      <th scope="col">Maret</th>
                      <th scope="col">April</th>
                      <th scope="col">Mei</th>
                      <th scope="col">Juni</th>
                      <th scope="col">Juli</th>
                      <th scope="col">Agustus</th>
                      <th scope="col">September</th>
                      <th scope="col">Oktober</th>
                      <th scope="col">November</th>
                      <th scope="col">Desember</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  $jan = 0 ;
                  $feb = 0;
                  $mar = 0;
                  $apr = 0;
                  $mei = 0;
                  $jun = 0;
                  $jul = 0;
                  $aug = 0;
                  $sep = 0;
                  $okt = 0;
                  $nov = 0;
                  $des = 0;
                  $tot = 0;
                  foreach($data as $d){ ?>
                  <tr>
                      <td >{{$i++}}</td>
                      <td >{{$d->Nama_Penyewa}}</td>
                      <td class="text-right">{{number_format($d->Januari,0,',','.')}}</td>
                      <td class="text-right" >{{number_format($d->Febuari,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Maret,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->April,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Mei,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Juni,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Juli,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Agustus,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->September,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Oktober,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->November,0,',','.')}}</td>
                      <td class="text-right">{{number_format($d->Desember,0,',','.')}}</td>
                    </tr>
                
                  <?php 
                $jan += $d->Januari;
                $feb += $d->Febuari;
                $mar += $d->Maret;
                $apr += $d->April;
                $mei += $d->Mei;
                $jun += $d->Juni;
                $jul += $d->Juli;
                $aug += $d->Agustus;
                $sep += $d->September;
                $okt += $d->Oktober;
                $nov += $d->November;
                $des += $d->Desember;
                } ?>
                <tr>
                    <td class="text-right" colspan="2">TOTAL</td>
                    <td class="text-right" >{{number_format($jan,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($feb,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($mar,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($apr,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($mei,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($jun,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($jul,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($aug,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($sep,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($okt,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($nov,0,',','.')}}</td>
                    <td class="text-right" >{{number_format($des,0,',','.')}}</td>
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