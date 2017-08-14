@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.tentang_kami.tentang_kami_css')
@endsection


@section('content')
      @section('breadcumbs')
        <?= Breadcrumbs::render('keluhan') ?>
      @endsection

<div class="callout callout-info">
  <h4>Information!</h4>

  <p style="font-size:13pt;">Halam ini berisi tentang pengelolaan Peserta Pengajuan Pelatihan semua kategori.</p>
</div>




<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Tabel {{$deskripsi}}</h3>
         
            <div class="pull-right">
            Filter By Tipe Pelatihan dan Status
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
      </div>
      <div class="box-body">
        
        @if(Session::has('information'))
        <div class="callout callout-success" id="information">

          <h4>Information!</h4>

          <p>{{ Session::get('information') }}</p>
        </div>
        @endif
        
        <div class="pull-right">
        <form action="" method="POST" class="form-inline" role="form">
        
          <div class="form-group">
            <label class="sr-only" for="">label</label>
                <div id="tipe_pelatihanid">      
                </div>
          </div>
          <div class="form-group">
            <label class="sr-only" for="">label</label>
                <div id="status">      
                </div>
          </div>
       
          
        
          
        </form>
        </div>
            
        <br><br>
        <br><br>
            <table class="table table-striped table-bordered" id="tabel_pengajuan_peserta">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tipe Pelatihan</th>
                  <th>Nama Peserta</th>
                  <th>Asal Perusahaan</th>
                  <th>Tanggal Pelatihan</th>
                  <th>Status</th>
                  <th>Tanggal Created</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
        

     
      </div>
      
    </div>
          
  </div>
</div>




<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body ">
        <div id="isi">
          
        </div>
      </div>  
      <div class="modal-footer">
        
      </div>   
    </div>
  </div>
</div>


@endsection

@section('javascript')
    @parent

    @include("backend.pengajuan_peserta_pelatihan.pengajuan_peserta_pelatihan_js")
@endsection
