@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.gambar_home.gambar_home_css')
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

<div class="callout callout-info">
  <h4>Information!</h4>

  <p>Halam ini berisi tentang pengelolaan Gambar di Beranda/home.</p>
</div>



<div class="row">
  <div class="col-md-3">
    <div class="box box-primary " id="form_gambar_home"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list-alt"></i> Form {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

        <form enctype="multipart/form-data" method="POST" data-toggle="validator" action="{{url('backend/aksi/header_home')}}"> 
      {{ csrf_field() }}
        <div class="form-group">
          <label for="judul">Pengguna</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="file" class="form-control" id="file1" name="file[]" >
          </div>
          
        </div>

        <div class="form-group">
          <label for="judul">Pengunjung</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="file" class="form-control" id="file2" name="file[]" >
          </div>
          
        </div>

        <div class="form-group">
          <label for="judul">Training</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="file" class="form-control" id="file1" name="file[]" >
          </div>
          
        </div>

         <div class="form-group">
          <label for="judul"></label>

          <div class="input-group">
            <button type="submit" class="btn btn-primary">Simpan</button>            
          </div>
          
        </div>
        
        </form>

      </div>
      
    </div>
          
  </div>

  <div class="col-md-9">
    <div class="box box-primary " id="form_gambar_home"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-th-list"></i> Header Gambar</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
        <table class="table table-striped table-hover" id="gambar_home">
          <thead>
            <tr>
              <th>No</th>
              <th>Tipe</th>
              <th>Status</th>
              <th>Tanggal Upload</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>

      </div>
      
    </div>
          
  </div>
</div>


<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body ">
            
          <div id="isi" style="float:center" class="text-center">

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

    @include("backend.gambar_home.gambar_home_js")
@endsection