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
  <h4><i class="fa fa-info-circle"></i> Information!</h4>

  <p>Halam ini berisi tentang pengelolaan Customize page frontend.</p>
</div>



<div class="row">
  <div class="col-md-6">
    <div class="box box-primary "><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">form {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
           
         <form id="form_customize_frontedn" method="POST" data-toggle="validator" enctype="multipart/form-data" action="{{url('backend/aksi/customize_frontend')}}"> 
          {{ csrf_field() }}
            <div class="form-group">
              <label for="judul">Logo</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-photo"></i>
                </div>
                <input type="file" name="foto" class="form-control" placeholder="">
              </div>
              
            </div>
            

            <div class="form-group">
              <label for="isi">Judul Header</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-pencil-square"></i>
                </div>
                <input type="text" name="judul_header" class="form-control" placeholder="">
              </div>
            
            </div>
                  

            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
            </div>
          </form>
        

      </div>
      
    </div>
          
  </div>

  <div class="col-md-6">
    <div class="box box-primary "><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">Header Aktif</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
           @foreach($data as $row)
         
            <div class="form-group">
              <label for="judul">Logo</label>

              <div class="input-group">
                
                <img src="{{url('/')}}/uploads/header/{{$row->logo}}" class="img-responsive img-thumbnail" alt="Image">
              </div>
              
            </div>
            

            <div class="form-group">
              <label for="isi">Judul Header</label>

              <div class="input-group">
               <h3>{{$row->header}}</h3>
              </div>
            
            </div>
                  
          @endforeach         

      </div>
      
    </div>
          
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary " id="form_tentang_kami"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">Tabel {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

         <table class="table table-hover" id="tabel_custom_header">
           <thead>
             <tr>
               <th>No </th>
               <th>Header</th>
               <th>Status</th>
               <th>Tanggal Pembuatan</th>
               <th>Aksi</th>
             </tr>
           </thead>
         </table>

      
      
    </div>
          
  </div>
</div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Errors</h5>
            </div>

            <div class="modal-body">
                <!-- The messages container -->
                <div id="errors"></div>
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

    @include("backend.customize_frontend.customize_frontend_js")
@endsection