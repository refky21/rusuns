@extends('shared._layout')
@section('PageTitle', 'Cash Flow')
@section('header')
<!-- Header External -->


<style>
.box{
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    border:1px solid #000;
}

</style>

@endsection

@section('content')
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Cash Flow</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('/home');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Cash Flow</li>
         </ol>
	   </div>
</div>
<div class="row">
        <div class="col-lg-12">
		  <!-- Mulai Data -->
          <div class="card">
            <div class="card-header text-white bg-dark">
            <div class="row">
                <div class="col-md-6">
                    Data Cash Flow
                </div>
                <div class="col-md-6 text-right">
                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-square btn-outline-success waves-effect waves-light m-1">Tambah Data</button>
                </div>
            </div>
            
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon contrast-alert">
                            <i class="icon-close"></i>
                            </div>
                            <div class="alert-message">
                            <span><strong>Danger!</strong> {{ $error }}.</span>
                            </div>
                        </div>
                        @endforeach       
                        @endif
                    <div class="table-responsive">
                        
                        <table class="table table-sm">
                            <thead class="thead-secondary shadow-secondary">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Tanggal Transaksi</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    <th scope="col" class="text-center">Jumlah Masuk</th>
                                    <th scope="col" class="text-center">Jumlah Keluar</th>
                                    <th scope="col" class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $no = 1;
                            $saldo = 0;
                            $saldo2 = 0;
                            @endphp
                            @foreach($data as $d)
                            <tr>
                                    <td scope="col" >{{$no++}}</td>
                                    <td scope="col" >{{date('d F Y', strtotime($d->Tgl_Trans))}}</td>
                                    <td scope="col" >{{$d->Nama_Item}}</td>
                                    <td scope="col" class="text-right">{{number_format($d->Total_Amount,0,',','.')}}</td>
                                    <td scope="col" class="text-right">{{number_format($d->Uang_Keluar,0,',','.')}}</td>
                                    
                                    <td scope="col" class="text-right">{{number_format($d->Saldo,0,',','.')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                     </div> <!-- End Table Responsive -->
                </div><!-- End Col Md -->
            </div><!-- End Row -->



            <div class="modal fade" id="addModal">
    <div class="modal-dialog">
    <div class="modal-content border-secondary">
        <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">  Tambah Data</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action=<?= url('cashflow/create'); ?> method="post">
            @csrf
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Jenis Pengeluaran</span>
            </div>
            <select class="custom-select" name="jenis">
            <option value="">Pilih Jenis</option>
            @foreach($items as $i)
            <option value="{{$i->Item_Pembayaran_Id}}">{{$i->Nama_Item}}</option>
            @endforeach
           
            </select>
            </div>
            @error('nama_tahun')
                <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
            @enderror
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tanggal</span>
            </div>
            <input type="date" id="tgl_trans" class="form-control  @error('tgl_trans') is-invalid @enderror" name="tgl_trans" value="{{ old('tgl_trans') }}">
            </div>
            @error('tgl_trans')
                <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
            @enderror
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Jumlah Keluar</span>
            </div>
            <input type="number" id="jml_kel" class="form-control  @error('jml_kel') is-invalid @enderror" name="jml_kel" value="{{ old('jml_kel') }}">
            </div>
            @error('jml_kel')
                <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
            @enderror
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Keterangan</span>
            </div>
            <input type="text" id="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}">
            </div>
            @error('keterangan')
                <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
            @enderror
                           
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-inverse-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn btn-secondary"><i class="fa fa-check-square-o"></i> Save changes</button>
        </div>
        </form>
    </div>
    </div>
</div>


@endsection


@section('footer')
<!-- Footer External -->
@endsection