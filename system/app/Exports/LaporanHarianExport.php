<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use Carbon;
use DB;
use Alert;
use Redirect;
use Excel;

class LaporanHarianExport implements FromView
{
    public function __construct(string $id, string $Rusun_Id)
    {
        $this->tanggal_bayar = $id;
        $this->Rusun_Id = $Rusun_Id;
    }

    public function view(): View
    {   
        $data = DB::table('pembayaran')
        ->join('check_in', 'pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        ->join('penyewa', 'check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->join('unit_sewa', 'check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        ->select('check_in.Check_In_Id',
        'check_in.Unit_Sewa_Id',
        'check_in.Penyewa_Id',
        'penyewa.Nama',
        'unit_sewa.Nama_Unit'
        )
        ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit')
        ->where('Tgl_Bayar',date('Y-m-d', strtotime($this->tanggal_bayar)))->get();
        $datas = [];
        $i = 0;
        foreach($data as $d){
            $datas[$i] = new \stdClass();

            // $datas[$i]->Pembayaran_Id = $d->Pembayaran_Id;
            $datas[$i]->Check_In_Id = $d->Check_In_Id;
            $datas[$i]->Unit_Sewa_Id = $d->Unit_Sewa_Id;
            $datas[$i]->Penyewa_Id = $d->Penyewa_Id;
            $datas[$i]->Nama_Penyewa = $d->Nama;
            $datas[$i]->Nama_Unit = $d->Nama_Unit;

            $sewa_unit = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 1],['Tgl_Bayar',date('Y-m-d', strtotime($this->tanggal_bayar))]])->select('Jumlah')->first();
            if($sewa_unit != null){
                $jml_unit = $sewa_unit->Jumlah;
            }else{
                $jml_unit = 0;
            }
            $datas[$i]->Jml_Unit = $jml_unit;
           
            $listrik = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 2],['Tgl_Bayar',date('Y-m-d', strtotime($this->tanggal_bayar))]])->select('Jumlah')->first();
            if($listrik != null){
                $jml_lis = $listrik->Jumlah;
            }else{
                $jml_lis = 0;
            }
            $datas[$i]->Jml_Lis = $jml_lis;

            $air = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 3],['Tgl_Bayar',date('Y-m-d', strtotime($this->tanggal_bayar))]])->select('Jumlah')->first();
            if($air != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Air = $jml_air;

            $keber =DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 4],['Tgl_Bayar',date('Y-m-d', strtotime($this->tanggal_bayar))]])->select('Jumlah')->first();
            if($keber != null){
                $jml_air = $keber->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Kebersihan = $jml_air;

            $denda = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 7],['Tgl_Bayar',date('Y-m-d', strtotime($this->tanggal_bayar))]])->select('Jumlah')->first();
            if($denda != null){
                $jml_denda = $denda->Jumlah;
            }else{
                $jml_denda = 0;
            }
            $datas[$i]->Jml_Denda = $jml_denda;


            $total = $jml_unit + $jml_lis + $jml_air + $jml_denda;
            $datas[$i]->Jml_Total = $total;


            $i++;
        }

        $rusun = DB::table('mstr_rusun')->where('info_id',  $this->Rusun_Id)->first();
        $tanggal = tanggal_indonesia($id,false);
        // dd($tanggal);

        return view('laporan.cetak.excel.harian', [
            'data' => $datas,
            'rusun' => $rusun,
            'tanggal' => $tanggal
        ]);        
            // dd($datas);

    }
}