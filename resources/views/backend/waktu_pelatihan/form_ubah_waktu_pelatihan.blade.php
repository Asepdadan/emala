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
  <div class="col-md-6">
    <div class="box box-primary" id="form_tentang_kami"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">{{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

      
        

           
       <form method="POST" class="form-inline" role="form" id="form_waktu_pelatihan" action="{{url('backend/post/ubah_waktu_pelatihan')}}">
              {{ csrf_field() }}
          <input type="hidden" value="<?php echo $id; ?>" name="id">
          <div class="form-group">
          <label for="username" class="control-label">Tipe Pelatihan</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <select name="tipe_pelatihan" id="inputTipe" class="form-control" required="required">
            @foreach($tipe as $row)
              <option value="{{$row->id}}" <?php if($pelatihan_id == $row->id) echo "selected"; ?>>{{$row->tipe_pelatihan}}</option>
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
            <textarea name="judul" id="inputJudul" class="form-control" rows="5" cols="100" required="required"><?php echo $judul; ?></textarea>
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Keterangan Pelatihan</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <textarea name="keterangan" id="inputJudul" class="form-control" rows="5" cols="100" required="required"><?php echo $keterangan; ?></textarea>
          </div>
        
        </div>

         <div class="form-group">
          <label for="nama">Batas orang (kuota)</label>
          
          <div class="input-group">
           <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="batas" class="form-control" rows="5" cols="100" required="required" value="<?php echo $batas; ?>">
          </div>
        
        </div>

        <div class="form-group">
          <label for="email">Waktu Pelaksanaan</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggal" class="form-control" value="<?php echo $tanggal_pelatihan; ?>">
          </div>
        
        </div>
       
           
       
           <div class="form-group">
           <label class="control-label"></label>
             
             
           </div>
       

      </div>
      <div class="box-footer">
        <div class="input-group">
               <button type="submit" class="btn btn-primary" >Ubah</button>
        </div>
        </form>
      </div>
      
    </div>
          
  </div>

</div>





@endsection

@section('javascript')
    @parent

    @include("backend.waktu_pelatihan.waktu_pelatihan_js")
@endsection