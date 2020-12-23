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

class LaporanTahunanController extends Controller
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

        if (!$access->where('name', 'LaporanTahunan-View')->count() > 0) {
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



        // $data = DB::table('pembayaran')
        // ->join('pembayaran_detail','pembayaran.Pembayaran_Id','=','pembayaran_detail.Pembayaran_Id')
        // ->join('check_in','pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        // ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        // ->where([['Tahun',2020],['Item_Pembayaran_Id',1]])
        // ->get();

        $data = DB::table('pembayaran_detail')
        ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
        ->join('check_in','pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['check_in.Check_Out',null],['penyewa.Rusun_Id',$Rusun_Id]])
        ->select('Nama','pembayaran.Check_In_Id')
        ->groupby('Check_In_Id','Nama')
        ->get();
        
        // dd($data);


            
        $datas = [];
        $i = 0;
        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Check_In_Id = $d->Check_In_Id;
        //     $datas[$i]->Unit_Sewa_Id = $d->Unit_Sewa_Id;
        //     $datas[$i]->Penyewa_Id = $d->Penyewa_Id;
            $datas[$i]->Nama_Penyewa = $d->Nama;

            $januari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',1],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            
            $datas[$i]->Januari = $januari;

            $febuari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',2],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Febuari = $febuari;

            $Maret = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',3],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Maret = $Maret;

            $April = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',4],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->April = $April;

            $Mei = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',5],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Mei = $Mei;

            $Juni = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',6],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juni = $Juni;

            $Juli = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',7],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juli = $Juli;

            $Agustus = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',8],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Agustus = $Agustus;

            $September = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',9],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->September = $September;

            $Oktober = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',10],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Oktober = $Oktober;

            $November = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',11],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->November = $November;

            $Desember = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',12],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Desember = $Desember;

        


            $i++;
        }

        return view('laporan.tahunan.index', compact('rusun','Rusun_Id','item','tahun','tanggal','Item_Id','Tahun_Id'))
        // ->with('rowpage', $rowpage)
        ->with('data', $datas)
        ->with('tanggal', $tanggal)
        ->with('all_access',$access);
        
    }

    public function pdf(Request $request)
    {
        $Rusun_Id = $request->Rusun_Id;
        $Tahun_Id = $request->Tahun_Id;
        $Item_Id = $request->Item_Id;

        $data = DB::table('pembayaran_detail')
        ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
        ->join('check_in','pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['check_in.Check_Out',null],['penyewa.Rusun_Id',$Rusun_Id]])
        ->select('Nama','pembayaran.Check_In_Id')
        ->groupby('Check_In_Id','Nama')
        ->get();

        $datas = [];
        $i = 0;
        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Check_In_Id = $d->Check_In_Id;
        //     $datas[$i]->Unit_Sewa_Id = $d->Unit_Sewa_Id;
        //     $datas[$i]->Penyewa_Id = $d->Penyewa_Id;
            $datas[$i]->Nama_Penyewa = $d->Nama;

            $januari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',1],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            
            $datas[$i]->Januari = $januari;

            $febuari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',2],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Febuari = $febuari;

            $Maret = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',3],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Maret = $Maret;

            $April = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',4],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->April = $April;

            $Mei = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',5],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Mei = $Mei;

            $Juni = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',6],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juni = $Juni;

            $Juli = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',7],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juli = $Juli;

            $Agustus = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',8],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Agustus = $Agustus;

            $September = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',9],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->September = $September;

            $Oktober = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',10],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Oktober = $Oktober;

            $November = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',11],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->November = $November;

            $Desember = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',12],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Desember = $Desember;

        


            $i++;
        }

        $item = DB::table('item_pembayaran')->where('Item_Pembayaran_Id', $Item_Id)->first();
        $rusun = DB::table('mstr_rusun')->where('info_id', $Rusun_Id)->first();
        $format = 'Laporan-Tahunan-'.$item->Nama_Item.'-'.$Tahun_Id;
        $pdf = PDF::loadView('laporan.cetak.pdf.tahunan', compact ('rusun','item','datas'))->setPaper('f4', 'landscape');
        return $pdf->download($format.'.pdf');
    }

    public function excel(Request $request)
    {
        $Rusun_Id = Input::get('Rusun_Id');
        $Tahun_Id = Input::get('Tahun_Id');
        $Item_Id = $request->Item_Id;

        // Get Rusun 

        $rusun= DB::table('mstr_rusun')->where('info_id',$Rusun_Id)->first();
        $tahun = DB::table('tahun')->where('tahun_id', $Tahun_Id)->first();
        $item = DB::table('item_pembayaran')->where('Item_Pembayaran_Id', $Item_Id)->first();


        $data = DB::table('pembayaran_detail')
        ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
        ->join('check_in','pembayaran.Check_In_Id','=','check_in.Check_In_Id')
        ->join('penyewa','check_in.Penyewa_Id','=','penyewa.Penyewa_Id')
        ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['check_in.Check_Out',null],['penyewa.Rusun_Id',$Rusun_Id]])
        ->select('Nama','pembayaran.Check_In_Id')
        ->groupby('Check_In_Id','Nama')
        ->get();

        $datas = [];
        $i = 1;
        foreach($data as $d){
            $datas[$i] = new \stdClass();

            $datas[$i]->Check_In_Id = $d->Check_In_Id;
        //     $datas[$i]->Unit_Sewa_Id = $d->Unit_Sewa_Id;
        //     $datas[$i]->Penyewa_Id = $d->Penyewa_Id;
            $datas[$i]->Nama_Penyewa = $d->Nama;

            $januari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',1],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            
            $datas[$i]->Januari = $januari;

            $febuari = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',2],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Febuari = $febuari;

            $Maret = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',3],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Maret = $Maret;

            $April = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',4],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->April = $April;

            $Mei = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',5],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Mei = $Mei;

            $Juni = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',6],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juni = $Juni;

            $Juli = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',7],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Juli = $Juli;

            $Agustus = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',8],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Agustus = $Agustus;

            $September = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',9],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->September = $September;

            $Oktober = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',10],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Oktober = $Oktober;

            $November = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',11],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->November = $November;

            $Desember = DB::table('pembayaran_detail')
            ->join('pembayaran','pembayaran_detail.Pembayaran_Id','=','pembayaran.Pembayaran_Id')
            ->where([['Tahun', $Tahun_Id],['Item_Pembayaran_Id', $Item_Id],['Bulan',12],['Check_In_Id',$d->Check_In_Id]])->sum('Jumlah');
            $datas[$i]->Desember = $Desember;

        


            $i++;
        }

        if(count($datas) > 0){
            Excel::create('Laporan Tahunan', function ($excel) use ($datas,$tahun,$item,$Rusun_Id,$rusun) {
                $excel->sheet('Sheet Data Tahunan', function ($sheet) use ($datas,$tahun,$item,$Rusun_Id,$rusun) {
                    $sheet->mergeCells('A2:N2');
	                $sheet->mergeCells('A3:N3');
	                $sheet->mergeCells('A4:N4');
                    $sheet->mergeCells('A5:N5');
                    
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
	                $sheet->setCellValue('A4', strtoupper('LAPORAN PENERIMAAN TAHUN '.$tahun->nama_tahun ));
                    $sheet->setCellValue('A5', 'KOMPONEN : '.$item->Nama_Item);

                    $sheet->setWidth(array(
	                    'A'     =>  5,
	                    'B'     =>  30,
	                    'C'     =>  10,
	                    'D'     =>  10,
	                    'E'     =>  10,
	                    'F'     =>  10,
	                    'G'     =>  10,
	                    'H'     =>  10,
	                    'I'     =>  10,
	                    'J'     =>  10,
	                    'K'     =>  10,
	                    'L'     =>  10,
	                    'M'     =>  10,
	                    'N'     =>  10,
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

                    $sheet->setCellValue('B'.$row, 'Nama Penyewa');
                    $sheet->cells('B'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('C'.$row, 'Januari');
                    $sheet->cells('C'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('D'.$row, 'Februari');
                    $sheet->cells('D'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('E'.$row, 'Maret');
                    $sheet->cells('E'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('F'.$row, 'April');
                    $sheet->cells('F'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('G'.$row, 'Mei');
                    $sheet->cells('G'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('H'.$row, 'Juni');
                    $sheet->cells('H'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('I'.$row, 'Juli');
                    $sheet->cells('I'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('J'.$row, 'Agustus');
                    $sheet->cells('J'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('K'.$row, 'September');
                    $sheet->cells('K'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('L'.$row, 'Oktober');
                    $sheet->cells('L'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('M'.$row, 'November');
                    $sheet->cells('M'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('N'.$row, 'Desember');
                    $sheet->cells('N'.$row, function ($cells) {
                        $cells->setFont([
                            'bold' => true,
                        ]);
                        $cells->setAlignment('center');
                        $cells->setValignment('top');
                        $cells->setBackground('#dddddd');
                        $cells->setBorder('thin','thin','thin','thin');
                    });


                    $row2 = 8;
                    $jan = 0;
                    $feb = 0;
                    $mar = 0;
                    $mei = 0;
                    $apr = 0;
                    $jun = 0;
                    $jul = 0;
                    $agu = 0;
                    $sep = 0;
                    $okt = 0;
                    $nov = 0;
                    $des = 0;
                    foreach ($datas as $x => $val) {
                        $sheet->setCellValue('A'.$row2,$x);
                        $sheet->cells('A'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('center');
                            $cells->setBorder('thin','thin','thin','thin');
                        });

                        $sheet->setCellValue('B'.$row2,$val->Nama_Penyewa);
                        $sheet->cells('B'.$row2, function ($cells) {
                            $cells->setAlignment('left');
                            $cells->setValignment('left');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        
                        $sheet->setCellValue('C'.$row2,format_uang($val->Januari));
                        $sheet->cells('C'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('D'.$row2,format_uang($val->Febuari));
                        $sheet->cells('D'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('E'.$row2,format_uang($val->Maret));
                        $sheet->cells('E'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('F'.$row2,format_uang($val->April));
                        $sheet->cells('F'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('G'.$row2,format_uang($val->Mei));
                        $sheet->cells('G'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('H'.$row2,format_uang($val->Juni));
                        $sheet->cells('H'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('I'.$row2,format_uang($val->Juli));
                        $sheet->cells('I'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('J'.$row2,format_uang($val->Agustus));
                        $sheet->cells('J'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('K'.$row2,format_uang($val->September));
                        $sheet->cells('K'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('L'.$row2,format_uang($val->Oktober));
                        $sheet->cells('L'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('M'.$row2,format_uang($val->November));
                        $sheet->cells('M'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });
                        $sheet->setCellValue('N'.$row2,format_uang($val->Desember));
                        $sheet->cells('N'.$row2, function ($cells) {
                            $cells->setValignment('top');
                            $cells->setalignment('right');
                            $cells->setBorder('thin','thin','thin','thin');
                        });



                        $rw = $row2+4;
                        $jan += $val->Januari;
                        $feb += $val->Febuari;
                        $mar += $val->Maret;
                        $apr += $val->April;
                        $mei += $val->Mei;
                        $jun += $val->Juni;
                        $jul += $val->Juli;
                        $agu += $val->Agustus;
                        $sep += $val->September;
                        $okt += $val->Oktober;
                        $nov += $val->November;
                        $des += $val->Desember;

                        $row2++;
                    }
                    // SUB TOTAL
                    $rr = $rw-3;
                    $sheet->mergeCells('A'.$rr.':B'.$rr);
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
                    $sheet->setCellValue('C'.$rr,format_uang($jan));
                    $sheet->cells('C'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('D'.$rr,format_uang($feb));
                    $sheet->cells('D'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('E'.$rr,format_uang($mar));
                    $sheet->cells('E'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('F'.$rr,format_uang($apr));
                    $sheet->cells('F'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('G'.$rr,format_uang($mei));
                    $sheet->cells('G'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('H'.$rr,format_uang($jun));
                    $sheet->cells('H'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('I'.$rr,format_uang($jul));
                    $sheet->cells('I'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('J'.$rr,format_uang($agu));
                    $sheet->cells('J'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('K'.$rr,format_uang($sep));
                    $sheet->cells('K'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('L'.$rr,format_uang($okt));
                    $sheet->cells('L'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('M'.$rr,format_uang($nov));
                    $sheet->cells('M'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->setCellValue('N'.$rr,format_uang($des));
                    $sheet->cells('N'.$rr, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('right');
                        $cells->setBorder('thin','thin','thin','thin');
                    });
                    
                    // KEPALA DPU

                    $rw2 = $rw+4;
                    $rw3 = $rw2+1;
                    $sheet->mergeCells('B'.$rw.':D'.$rw);
                    $sheet->setSize(array(
                        'B'.$rw => array(
                            'width'     => 10,
                            'height'    => 50
                        )
                    ));
                    $sheet->setCellValue('B'.$rw,"MENGETAHUI / MENYETUJUI \n KEPALA DINAS PERKIM KOTA MAGELANG \n");
                    $sheet->cells('B'.$rw, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });

                    
                    $sheet->mergeCells('B'.$rw2.':D'.$rw2);
                    $sheet->setCellValue('B'.$rw2, $rusun->nama_kepala_dpu);
                    $sheet->cells('B'.$rw2, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });
                    $sheet->mergeCells('B'.$rw3.':D'.$rw3);
                    $sheet->setCellValue('B'.$rw3, 'NIP :'.$rusun->nip_kepala_dpu);
                    $sheet->cells('B'.$rw3, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });

                    // KEPALA UPT
                    $sheet->mergeCells('K'.$rw.':N'.$rw);

                    $sheet->setSize(array(
                        'K'.$rw => array(
                            'width'     => 10,
                            'height'    => 50
                        )
                    ));
                    $sheet->setCellValue('K'.$rw,"YANG MELAPORKAN \n KEPALA UPT RUSUNAWA");
                    $sheet->cells('K'.$rw, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });
                    $sheet->mergeCells('K'.$rw2.':N'.$rw2);
                    $sheet->setCellValue('K'.$rw2, $rusun->nama_kepala_upt);
                    $sheet->cells('K'.$rw2, function ($cells) {
                        $cells->setValignment('top');
                        $cells->setalignment('center');
                        $cells->setFont([
                            'size' => '9',
                            'bold' => true
                        ]);

                        $cells->setFontFamily('Cambria');
                    });
                    $sheet->mergeCells('K'.$rw3.':N'.$rw3);
                    $sheet->setCellValue('K'.$rw3, 'NIP :'.$rusun->nip_kepala_upt);
                    $sheet->cells('K'.$rw3, function ($cells) {
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
