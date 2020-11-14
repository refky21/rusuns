<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class LaporanHarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'LaporanHarian-View')->count() > 0) {
            return view('errors.403');
        }

        $Rusun_Id = Input::get('Rusun_Id');

        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->get();

        $tanggal = Input::get('tanggal');

        // dd($rusun);


       
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }


        // if($tanggal != null){
        // }else{
        //     $query = [];
        // }
        
        $data = DB::table('pembayaran')
        ->join('check_in', 'pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        ->join('penyewa', 'check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->join('unit_sewa', 'check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        ->select('check_in.Check_In_Id',
        'pembayaran.Pembayaran_Id',
        'check_in.Unit_Sewa_Id',
        'check_in.Penyewa_Id',
        'penyewa.Nama',
        'unit_sewa.Nama_Unit'
        )
        ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit','Pembayaran_Id')
        ->where('Tgl_Bayar',date('Y-m-d', strtotime($tanggal)))->get();


            
        $datas = [];
        $i = 0;
        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Pembayaran_Id = $d->Pembayaran_Id;
            $datas[$i]->Check_In_Id = $d->Check_In_Id;
            $datas[$i]->Unit_Sewa_Id = $d->Unit_Sewa_Id;
            $datas[$i]->Penyewa_Id = $d->Penyewa_Id;
            $datas[$i]->Nama_Penyewa = $d->Nama;
            $datas[$i]->Nama_Unit = $d->Nama_Unit;

            $sewa_unit = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 1]])->select('Jumlah')->first();
            if($sewa_unit != null){
                $jml_unit = $sewa_unit->Jumlah;
            }else{
                $jml_unit = 0;
            }
            $datas[$i]->Jml_Unit = $jml_unit;
           
            $listrik = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 2]])->select('Jumlah')->first();
            if($listrik != null){
                $jml_lis = $listrik->Jumlah;
            }else{
                $jml_lis = 0;
            }
            $datas[$i]->Jml_Lis = $jml_lis;

            $air = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 3]])->select('Jumlah')->first();
            if($air != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Air = $jml_air;

            $keber = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 4]])->select('Jumlah')->first();
            if($keber != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Kebersihan = $jml_air;

            $denda = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 7]])->select('Jumlah')->first();
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


        // dd($datas);


       

        return view('laporan.harian.index', compact('rusun','Rusun_Id'))
        // ->with('rowpage', $rowpage)
        ->with('data', $datas)
        ->with('tanggal', $tanggal)
        ->with('all_access',$access);
        
    }
}
