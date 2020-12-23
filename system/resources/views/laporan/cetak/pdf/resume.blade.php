<!DOCTYPE html>
<html>
<head>

  <style>
    /* @page { margin: 180px 60px 190px 60px; } */
    @page :first {  margin: 50px 60px 190px 60px;}
    #footer { position: fixed; left: 0px; bottom: -10px; right: 0px; height: 10px; }

    p{
      font-size: 13px;
    }
  </style>


  <table style="width:100%; font-size:15px;">
      <tr>
        <td width=" 15%"><img src="{{ url('assets/images/logo-icon.png') }}" style="width:70px;" alt=""></td>
        <td width=" 2%"></td>
        <td width=" 60%"><center><b>{{strtoupper($rusun->nama_rusun)}}</b><br><u>{{$rusun->alamat_rusun}}</u></td>
        <td width=" 2%"></td>
        <td width=" 15%"></td>
      </tr>
    </table>
   
</head>
<body>

  <table style="width:100%; font-size:15px;">
      <tr>
        <td width=" 15%"></td>
        <td width=" 70%"><center><b>
        Laporan Resume Penyewa (Tagihan vs Pembayaran) <br> <h6>Keadaan Per Tanggal : {{$tanggal}}</h6>
        </td>
        <td width=" 15%"></td>
      </tr>
    </table>

  <table border="1px" style="border-collapse : collapse; width:100%; font-size:13px;">
  <thead>
    <tr>
        <th width="3%">No</th>
        <th width="15%"><center>No. ID</center></th>
        <th><center>Penyewa<center></th>
        <th><center>Alamat<center></th>
        <th><center>Nama Unit</center></th>
        <th><center>Tgl Masuk</center></th>
        <th><center>Jml Tagihan</center></th>
        <th><center>Jml Pembayaran</center></th>
        <th><center>Jml Tunggakan</center></th>
    </tr>
   
  </thead>
  <tbody>
  <?php 
                $i = 1;
                $tag = 0;
                $bay = 0;
                $tung = 0;
                  foreach($datas as $d){ ?>
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$d->Kode_Sewa}}</td>
                     <td>{{$d->Nama_Penyewa}}</td>
                     <td>{{$d->Alamat}}</td>
                     <td>{{$d->Nama_Unit}}</td>
                     <td>{{$d->Tgl_Masuk}}</td>
                     <td style="text-align:right">{{number_format($d->Tagihan,0,',','.')}}</td>
                     <td style="text-align:right">{{number_format($d->Pembayaran,0,',','.')}}</td>
                     <td style="text-align:right">{{number_format($d->Tunggakan,0,',','.')}}</td>
                  </tr>
                
                  <?php 
                    $tag += $d->Tagihan;
                    $bay += $d->Pembayaran;
                    $tung += $d->Tunggakan;
                } ?>
                <tr>
                    <td style="text-align:right" colspan="6">TOTAL</td>
                    <td style="text-align:right" >{{number_format($tag,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($bay,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($tung,0,',','.')}}</td>
                </tr>
               
    </tbody>
  
    
    
  </table>
  <br>
  
  <br>
  <table  style="width:100%; font-size:13px;">
    <tr>
      <td style="width:33%;">
        <div style="height:120px;">  
        MENGETAHUI / MENYETUJUI</br>
        KEPALA DINAS PERKIM KOTA MAGELANG
        </div>
        {{strtoupper($rusun->nama_kepala_dpu)}}
        <hr style="width:80%; margin-left:0%;">
        
      </td>
      <td style="width:33%;">
        
      </td>
      <td style="width:33%;">
        <div style="height:120px;"> YANG MELAPORKAN</br>
                    KEPALA UPT RUSUNAWA </div>
        {{strtoupper($rusun->nama_kepala_upt)}}
        <hr style="width:80%; margin-left:0%;">
      </td>
    </tr>
    <tr>
      
      <td><label for="">{{strtoupper($rusun->nip_kepala_dpu)}}</label></td>
      <br>
      <td><label for=""></label></td>
      <td><label for="">{{strtoupper($rusun->nip_kepala_upt)}}</label></td>
    </tr>
  </table>
</body>
</html>

