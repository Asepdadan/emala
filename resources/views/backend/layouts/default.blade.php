<!DOCTYPE html>
<html > 
<head>
	@include('backend.layouts.header')
</head>
	<body class="skin-blue sidebar-mini">
    	<div class="wrapper">


				@include('backend.layouts.menu_header')
			
				<div class="content-wrapper">
			        <!-- Content Header (Page header) -->
			        <section class="content-header">
			          <h1>
			            <?= $header ?>
			            <small>{{$deskripsi}}</small>
			          </h1>
			          <!-- <ol class="breadcrumb">
			            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
			            <li class="active">Here</li>
			          </ol> -->
					@yield('breadcumbs')

			        </section>

			        <!-- Main content -->
			        <section class="content">
			          <!-- Your Page Content Here -->
					@yield('content')
			        </section><!-- /.content -->
			    </div><!-- /.content-wrapper -->
				
	                    
	            
			
				@include('backend.layouts.footer')

		</div>
	</body>
</html>