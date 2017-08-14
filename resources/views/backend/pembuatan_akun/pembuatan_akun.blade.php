@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.tentang_kami.tentang_kami_css')
@endsection


@section('content')
      @section('breadcumbs')
        <?= Breadcrumbs::render('keluhan') ?>
      @endsection

<div class="callout callout-info">
  <h4>Information!</h4>

  <p style="font-size:13pt;">Halam ini berisi tentang pengelolaan Tentang kami yang tertera pada halaman tentang kami.</p>
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
        
      <form id="pembuatan_akun" method="POST" data-toggle="validator" action="{{url('backend/pembuatan-akun')}}"> 
      {{ csrf_field() }}
        <div class="form-group">
          <label for="judul">Hak Akses:</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-rule"></i>
            </div>
            <select name="hak_akses" id="inputHak_akses" class="form-control" required="required">
              @foreach($rule as $row)
                <option value="{{$row->id}}">{{$row->namaRule}}</option>
              @endforeach
            </select>
          </div>
          
        </div>
        

        <div class="form-group">
          <label for="username">Username</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="username" class="form-control">
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Nama</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-users"></i>
            </div>
            <input type="text" name="nama" class="form-control">
          </div>
        
        </div>

        <div class="form-group">
          <label for="email">Email</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            <input type="text" name="email" class="form-control" autocomplete="off">
          </div>
        
        </div>


        <div class="form-group">
          <label for="password">Password</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" name="password" class="form-control" autocomplete="off">
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

        
        
            <table class="table table-striped table-bordered" id="tabel_akun">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Rule</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
        

     
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
          <label for="username">Username</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="username" class="form-control">
          </div>
        
        </div>

        <div class="form-group">
          <label for="nama">Nama</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-users"></i>
            </div>
            <input type="text" name="nama" class="form-control">
          </div>
        
        </div>

        <div class="form-group">
          <label for="email">Email</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            <input type="text" name="email" class="form-control" autocomplete="off">
          </div>
        
        </div>

        <div class="form-group">
          <label for="isi">Switch Judul Tentang Kami</label>

          <div class="input-group">
            <input type="checkbox" data-toggle="toggle" id="switch">
          </div>
        
        </div>



        <div class="form-group" id="inputPassword">
          <label for="password">Password</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" name="password" class="form-control" autocomplete="off">
          </div>
        
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="ubah">Ubah</button>                              
        </div>
      </form>

      </div>
      
    </div>
  </div>
</div>


@endsection

@section('javascript')
    @parent

    @include("backend.pembuatan_akun.pembuatan_akun_js")
@endsection
