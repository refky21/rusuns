<?php
function tanggal_indonesia($tgl, $tampil_hari=true){
      $nama_hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
      $nama_bulan = array (
              1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
              "September", "Oktober", "November", "Desember");
      $tahun=substr($tgl,0,4);
      $bulan=$nama_bulan[(int)substr($tgl,5,2)];
      $tanggal=substr($tgl,8,2);
      $text="";
      if ($tampil_hari) {
          $urutan_hari=date('w', mktime(0,0,0, substr($tgl,5,2), $tanggal, $tahun));
          $hari=$nama_hari[$urutan_hari];
          $text .= $hari.", ";
      }
          $text .=$tanggal ." ". $bulan ." ". $tahun;
      return $text;
}

function bulan($bln){
    $bulan = $bln;
    Switch ($bulan){
     case 1 : $bulan="Januari";
      break;
     case 2 : $bulan="Februari";
     break;
     case 3 : $bulan="Maret";
     break;
     case 4 : $bulan="April";
     break;
     case 5 : $bulan="Mei";
     break;
     case 6 : $bulan="Juni";
     break;
     case 7 : $bulan="Juli";
     break;
     case 8 : $bulan="Agustus";
     break;
     case 9 : $bulan="September";
     break;
     case 10 : $bulan="Oktober";
     break;
     case 11 : $bulan="November";
     break;
     case 12 : $bulan="Desember";
     break;
     }
    return $bulan;
    }