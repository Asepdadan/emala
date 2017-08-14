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

<div class="callout callout-info">
  <h4>Information!</h4>

  <p>Halam ini berisi tentang pengelolaan Tentang kami yang tertera pada halaman tentang kami.</p>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="box box-primary " id="form_tentang_kami"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">Form {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
      <form id="tentang-kami" method="POST" data-toggle="validator" action="{{url('backend/aksi/edit/tentang-kami')}}"> 
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$id}}">
        <div class="form-group">
          <label for="judul">Judul Tentang Kami:</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="text" class="form-control" value="{{$judul}}" id="judul" name="judul" >
          </div>
          
        </div>
        

        <div class="form-group">
          <label for="isi">Isi Tentang Kami</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-pencil-square"></i>
            </div>
            <textarea name="isi" class="form-control">{{$isi}}</textarea>
          </div>
        
        </div>

         <div class="form-group">
          <label for="isi">Switch Judul Tentang Kami</label>

          <div class="input-group">
            <input type="checkbox" checked data-toggle="toggle" id="switch">
          </div>
        
        </div>

        <div id="toggle">
          <div class="form-group">
            <label for="judul">Judul Tentang Kami:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-text-height"></i>
              </div>
              <input type="text" class="form-control" value="{{$judul1}}" id="judul1" name="judul1" >
            </div>
            
          </div>
          

          <div class="form-group">
            <label for="isi">Isi Tentang Kami</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="isi1" class="form-control"> {{$isi1}}</textarea>
            </div>
          
          </div>


        </div>


         <div class="form-group">
            <label for="status">Status</label>

            <div class="input-group">
               <div class="input-group-addon">
                <input type="radio" name="status" id="input" value="1" <?php if ($status == 1) echo "checked"; ?>>
              </div>
              <div class="radio">
                <label>
                  Aktif
                </label>
              </div>

              <div class="input-group-addon">
                <input type="radio" name="status" id="input" value="0" <?php if ($status == 0)   echo "checked"; ?>>
              </div>
              <div class="radio">
                <label>
                  Tidak Aktif
                </label>
              </div>

            </div>
          
        </div>
              

        <div class="form-group">
          <button type="submit" class="btn btn-primary" >Ubah</button>                              
          <a href="backend/buku-tamu" class="btn btn-default" >Kembali</a>                              
        </div>
      </form>
      </div>
      
    </div>
          
  </div>
</div>



@endsection

@section('javascript')
    @parent

    @include("backend.tentang_kami.tentang_kami_js")
@endsection