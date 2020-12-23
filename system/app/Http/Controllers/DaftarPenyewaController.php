<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class DaftarPenyewaController extends Controller
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

        if (!$access->where('name', 'DaftarPenyewa-View')->count() > 0) {
            return view('errors.403');
        }

        $Rusun_Id = Input::get('Rusun_Id');
        $rusun= DB::table('mstr_rusun')->get();

        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }



        // Data penyewa
        if($Rusun_Id != null){
            $datas = DB::table('check_in')->where('Check_Out', null)
            ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
            ->join('unit_sewa','check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
            ->where('penyewa.Rusun_Id', $Rusun_Id)
            ->get();
        }else{
            $datas = [];
        }

        $now = \Carbon\Carbon::now();
        $tanggal = $now->format('d  F Y');

        return view('laporan.daftar_penyewa.index', compact('rusun','Rusun_Id'))
        ->with('data', $datas)
        ->with('tanggal', $tanggal)
        ->with('all_access',$access);
    }

}
