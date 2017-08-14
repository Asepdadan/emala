@extends('layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('tentang.tentang_css')
 {!! Html::style('assets/backend/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    
  <style type="text/css" media="screen">
  li{
    width: auto;
  }  
  li a{
    font-size: 10pt;
  }
  </style>
<div class="row">
  
  <div class="col-md-12">
  <h2>PENDAFTARAN PESERTA PELATIHAN SPSE</h2>

    <ul class="nav nav-pills" >
      <li role="presentation" class="active"><a data-toggle="pill" href="#menu1">Pelatihan Rekanan <span class="badge">22 Orang</span></a></li>
      <li role="presentation"><a data-toggle="pill" href="#menu2">Pelatihan Pejabat Pengadaan <span class="badge">22 Orang</span></a></li>
      <li role="presentation"><a data-toggle="pill" href="#menu3">Pelatihan PPK <span class="badge">22 Orang</span></a></li>
      <li role="presentation"><a data-toggle="pill" href="#menu4">Pelatihan Auditor <span class="badge">22 Orang</span></a></li>
      <li role="presentation"><a data-toggle="pill" href="#menu5">Pelatihan Pokja ULP <span class="badge">22 Orang</span></a></li>
    </ul><hr>
    
    <div class="tab-content" style="margin-top: 10px;box-sizing: border-box; margin-bottom: 50px;">
       <div id="menu1" class="tab-pane fade in active">
        <h3>Pelatihan Khusus Rekanan/Penyedia</h3>
        <h4>Pelatihan ini meliputi : Pengenalan SPSE Versi 4, Aplikasi SIKAP</h4>
      
      <a href="{{ url('formulir-rekanan') }}" class="btn btn-success pull-right">Daftar</a><br><br>

      <table class="table table-bordered table-striped" id="tabel_pelatihan_rekanan">
        
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Nama Perusahaan</th>
            <th>Alamat Nama Peserta</th>
            <th>Tanggal Pelatihan</th>
          </tr>
        </thead>
      </table>

       </div>
       <div id="menu2" class="tab-pane fade ">
         <div class="col-md-2 bg"></div>  
          <div class="col-md-12 bg">
          <h3>Pelatihan Khusus Pejabat Pengadaan</h3>
          <p>Pelatihan ini meliputi : Pengenalan SPSE Versi 4, Pengenalan Aplikasi e-Pengadaan Langsung, e-Katalogue</p>
          <p><a class="btn btn-success" href="{{url('pelatihan/form_pejabat_pengadaan')}}" >DAFTAR</a> <a class="btn btn-danger" href="javascript::" id="lihat_pejabata_pengadaan">LIHAT PESERTA</a></p>
          <div id="result_pejabat_pengadaan">
            
          </div>

          </div>
       </div>
      <div id="menu3" class="tab-pane fade ">
         <div class="col-md-4 bg"></div>  
      <div class="col-md-12 bg">
      <h3>Pelatihan Khusus Pejabat Pembuat Komitmen</h3>
      <p>Pelatihan ini meliputi : Pengenalan SPSE Versi 4, Pengenalan Aplikasi e-Pengadaan Langsung, e-Katalogue</p>
      <p><a class="btn btn-success" href="{{url('pelatihan/form_ppk')}}" id="daftar_ppk">DAFTAR</a> <a class="btn btn-danger" href="javascript::" id="lihat_ppk">LIHAT PESERTA</a></p>
      <div id="result_ppk">
            
      </div>

      </div>  
      </div>
       <div id="menu4" class="tab-pane fade">
          <div class="col-md-5 bg"></div>  
          <div class="col-md-12 bg">      
          <h3>Pelatihan Khusus Auditor/Inspektorat</h3>
          <p>Pelatihan ini meliputi : Pengenalan SPSE Versi 4, Pengenalan Aplikasi e-Pengadaan Langsung, e-Katalog</p>
          <p><a class="btn btn-success" href="{{url('pelatihan/form_auditor')}}">DAFTAR</a> <a class="btn btn-danger" href="javascript:void(0)" id="lihat_auditor">LIHAT PESERTA</a></p>
          <div id="result_auditor">

          </div>
          </div>  
       </div>
       <div id="menu5" class="tab-pane fade ">
          
          <div class="col-lg-7 bg"> </div>  
          <div class="col-lg-12 bg">
          <h3>Pelatihan Khusus Pokja ULP</h3>

          <p>Pelatihan ini meliputi : Pengenalan SPSE Versi 4</p>
          <p>
           </p>
          <p><a class="btn btn-success" href="{{url('pelatihan/form_pokja_ulp')}}">DAFTAR</a> <a class="btn btn-danger" href="javascript:void(0)" id="lihat_pokja_ulp">LIHAT PESERTA</a></p>
          <div id="result_pokja">

          </div>
          </div> 
          
       </div>
    </div>

  </div>

</div>

@endsection

@section('javascript')
    @parent

    @include("pelatihan.pelatihan_penyedia_js")
@endsection