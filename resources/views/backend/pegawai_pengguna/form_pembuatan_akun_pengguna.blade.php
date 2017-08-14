
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary " id="form_tentang_kami"><!-- collapsed-box (untuk collapsed)-->
      <div class="box-header">
        <h3 class="box-title">Form Pembuatan Akun</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
      <form id="pembuatan_akun_pengguna" method="POST" data-toggle="validator" action="{{url('backend/pembuatan-akun')}}"> 
      {{ csrf_field() }}
       
        

        <div class="form-group">
          <label for="username">UserId</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="username" value="{{$userId}}" readonly class="form-control">
          </div>
        
        </div>

        <div class="form-group">
          <label for="email">Email</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            <input type="text" name="email" value="{{$email}}" readonly class="form-control">
          </div>
        
        </div>


        <div class="form-group">
          <label for="password">Password</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" name="password" class="form-control">
          </div>
        
        </div>

        <div class="form-group">
          <label for="passwordr">Ulangi Password</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" name="ulangi_password" class="form-control">
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