@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.tentang_kami.tentang_kami_css')
@endsection

<style type="text/css" media="screen">
span.badge.bg-danger{
  background-color: red;
}  
span.badge.bg-success{
  background-color: green;
}  
</style>
    @section('content')
      @section('breadcumbs')
        <?= Breadcrumbs::render('keluhan') ?>
      @endsection

<div class="callout callout-danger">
  <h4>Information!</h4>

  <p>Halam ini berisi buku tamu.</p>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="box box-primary"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">Tabel {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
           
        <table id="tabel_buku_tamu" class="table table-responsive">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Nama Perusahaan</th>
              <th>Email</th>
              <th>No Handphone</th>
              <th>Tanggal Kunjungan</th>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
    @parent

    @include("backend.buku_tamu.buku_tamu_js")
@endsection