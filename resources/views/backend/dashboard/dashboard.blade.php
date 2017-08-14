@extends('backend.layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('backend.gambar_home.gambar_home_css')
@endsection

<style type="text/css" media="screen">
span.badge.bg-danger{
  background-color: red;
}  
span.badge.bg-success{
  background-color: green;
}  
</style>
@section('content')
      @section('breadcumbs')
        <?= Breadcrumbs::render('keluhan') ?>
      @endsection





<div class="row">
  <div class="col-md-12">
    
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>65</h3>
          <p>Buku Tamu</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>65</h3>
          <p>Keluhan Pengguna</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->

     <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>
          <p>Pelatiha</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3>65</h3>
          <p>Pelatiha</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->



          
  </div>
</div>



@endsection

@section('javascript')
    @parent

    @include("backend.gambar_home.gambar_home_js")
@endsection