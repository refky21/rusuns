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
        ->where('penyewa.Rusun_Id', $Rusun_Id)
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
           ->where([
                   ['tagihan.Check_In_Id', $d->Check_In_Id],
                   ])
           ->sum('tagihan_detail.Jumlah');
       $datas[$i]->Tagihan = $detail_tagihan;
       // Pembayaran 
       $detail_pembayaran = DB::table('pembayaran_detail')
           ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
           ->where([
                   ['pembayaran.Check_In_Id', $d->Check_In_Id],
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


    public function pdf(Request $request)
    {
        $Rusun_Id = $request->Rusun_Id;
        $data = DB::table('check_in')->where('Check_Out', null)
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->join('unit_sewa','check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        ->where('penyewa.Rusun_Id', $Rusun_Id)
        ->get();

        $datas = [];
        $i = 1;

        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Kode_Sewa = $d->No_Reg;
            $datas[$i]->Nama_Penyewa = $d->Nama;
            $datas[$i]->Alamat = $d->Ktp_Alamat;
            $datas[$i]->Nama_Unit = $d->Nama_Unit;
            $datas[$i]->Tgl_Masuk = tanggal_indonesia($d->Tgl_Check_In,false);

            // Tagihan 
            $detail_tagihan = DB::table('tagihan_detail')
                ->join('tagihan','tagihan_detail.Tagihan_Id','=','tagihan.Tagihan_Id')
                ->where([
                        ['tagihan.Check_In_Id', $d->Check_In_Id],
                        ])
                ->sum('tagihan_detail.Jumlah');
            $datas[$i]->Tagihan = $detail_tagihan;
            // Pembayaran 
            $detail_pembayaran = DB::table('pembayaran_detail')
                ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
                ->where([
                        ['pembayaran.Check_In_Id', $d->Check_In_Id],
                        ])
                ->sum('pembayaran_detail.Jumlah');
            $datas[$i]->Pembayaran = $detail_pembayaran;

            $datas[$i]->Tunggakan = $detail_tagihan - $detail_pembayaran;

            $i++;
        }
        

              
        $now = date('Y-m-d');
        $tanggal = tanggal_indonesia($now,false);
        $format = 'Resume-Penyewa-'.$tanggal;
        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        $pdf = PDF::loadView('laporan.cetak.pdf.resume', compact ('rusun','tanggal','datas'))->setPaper('f4', 'landscape');
        return $pdf->download($format.'.pdf');
    }

    public function excel(Request $request)
    {
        $Rusun_Id = $request->Rusun_Id;

        // Data
        $data = DB::table('check_in')->where('Check_Out', null)
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->join('unit_sewa','check_in.Unit_Sewa_Id','=','unit_sewa.Unit_Sewa_Id')
        ->where('penyewa.Rusun_Id', $Rusun_Id)
        ->get();

        $datas = [];
        $i = 1;

        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Kode_Sewa = $d->No_Reg;
            $datas[$i]->Nama_Penyewa = $d->Nama;
            $datas[$i]->Alamat = $d->Ktp_Alamat;
            $datas[$i]->Nama_Unit = $d->Nama_Unit;
            $datas[$i]->Tgl_Masuk = tanggal_indonesia($d->Tgl_Check_In,false);

            // Tagihan 
            $detail_tagihan = DB::table('tagihan_detail')
                ->join('tagihan','tagihan_detail.Tagihan_Id','=','tagihan.Tagihan_Id')
                ->where([
                        ['tagihan.Check_In_Id', $d->Check_In_Id],
                        ])
                ->sum('tagihan_detail.Jumlah');
            $datas[$i]->Tagihan = $detail_tagihan;
            // Pembayaran 
            $detail_pembayaran = DB::table('pembayaran_detail')
                ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
                ->where([
                        ['pembayaran.Check_In_Id', $d->Check_In_Id],
                        ])
                ->sum('pembayaran_detail.Jumlah');
            $datas[$i]->Pembayaran = $detail_pembayaran;

            $datas[$i]->Tunggakan = $detail_tagihan - $detail_pembayaran;

            $i++;
        }
        

              
        $now = date('Y-m-d');
        $tanggal = tanggal_indonesia($now,false);

        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();

        

        if(count($datas) > 0){
            Excel::create('Resume Penyewa', function ($excel) use ($datas,$tanggal,$rusun) {
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
	                $sheet->setCellValue('A4', strtoupper('Laporan Resume Penyewa (Tagihan vs Pembayaran)'));
                    $sheet->setCellValue('A5', 'KEADAAN PER TANGGAL : '.$tanggal);

                    $sheet->setWidth(array(
	                    'A'     =>  5,
	                    'B'     =>  10,
	                    'C'     =>  25,
	                    'D'     =>  35,
	                    'E'     =>  15,
	                    'F'     =>  25,
	                    'G'     =>  20,
	                    'H'     =>  15,
	                    'I'     =>  15,
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

                    $sheet->setCellValue('B'.$row, 'No. ID');
                    $sheet->cells('B'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });

                    $sheet->setCellValue('C'.$row, 'Penyewa');
                    $sheet->cells('C'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('D'.$row, 'Alamat');
                    $sheet->cells('D'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('E'.$row, 'Nama Unit');
                    $sheet->cells('E'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('F'.$row, 'Tgl Masuk');
                    $sheet->cells('F'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('G'.$row, 'Jml Tagihan');
                    $sheet->cells('G'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('H'.$row, 'Jml Pembayaran');
                    $sheet->cells('H'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('I'.$row, 'Jml Tunggakan');
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
                    $pem = 0;
                    $tung = 0;
                    foreach ($datas as $x => $val) {
                        $sheet->setCellValue('A'.$row2,$x);
                        $sheet->cells('A'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });

                        $sheet->setCellValue('B'.$row2,$val->Kode_Sewa);
                        $sheet->cells('B'.$row2, function ($cells) {
                            $cells->setAlignment('top');
                            $cells->setValignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('C'.$row2,$val->Nama_Penyewa);
                        $sheet->cells('C'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('left');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('D'.$row2,$val->Alamat);
                        $sheet->cells('D'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('left');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('E'.$row2,$val->Nama_Unit);
                        $sheet->cells('E'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('F'.$row2,$val->Tgl_Masuk);
                        $sheet->cells('F'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('G'.$row2,format_uang($val->Tagihan));
                        $sheet->cells('G'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('H'.$row2,format_uang($val->Pembayaran));
                        $sheet->cells('H'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('I'.$row2,format_uang($val->Tunggakan));
                        $sheet->cells('I'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });


                        $rw = $row2+4;
                        $tag += $val->Tagihan;
                        $pem += $val->Pembayaran;
                        $tung += $val->Tunggakan;
                        $row2++;
                    }

                    $rr = $rw-3;
                    $sheet->mergeCells('A'.$rr.':F'.$rr);
                    $sheet->setCellValue('A'.$rr,"TOTAL");
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

                    $sheet->setCellValue('G'.$rr,format_uang($tag));
                    $sheet->cells('G'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('H'.$rr,format_uang($pem));
                    $sheet->cells('H'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('I'.$rr,format_uang($tung));
                    $sheet->cells('I'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
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
