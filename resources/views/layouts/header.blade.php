  <?php
    $data = new App\CustomHeaderFrontend;
    $get = $data::where("status",1)->get();

?>

		<meta charset="utf-8">

        <title> @yield('title') - E-MALA </title>

        <meta name="description" content="{{$title}}">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
    		
		<link rel="shortcut icon" href="{{url('/')}}/uploads/header/{{$get[0]->logo}}">

@section('css')
            
@show