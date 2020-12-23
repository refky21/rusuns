<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Exports\LaporanHarianExport;
use Auth;
use DB;
use Alert;
use Redirect;
use Excel;
use PDF;

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
        'check_in.Unit_Sewa_Id',
        'check_in.Penyewa_Id',
        'penyewa.Nama',
        'unit_sewa.Nama_Unit'
        )
        ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit')
        ->where('penyewa.Rusun_Id',$Rusun_Id)
        ->where('Tgl_Bayar',date('Y-m-d', strtotime($tanggal)))->get();


        // dd($data);


            
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
            ->where([['Item_Pembayaran_Id', 1],['Tgl_Bayar',date('Y-m-d', strtotime($tanggal))]])->select('Jumlah')->first();
            if($sewa_unit != null){
                $jml_unit = $sewa_unit->Jumlah;
            }else{
                $jml_unit = 0;
            }
            $datas[$i]->Jml_Unit = $jml_unit;
           
            $listrik = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 2],['Tgl_Bayar',date('Y-m-d', strtotime($tanggal))]])->select('Jumlah')->first();
            if($listrik != null){
                $jml_lis = $listrik->Jumlah;
            }else{
                $jml_lis = 0;
            }
            $datas[$i]->Jml_Lis = $jml_lis;

            $air = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 3],['Tgl_Bayar',date('Y-m-d', strtotime($tanggal))]])->select('Jumlah')->first();
            if($air != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Air = $jml_air;

            $keber =DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 4],['Tgl_Bayar',date('Y-m-d', strtotime($tanggal))]])->select('Jumlah')->first();
            if($keber != null){
                $jml_air = $keber->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Kebersihan = $jml_air;

            $denda = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 7],['Tgl_Bayar',date('Y-m-d', strtotime($tanggal))]])->select('Jumlah')->first();
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

    public function pdf(Request $request, $id)
    {
               $Rusun_Id = Input::get('Rusun_Id');

        // Get Rusun 

       

        $tanggal = Input::get('tanggal');

        // dd($rusun);


       
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();

        // if($tanggal != null){
        // }else{
        //     $query = [];
        // }
        
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
        ->where('penyewa.Rusun_Id',$Rusun_Id)
        ->where('Tgl_Bayar',date('Y-m-d', strtotime($id)))->get();


        // dd($data);


            
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
            ->where([['Item_Pembayaran_Id', 1],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($sewa_unit != null){
                $jml_unit = $sewa_unit->Jumlah;
            }else{
                $jml_unit = 0;
            }
            $datas[$i]->Jml_Unit = $jml_unit;
           
            $listrik = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 2],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($listrik != null){
                $jml_lis = $listrik->Jumlah;
            }else{
                $jml_lis = 0;
            }
            $datas[$i]->Jml_Lis = $jml_lis;

            $air = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 3],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($air != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Air = $jml_air;

            $keber =DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 4],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($keber != null){
                $jml_air = $keber->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Kebersihan = $jml_air;

            $denda = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 7],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
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


        $tgl = tanggal_indonesia($id,false);
        $format = 'Laporan-Harian-'.$tgl;
        $pdf = PDF::loadView('laporan.cetak.pdf.harian', compact ('rusun','tgl','datas'))->setPaper('f4', 'landscape');
        return $pdf->download($format.'.pdf');

        // return view('laporan.cetak.pdf.harian', compact('rusun','Rusun_Id','tgl'))->with('datas', $datas);
    }


    public function excel(Request $request, $id)
    {
        $Rusun_Id = Input::get('Rusun_Id');

        $rusun= DB::table('mstr_rusun')->get();

        $tanggal = Input::get('tanggal');

        // dd($rusun);

        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }

        $format = 'Laporan-Harian-'.date('Y-m-d H:i:s');


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
        ->where('Tgl_Bayar',date('Y-m-d', strtotime($id)))->get();
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
            ->where([['Item_Pembayaran_Id', 1],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($sewa_unit != null){
                $jml_unit = $sewa_unit->Jumlah;
            }else{
                $jml_unit = 0;
            }
            $datas[$i]->Jml_Unit = format_uang($jml_unit);
           
            $listrik = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 2],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($listrik != null){
                $jml_lis = $listrik->Jumlah;
            }else{
                $jml_lis = 0;
            }
            $datas[$i]->Jml_Lis = format_uang($jml_lis);

            $air = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 3],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($air != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Air = format_uang($jml_air);

            $keber =DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 4],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($keber != null){
                $jml_air = $keber->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]->Jml_Kebersihan = format_uang($jml_air);

            $denda = DB::table('pembayaran')
            ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->where([['Item_Pembayaran_Id', 7],['Tgl_Bayar',date('Y-m-d', strtotime($id))]])->select('Jumlah')->first();
            if($denda != null){
                $jml_denda = $denda->Jumlah;
            }else{
                $jml_denda = 0;
            }
            $datas[$i]->Jml_Denda = format_uang($jml_denda);


            $total = $jml_unit + $jml_lis + $jml_air + $jml_denda;
            $datas[$i]->Jml_Total = format_uang($total);


            $i++;
        }  

        // dd($datas);
        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        $tgl = tanggal_indonesia($id,false);
        $judul = 'Laporan Harian '.date('Y-m-d H:i:s');

        
        Excel::create($judul, function ($excel) use ($datas,$rusun,$tgl) {
            $i = 1;
            foreach ($datas as $res) {
                $data[] = [
                    'NO' => $i,
                    'Nama Unit' => $res->Nama_Unit,
                    'Nama Penyewa' => $res->Nama_Penyewa,
                    'U. Sewa' => $res->Jml_Unit,
                    'Listrik' => $res->Jml_Lis,
                    'Air' => $res->Jml_Air,
                    'Kebersihan' => $res->Jml_Kebersihan,
                    'Denda' => $res->Jml_Denda,
                    'Total' => $res->Jml_Total
                ];

                $i++;
            }

            $excel->sheet('Data Laporan Harian', function ($sheet) use ($data,$rusun,$tgl) {
                $num_rows = sizeof($data);
                $sheet->fromArray($data, null, 'B6',true);
               

                $sheet->mergeCells('B2:J2');
                $sheet->mergeCells('B3:J3');
                $sheet->mergeCells('B4:J4');
                $sheet->mergeCells('B5:J5');

                $sheet->setCellValue('B2', strtoupper($rusun->nama_rusun));
                $sheet->setCellValue('B3', strtoupper($rusun->alamat_rusun));
                $sheet->setCellValue('B4', 'LAPORAN PENERIMAAN HARIAN');
                $sheet->setCellValue('B5', 'Tanggal : '.$tgl );
                
                
                $sheet->cells('B2:B4', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont([
                        'size' => '15',
                        'bold' => true
                    ]);

                    $cells->setFontFamily('Arial');
                });
                $sheet->cells('B5', function ($cells2) {
                    $cells2->setAlignment('center');
                    $cells2->setValignment('center');
                    $cells2->setFont([
                        'size' => '12',
                        'bold' => true
                    ]);

                    $cells2->setFontFamily('Arial');
                });

                $sheet->cells(true);
                
               $row = 7;
                for ($x = 1; $x <= sizeof($data) * sizeof($data); $x++) {
                    $sheet->cells('E'.$x.':J'.$x, function ($cells){
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                    });
                  }

                
                

                $sheet->setBorder('B6:J' . (sizeof($data) + 6), 'thin','thin');
                $sheet->cells('B6:J6', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setFont([
                        'bold' => true,
                    ]);
                    $cells->setBackground('#dddddd');
                });
                $sheet->cells('B6:B' . (sizeof($data) + 5), function ($cells) {
                    $cells->setAlignment('center');
                });
            });
            

        })->export('xlsx');
    }
}
