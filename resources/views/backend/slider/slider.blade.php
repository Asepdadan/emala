@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.slider.slider_css')
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
    <div class="box box-primary " id="form_slider"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list-alt"></i> Form {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

        <form enctype="multipart/form-data" method="POST" data-toggle="validator" action="{{url('backend/aksi/customize-slider')}}"> 
      {{ csrf_field() }}
      
        <div class="form-group">
          <label for="">Gambar</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="file" class="form-control" id="file1" name="file[]" >
          </div>
          
        </div>

        <div class="form-group">
          <label for="">Url</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="text" class="form-control" id="file2" name="url" >
          </div>
          
        </div>

        <div class="form-group">
          <label for="">Isi</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <textarea name="isi" id="inputIsi" class="form-control" rows="3" required="required"></textarea>
          </div>
          
        </div>

         <div class="form-group">
          <label for=""></label>

          <div class="input-group">
            <button type="submit" class="btn btn-primary">Simpan</button>            
          </div>
          
        </div>
        
        </form>

      </div>
      
    </div>
          
  </div>

  <div class="col-md-9">
    <div class="box box-primary " id=""><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-th-list"></i> Slide Gambar</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
        <table class="table table-striped table-hover" id="slider">
          <thead>
            <tr>
              <th>No</th>
              <th>Url</th>
              <th>Isi</th>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body ">
        
          <div class="row">
            <div class="col-md-12">
              <form class="form-horizontal" role="form" method="POST">
                    <input type="hidden" name="id" >
                    <div class="form-group">
                    <label for="url" class="col-md-2 control-label">Url</label>
                      <div class="col-md-10">
                        <input type="url" name="Murl" class="form-control" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                    <label for="title" class="col-md-2 control-label">isi</label>
                      <div class="col-md-10">
                        <textarea name="Misi" class="form-control" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 control-label" for="judul">Status </label>
                      <div class="col-md-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="Mstatus" id="inputStatus1" value="1">
                          Aktif
                        </label>
                        <label>
                          <input type="radio" name="Mstatus" id="inputStatus0" value="0" >
                          Tidak Aktif
                        </label>
                      </div>
                      </div>
                    </div>
                    
                
                    <div class="form-group">
                      <div class="col-md-10 col-sm-offset-2">
                        <button type="button" id="ubah" class="btn btn-primary">Ubah</button>
                      </div>
                    </div>
                  </form>

            </div>
          </div>
               
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>


@endsection

@section('javascript')
    @parent

    @include("backend.slider.slider_js")
@endsection