 <form id="form_customize_backend" method="POST" data-toggle="validator" enctype="multipart/form-data" action="{{url('backend/post/customize-backend')}}"> 
          {{ csrf_field() }}
            <div class="form-group">
              <label for="judul">Foto Admin</label>
              
              <div>
              <a href="{{url('')}}/uploads/header/{{$foto}}" data-fancybox='gallery' ><img src="{{url('')}}/uploads/header/{{$foto}}" alt="" class="img-responsive img-thumbnail" width='100' height='100'></a>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-photo"></i>
                </div>

                <input type="file" name="foto" class="form-control" placeholder="">
              </div>
              
            </div>
            

            <div class="form-group">
              <label for="isi">Judul Header</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-pencil-square"></i>
                </div>
                <input type="text" name="judul_header" class="form-control" value="{{$header}}" placeholder="">
              </div>
            
            </div>

            <div class="form-group">
              <label for="isi">Judul Footer</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-pencil-square"></i>
                </div>
                <input type="text" name="judul_footer" class="form-control" value="{{$footer}}" placeholder="">
              </div>
            
            </div>

            <div class="form-group">
              <label for="isi">Versi Aplikasi</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-pencil-square"></i>
                </div>
                <input type="text" name="versi" class="form-control" value="{{$versi}}" placeholder="">
              </div>
            
            </div>

            <div class="form-group">
              <label for="isi">Versi Aplikasi</label>

              <div class="input-group">
                <div class="radio">
                  <label>
                    <input type="radio" name="status" id="inputStatus" value="1" <?php if($status == 1){echo "checked"; }?>>
                    Aktif
                  </label>
                  <label>
                    <input type="radio" name="status" id="inputStatus" value="0" <?php if($status == 0){echo "checked"; }?>>
                    Tidak Aktif
                  </label>
                </div>
                
              </div>
            
            </div>
                  

            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
            </div>
          </form>