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
        <?= Breadcrumbs::render('backend/tentang-kami') ?>
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
        
      <form id="tentang-kami" method="POST" data-toggle="validator" action="{{url('backend/aksi/tentang-kami')}}"> 
      {{ csrf_field() }}
        <div class="form-group">
          <label for="judul">Judul Tentang Kami:</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-text-height"></i>
            </div>
            <input type="text" class="form-control" id="judul" name="judul" >
          </div>
          
        </div>
        

        <div class="form-group">
          <label for="isi">Isi Tentang Kami</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-pencil-square"></i>
            </div>
            <textarea name="isi" class="form-control"></textarea>
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
              <input type="text" class="form-control" id="judul1" name="judul1" >
            </div>
            
          </div>
          

          <div class="form-group">
            <label for="isi">Isi Tentang Kami</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="isi1" class="form-control"></textarea>
            </div>
          
          </div>

        </div>
              

        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
          <button type="submit" class="btn btn-primary" id="ubah">Ubah</button>                              
        </div>
      </form>
      </div>
      
    </div>
          
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Tabel {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
        @if(Session::has('information'))
        <div class="callout callout-success" id="information">

          <h4>Information!</h4>

          <p>{{ Session::get('information') }}</p>
        </div>
        @endif

        
        
            <table class="table table-striped table-bordered" id="tabel_tentang_kami">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Status</th>
                  <!-- <th>Tanggal Posting</th> -->
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
            
            <div class="callout callout-danger" >
              <div id="isi">
              </div>
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

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body ">
        <form>
          <div class="form-group">
            
            <div class="callout callout-danger" >
              <div id="isi">
              </div>
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

    @include("backend.tentang_kami.tentang_kami_js")
@endsection