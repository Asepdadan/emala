@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.tentang_kami.tentang_kami_css')
 {!! Html::style('assets/plugins/datepicker/bootstrap-datepicker.min.css') !!}
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

  <p>Halam ini berisi tentang pengelolaan {{$deskripsi}}.</p>
</div>



<div class="row">
  <div class="col-md-4">
    <div class="box box-primary" id="form_tentang_kami"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">{{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
           
       <form method="POST" class="form-inline" role="form" id="form_waktu_pelatihan" action="{{url('backend/post/waktu_pelatihan')}}">
              {{ csrf_field() }}
          
          <div class="form-group">
          <label for="username">Tipe Pelatihan</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <select name="tipe_pelatihan" id="inputTipe" class="form-control" required="required">
            @foreach($tipe as $row)
              <option value="{{$row->id}}">{{$row->tipe_pelatihan}}</option>
            @endforeach
            </select>
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Nama Pelatihan</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <textarea name="judul" id="inputJudul" class="form-control" rows="5" cols="100" required="required"></textarea>
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Keterangan Pelatihan</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <textarea name="keterangan" id="inputJudul" class="form-control" rows="5" cols="100" required="required"></textarea>
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Batas Orang (kuota)</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input name="batas" class="form-control" rows="5" cols="100" required="required">
          </div>
        
        </div>

        <div class="form-group">
          <label for="email">Waktu Pelaksanaan</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggal" class="form-control" >
          </div>
        
        </div>
       
           
       
           <div class="form-group">
           <label class="control-label"></label>
             
             
           </div>
       

      </div>
      <div class="box-footer">
        <div class="input-group">
               <button type="submit" class="btn btn-primary" id="simpan_waktu">Simpan</button>
        </div>
        </form>
      </div>
      
    </div>
          
  </div>

  <div class="col-md-8">
    <div class="box box-primary" id=""><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">Tabel {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
           
        <table id="waktu_pelatihan" class="table table-responsive">
          <thead>
            <tr>
              <th>Tipe Pelatihan</th>
              <th>Nama Pelatihan</th>
              <th>Kuota Pelatihan(jumlah orang)</th>
              <th>Tanggal Pelatihan</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>

      </div>
      
    </div>
          
  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body ">
        <div id="isi">

        <form method="POST" class="form-inline" role="form" id="form_waktu_pelatihan" action="{{url('backend/post/waktu_pelatihan')}}">
              {{ csrf_field() }}
          
          <div class="form-group">
          <label for="username">Tipe Pelatihan</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <select name="tipe_pelatihan" id="inputTipe" class="form-control" required="required">
            @foreach($tipe as $row)
              <option value="{{$row->id}}">{{$row->tipe_pelatihan}}</option>
            @endforeach
            </select>
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Nama Pelatihan</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <textarea name="judul" id="inputJudul" class="form-control" rows="5" cols="100" required="required"></textarea>
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Keterangan Pelatihan</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <textarea name="keterangan" id="inputKeterangan" class="form-control" rows="5" cols="100" required="required"></textarea>
          </div>
        
        </div>

        <div class="form-group">
          <label for="email">Waktu Pelaksanaan</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggal" id="Inputtanggal" class="form-control" >
          </div>
        
        </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="ubah">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection

@section('javascript')
    @parent

    @include("backend.waktu_pelatihan.waktu_pelatihan_js")
@endsection