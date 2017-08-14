<!DOCTYPE html>
<html class="no-js" lang="en"> 
<head>
	@include('layouts.header')
</head>
	<body>
		<div id="page-container">


				@include('layouts.menu_header')
			
				<section class="site-section site-section-light site-section-top themed-background-dark-default">
		        </section>

					
		        <section class="site-content site-section">
					<?php if($class=="home"){ ?>
	                <div class="container-fluid">
	                    @yield('content')
	                </div>
					<?php }else {?>
	                <div class="container">
	                    @yield('content')
	                </div>
					<?php } ?>
	            </section>
			
				<section class="site-footer site-section" >
				@include('layouts.footer')	
				</section>
				

			<a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>
		</div>
	</body>
</html>