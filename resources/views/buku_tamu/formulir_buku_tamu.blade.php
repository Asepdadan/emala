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
</style>



<div class="row">

<div class="col-md-12">
<?= Breadcrumbs::render('buku_tamu') ?>
</div>

  <div class="col-md-12">
    <form action="{{url('aksi/buku_tamu')}}" method="POST" class="form-horizontal" role="form" id="form_buku_tamu">
        <div class="form-group">
          <legend style="color:purple;"><center>{{$header_kecil}}
            <h2 class="text-center">{{$header_besar}}</h2>  </center></legend>
        </div>

@if (Session::has('pesan')) 
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Perhatian!</strong> {{ Session::get('pesan') }}
    </div>
@endif


      <div class="row">
      <div class="col-lg-6">
            <div class="form-group input">
             <label for="tanggal_kunjungan" >Tanggal Kunjungan</label>

              <div class="input-group">
                <div class="input-group-addon show-calender">
                  <i class="fa fa-calendar"></i>
                </div>
                <div class="input-group-addon remove">
                  <i class="fa fa-remove"></i>
                </div>
                <input type="text" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">

          <div class="col-lg-12">
            <div class="form-group input">
             <label for="nama" >Nama Anda</label>
              <input type="text" name="nama" id="nama" placeholder="Isikan Nama anda" class="form-control" autocomplete="off">
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group input">
             <label for="sebagai" >Sebagai</label>
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

          <div class="col-md-5">
            <div class="form-group input">
             <label for="panggilan" >Panggilan</label>
              <select name="panggilan" id="panggilan" class="form-control" >
                <option value="">Pilih Kategori</option>
                <option value="Bapak">Bapak</option>
                <option value="Ibu">Ibu</option>
              </select>
            </div>
          </div>

<div id="group_p">
          <div class="col-lg-7" id="group_perusahaan">
            <div class="form-group input">
             <label for="nama_perusahaan" >Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan" placeholder="Isikan nama perusahaan" id="nama_perusahaan" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-5">
            <div class="form-group input" id="group_admin">
             <label for="nama_admin" >Nama Admin</label>
              <input type="text" name="nama_admin" id="nama_admin" placeholder="Isikan nama Admin" class="form-control" autocomplete="off">
            </div>
          </div>
</div>

          <div class="col-lg-7">
            <div class="form-group input">
             <label for="email" >Email</label>
              <input type="text" name="email" id="inputemail" class="form-control" placeholder="Pastikan email yang anda masukan aktif" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-5">
            <div class="form-group input">
             <label for="no_telp" >Telp</label>
              <input type="text" name="no_telp" id="no_telp" placeholder="Contoh: +6281232456790" class="form-control" autocomplete="off">
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group input">
             <label for="alamat" >Alamat</label>
              <textarea name="alamat" placeholder="Isikan Alamaat" id="alamat" class="form-control" rows="4" ></textarea>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group input">
             <label for="tujuan" >Tujuan</label>
              <textarea name="tujuan" id="tujuan" placeholder="Isikan Tujuan" class="form-control" rows="4" ></textarea>
            </div>
          </div>         
         

          
            <div class="col-lg-6">    
              <div class="form-group">
              <label class="control-label" for="verifycode">Verification Code</label>
                <div class="row">
                <div class="col-lg-5">
                  <label class="col-sm-5 control-label" id="verifycodeOperation"></label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="inputverifycode" class="form-control" name="verifycode">
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

    @include("buku_tamu.formulir_buku_tamu_js")
@endsection