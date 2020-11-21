<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class CetakTagihanPenyewa extends Controller
{
   
    
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

        if (!$access->where('name', 'Cetak-View')->count() > 0) {
            return view('errors.403');
        }

        $Bulan_Id = Input::get('Bulan_Id');

        $Tahun_Id = Input::get('Tahun_Id');
        
        $Rusun_Id = Input::get('Rusun_Id');
        $rusun = DB::table('mstr_rusun')->get();


        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

       
        if($Bulan_Id != null){
            $session =  $request->session()->put('Bulan_Id', $Bulan_Id);
        }elseif($Bulan_Id == null && $request->session()->get('Bulan_Id') !=null){
            $Bulan_Id = $request->session()->get('Bulan_Id');
        }
        if($Tahun_Id != null){
            $session =  $request->session()->put('Tahun_Id', $Tahun_Id);
        }elseif($Tahun_Id == null && $request->session()->get('Tahun_Id') !=null){
            $Tahun_Id = $request->session()->get('Tahun_Id');
        }

        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();


        // get bulan
        if($Bulan_Id != null){
            $bulan_sewa = DB::table('bulan')->where('Bulan_Id', $Bulan_Id)->first();
        }else{
            $bulan_sewa = new \stdClass;
            $bulan_sewa->Nama_Bulan = 'Kosong';
        }

        if($Bulan_Id != null && $Tahun_Id != null){
            $tahun_sewa = DB::table('tahun')->where('Tahun_Id', $Tahun_Id)->first();
        }else{
            $tahun_sewa = new \stdClass;
            $tahun_sewa->nama_tahun = 'Kosong';
        }

        if($Bulan_Id != null && $Tahun_Id != null){
        // $query = DB::table('tagihan')
        // ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
        // ->join('check_in','tagihan.Check_In_Id','=','check_in.Check_In_Id')
        // ->join('unit_sewa','check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        // ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        // ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id])
        // ->get();

        $cek_tagihan = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun',$Tahun_Id],['Bulan', $Bulan_Id]])
            ->get();

            $used_tagihan = [];
            $ii = 0;

            foreach($cek_tagihan as $tagihan){
                $used_tagihan[$ii] = $tagihan->Check_In_Id;

                $ii++;
            }
        


        $query = DB::table('penyewa')
        ->join('check_in','penyewa.Penyewa_Id','=','check_in.Penyewa_Id')
        ->where([['Rusun_Id', $Rusun_Id],['Tgl_Check_Out', NULL],])
        ->wherenotin('Check_In_Id', $used_tagihan)
        ->get();


        // dd($query);

        $datas = [];
        $i = 0;

        foreach($query as $q){
            $datas[$i]['Check_In_Id'] = $q->Check_In_Id;
            $datas[$i]['No_Reg'] = $q->No_Reg;
            $datas[$i]['Penyewa'] = $q->Nama;

           
            

            $ambil_bulan = DB::table('tagihan')
            ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
            ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id,'Item_Pembayaran_Id' => 1,'Check_In_Id' => $q->Check_In_Id])
            ->first();

            if($ambil_bulan != null ){
                $datas[$i]['Tagihan_Bulanan'] = $ambil_bulan->Jumlah;
            }else{
                $datas[$i]['Tagihan_Bulanan'] = 0;
            }
            $ambil_listrik =  DB::table('tagihan')
            ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
            ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id-1,'Item_Pembayaran_Id' => 2,'Check_In_Id' => $q->Check_In_Id])
            ->first();

            if($ambil_listrik != null){
                $datas[$i]['Tagihan_Listrik'] = $ambil_listrik->Jumlah;
            }else{
                $datas[$i]['Tagihan_Listrik'] = 0;
            }
            $air =  DB::table('tagihan')
            ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
            ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id-1,'Item_Pembayaran_Id' => 3,'Check_In_Id' => $q->Check_In_Id])
            ->first();

            if($air != null){
                $datas[$i]['Tagihan_Air'] = $air->Jumlah;
            }else{
                $datas[$i]['Tagihan_Air'] = 0;
            }
            
            $iuran_kebersihan =  DB::table('tagihan')
            ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
            ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id,'Item_Pembayaran_Id' => 4,'Check_In_Id' => $q->Check_In_Id])
            ->first();

            if($iuran_kebersihan != null){
                $datas[$i]['Tagihan_Kebersihan'] = $iuran_kebersihan->Jumlah;
            }else{
                $datas[$i]['Tagihan_Kebersihan'] = 0;
            }
            
            $i++;
        }






        }else{
            $datas = [];
        }


        // dd($Bulan_Id);

        // Statis Data
       

        return view('transaksi.cetak.tagihan', compact(
                'bulan',
                'tahun',
                'Bulan_Id',
                'Tahun_Id',
                'Rusun_Id',
                'bulan_sewa',
                'tahun_sewa'
            )
        )->with('all_access', $access)
        ->with('rusun', $rusun)
        ->with('data', $datas)
        ->with('Rusun_Id', $Rusun_Id);


    }


    public function cetak(Request $request, $id )
    {

        $Bulan_Id = Input::get('Bulan_Id');

        $Tahun_Id = Input::get('Tahun_Id');
        
        $Rusun_Id = Input::get('Rusun_Id');
        $rusun = DB::table('mstr_rusun')->get();


        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

       
        if($Bulan_Id != null){
            $session =  $request->session()->put('Bulan_Id', $Bulan_Id);
        }elseif($Bulan_Id == null && $request->session()->get('Bulan_Id') !=null){
            $Bulan_Id = $request->session()->get('Bulan_Id');
        }
        if($Tahun_Id != null){
            $session =  $request->session()->put('Tahun_Id', $Tahun_Id);
        }elseif($Tahun_Id == null && $request->session()->get('Tahun_Id') !=null){
            $Tahun_Id = $request->session()->get('Tahun_Id');
        }

        $mstr_rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        $mstr_bulan = DB::table('bulan')->where('Bulan_Id', $Bulan_Id)->first();
        $mstr_thn = DB::table('tahun')->where('Tahun_Id', $Tahun_Id)->first();

        $tagihan = DB::table('tagihan')
        ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
        ->join('item_pembayaran','tagihan_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
        ->where([['Check_In_Id',$id],['tagihan.Tahun', $Tahun_Id],['tagihan.Bulan', $Bulan_Id]])
        ->get();

        $datas = [];
        $i = 0;
        $jum_nom = 0;
        
        // dd($tagihan);
        // $cek_tagihan = DB::table('pembayaran_detail')
        //     ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
        //     ->where([['pembayaran.Check_In_Id',$id]])
        //     ->get();

        //     $used_tagihan = [];
        //     $ii = 0;

        //     foreach($cek_tagihan as $tg){
        //         $used_tagihan[$i] = $tg->Tagihan_Id;

        //         $ii++;
        //     }

        //     $belum_bayar = DB::table('tagihan_detail')
        //     ->join('tagihan','tagihan_detail.Tagihan_Id','=','tagihan.Tagihan_Id')
        //     ->join('item_pembayaran','tagihan_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
        //     ->where([['tagihan.Check_In_Id',$id]])
        //     ->WhereNotIn('tagihan_detail.Tagihan_Id', $used_tagihan)
        //     ->get();

        // $i3 = 0;
        // $dt = [];
        

        // dd($belum_bayar);
        foreach($tagihan as $d){
            // 
            // Ini Ambil Nominal Tagihan

            // Cek Tagihan Yang belum di Bayar
            
            
            
           

            if($d->Item_Pembayaran_Id == 2){
                
                // $tg = DB::table('tagihan_detail')
                // ->join('tagihan','tagihan_detail.Tagihan_Id','=','tagihan.Tagihan_Id')
                // ->join('item_pembayaran','tagihan_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
                // ->where([['Check_In_Id',$id],['tagihan_detail.Tahun',$Tahun_Id],['tagihan_detail.Bulan',$Bulan_Id],['tagihan_detail.Item_Pembayaran_Id',2]])
                // ->first();
                $tg =  DB::table('tagihan')
                ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
                ->join('item_pembayaran','tagihan_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
                ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id-1,'tagihan_detail.Item_Pembayaran_Id' => 2,'Check_In_Id' => $d->Check_In_Id])
                ->first();

                $mb = DB::table('bulan')->where('Bulan_Id', $Bulan_Id-1)->first();
                $datas[$i]['Nama_Tagihan'] = $tg->Nama_Item. ' - '.$mb->Nama_Bulan.' '.$mstr_thn->nama_tahun ;
                $datas[$i]['Jumlah'] = $tg->Jumlah;
                $jum_nom += $tg->Jumlah;

            }elseif($d->Item_Pembayaran_Id == 3){
                // $tg = DB::table('tagihan_detail')
                // ->join('tagihan','tagihan_detail.Tagihan_Id','=','tagihan.Tagihan_Id')
                // ->join('item_pembayaran','tagihan_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
                // ->where([['Check_In_Id',$id],['tagihan_detail.Tahun',$Tahun_Id],['tagihan_detail.Bulan',$Bulan_Id],['tagihan_detail.Item_Pembayaran_Id',3]])
                // ->first();
                $tg =  DB::table('tagihan')
                ->join('tagihan_detail','tagihan.Tagihan_Id','=','tagihan_detail.Tagihan_Id')
                ->join('item_pembayaran','tagihan_detail.Item_Pembayaran_Id','=','item_pembayaran.Item_Pembayaran_Id')
                ->where(['tagihan_detail.Tahun' => $Tahun_Id, 'tagihan_detail.Bulan' => $Bulan_Id-1,'tagihan_detail.Item_Pembayaran_Id' => 3,'Check_In_Id' => $d->Check_In_Id])
                ->first();
                $mb = DB::table('bulan')->where('Bulan_Id', $Bulan_Id-1)->first();
                $datas[$i]['Nama_Tagihan'] = $tg->Nama_Item. ' - '.$mb->Nama_Bulan.' '.$mstr_thn->nama_tahun ;
                $datas[$i]['Jumlah'] = $tg->Jumlah;
                $jum_nom += $tg->Jumlah;
            }else{
                $datas[$i]['Nama_Tagihan'] = $d->Nama_Item;
                $datas[$i]['Jumlah'] = $d->Jumlah;
                $jum_nom += $d->Jumlah;
            }
            
            // if($belum_bayar != null){

            //     foreach($belum_bayar as $bb){
                    
            //         // $datas[$i]['Nama_Tagihan1'][$i3] = $bb->Nama_Item;

            //         if($bb->Item_Pembayaran_Id == 2){
            //             $datas[$i]['Tagihan_Lama'][$i3]['Nama_Tagihan'] = $bb->Nama_Item. ' Bulan '.$bb->Bulan.'Tahun'.$bb->Tahun ;
            //         }elseif($d->Item_Pembayaran_Id == 3){
            //             $datas[$i]['Tagihan_Lama'][$i3]['Nama_Tagihan'] = $bb->Nama_Item. ' Bulan '.$bb->Bulan.'Tahun'.$bb->Tahun ;
            //         }else{
            //             $datas[$i]['Tagihan_Lama'][$i3]['Nama_Tagihan'] = $bb->Nama_Item;
            //         }
            //         $i3++;
            //     }

            // }else{
            //     $datas[$i]['Nama_Tagihan2'] = [];
            // }
           



            $i++;
        }

        // dd($datas);
        $jum_nom = $jum_nom;

        $data_unit = DB::table('check_in')
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->join('unit_sewa','check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        ->where('Check_In_Id', $id)
        ->first();

        
        
        return view('transaksi.cetak.print')
        
    ->with('data', $datas)
    ->with('rusun', $mstr_rusun)
    ->with('tahun', $mstr_thn)
    ->with('bulan', $mstr_bulan)
    ->with('nominal', $jum_nom)
    ->with('penyewa', $data_unit);
    }
}
