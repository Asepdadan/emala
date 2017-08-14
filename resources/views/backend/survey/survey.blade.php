@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.survey.survey_css')
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
        <?= Breadcrumbs::render('backend/survey') ?>
      @endsection

<div class="callout callout-info">
  <h4>Information!</h4>

  <p>Halam ini berisi tentang pengelolaan Gambar di Beranda/home.</p>
</div>



<div class="alert alert-success" id="pesan">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Pesan</strong>
  <br> <p id="result"></p>
</div>



<div class="row">
  <div class="col-md-4">
    <div class="box box-primary " id="form_gambar_home"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list-alt"></i> Form {{$deskripsi}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">

        <form method="POST" data-toggle="validator" action="{{url('backend/aksi/survey')}}"> 
      {{ csrf_field() }}
        <div class="form-group">
          <label for="judul">Soal </label>

            <textarea name="soal" id="inputSoal" class="form-control" rows="5" width="500" required="required"></textarea>
          
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

  <div class="col-md-8">
    <div class="box box-primary " id="form_gambar_home"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-th-list"></i> Header Gambar</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
        <table class="table table-striped table-hover" id="survey">
          <thead>
            <tr>
              <th>No</th>
              <th>Tipe</th>
              <th>Status</th>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body ">
            
           <form method="POST" data-toggle="validator" action="{{url('backend/ubah/survey')}}"> 
            {{ csrf_field() }}
            <input type="hidden" name="id" id="inputId">
              <div class="form-group">
                <label for="judul">Soal </label>

                  <textarea name="soal" id="inputSoal" class="form-control" rows="5" width="500" required="required"></textarea>
                
              </div>

              <div class="form-group">
                <label for="judul">Status </label>
            
                <div class="radio">
                  <label>
                    <input type="radio" name="status" id="inputStatus1" value="1">
                    Aktif
                  </label>
                  <label>
                    <input type="radio" name="status" id="inputStatus0" value="0" >
                    Tidak Aktif
                  </label>
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
</div>


@endsection

@section('javascript')
    @parent

    @include("backend.survey.survey_js")
@endsection