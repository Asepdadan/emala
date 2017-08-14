@extends('layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('pegawai_pengguna.formulir_css')
@endsection

@section('content')
    
<style>
.input{
  padding-right: 40px;
}
input{
  background: gray;
}
</style>


<div class="row">
  <div class="col-md-12" >
    <form method="POST" class="form-horizontal" role="form" action="{{url('pelatihan/rekanan')}}" id="form_pelatihan_rekanan">
        <div class="form-group">
          <legend style="color:purple;"><center>{{$header_kecil}}
            <h2 class="text-center">{{$header_besar}}</h2>  </center></legend>
        </div>
        
        <div class="row">
  
    
@if (Session::has('pesan')) 
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Perhatian!</strong> {{ Session::get('pesan') }}
    </div>
@endif


          <div class="col-lg-9">
            <div class="form-group input">
             <label for="nama" class="control-label">Nama</label>
              <input type="text" name="nama" id="inputnama" placeholder="Isi nama lengkap dan gelar" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-9">
            <div class="form-group input">
             <label for="nip" class="control-label" >Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Isikan Nama Perusahaan dengan benar" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-9">
            <div class="form-group input">
             <label for="alamat" class="control-label">Alamat</label>
              <textarea name="alamat" id="inputalamat" class="form-control" placeholder="Isikan Alamaat" rows="4"></textarea>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="form-group input">
             <label for="no_hp" class="control-label">No Handphone</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-mobile-phone"></i>
                </div>
                  <input type="text" name="no_hp" id="inputno_hp" class="form-control" placeholder="Contoh: +6281232456790" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group input">
             <label for="email" class="control-label">Email</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="text" name="email" id="inputemail" class="form-control" placeholder="Contoh: contoh@gmail.com" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group input">
             <label for="tanggal_pelatihan" class="control-label">Tanggal Pelatihan</label>
             <div class="input-group col-sm-5">
                <select name="tanggal_pelatihan" class="form-control">
                @foreach($waktu_pelatihan as $row)
                  <option value="{{$row->tanggal_pelatihan}}">{{$row->tanggal_pelatihan}}</option>
                @endforeach
                </select>
              
              </div>
            </div>
          </div>

          


          <div class="row">
            <div class="col-lg-6">    
              <div class="form-group">
              <label class="control-label" for="" style="margin-left: 14px;">Verification Code</label>
                <div class="row">
                <div class="col-lg-6">
                  <label class="col-sm-6 control-label" id="verifycodeOperation"></label>
                </div>
                <div class="col-lg-5">
                  <input type="text" id="inputverifycode" class="form-control" name="verifycode">
                </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-10">
            <div class="form-group input">
            <label for="file" ></label>
              <button type="submit" class="btn btn-success btn-lg" name="ppk">Simpan</button>
              <a href="{{url('home')}}" class="btn btn-danger btn-lg">Batal</a>
            </div>
          </div>

        </div>
        
    

    </form>
  </div>
</div>

@endsection

@section('javascript')
    @parent

    @include("pelatihan.formulir_rekanan_js")
@endsection