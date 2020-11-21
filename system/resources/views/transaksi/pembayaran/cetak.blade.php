<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="2; url=<?php url('pembayaran/cetak/'.$data->Pembayaran_Id);?>">
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
 window.focus();
 window.print();
//}
</script>

  <style>
  @page {  size: 8.27in 12.99in; margin: 60px 50px 30px 50px;}
    footer { position: fixed; left: 0px; bottom: -80px; right: 0px; height: 100px;font-size: 8pt;text-align: right;font-style: italic; color: lightblue; }
    #thesiss {
        border: 1px solid;
        vertical-align: top;
    }
  </style>
  <table style="width:100%; font-size:14pt; margin: -30px 50px 30px 50px;">
    <tr>
      <td width=" 2%"></td>
      <td width=" 60%"><center><img src={{url('assets/images/logo-icon.png')}} style="width:90px;" alt=""></td>
      <td width=" 2%"></td>
    </tr>
    <tr>
      <td width=" 2%"></td>
      <td width=" 60%" style="boder:1px solid #000;"><center><b> {{$rusun->nama_rusun}} <br>  {{$rusun->alamat_rusun}} <br><br>TANDA BUKTI PEMBAYARAN</td>
      <td width=" 2%"></td>
    </tr>
    </table>
      <center style="font-size:10pt;"></center>
      <hr style="boder:1px solid #000;">
      <table  style="width:100%; font-size:10pt; margin: 0px 0px 0px 0px;">
        <tr>
          <td width="20%">Nama</td>
          <td colspan="3" width="60%"> : {{$data->Nama}}</td>
        </tr>
        
        <tr>
          <td>Kode CheckIn</td>
          <td colspan="3"> : {{$data->Check_In_Id}}</td>
        </tr>
        <tr>
          <td>Nama Unit</td>
          <td colspan="3"> : {{$data->Nama_Unit}}</td>
        </tr>
        <tr>
          <td><i>Kode Unit</td>
          <td colspan="3">&nbsp; {{$data->Kode_Unit}}</td>
        </tr>
        <tr>
          <td>Jenis Pembayaran</td>
          <td colspan="3"> :  {{$data->Keterangan}}</td>
        </tr>
        <?php
        $date = strtotime($data->Tgl_Bayar);
        $birth = date('Y-m-d', $date);
        ?>
        <tr>
          <td></td>
          <td width="30%">  </td>
          <td></td>
          <td>  </td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td width="30%"> : <b>{{ tanggal_indonesia($birth,false)}}</b></td>
          <!-- <td>Nominal Bayar</td>
          <td> : <b>{{ tanggal_indonesia($birth,false)}}</b></td> -->
        </tr>
       
      </table>
</head>
<body>
  <footer>
    Kwitansi Detail Pembayaran
  </footer>
  <br>
    <table border="1px" style="border-collapse : collapse; width:100%; font-size:13px; margin: 10px 0px 30px 0px;">
      <thead>
        <tr>
          <th width="1%"><center>No.</th>
            <th width="10%" ><center>Item Pembayaran<br> &nbsp;</th>
              <th width="6%"><center>Tahun<br></th>
            <th width="6%"><center>Bulan<br></th>
              <th width="6%"><center>Jumlah<br></th>
           
        </tr>
      </thead>
      <tbody>
      @php
      $no = 1;

      $total = 0;
      @endphp

       @foreach($data->Detail_Pembayaran as $d)
            <tr>
            <td><center>{{$no++}}</center></td>
            <td>{{$d->Nama_Item}}</td>
            <td><center>{{$d->Tahun}}</center></td>
            <td><center>{{bulan($d->Bulan)}}</center></td>
            <td style="text-align: right">{{number_format($d->Jumlah,0,',','.')}}</td>

            </tr>

            <?php 
              $total += $d->Jumlah;
            ?>
        @endforeach

        <tr>
        <td colspan="4" ><center style="font-weight: bold; font-size:15px;">Total</center> <br>
        <center><i><?= ucwords(terbilang($total))." Rupiah";?></i></center>
        </td>
        <td style="text-align: right;font-weight: bold; font-size:15px;">{{number_format($total,0,',','.')}}</td>
        </tr>
           
         
      </tbody>
    </table>
      
    <table style="width:100%;">
      <tr>
        <td style="width:55%;"></td>
        <td style="width:45%;">
          <label for="" style="font-size:13px;"> <?php echo tanggal_indonesia(date('Y-m-d')); ?> </label><br>

        </td>
      </tr>
      <tr>
        <td style="width:55%;"></td>
        <td style="width:45%;">
          <label for="" style="font-size:13px;">Petugas Penerima,<br> </label><br>
          <div style="height:70px;"></div>
          <label for="" style="font-size:13px;">{{$rusun->nama_kasubag_tu}}<br>{{$rusun->nip_kasubag_tu}}</label><br>
        </td>
      </tr>
    </table>

</body>
</html>
