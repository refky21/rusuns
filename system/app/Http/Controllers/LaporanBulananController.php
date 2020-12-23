<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Alert;
use Redirect;
use Excel;
use PDF;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class LaporanBulananController extends Controller
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

        if (!$access->where('name', 'LaporanBulanan-View')->count() > 0) {
            return view('errors.403');
        }

        $Rusun_Id = Input::get('Rusun_Id');

        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->get();

        $tanggal = Input::get('tanggal');

        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();
        $Bulan_Id = Input::get('Bulan_Id');

        $Tahun_Id = Input::get('Tahun_Id');

       
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

       
        if($Rusun_Id != null){
            $session =  $request->session()->put('Rusun_Id', $Rusun_Id);
        }elseif($Rusun_Id == null && $request->session()->get('Rusun_Id') !=null){
            $Rusun_Id = $request->session()->get('Rusun_Id');
        }


        // if($Bulan_Id != null && $Tahun_Id != null){
        //     $data = DB::table('pembayaran')
        //     ->join('check_in', 'pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        //     ->join('penyewa', 'check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        //     ->join('unit_sewa', 'check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        //     ->select('check_in.Check_In_Id',
        //     'pembayaran.Pembayaran_Id',
        //     'check_in.Unit_Sewa_Id',
        //     'check_in.Penyewa_Id',
        //     'penyewa.Nama',
        //     'unit_sewa.Nama_Unit'
        //     )
        //     ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit','Pembayaran_Id')
        //     ->where('Tgl_Bayar',date('Y-m', strtotime($Tahun_Id.'-'.$Bulan_Id)))->get();
        // }else{
        //     $data = [];
        // }

        $bultah = $Tahun_Id.'-'.$Bulan_Id;
        if($Bulan_Id != null && $Tahun_Id != null){
            $data = DB::table('pembayaran')
            ->join('check_in', 'pembayaran.Check_In_Id','=','check_in.Check_In_Id')
            ->join('pembayaran_detail', 'pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->join('penyewa', 'check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
            ->join('unit_sewa', 'check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
            ->select('check_in.Check_In_Id',
            'pembayaran.Pembayaran_Id',
            'pembayaran_detail.Tahun',
            'pembayaran_detail.Bulan',
            'check_in.Unit_Sewa_Id',
            'check_in.Penyewa_Id',
            'penyewa.Nama',
            'unit_sewa.Nama_Unit'
            )
            ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit','Pembayaran_Id','Tahun','Bulan')
            ->where([['Bulan', $Bulan_Id],['Tahun', $Tahun_Id],['penyewa.Rusun_Id', $Rusun_Id]])->get();
        }else{
            $data = [];
        }
        

        
        // dd($data);
        


            
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
                $keber = $keber->Jumlah;
            }else{
                $keber = 0;
            }
            $datas[$i]->Jml_Kebersihan = $keber;

            $denda = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 7]])->select('Jumlah')->first();
            if($denda != null){
                $jml_denda = $denda->Jumlah;
            }else{
                $jml_denda = 0;
            }
            $datas[$i]->Jml_Denda = $jml_denda;


            $total = $jml_unit + $jml_lis + $jml_air + $jml_denda + $keber;
            $datas[$i]->Jml_Total = $total;


            $i++;
        }


        // dd($datas);


       

        return view('laporan.bulanan.index', compact('rusun','Rusun_Id','bulan','tahun','tanggal','Bulan_Id','Tahun_Id'))
        // ->with('rowpage', $rowpage)
        ->with('data', $datas)
        ->with('tanggal', $tanggal)
        ->with('all_access',$access);
        
    }

    public function pdf(Request $request)
    {
        $Rusun_Id = Input::get('Rusun_Id');
        $Bulan_Id = Input::get('Bulan_Id');
        $Tahun_Id = Input::get('Tahun_Id');
        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->where('info_id',$Rusun_Id)->first();


        $bulan = DB::table('bulan')->where('Bulan_Id',$Bulan_Id)->first();
        $tahun = DB::table('tahun')->where('tahun_id',$Tahun_Id)->first();
        


        $bultah = $Tahun_Id.'-'.$Bulan_Id;
        if($Bulan_Id != null && $Tahun_Id != null){
            $data = DB::table('pembayaran')
            ->join('check_in', 'pembayaran.Check_In_Id','=','check_in.Check_In_Id')
            ->join('pembayaran_detail', 'pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->join('penyewa', 'check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
            ->join('unit_sewa', 'check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
            ->select('check_in.Check_In_Id',
            'pembayaran.Pembayaran_Id',
            'pembayaran_detail.Tahun',
            'pembayaran_detail.Bulan',
            'check_in.Unit_Sewa_Id',
            'check_in.Penyewa_Id',
            'penyewa.Nama',
            'unit_sewa.Nama_Unit'
            )
            ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit','Pembayaran_Id','Tahun','Bulan')
            ->where([['Bulan', $Bulan_Id],['Tahun', $Tahun_Id],['penyewa.Rusun_Id', $Rusun_Id]])->get();
        }else{
            $data = [];
        }
        

        
        // dd($data);
        


            
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
                $keber = $keber->Jumlah;
            }else{
                $keber = 0;
            }
            $datas[$i]->Jml_Kebersihan = $keber;

            $denda = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $d->Pembayaran_Id],['Item_Pembayaran_Id', 7]])->select('Jumlah')->first();
            if($denda != null){
                $jml_denda = $denda->Jumlah;
            }else{
                $jml_denda = 0;
            }
            $datas[$i]->Jml_Denda = $jml_denda;


            $total = $jml_unit + $jml_lis + $jml_air + $jml_denda + $keber;
            $datas[$i]->Jml_Total = $total;


            $i++;
        }


        // dd($datas);


        $format = 'Laporan-Bulanan-'.$bulan->Nama_Bulan;
        $pdf = PDF::loadView('laporan.cetak.pdf.bulanan', compact ('rusun','Rusun_Id','bulan','tahun','tanggal','Bulan_Id','Tahun_Id','datas'))->setPaper('f4', 'landscape');
        return $pdf->download($format.'.pdf');

        // return view('laporan.cetak.pdf.bulanan', compact('rusun','Rusun_Id','bulan','tahun','tanggal','Bulan_Id','Tahun_Id'))->with('datas', $datas);
    }


    public function excel(Request $request)
    {
        $Bulan_Id = Input::get('Bulan_Id');
        $Tahun_Id = Input::get('Tahun_Id');
        $Rusun_Id = Input::get('Rusun_Id');

        if($Bulan_Id != null && $Tahun_Id != null){
            $data = DB::table('pembayaran')
            ->join('check_in', 'pembayaran.Check_In_Id','=','check_in.Check_In_Id')
            ->join('pembayaran_detail', 'pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
            ->join('penyewa', 'check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
            ->join('unit_sewa', 'check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
            ->select('check_in.Check_In_Id',
            'pembayaran.Pembayaran_Id',
            'pembayaran_detail.Tahun',
            'pembayaran_detail.Bulan',
            'check_in.Unit_Sewa_Id',
            'check_in.Penyewa_Id',
            'penyewa.Nama',
            'unit_sewa.Nama_Unit'
            )
            ->groupby('Check_In_Id','Unit_Sewa_Id','Penyewa_Id','Nama','Nama_Unit','Pembayaran_Id','Tahun','Bulan')
            ->where([['Bulan', $Bulan_Id],['Tahun', $Tahun_Id],['penyewa.Rusun_Id', $Rusun_Id]])->get();
        }else{
            $data = [];
        }


        $datas = [];
        $i = 1;
        foreach($data as $val){
            $datas[$i]['Nama Penyewa'] = $val->Nama;
            $datas[$i]['Nama Unit'] = $val->Nama_Unit;
            $sewa_unit = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $val->Pembayaran_Id],['Item_Pembayaran_Id', 1]])->select('Jumlah')->first();
            if($sewa_unit != null){
                $jml_unit = $sewa_unit->Jumlah;
            }else{
                $jml_unit = 0;
            }
            $datas[$i]['U Sewa'] = $jml_unit;
           
            $listrik = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $val->Pembayaran_Id],['Item_Pembayaran_Id', 2]])->select('Jumlah')->first();
            if($listrik != null){
                $jml_lis = $listrik->Jumlah;
            }else{
                $jml_lis = 0;
            }
            $datas[$i]['Listrik'] = $jml_lis;

            $air = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $val->Pembayaran_Id],['Item_Pembayaran_Id', 3]])->select('Jumlah')->first();
            if($air != null){
                $jml_air = $air->Jumlah;
            }else{
                $jml_air = 0;
            }
            $datas[$i]['Air'] = $jml_air;

            $keber = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $val->Pembayaran_Id],['Item_Pembayaran_Id', 4]])->select('Jumlah')->first();
            if($keber != null){
                $keber = $keber->Jumlah;
            }else{
                $keber = 0;
            }
            $datas[$i]['Kebersihan'] = $keber;

            $denda = DB::table('pembayaran_detail')->where([['Pembayaran_Id', $val->Pembayaran_Id],['Item_Pembayaran_Id', 7]])->select('Jumlah')->first();
            if($denda != null){
                $jml_denda = $denda->Jumlah;
            }else{
                $jml_denda = 0;
            }
            $datas[$i]['Denda'] = $jml_denda;


            $total = $jml_unit + $jml_lis + $jml_air + $jml_denda + $keber;
            $datas[$i]['Total'] = $total;

            $i++;
        }



        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        $b = DB::table('bulan')->where('Bulan_Id', $Bulan_Id)->first()->Nama_Bulan;
        $t = DB::table('tahun')->where('Tahun_Id', $Tahun_Id)->first()->nama_tahun;
        if(count($datas) > 0){
            Excel::create('Laporan Bulanan', function ($excel) use ($datas,$t,$b,$Rusun_Id,$rusun) {
                $excel->sheet('Sheet Data Bulanan', function ($sheet) use ($datas,$t,$b,$Rusun_Id,$rusun) {
                    $sheet->mergeCells('C2:K2');
	                $sheet->mergeCells('C3:K3');
	                $sheet->mergeCells('C4:K4');
	                $sheet->mergeCells('C5:K5');

	                $sheet->cells('C2:C5', function ($cells) {
	                    $cells->setAlignment('center');
	                    $cells->setValignment('center');
	                    $cells->setFont([
	                        'size' => '14',
	                        'bold' => true
	                    ]);

	                    $cells->setFontFamily('Cambria');
	                }); 

	                $sheet->setCellValue('C2', strtoupper($rusun->nama_rusun));
	                $sheet->setCellValue('C3', strtoupper($rusun->alamat_rusun));
	                $sheet->setCellValue('C4', strtoupper('LAPORAN PENERIMAAN BULANAN'));
                    $sheet->setCellValue('C5', 'BULAN : '.$b.' '.$t);

                    $sheet->setWidth(array(
	                    'C'     =>  5,
	                    'D'     =>  15,
	                    'E'     =>  30,
	                    'F'     =>  10,
	                    'G'     =>  10,
	                    'H'     =>  10,
	                    'I'     =>  10,
	                    'J'     =>  10,
	                    'K'     =>  10,
                    ));

                    // $sheet->setColumnFormat(array(
                    //     'F' => '00.000',
                    //     'G' => '00.000',
	                //     'H' => '00.000',
	                //     'I' => '00.000',
	                //     'J' => '00.000',
	                //     'K' => '00.000',
                    // ));
                    
                    $row = 7;
                    $emp=null;

                    $sheet->setCellValue('C'.$row, 'No');
	                        $sheet->cells('C'.$row, function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setValignment('top');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->setCellValue('D'.$row, 'Nama Unit');
	                        $sheet->cells('D'.$row, function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setValignment('top');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->setCellValue('E'.($row), 'Nama Penyewa');
	                        $sheet->cells('E'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('F'.($row), 'U Sewa');
	                        $sheet->cells('F'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('G'.($row), 'Listrik');
	                        $sheet->cells('G'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->setCellValue('H'.($row), 'Air');
	                        $sheet->cells('H'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->setCellValue('I'.($row), 'Kebersihan');
	                        $sheet->cells('I'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->setCellValue('J'.($row), 'Denda');
	                        $sheet->cells('J'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                            
                            $sheet->setCellValue('K'.($row), 'Total');
	                        $sheet->cells('K'.($row), function ($cells) {
	                            $cells->setFont([
	                                'bold' => true,
	                            ]);
	                            $cells->setAlignment('center');
	                            $cells->setBackground('#dddddd');
	                            $cells->setBorder('thin','thin','thin','thin');
                            });
                    
                            $row2 = 8;
                            $rw = 0;
                            $usewa = 0;
                            $lis = 0;
                            $air = 0;
                            $bersih = 0;
                            $denda = 0;
                            $lap = 0;
                            foreach ($datas as $x => $val) {
                                        $sheet->setCellValue('C'.$row2,$x);
                                        $sheet->cells('C'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('center');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });

                                        $sheet->setCellValue('D'.$row2,$val['Nama Unit']);
                                        $sheet->cells('D'.$row2, function ($cells) {
                                            $cells->setAlignment('center');
                                            $cells->setValignment('top');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });

                                        $sheet->setCellValue('E'.$row2,$val['Nama Penyewa']);
                                        $sheet->cells('E'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('left');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });
                                       
                                        $sheet->setCellValue('F'.$row2,format_uang($val['U Sewa']));
                                        $sheet->cells('F'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('right');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });
                                        
                                        $sheet->setCellValue('G'.$row2,format_uang($val['Listrik']));
                                        $sheet->cells('G'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('right');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });
                                        
                                        $sheet->setCellValue('H'.$row2,format_uang($val['Air']));
                                        $sheet->cells('H'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('right');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });
                                        
                                        $sheet->setCellValue('I'.$row2,format_uang($val['Kebersihan']));
                                        $sheet->cells('I'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('right');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });
                                        
                                        $sheet->setCellValue('J'.$row2,format_uang($val['Denda']));
                                        $sheet->cells('J'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('right');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });
                                        
                                        $sheet->setCellValue('K'.$row2,format_uang($val['Total']));
                                        $sheet->cells('K'.$row2, function ($cells) {
                                            $cells->setValignment('top');
                                            $cells->setalignment('right');
                                            $cells->setBorder('thin','thin','thin','thin');
                                        });


                                       $rw = $row2+3;

                                       $usewa += $val['U Sewa'];
                                        $lis += $val['Listrik'];
                                        $air += $val['Air'];
                                        $bersih += $val['Kebersihan'];
                                        $denda += $val['Denda'];
                                        $lap += $val['Total'];


                                        $row2++;

                                       
                            }
                            // SUB TOTAL
                            $rr = $rw-2;
                            $sheet->mergeCells('C'.$rr.':E'.$rr);
                            $sheet->setCellValue('C'.$rr,"TOTAL");
                            $sheet->cells('C'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
                                $cells->setBorder('thin','thin','thin','thin');
                                $cells->setFontFamily('Cambria');
                            });

                            $sheet->setCellValue('F'.$rr,format_uang($usewa));
                            $sheet->cells('F'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('G'.$rr,format_uang($lis));
                            $sheet->cells('G'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('H'.$rr,format_uang($air));
                            $sheet->cells('H'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('I'.$rr,format_uang($bersih));
                            $sheet->cells('I'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('J'.$rr,format_uang($denda));
                            $sheet->cells('J'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setBorder('thin','thin','thin','thin');
                            });
                            $sheet->setCellValue('K'.$rr,format_uang($lap));
                            $sheet->cells('K'.$rr, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('right');
                                $cells->setBorder('thin','thin','thin','thin');
                            });




                            $rw2 = $rw+5;
                            $sheet->mergeCells('C'.$rw.':E'.$rw);

                            $sheet->setSize(array(
                                'I'.$rw => array(
                                    'width'     => 10,
                                    'height'    => 50
                                )
                            ));
                            $sheet->setCellValue('C'.$rw,"MENGETAHUI / MENYETUJUI \n KEPALA DINAS PERKIM KOTA MAGELANG \n");
                            $sheet->cells('C'.$rw, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('center');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
        
                                $cells->setFontFamily('Cambria');
                            });


                            $rw3 = $rw2+1;
                            $sheet->mergeCells('C'.$rw2.':E'.$rw2);
                           
                           
                            $sheet->setCellValue('C'.$rw2, $rusun->nama_kepala_dpu);
                            $sheet->cells('C'.$rw2, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('center');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
        
                                $cells->setFontFamily('Cambria');
                            });

                            $sheet->mergeCells('C'.$rw3.':E'.$rw3);
                            $sheet->setCellValue('C'.$rw3, 'NIP :'.$rusun->nip_kepala_dpu);
                            $sheet->cells('C'.$rw3, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('center');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
        
                                $cells->setFontFamily('Cambria');
                            });


                            // KEPALA UPT
                            $sheet->mergeCells('I'.$rw.':K'.$rw);

                            $sheet->setSize(array(
                                'I'.$rw => array(
                                    'width'     => 10,
                                    'height'    => 50
                                )
                            ));
                            $sheet->setCellValue('I'.$rw,"YANG MELAPORKAN \n KEPALA UPT RUSUNAWA");
                            $sheet->cells('I'.$rw, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('center');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
        
                                $cells->setFontFamily('Cambria');
                            });


                            $rw3 = $rw2+1;
                            $sheet->mergeCells('I'.$rw2.':K'.$rw2);
                           
                           
                            $sheet->setCellValue('I'.$rw2, $rusun->nama_kepala_upt);
                            $sheet->cells('I'.$rw2, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('center');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
        
                                $cells->setFontFamily('Cambria');
                            });

                            $sheet->mergeCells('I'.$rw3.':K'.$rw3);
                            $sheet->setCellValue('I'.$rw3, 'NIP :'.$rusun->nip_kepala_upt);
                            $sheet->cells('I'.$rw3, function ($cells) {
                                $cells->setValignment('top');
                                $cells->setalignment('center');
                                $cells->setFont([
                                    'size' => '9',
                                    'bold' => true
                                ]);
        
                                $cells->setFontFamily('Cambria');
                            });





                });
            })->export('xlsx');
                
        }

    }
}
