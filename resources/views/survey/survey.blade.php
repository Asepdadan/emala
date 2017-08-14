@extends('layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('survey.survey_css')
@endsection

@section('content')
    
<div class="row">
  
<!-- <ul class="breadcrumb">
  <li>
    <i class="fa fa-home"></i>
    <a href="{{route('home')}}">Home</a>
    <i class="fa fa-angle-right"></i>
  </li>
  @for($i = 0; $i <= count(Request::segments()); $i++)
  <li>
    <a href="">{{Request::segment($i)}}</a>
    @if($i < count(Request::segments()) & $i > 0)
      {!!'<i class="fa fa-angle-right" aria-hidden="true"></i>'!!}
    @endif
  </li>
  @endfor
</ul> -->

<div class="col-md-12">
<?= Breadcrumbs::render('survey') ?>
</div>

<div class="row">
  <div class="col-md-12">
    <div id="container" style="min-width: 310px;height: 400px; margin: 0 auto; margin-bottom: 40px;">  </div>
  </div>
</div>

  <div class="col-md-12">
      <table class="table table-bordered table-striped">
          <tr>
            <td rowspan="4"><center>    <center><font style="font-size:16px; font-style:bold;"  color="black"><br/><br/><strong>LAYANAN PENGADAAN SECARA ELEKTRONIK</strong></font><br><font style="font-size:24px"; valign="middle"; color="blue"><strong>LEMBAR PENILAIAN KEPUASAN PENGGUNA SPSE</strong></font></center></td>
            <td width="150">Dokumen</td>
            <td width="10">:</td>
            <td width="150">F-SPSE.07-01</td>
          </tr>
          <tr>
            <td width="150">Revisi</td>
            <td width="10">:</td>
            <td width="150">00</td>
          </tr>
          <tr>
            <td width="150">Tanggal Terbit</td>
            <td width="10">:</td>
            <td width="150">15 Juni 2016</td>
          </tr>
          <tr>
            <td width="150">Halaman</td>
            <td width="10">:</td>
            <td width="150">1 / 1</td>
          </tr>
      </table>
    
      <div class="alert alert-info">
        <p><font style="font-size:16px"; color="black">Terima kasih Anda telah menggunakan layanan kami. Kami memohon bantuan Anda untuk mengisi penilaian kepuasan Pengguna SPSE yang terkait dengan penanganan permasalahan Pengguna SPSE yang telah kami berikan. Silahkan lengkapi data diri Anda dan silahkan klik pada pilihan nilai yang menurut Anda paling sesuai. Terima kasih.</font>
      </div>

    <form  action="{{url('kepuasan')}}" method="POST" class="form-inline" role="form" id="form_survey">
      

      <div class="row">
        <!-- <div class="col-md-3">
          <div class="panel panel-warning">
            <div class="panel-heading" style="background: orange;">
              <h3 class="panel-title"><strong>Pertanyaan Umum</strong></h3>
            </div>
            <div class="panel-body">
              
              <div class="form-group">
                <label>Date masks:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="datepicker" name="datepicker">
                </div>
                
              </div>
              <!-- 
              <br><br>
              <div class="form-group">
                <label>Nama:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <!-- 
              </div>
              <!-- 
            <br><br>
              <div class="form-group">
                <label>Instansi/Perusahaan:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                
              </div>
              
            <br><br>
              <div class="form-group">
                <label>Alamat Instansi/Perusahaan:</label>

                  <textarea name="alamat" class="form-control" rows="4" cols="24"></textarea>
              
              </div>
              

              <br><br>
              <div class="form-group">
                <label>Telp:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
              
              </div>
              

              <br><br>
              <div class="form-group">
                <label>Fax:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-fax"></i>
                    </div>
                    <input type="text" class="form-control" id="fax" name="fax">
                  </div>
                
              </div>
              

              <br><br>
              <div class="form-group">
                <label>Email:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                
              </div>
              

            </div>
          </div>
        </div> -->
        <div class="col-md-12">
          <div class="panel panel-warning">
            <div class="panel-heading" style="background: orange;">
              <h3 class="panel-title"><strong>PENANGANAN PERMASALAHAN</strong></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                                
                
              <ol start="1">
                @foreach($soal as $row)
                  <li> <p class="text-justify">{{$row->soal}}<p></li>
                  <div class="form-group">
                    <div class="radio">
                      @foreach($pilihan as $key)
                        <input type="radio" name="{{$row->id}}" value="{{$key->id}}" required>  {{$key->nama_pilihan}}<br>
                      @endforeach
                    </div>
                  </div>
                    <br><br>
                    <?php  $data[] = array('pilihan'.$row->id.'' => array("message" => 'message','validators' => array('notEmpty' => 'not empty'))) ?>

                @endforeach
                
              </ol>

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-offset-10">
          <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
          <button type="submit" class="btn btn-danger">Batal</button>
        </div>

      </div>

    </form>

  </div>

</div>


@endsection

@section('javascript')
    @parent

    @include("survey.survey_js")
@endsection