		 <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        {!! Html::script('assets/template/js/vendor/jquery.min.js') !!}
        {!! Html::script('assets/template/js/vendor/bootstrap.min.js') !!}
        {!! Html::script('assets/template/js/plugins.js') !!}
        {!! Html::script('assets/template/js/app.js') !!}
        

        <script>

			$('#slider-next').click(function(){
			  slider.goToNextSlide();
			  return false;
			});

			$('#slider-count').click(function(){
			  var count = slider.getSlideCount();
			  alert('Slide count: ' + count);
			  return false;
			});

			$('#carousel-id').carousel({
			  interval: 5000
			})
        </script>