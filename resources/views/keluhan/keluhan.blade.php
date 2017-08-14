@extends('layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('keluhan.keluhan_css')
@endsection

@section('content')
    
<div class="row">
  
<div class="row">
  <div class="col-md-12">
    <?= Breadcrumbs::render('keluhan') ?>
  </div>
</div>

@if (Session::has('status')) 
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Perhatian!</strong> {{ Session::get('status') }}
    </div>
@endif


<div class="col-md-12">
  <form id="{{$class}}" method="POST" data-toggle="validator" action="{{ url('aksiKeluhan')}}" class="form-horizontal" enctype="multipart/form-data"> 
    {{ csrf_field() }}
    <legend>FORM KELUHAN PENGGUNA LPSE</legend>
    
  <div class="form-group">
     <div class="col-md-6">
     <label for="nama" >Nama Pelapor</label>
      <input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
    </div>
  </div>

   <div class="form-group">
     <!-- <div class="col-md-3">
     <label for="no_telp" >No Telp/ No Handphone</label>
      <input type="text" name="no_telp" id="no_telp" class="form-control" autocomplete="off">
    </div> --> 

    <div class="col-md-6">
     <label for="sebagai" >Anda Sebagai</label>
      <select name="sebagai" id="inputSeb" class="form-control" >
        <option value="">Pilih Kategori</option>
        <option value="Penyedia">Penyedia</option>
        <option value="ULP">ULP</option>
        <option value="Pejabat">Pejabat</option>
        <option value="PPK">PPK</option>
        <option value="Publik">Publik</option>
        <option value="SKPD">SKPD</option>
        <option value="Auditor">Auditor</option>
        <option value="LPSE">LPSE</option>
        <option value="dll">Pemda Lain</option>
      </select>
    </div>
  </div>

  <div class="form-group">
     <div class="col-md-12">
     <label for="isi_laporan" >Isi Laporan</label>
      <textarea name="isi_laporan" id="inputIsi_laporan" class="form-control" rows="7" required="required"></textarea>
    </div>
  </div>  

   <div class="form-group" id="attachment">
     <div class="col-md-12">
     <label for="isi_laporan" >Attachment <a href="javascript::" class="btn btn-default" onclick="addmore()"><i class="fa fa-plus"> </i>  Add More</a></label>
      <input type="file" name="file[]" class="form-control" id="file_keluhan[]"> 
    </div>
  </div>  
        
    <div class="form-group">
     <div class="col-md-6">
     <button type="submit" class="btn btn-success">Kirim Laporan</button>
     <a href="{{ url('home')}}" class="btn btn-danger">Batal</a>
    </div>
  </div>
        
  </form>
</div>

</div>


@endsection

@section('javascript')
    @parent

    @include("keluhan.keluhan_js")
@endsection