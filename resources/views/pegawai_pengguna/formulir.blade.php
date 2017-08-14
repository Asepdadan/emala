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

  

    <form method="POST" class="form-horizontal" role="form" action="{{url('aksi/pegawai_pengguna')}}" id="form_pegawai_pengguna" enctype="multipart/form-data">
        <div class="form-group">
          <legend style="color:purple;"><center>{{$header_kecil}}
            <h2 class="text-center">{{$header_besar}}</h2>  </center></legend>
        </div>
  
      <div class="alert alert-info">
        <strong>Informasi</strong> 
        <br>* Pastikan data yang anda masukan benar
        <br>* Pastikan email yang anda masukan <b>AKTIF</b>
        
      </div>      
        <div class="row">

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="nama" class="control-label">Nama</label>
              <input type="text" name="nama" id="inputnama" placeholder="Isi nama lengkap dan gelar" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="nip" class="control-label" >NIP</label>
              <input type="text" name="nip" id="inputnip" placeholder="Isikan NIP dengan benar" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="userid" class="control-label">UserID</label>
              <input type="text" name="userid" id="inputuserid" placeholder="Isikan UserID yang diinginkan" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="email" class="control-label">Email  (Contoh : example@gmail.com)</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="text" name="email" id="inputemail" class="form-control" placeholder="Pastikan email yang anda masukan aktif" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group input">
             <label for="alamat" class="control-label">Alamat</label>
              <textarea name="alamat" id="inputalamat" class="form-control" placeholder="Isikan Alamaat" rows="4"></textarea>
            </div>
          </div>
          
          <!-- <div class="col-lg-4">
            <div class="form-group input">
             <label for="no_telp" class="control-label">No Telp</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="no_telp" id="inputno_telp" placeholder="Isikan No Telp" class="form-control" autocomplete="off">
              </div>
            </div>
          </div> -->

          <div class="col-lg-6">
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


          <div class="col-lg-6">
            <div class="form-group input">
             <label for="golongan" class="control-label">Golongan</label>
              <input type="text" name="golongan" id="inputgolongan" class="form-control" placeholder="Golongan" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="pangkat" class="control-label">Pangkat</label>
              <input type="text" name="pangkat" id="inputpangkat" class="form-control" placeholder="Pangkat" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="jabatan" class="control-label">Jabatan</label>
              <input type="text" name="jabatan" id="inputjabatan" class="form-control" placeholder="Jabatan" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="no_sk" class="control-label">No. SK</label>
              <input type="text" name="no_sk" id="inputno_sk" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="masa_berlaku" class="control-label">Masa Berlaku SK s/d</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <div class="input-group-addon remove">
                  <i class="fa fa-remove"></i>
                </div>
                <input type="text" name="masa_berlaku" id="inputmasa_berlaku" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group input">
             <label for="file" class="control-label">Ukuran File SK max ...</label>
              <input type="file" name="file" class="form-control">
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
                  <input type="text" id="inputverifycode" class="form-control" placeholder="Isi hasil penjumlahan" name="verifycode">
                  <!-- <div class="g-recaptcha" data-sitekey="6LflcCoUAAAAAPSFdAeH5iLRs4WmIZhu5k_1SVCM"></div> -->

                </div>
                </div>
              </div>
            </div>
          </div>

<!--           <div class="col-lg-3">
          <label for="file" >Ukuran File SK max ...</label>
            <div class="form-group input">
             <label class="col-md-3 control-label" id="captchaOperation"></label>
              <input type="text" name="captcha" id="captcha" class="form-control col-sm-offset-" placeholder="">
            </div>
          </div>
 -->
          <div class="col-md-10">
            <div class="form-group input">
            <label for="file" ></label>
              <button type="submit" class="btn btn-success btn-lg">Simpan</button>
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

    @include("pegawai_pengguna.formulir_js")
@endsection