<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ResumePenyewaController extends Controller
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

        if (!$access->where('name', 'ResumePenyewa-View')->count() > 0) {
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

        // Data
        $data = DB::table('check_in')->where('Check_Out', null)
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->join('unit_sewa','check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        ->get();

        $datas = [];
        $i = 0;

        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Kode_Sewa = $d->No_Reg;
            $datas[$i]->Nama_Penyewa = $d->Nama;
            $datas[$i]->Alamat = $d->Ktp_Alamat;
            $datas[$i]->Nama_Unit = $d->Nama_Unit;
            $datas[$i]->Tgl_Masuk = \Carbon\Carbon::parse($d->Tgl_Check_In)->format('d F Y');

            // Tagihan 
            $detail_tagihan = DB::table('tagihan_detail')
                ->join('tagihan','tagihan_detail.Tagihan_Id','=','tagihan.Tagihan_Id')
                ->join('check_in','tagihan.Check_In_Id','=','check_in.Check_In_Id')
                ->where([
                        ['tagihan.Check_In_Id', $d->Check_In_Id],
                        ])
                ->sum('tagihan_detail.Jumlah');
            $datas[$i]->Tagihan = $detail_tagihan;
            // Pembayaran 
            $detail_pembayaran = DB::table('pembayaran_detail')
                ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
                ->join('tagihan','pembayaran.Tagihan_Id','=','tagihan.Tagihan_Id')
                ->join('check_in','tagihan.Check_In_Id','=','check_in.Check_In_Id')
                ->where([
                        ['tagihan.Check_In_Id', $d->Check_In_Id],
                        ])
                ->sum('pembayaran_detail.Jumlah');
            $datas[$i]->Pembayaran = $detail_pembayaran;

            $datas[$i]->Tunggakan = $detail_tagihan - $detail_pembayaran;

            $i++;
        }
        

              
        $now = \Carbon\Carbon::now();
        $tanggal = $now->format('d  F Y');

        return view('laporan.resume_penyewa.index', compact('rusun','Rusun_Id'))
        ->with('data', $datas)
        ->with('tanggal', $tanggal)
        ->with('all_access',$access);
    }
}
