<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="2; url=<?php url('cetak_tagihan/print/'.$penyewa->Check_In_Id);?>">
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
 window.focus();
 window.print();
//}
</script>
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
       DAFTAR TAGIHAN PENGHUNI RUSUN
        </td>
        <td width=" 15%"></td>
      </tr>
    </table>

  <br><br>
  <table  style="width:100%; font-size:12px;">
    <tr>
      <td style="width:15%;">Nama Penghuni</td><td style="width:1%;">:</td>
      <td style="width:34%;">{{$penyewa->Nama}}</td>
      <td style="width:15%;">Nomor Pelanggan</td><td style="width:1%;">:</td>
      <td style="width:34%;">{{$penyewa->Check_In_Id}}</td>
      
    </tr>
    <tr>
      <td>Periode</td><td>:</td>
      <td><b>{{$bulan->Nama_Bulan}}</b></td>
      <td>Nama Unit</td><td>:</td>
      <td>{{$penyewa->Nama_Unit}}</td>
    </tr>
    <tr>
      <td>Tanggal Cetak</td><td>:</td>
      <td>{{tanggal_indonesia(date('Y-m-d'),true)}}</td>
      <td>Jumlah Tagihan</td><td>:</td>
      <td><b>Rp. {{format_uang($nominal)}}</b></td>
    </tr>
    
    
  </table>
    <br>
  <table border="1px" style="border-collapse : collapse; width:100%; font-size:13px;">
    <tr>
      <th width="3%"><center>No</th>
      <th><center>Keterangan</center></th>
      <th><center>Jumlah</center></th>
    </tr>
    <?php 
        $no = 1;
        $jml = 0;
    ?>
   @foreach($data as $d)

    <tr>
      <td height="10px"><center><b>{{$no++}}</b></center></td>
      <td>{{$d['Nama_Tagihan']}} - <i>{{$d['Bulan']}} {{$d['Tahun']}}</i></td>
      <td align="right">{{format_uang($d['Jumlah'])}}</td>
    </tr>
    <?php 
    $jml += $d['Jumlah']; 
     ?>
    @endforeach
    <tr>
      <td colspan="2" align="right">Total</br>
      </td>
      <td align="right"><b>{{format_uang($jml)}}</b></td>
    </tr>
    
  </table>
  <br>
  <table style="width:100%;">
    <tr>
      <td style="width:100%;">
      <center>
        <label for="" style="font-size:14px;"><i>{{ucwords(terbilang($nominal))}} Rupiah</i> </label><br><hr style="width:100%; margin-right:0%;">
        <br>
        <label for="" style="font-size:11px;"><i>Tanda Bukti Pembayaran ini dinyatakan sah apabila disertai tanda stempel</i> </label>
        

    </center>
      </td>
    </tr>
  </table>
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
      
      *) Tagihan Ini di Cetak Oleh {{ ucwords(Auth::user()->name) }}</label></td>
      <br>
      <td><label for=""></label></td>
      <td><label for="">{{strtoupper($rusun->nama_kasubag_tu)}}</label></td>
    </tr>
  </table>
</body>
</html>

