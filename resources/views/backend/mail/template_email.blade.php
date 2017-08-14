@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.keluhan.keluhan_css')
@endsection

@section('content')
      @section('breadcumbs')
        <?= Breadcrumbs::render('keluhan') ?>
      @endsection

@if (Session::has('pesan')) 
    <div class="alert alert-success">
      <strong>Perhatian!</strong> <br>
      {{ Session::get('pesan') }}
    </div>
@endif


<div class="row">
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Form Template Email </h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        
         <form id="template_email" method="POST" data-toggle="validator" action="{{url('backend/postTemplateEmail')}}"> 
        {{ csrf_field() }}
          <!-- <div class="form-group">
            <label for="judul">Subject</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-text-height"></i>
              </div>
              <input type="text" class="form-control" id="subject" name="subject" >
            </div>
            
          </div>
           -->

        <!--   <div class="form-group">
            <label for="isi">Isi Email</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="isi" class="form-control" rows="8"></textarea>
            </div>
          
          </div> -->

          <div class="form-group">
            <label for="isi">Header</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="header" class="form-control" rows="8"></textarea>
            </div>
          
          </div>

          <div class="form-group">
            <label for="isi">Footer</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="footer" class="form-control" rows="8"></textarea>
            </div>
          
          </div>

          <!--  <div class="form-group">
            <label for="isi">Template Email</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <select name="view_template" class="form-control" required="required">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          
          </div> -->
                

          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
          </div>
        </form>

      </div>
    </div>

  </div>
  
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Template Email </h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" id="refresh"><i class="fa fa-refresh"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        
        <table class="table table-striped table-hover" id="tabel_email">
          <thead>
            <tr>
              <th>Header</th>
              <th>Footer</th>
              <th>Status</th>
              <th>Tanggal Buat</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>

      </div>
    </div>

  </div>

</div>

<div class="row">
  
</div>

@endsection

@section('javascript')
    @parent

    @include("backend.mail.template_email_js")
@endsection