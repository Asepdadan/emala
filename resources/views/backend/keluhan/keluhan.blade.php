@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.keluhan.keluhan_css')
@endsection

@section('content')
      @section('breadcumbs')
        <?= Breadcrumbs::render('backend/keluhan') ?>
      @endsection

<div class="row">
<div class="col-xs-12">
  
  <div class="alert alert-success" id="pesan">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Pesan</strong><br><p id="info"></p>
  </div>


  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">List Keluhan </h3>
      
      <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" id="refresh"><i class="fa fa-refresh"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      
      <table class="table table-striped table-hover" id="tabel_keluhan">
        <thead>
          <tr>
            <th>Nama Pelapor</th>
            <th>No Telp</th>
            <th>Sebagai</th>
            <th>Isi Laporan</th>
            <th>Tanggal</th>
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
        <form>
          <div class="form-group">
            
              <div id="isi">
              </div>
            
          </div>
        </form>
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

    @include("backend.keluhan.keluhan_js")
@endsection