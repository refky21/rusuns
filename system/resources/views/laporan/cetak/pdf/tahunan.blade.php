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
       LAPORAN PENERIMAAN TAHUNAN <br> <h6>KOMPONEN : {{$item->Nama_Item}}</h6>
        </td>
        <td width=" 15%"></td>
      </tr>
    </table>

  <table border="1px" style="border-collapse : collapse; width:100%; font-size:13px;">
  <thead>
    <tr>
        <th width="3%">#</th>
        <th width="15%"><center>Nama</center></th>
        <th><center>Januari<center></th>
        <th><center>Februari<center></th>
        <th><center>Maret</center></th>
        <th><center>April</center></th>
        <th><center>Mei</center></th>
        <th><center>Juni</center></th>
        <th><center>Juli</center></th>
        <th><center>Agustus</center></th>
        <th><center>September</center></th>
        <th><center>Oktober</center></th>
        <th><center>November</center></th>
        <th><center>Desember</center></th>
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
                  foreach($datas as $d){ ?>
                  <tr>
                      <td >{{$i++}}</td>
                      <td >{{$d->Nama_Penyewa}}</td>
                      <td style="text-align:right">{{number_format($d->Januari,0,',','.')}}</td>
                      <td style="text-align:right" >{{number_format($d->Febuari,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Maret,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->April,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Mei,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Juni,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Juli,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Agustus,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->September,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Oktober,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->November,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Desember,0,',','.')}}</td>
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
                    <td style="text-align:right" colspan="2">TOTAL</td>
                    <td style="text-align:right" >{{number_format($jan,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($feb,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($mar,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($apr,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($mei,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($jun,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($jul,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($aug,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($sep,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($okt,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($nov,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($des,0,',','.')}}</td>
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

