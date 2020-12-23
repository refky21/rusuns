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
        Laporan Daftar Penyewa<br> <h6>Keadaan Per Tanggal : {{$tanggal}}</h6>
        </td>
        <td width=" 15%"></td>
      </tr>
    </table>

  <table border="1px" style="border-collapse : collapse; width:100%; font-size:13px;">
  <thead>
    <tr>
        <th >No</th>
        <th ><center>Nama Unit</center></th>
        <th><center>No ID<center></th>
        <th><center>Penyewa<center></th>
        <th><center>Alamat</center></th>
        <th ><center>NIK</center></th>
        <th><center>Jml Penghuni</center></th>
        <th><center>Tgl Masuk</center></th>
        <th><center>Tgl Keluar</center></th>
    </tr>
   
  </thead>
  <tbody>
  <?php 
                $i = 1;
                $tag = 0;
                  foreach($datas as $d){ ?>
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$d->Nama_Unit}}</td>
                     <td>{{$d->No_Reg}}</td>
                     <td>{{$d->Nama}}</td>
                     <td>{{$d->Ktp_Alamat}}</td>
                     <td>{{$d->Ktp_Nik}}</td>
                     <td>{{$d->Jml_Penghuni}}</td>
                     <td>{{tanggal_indonesia($d->Tgl_Check_In,false)}}</td>
                     <?php
                        if($d->Tgl_Check_Out != null){
                            $tg = date('Y-m-d', strtotime($d->Tgl_Check_Out));
                            $tgl = tanggal_indonesia($tg,false);
                        }else{
                            $tgl = null;
                        }
                     ?>
                     <td>{{$tgl}}</td>
                  </tr>
                
                  <?php 
                    $tag += $d->Jml_Penghuni;
                } ?>
                <tr>
                <th colspan="6" class="text-right">Jumlah Penghuni</th>
                <th >{{$tag}}</th>
                <th colspan="6">Jiwa</th>
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

