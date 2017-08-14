@extends('layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('home.home_css')
@endsection

@section('content')
<style>
body{
  max-width: 1290px;
      overflow-x:hidden;

}
#carousel-id .carousel-inner{

margin-top: -50px;
width: 100%;
}

.carousel-inner .item .container .carousel-caption{
margin-top: -70px;
}
.carousel-inner .item img{
  width: 100%;
  
}
.full-slider{
  width: 100%;
}

.carousel .item {
  height: 450px;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 450px;
}
</style>

<?php
$get = new App\slider;
$data = $get::where("status",1)->orderBy("created_at","DESC")->get();
$count = count($data);;

$i = 0;
?>
    
<div class="row">
  
<div class="full-slider" style="width:100%">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      <?php for ($i=0; $i < $count; $i++) {  ?>
        <li data-target="#carousel-id" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo "active";}else{ echo "";} ?>"></li>
    <?php } ?>
      </ol>
      <div class="carousel-inner">
    
      <?php $no = 1; foreach ($data as $row) { ?> 

    <div class="item <?php if($no++ ==1){ echo 'active'; }else {  echo "";  }   ?>  ">
      <div class="container">     
      

        <div class="row">
            <img src="uploads/slider/{{$row->gambar}}" height="350" width="100%" class="img-responsive">
            <div class="container">
              <div class="carousel-caption">
                <div class="title-carousel" style="color : black;margin-top: -350px; margin-left: -80px; background: white; width: 240px; height: 300px;">
                  <p class="text-left">{{$row->isi}}</p>
                </div>
                  
              </div>
            </div>  
          
        </div>
      </div>
    </div>
    <?php } ?>


        <!-- <div class="item">
          <a href=""><img width="100%"  data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="uploads/home/12.jpg"></a>
          <div class="container">
            <div class="title-carousel carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item ">
          <a href=""><img width="100%" data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="uploads/home/11.jpg"></a>
          <div class="container">
            <div class="title-carousel carousel-caption">
              <h1 class="title-carousel">One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
 -->

      </div>
      <div class="control" >
      <a style="margin-left: 10px; background: none;" class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="fa fa-arrow-circle-left fa-2x"></span></a>
      <a style="margin-right: 40px; background: none;" class="right carousel-control" href="#carousel-id" data-slide="next"><span class="fa fa-arrow-circle-right fa-2x"></span></a>
      </div>
    </div>
</div>

<div class="row">
  <div class="alert alert-default">
    
  </div>
</div>

  <div class="col-md-4">
    <!-- <img src="assets/home/p1.png" alt="" height="200px"> -->
    <!-- <img src="uploads/home/{{ $pengguna }}" height="200"> -->
    
    <div class="panel panel-primary" style="border-left: 20px black; margin-top: 10px;">
      <!-- <div class="panel-heading" style="background-color: gray; border-radius: 11px;">
        
      </div> -->
      <div class="panel-body" style="border-left: 5px solid orange;">
          <h3 >Layanan Pengguna SPSE</h3> 

         <p style="text-align: text-justify;">Aplikasi ini khusus bagi Pokja ULP, Pejabat Pengadaan dan Pejabat Pembuat Komitmen (PPK).</p>
          <span class="badge">13 Orang Pegawai Terdata</span> 
          <h4>Silahkan isi formulir berikut ini <a href="{{url(route('formulir_pengguna'))}}" class="btn btn-danger">Daftar</a></h4>        
      </div>
      <!-- <div class="panel-footer" style="background-color: gray; border-radius: 11px;">
        
      </div> -->
    </div>


  </div>
  <div class="col-md-4">
    <!-- <img src="assets/home/p.png" alt="" height="200px"> -->
    <!-- <img src="uploads/home/{{$pengunjung}}" height="200"> -->

     <div class="panel panel-primary" style="border-left: 20px black; margin-top: 10px;">
      <!-- <div class="panel-heading" style="background-color: gray; border-radius: 11px;">
        
      </div> -->
      <div class="panel-body" style="border-left: 5px solid orange;">
          <h3>Layanan Pengunjung LPSE</h3>

         <p style="text-align: text-justify;">Aplikasi ini khusus bagi Pengguna SPSE yang datang langsung untuk bersilaturrahmi ke Sekretariat LPSE Kabupaten Lombok Tengah.</p>
          <span class="badge">13 Orang Pegawai Terdata</span> 
          <h4>Silahkan isi formulir berikut ini <a href="{{url(route('buku_tamu'))}}" class="btn btn-danger">Daftar</a></h4>
      </div>
      <!-- <div class="panel-footer" style="background-color: gray; border-radius: 11px;">
        
      </div> -->
    </div>
    
  
  </div>
  <div class="col-md-4">
    <!-- <img src="assets/home/cs.png" alt="" height="200px"> -->
    <!-- <img src="uploads/home/{{$training}}" height="200"> -->
    
    <div class="panel panel-primary" style="border-left: 20px black; margin-top: 10px;">
      <!-- <div class="panel-heading" style="background-color: gray; border-radius: 11px;">
        
      </div> -->
      <div class="panel-body" style="border-left: 5px solid orange;">
          <h3>Layanan Pelatihan SPSE</h3>

         <p style="text-align: text-justify;">Aplikasi ini khusus bagi Pengguna SPSE yang berkeinginan melakukan pelatihan penggunaan Aplikasi SPSE.</p>
          <span class="badge">13 Orang Pegawai Terdata</span> 
          <h4>Silahkan isi formulir berikut ini <a href="{{route('pelatihan')}}" class="btn btn-danger">Daftar</a></h4>
      </div>
      <!-- <div class="panel-footer" style="background-color: gray; border-radius: 11px;">
        
      </div> -->
    </div>
    

  </div>

</div>


@endsection

@section('javascript')
    @parent

    @include("home.home_js")
@endsection