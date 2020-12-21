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


        // $all_pembayaran = DB::table('cash_flow')
        // ->join('item_pembayaran','cash_flow.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
        // ->where('Rusun_Id', $Rusun_Id)
        // ->orderby('Tgl_Trans', 'desc')
        // ->get();

        $rowpage = Input::get('sort');
        if ($rowpage == null) {
          $rowpage = 10;
        }

        $off = 0;
        if($rowpage == 10 || $rowpage == null){
            $off = 0;
        }else{
            $off = $rowpage;
        }
        
        $all_pembayaran = DB::select("SELECT Null as cash_flow_id,pd.item_pembayaran_id as item_pembayaran_id,p.tgl_bayar as tgl_trans,sum(jumlah) as jml_masuk,NULL as jml_keluar,NULL as jml_subsidi,
        concat( 'Penerimaan ',ip.nama_item) as keterangan,0 as jml_saldo,1 as jns  
        FROM pembayaran_detail pd
        inner join pembayaran p
        on p.pembayaran_id=pd.pembayaran_id
        inner join item_pembayaran ip
        on ip.item_pembayaran_id=pd.item_pembayaran_id
        group by pd.item_pembayaran_id,p.tgl_bayar,ip.nama_item  
        UNION
        SELECT cash_flow_id,item_pembayaran_id,tgl_trans,jml_masuk,jml_keluar,jml_subsidi,keterangan,0 as jml_saldo,2 as jns  
        FROM cash_flow
        order by tgl_trans, cash_flow_id, jns
        
        ");

        $data2 = DB::table('cash_flow')->paginate($rowpage);
        $data2->appends(['rowpage' => $rowpage]);



        // dd($all_pembayaran);
        

        $datas = [];
        $i = 0;
        $saldo = 0;
        $saldo2 = 0;

        foreach($all_pembayaran as $data){
            $datas[$i] =  new \stdCLass;
            $datas[$i]->Item_Pembayaran_Id = $data->item_pembayaran_id;
            $datas[$i]->Total_Amount = $data->jml_masuk;
            $datas[$i]->Nama_Item = $data->keterangan;
            $datas[$i]->Tgl_Trans = $data->tgl_trans;
            
            $datas[$i]->Uang_Keluar = $data->jml_keluar;

            if($data->jml_keluar == null){
                // $saldo = $data->jml_masuk + $data->jml_keluar;
                $saldo = $saldo + $data->jml_masuk;
            }else{

                // $saldo = $data->jml_masuk + $data->jml_keluar;
                $saldo = $saldo + $data->jml_masuk - $data->jml_keluar;
            }

            
            $datas[$i]->Saldo = $saldo;

            $i++;
        }

        // Item bayar 
        $items = DB::table('item_pembayaran')->get();
        // dd($datas);
        return view('transaksi.cashflow.index', compact('Rusun_Id','rusun'))
        ->with('data',$datas)
        ->with('rowpage', $rowpage)
        ->with('dt',$data2)
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
