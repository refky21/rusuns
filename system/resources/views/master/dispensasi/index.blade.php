@extends('shared._layout')
@section('PageTitle', 'Dispensasi Pembayaran')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')

<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Dispensasi Pembayaran</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('/home');?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dispensasi</li>
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
                    Pembebasan Penyewa
                </div>
                <div class="col-md-6 text-right">
                <?php
                if($all_access->where('name','Dispensasi-Add')->count() > 0){
                    ?>
                
                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-square btn-outline-success waves-effect waves-light m-1">Tambah Data</button>
                <?php } ?>
                </div>
            </div>
            
            </div>
            <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Sort</label>
                            </div>
                            <select class="custom-select" name="sort" onchange="this.form.submit()">
                                <option value="10" <?php if ($rowpage  == "10") {
                                                                        echo "selected";
                                                                    } ?>>10</option>
                                <option value="20" <?php if ($rowpage  == "20") {
                                                                        echo "selected";
                                                                    } ?>>20</option>
                                <option value="50" <?php if ($rowpage  == "50") {
                                                                        echo "selected";
                                                                    } ?>>50</option>
                                <option value="100 <?php if ($rowpage  == "100") {
                                                                        echo "selected";
                                                                    } ?>">100</option>
                                <option value="99999" <?php if ($rowpage  == "99999") {
                                                                        echo "selected";
                                                                    } ?>>All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                                                                <input type="text"  name="search" class="form-control" <?php if($cari != null){?>value="<?= $cari;?>"<?php  } ?> placeholder="some text">
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                <table class="table">
                  <thead class="thead-secondary shadow-secondary">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nomor Register</th>
                      <th scope="col">Nama Penyewa</th>
                      <th scope="col">Nama Rusun</th>
                      <th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                  $i = ($data->currentpage()-1)* $data->perpage() + 1; 
                  $no = 1;
                foreach($data as $d):
                  $no++;
                ?>
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$d->No_Reg}}</td>
                      <td>{{$d->Nama}}</td>
                      <td>{{$d->nama_rusun}}</td>
                      <td>
                      <a href="<?= url('dispensasi/detail/'.$d->Penyewa_Id);?>" class="btn btn-primary btn-xs waves-effect waves-light"><i class="fa fa-bars"></i> Detail</a>
                     
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
             </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                    {{ $data->links('pagination') }}
                      
                    </div>
                </div>
                
            </div>
          </div>


          <!-- Selesai -->
        </div>
      </div>

<!-- Modal -->
<?php if($all_access->where('name','Rusun-Add')->count() > 0){ ?>
    <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
    <div class="modal-content border-secondary">
        <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">  Tambah Data</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action=<?= url('rusun/create'); ?> method="post">
            @csrf
            
           
                <div class="form-group row">
                    <label for="persen_dispen" class="col-sm-2 col-form-label">Persen Dispen</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-square" id="persen_dispen" name="persen_dispen" >
                    </div>
                    
                </div>
                <div class="form-group row">
                   
                    <label for="Bulan_Mulai" class="col-sm-2 col-form-label">Bulan Mulai</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-square" id="Bulan_Mulai" name="Bulan_Mulai" >
                    </div>
                    <label for="Tahun_Mulai" class="col-sm-2 col-form-label">Tahun Mulai</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-square" id="Tahun_Mulai" name="Tahun_Mulai" >
                    </div>
                </div>
                <div class="form-group row">
                   
                    <label for="Bulan_Selesai" class="col-sm-2 col-form-label">Bulan Selesai</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-square" id="Bulan_Selesai" name="Bulan_Selesai">
                    </div>
                    <label for="Tahun_Selesai" class="col-sm-2 col-form-label">Tahun Selesai</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-square" id="Tahun_Selesai" name="Tahun_Selesai" >
                    </div>
                </div>
                
              
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-inverse-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn btn-secondary"><i class="fa fa-check-square-o"></i> Save changes</button>
        </div>
        </form>
    </div>
    </div>
</div>
                
<?php } ?>
<!--End Modal -->




@endsection


@section('footer')
<!-- Footer Script -->

@endsection