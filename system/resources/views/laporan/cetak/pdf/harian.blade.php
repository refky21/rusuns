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
       LAPORAN PENERIMAAN HARIAN <br> <h6>TANGGAL : {{$tgl}}</h6>
        </td>
        <td width=" 15%"></td>
      </tr>
    </table>

  <table border="1px" style="border-collapse : collapse; width:100%; font-size:13px;">
  <thead>
    <tr>
      <th width="3%"><center>No</th>
      <th><center>Nama Unit</center></th>
      <th><center>Nama Penyewa</center></th>
      <th><center>U.Sewa</center></th>
      <th><center>Listrik</center></th>
      <th><center>Air</center></th>
      <th><center>Kebersihan</center></th>
      <th><center>Denda</center></th>
      <th><center>Total</center></th>
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
                  foreach($datas as $d){ ?>
                  <tr>
                      <td style="text-align:center">{{$i++}}</td>
                      <td style="text-align:center">{{$d->Nama_Unit}}</td>
                      <td >{{$d->Nama_Penyewa}}</td>
                      <td style="text-align:right">{{number_format($d->Jml_Unit,0,',','.')}}</td>
                      <td style="text-align:right" >{{number_format($d->Jml_Lis,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Jml_Air,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Jml_Kebersihan,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Jml_Denda,0,',','.')}}</td>
                      <td style="text-align:right">{{number_format($d->Jml_Total,0,',','.')}}</td>
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
                    <td style="text-align:right" colspan="3">TOTAL</td>
                    <td style="text-align:right" >{{number_format($unit,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($lis,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($air,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($keber,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($denda,0,',','.')}}</td>
                    <td style="text-align:right" >{{number_format($tot,0,',','.')}}</td>
                </tr>
    </tbody>
  
    
    
  </table>
  <br>
  
  <br>
  <table  style="width:100%; font-size:13px;">
    <tr>
      <td style="width:33%;">
        <div style="height:80px;">  </div>

        
      </td>
      <td style="width:33%;">
        
      </td>
      <td style="width:33%;">
        <div style="height:80px;"> Kasubag Tata Usaha </div>

        <hr style="width:80%; margin-left:0%;">
      </td>
    </tr>
    <tr>
      
      <td><label for="" style="font-size:10px;">
      
      *) Tagihan Ini di Buat Oleh {{ ucwords(Auth::user()->name) }}</label></td>
      <br>
      <td><label for=""></label></td>
      <td><label for="">{{strtoupper($rusun->nama_kasubag_tu)}}</label></td>
    </tr>
  </table>
</body>
</html>

