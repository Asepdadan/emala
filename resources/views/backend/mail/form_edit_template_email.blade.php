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
        
         <form id="template_email" method="POST" data-toggle="validator" action="{{url('backend/update/template-email')}}">
         <input type="hidden" name="_method" value="PUT"> 
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$id}}">

          <div class="form-group">
            <label for="Header">Header</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="header_email" class="form-control" rows="8">{{$header_email}}</textarea>
            </div>
          
          </div>

          <div class="form-group">
            <label for="Footer">Footer</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-pencil-square"></i>
              </div>
              <textarea name="footer" class="form-control" rows="8">{{$footer}}</textarea>
            </div>
          
          </div>

           <div class="form-group">
            <label for="status">Status</label>

            <div class="input-group">
              
              <div class="radio">
                <label>
                  <input type="radio" name="status" id="input" value="1" <?php if($status == 1) {echo "checked";}else{echo "";} ?>>
                  Aktif
                </label>
                <label>
                  <input type="radio" name="status" id="input" value="0" <?php if($status == 0) {echo "checked";}else{echo "";} ?>>
                  Tidak Aktif
                </label>
              </div>
            </div>
          
          </div>
                

          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
          </div>
        </form>

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