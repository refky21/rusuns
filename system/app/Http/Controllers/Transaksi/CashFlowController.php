<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class CashFlowController extends Controller
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

        if (!$access->where('name', 'CashFlow-View')->count() > 0) {
            return view('errors.403');
        }


        $Rusun_Id = Input::get('Rusun_Id');
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

        $i = 0;

        $rusunss = DB::table('role_rusun_user')->where('User_Id', $userid)->get();
        if(count($rusunss) > 0){
            $rusun = [];
            foreach($rusunss as $rus){
                $rss = DB::table('mstr_rusun')->where('info_id', $rus->Rusun_Id)->get();
                
                foreach($rss as $rs){
                    $rusun[$i] = new \stdClass;
                    $rusun[$i]->nama_rusun = $rs->nama_rusun;
                    $rusun[$i]->info_id = $rs->info_id;
                    $i++;
                }
            }
        }else{
            $rusun = DB::table('mstr_rusun')->get();
        }


        $bulan_sekarang = date('m');
        $th = date('Y');


        // $all_pembayaran = DB::table('pembayaran_detail')->where([['Tahun', $th]])
        // ->select(['pembayaran_detail.Item_Pembayaran_Id',DB::raw('SUM(Jumlah) as Total_Amount'),'Nama_Item'])
        // ->join('item_pembayaran','pembayaran_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
        // ->groupby(['pembayaran_detail.Item_Pembayaran_Id','Nama_Item'])
        // ->get();


        $all_pembayaran = DB::table('cash_flow')
        ->join('item_pembayaran','cash_flow.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
        ->where('Rusun_Id', $Rusun_Id)
        ->orderby('Tgl_Trans', 'desc')
        ->get();


        // dd($all_pembayaran);


        $datas = [];
        $i = 0;
        $saldo = 0;
        $saldo2 = 0;

        foreach($all_pembayaran as $data){
            $datas[$i] =  new \stdCLass;
            $datas[$i]->Item_Pembayaran_Id = $data->Item_Pembayaran_Id;
            $datas[$i]->Total_Amount = $data->Jml_Masuk;
            $datas[$i]->Nama_Item = $data->Keterangan;
            $datas[$i]->Tgl_Trans = $data->Tgl_Trans;
            
            $datas[$i]->Uang_Keluar = $data->Jml_Keluar;

            if($data->Jml_Keluar == null){
                $saldo+= $data->Jml_Masuk;
                $saldo2 = $saldo;
            }else{

                $saldo = $data->Jml_Masuk - $data->Jml_Keluar;
                $saldo2 = $saldo + $data->Jml_Masuk;
            }

            
            $datas[$i]->Saldo = $saldo2;

            $i++;
        }

        // Item bayar
        $items = DB::table('item_pembayaran')->get();
        // dd($datas);
        return view('transaksi.cashflow.index', compact('Rusun_Id','rusun'))
        ->with('data',$datas)
        ->with('items',$items)
        ->with('all_access',$access);

    }

    public function create(Request $request)
    {
        
        $data1 =[
            'Tgl_Trans' => date('Y-m-d H:i:s'),
            'Item_Pembayaran_Id' => $request->jenis,
            'Jml_Keluar' => $request->jml_kel,
            'Keterangan' => $request->keterangan,
            'Created_By' => Auth::user()->name,
            'Created_Date' => date('Y-m-d H:i:s'),
        ];

        DB::table('cash_flow')->insert($data1);
        Alert::success('Berhasil Menambah Data Cashflow', 'Berhasil !');
        return Redirect::back();

    }
}
