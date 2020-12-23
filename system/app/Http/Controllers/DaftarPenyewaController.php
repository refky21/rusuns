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

    public function pdf(Request $request)
    {
        $Rusun_Id = $request->Rusun_Id;
        
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

        $now = date('Y-m-d');
        $tanggal = tanggal_indonesia($now,false);
        $format = 'Daftar-Penyewa-'.$tanggal;
        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        $pdf = PDF::loadView('laporan.cetak.pdf.daftar', compact ('rusun','tanggal','datas'))->setPaper('f4', 'landscape');
        return $pdf->download($format.'.pdf');
    }

    public function excel(Request $request)
    {
        $Rusun_Id = $request->Rusun_Id;
        
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

        $now = date('Y-m-d');
        $tanggal = tanggal_indonesia($now,false);
        $rusun= DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        if(count($datas) > 0){
            Excel::create('Daftar Penyewa', function ($excel) use ($datas,$tanggal,$rusun) {
                $excel->sheet('Sheet Data Penyewa', function ($sheet) use ($datas,$tanggal,$rusun) {
                    $sheet->mergeCells('A2:I2');
	                $sheet->mergeCells('A3:I3');
	                $sheet->mergeCells('A4:I4');
                    $sheet->mergeCells('A5:I5');
                    
                    $sheet->cells('A2:A5', function ($cells) {
	                    $cells->setAlignment('center');
	                    $cells->setValignment('center');
	                    $cells->setFont([
	                        'size' => '14',
	                        'bold' => true
	                    ]);

	                    $cells->setFontFamily('Cambria');
	                }); 

	                $sheet->setCellValue('A2', strtoupper($rusun->nama_rusun));
	                $sheet->setCellValue('A3', strtoupper($rusun->alamat_rusun));
	                $sheet->setCellValue('A4', strtoupper('Laporan Daftar Penyewa'));
                    $sheet->setCellValue('A5', 'KEADAAN PER TANGGAL : '.$tanggal);

                    $sheet->setWidth(array(
	                    'A'     =>  5,
	                    'B'     =>  15,
	                    'C'     =>  15,
	                    'D'     =>  25,
	                    'E'     =>  40,
	                    'F'     =>  20,
	                    'G'     =>  15,
	                    'H'     =>  20,
	                    'I'     =>  20,
                    ));
                    $row = 7;

                    $sheet->setCellValue('A'.$row, 'No');
                    $sheet->cells('A'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('B'.$row, 'Nama Unit');
                    $sheet->cells('B'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });

                    $sheet->setCellValue('C'.$row, 'No ID');
                    $sheet->cells('C'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('D'.$row, 'Penyewa');
                    $sheet->cells('D'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('E'.$row, 'Alamat');
                    $sheet->cells('E'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('left');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('F'.$row, 'NIK');
                    $sheet->cells('F'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('G'.$row, 'Jml Penghuni');
                    $sheet->cells('G'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('H'.$row, 'Tgl Masuk');
                    $sheet->cells('H'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('I'.$row, 'Tgl Keluar');
                    $sheet->cells('I'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $row2 = 8;
                    $tag = 0;
                    $no = 1;
                    foreach ($datas as $x => $val) {
                        $sheet->setCellValue('A'.$row2,$no);
                        $sheet->cells('A'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });

                        $sheet->setCellValue('B'.$row2,$val->Nama_Unit);
                        $sheet->cells('B'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('C'.$row2,$val->No_Reg);
                        $sheet->cells('C'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('D'.$row2,$val->Nama);
                        $sheet->cells('D'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('left');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('E'.$row2,$val->Ktp_Alamat);
                        $sheet->cells('E'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('left');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('F'.$row2,"'".$val->Ktp_Nik);
                        $sheet->cells('F'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('left');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('G'.$row2, $val->Jml_Penghuni);
                        $sheet->cells('G'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('H'.$row2,tanggal_indonesia(date('Y-m-d',strtotime($val->Tgl_Check_In)),false));
                        $sheet->cells('H'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        if($val->Tgl_Check_Out != null){
                            $tg = date('Y-m-d', strtotime($val->Tgl_Check_Out));
                            $chkout = tanggal_indonesia($tg, false);
                        }else{
                            $chkout = null;
                        }
                        $sheet->setCellValue('I'.$row2, $chkout);
                        $sheet->cells('I'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $rw = $row2+4;
                        $tag += $val->Jml_Penghuni;
                        $row2++;
                        $no++;
                    }

                    $rr = $rw-3;
                    $sheet->mergeCells('A'.$rr.':F'.$rr);
                    $sheet->setCellValue('A'.$rr,"Jumlah Penghuni");
                    $sheet->cells('A'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);
                        $cells->setBorder('thin','thin','thin','thin');
                        $cells->setFontFamily('Cambria');
                    });

                    $sheet->setCellValue('G'.$rr,$tag);
                    $sheet->cells('G'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setBorder('thin','thin','thin','thin');
                    });

                    $sheet->mergeCells('H'.$rr.':I'.$rr);
                    $sheet->setCellValue('H'.$rr,"Jiwa");
                    $sheet->cells('H'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);
                        $cells->setBorder('thin','thin','thin','thin');
                        $cells->setFontFamily('Cambria');
                    });

                    // KEPALA DPU

                    $rw2 = $rw+4;
                    $rw3 = $rw2+1;
                    $sheet->mergeCells('A'.$rw.':C'.$rw);
                    $sheet->setSize(array(
                        'A'.$rw => array(
                            'width'     => 10,
                            'height'    => 50
                        )
                    ));
                    $sheet->setCellValue('A'.$rw,"MENGETAHUI / MENYETUJUI \n KEPALA DINAS PERKIM KOTA MAGELANG \n");
                    $sheet->cells('A'.$rw, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });

                    
                    $sheet->mergeCells('A'.$rw2.':C'.$rw2);
                    $sheet->setCellValue('A'.$rw2, $rusun->nama_kepala_dpu);
                    $sheet->cells('A'.$rw2, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });
                    $sheet->mergeCells('A'.$rw3.':C'.$rw3);
                    $sheet->setCellValue('A'.$rw3, 'NIP :'.$rusun->nip_kepala_dpu);
                    $sheet->cells('A'.$rw3, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });


                    // KEPALA UPT
                    $sheet->mergeCells('G'.$rw.':I'.$rw);

                    $sheet->setSize(array(
                        'G'.$rw => array(
                            'width'     => 15,
                            'height'    => 50
                        )
                    ));
                    $sheet->setCellValue('G'.$rw,"YANG MELAPORKAN \n KEPALA UPT RUSUNAWA");
                    $sheet->cells('G'.$rw, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });
                    $sheet->mergeCells('G'.$rw2.':I'.$rw2);
                    $sheet->setCellValue('G'.$rw2, $rusun->nama_kepala_upt);
                    $sheet->cells('G'.$rw2, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });
                    $sheet->mergeCells('G'.$rw3.':I'.$rw3);
                    $sheet->setCellValue('G'.$rw3, 'NIP :'.$rusun->nip_kepala_upt);
                    $sheet->cells('G'.$rw3, function ($cells) {
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
