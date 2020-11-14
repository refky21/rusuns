<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class DispensasiController extends Controller
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

        if (!$access->where('name', 'Tahun-View')->count() > 0) {
            return view('errors.403');
        }

        $Rusun_Id = Input::get('Rusun_Id');

        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->get();

        // dd($rusun);

       
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

        //Sorting Data
        $cari = Input::get('search');
        $rowpage = Input::get('sort');
        if ($rowpage == null) {
        $rowpage = 10;
        }
        

        // if ($cari == null) {
        //     // $query = DB::table('access_name')->orderBy('access_id', 'desc')->paginate($rowpage);
        //     $query = DB::table('mstr_rusun')->orderby('kode_rusun','asc')->paginate($rowpage);
        // } else {
        //     $query = DB::table('mstr_rusun')->where('nama_rusun', 'LIKE', '%' . $cari . '%')->orderby('kode_rusun','asc')->paginate($rowpage);
        // }

        if($cari == null){
            if($Rusun_Id == null){
                $query = DB::table('penyewa')
                ->join('mstr_rusun','penyewa.Rusun_Id','=','mstr_rusun.info_id')
                ->where('Is_Aktif', 1)->paginate($rowpage);
            }else{
                $query = DB::table('penyewa')
                ->join('mstr_rusun','penyewa.Rusun_Id','=','mstr_rusun.info_id')
                ->where('Is_Aktif', 1)
                ->where('Rusun_Id', $Rusun_Id)->paginate($rowpage);
            }

        }else{
            if($Rusun_Id == null){
                $query = DB::table('penyewa')
                ->join('mstr_rusun','penyewa.Rusun_Id','=','mstr_rusun.info_id')
                ->where('Is_Aktif', 1)
                ->where('penyewa.Nama','LIKE','%'. $cari . '%')
                ->paginate($rowpage);
            }else{
                $query = DB::table('penyewa')
                ->join('mstr_rusun','penyewa.Rusun_Id','=','mstr_rusun.info_id')
                ->where('Is_Aktif', 1)
                ->where('Rusun_Id', $Rusun_Id)
                ->where('penyewa.Nama','LIKE','%'. $cari . '%')
                ->paginate($rowpage);
               
            }
            
        }

        // dd($query);

        $query->appends(['search' => $cari, 'rowpage' => $rowpage]);
        

        return view('master.dispensasi.index', compact('rusun','Rusun_Id'))
        ->with('rowpage', $rowpage)
        ->with('data', $query)
        ->with('cari', $cari)
        ->with('all_access',$access);
    }



    public function detail(Request $request)
    {
        $id = $request->id;

        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Tahun-View')->count() > 0) {
            return view('errors.403');
        }

        $Rusun_Id = Input::get('Rusun_Id');

        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->get();

        // dd($rusun);

       
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

        //Sorting Data
        $cari = Input::get('search');
        $rowpage = Input::get('sort');
        if ($rowpage == null) {
        $rowpage = 10;
        }

            if($Rusun_Id == null){
                $query = DB::table('mstr_dispensasi')
               ->paginate($rowpage);
            }else{
                $query = DB::table('mstr_dispensasi')
                ->paginate($rowpage);
            }

      

        // dd($query);

        $query->appends(['search' => $cari, 'rowpage' => $rowpage]);

       


        return view('master.dispensasi.detail', compact('rusun','Rusun_Id'))
        ->with('data', $query)
        ->with('id', $id)
        ->with('rowpage', $rowpage)
        ->with('all_access',$access);
    }


    public function create(Request $req)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Dispensasi-Add')->count() > 0) {
            return view('errors.403');
        }

        $data = [
            'Penyewa_Id' => $req->Penyewa_Id,
            'Persen_Dispen' => $req->persen_dispen,
            'Bulan_Mulai' => $req->Bulan_Mulai,
            'Tahun_Mulai' => $req->Tahun_Mulai,
            'Bulan_Selesai' => $req->Bulan_Selesai,
            'Tahun_Selesai' => $req->Tahun_Selesai,
            'Keterangan' => $req->Keterangan,
            'Created_Date' => date('Y-m-d H:i:s'),
            'Created_By' => Auth::user()->name,
        ];

        DB::table('mstr_dispensasi')->insert($data);
        Alert::success('Menambahkan Dispensasi Pembayaran','Berhasil');
        return Redirect::back();
    }

    public function update(Request $req)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Dispensasi-Edit')->count() > 0) {
            return view('errors.403');
        }

        $data = [
            'Persen_Dispen' => $req->persen_dispen,
            'Bulan_Mulai' => $req->Bulan_Mulai,
            'Tahun_Mulai' => $req->Tahun_Mulai,
            'Bulan_Selesai' => $req->Bulan_Selesai,
            'Tahun_Selesai' => $req->Tahun_Selesai,
            'Keterangan' => $req->Keterangan,
            'Created_Date' => date('Y-m-d H:i:s'),
            'Created_By' => Auth::user()->name,
        ];

        DB::table('mstr_dispensasi')->where('Dispensasi_Id', $req->Dispensasi_Id)->update($data);
        Alert::success('Mengubah Dispensasi Pembayaran','Berhasil');
        return Redirect::back();
    }

    public function delete(Request $req)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Dispensasi-Delete')->count() > 0) {
            return view('errors.403');
        }

        DB::table('mstr_dispensasi')->where('Dispensasi_Id', $req->id)->delete();
        Alert::success('Terimakasih Anda Berhasil Menghapus Dispensasi Pembayaran','Berhasil');
         return Redirect::back();
    }
}
