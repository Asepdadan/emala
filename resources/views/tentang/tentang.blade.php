@extends('layouts.default')

@section('title',$title)

@section('css')
@parent
 @include('tentang.tentang_css')
@endsection

@section('content')
    
<div class="row">


<?= Breadcrumbs::render('tentang') ?>


<style type="text/css" media="screen">
p{
  text-align: justify;
}  
</style>

  <div class="col-md-12">
    <div class="container">
      
    
    @if (!empty($data))
      @foreach($data as $row)
        <h1><?php echo $row->judul; ?></h1>
        <?php echo $row->isi; ?>
        
        <h1><?php echo $row->judul1; ?></h1>
        <?php echo $row->isi1; ?>

      @endforeach
      @else
        <?php echo "tidak ada"; ?>
      @endif
      </div>
  </div>


@endsection

@section('javascript')
    @parent

    @include("tentang.tentang_js")
@endsection