<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class LaporanTahunanController extends Controller
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

        if (!$access->where('name', 'LaporanTahunan-View')->count() > 0) {
            return view('errors.403');
        }

        $Rusun_Id = Input::get('Rusun_Id');

        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->get();

        $tanggal = Input::get('tanggal');

        $tahun = DB::table('tahun')->get();
        $Tahun_Id = Input::get('Tahun_Id');
        
        $item = DB::table('item_pembayaran')->get();
        $Item_Id = Input::get('Item_Id');


       
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }



        // $data = DB::table('pembayaran')
        // ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
        // ->join('check_in','pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        // ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        // ->where([['Tahun',2020],['Item_Pembayaran_Id',1]])
        // ->get();

        $data = DB::table('pembayaran_detail')
        ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
        ->join('check_in','pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['check_in.Check_Out',null]])
        ->select('Nama','pembayaran.Check_In_Id')
        ->groupby('Check_In_Id','Nama')
        ->get();
        
        // dd($data);


            
        $datas = [];
        $i = 0;
        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Check_In_Id = $d->Check_In_Id;
        //     $datas[$i]->Unit_Sewa_Id = $d->Unit_Sewa_Id;
        //     $datas[$i]->Penyewa_Id = $d->Penyewa_Id;
            $datas[$i]->Nama_Penyewa = $d->Nama;

            $januari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',1],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            
            $datas[$i]->Januari = $januari;

            $febuari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',2],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Febuari = $febuari;

            $Maret = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',3],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Maret = $Maret;

            $April = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',4],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->April = $April;

            $Mei = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',5],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Mei = $Mei;

            $Juni = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',6],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juni = $Juni;

            $Juli = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',7],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juli = $Juli;

            $Agustus = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',8],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Agustus = $Agustus;

            $September = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',9],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->September = $September;

            $Oktober = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',10],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Oktober = $Oktober;

            $November = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',11],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->November = $November;

            $Desember = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',12],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Desember = $Desember;

        


            $i++;
        }

        return view('laporan.tahunan.index', compact('rusun','Rusun_Id','item','tahun','tanggal','Item_Id','Tahun_Id'))
        // ->with('rowpage', $rowpage)
        ->with('data', $datas)
        ->with('tanggal', $tanggal)
        ->with('all_access',$access);
        
    }
}
