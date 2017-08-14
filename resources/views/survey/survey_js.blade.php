		 <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        {!! Html::script('assets/template/js/vendor/jquery.min.js') !!}
        {!! Html::script('assets/template/js/vendor/bootstrap.min.js') !!}
        {!! Html::script('assets/template/js/plugins.js') !!}
        {!! Html::script('assets/template/js/app.js') !!}
		{!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}
		{!! Html::script('assets/plugins/hihgchart/js/highcharts.js') !!}
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

		<script>
			
			var valid = <?php echo json_encode($data); ?>;
			var data = JSON.stringify(valid);
			var json = $.parseJSON(data);
			var s = json[0];

			json.forEach(function(column) 
		    {
		        console.log(column.pilihan1)
		    });

			
			$('#form_survey').bootstrapValidator({
			button: {
		        selector: '[type="submit"]',
		    },
		    live: 'enabled',
			message: 'This value is not valid',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {},
	       
	    	});


			Highcharts.chart('container', {
			    chart: {
			        type: 'column',
			        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            viewDistance: 25,
            depth: 40
        }
			    },
			    title: {
			        text: "<?php echo $title; ?>"
			    },
			    subtitle: {
			        text: "<?php echo $header; ?>"
			    },
			    xAxis: {
			        categories: [
			            'Kecepatan',
			            'Media',
			            'Kesesuaian',
			            'Kualitas'
			        ],
			        crosshair: true
			    },
			    yAxis: {
			        allowDecimals: false,
        			min: 0,
			        title: {
			            text: 'Orang'
			        }
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			            '<td style="padding:0"><b>{point.y:.1f} orang</b></td></tr>',
			        footerFormat: '</table>',
			        shared: true,
			        useHTML: true
			    },
			    plotOptions: {
			        column: {
			            pointPadding: 0.2,
			            borderWidth: 0
			        }
			    },
			     series: <?php echo file_get_contents(url('hasil-survey')); ?>
			    // [{
			    //     name: 'Sangat Puas',
			    //     data: [49.9, 71.5, 106.4]

			    // }, {
			    //     name: 'Memuaskan',
			    //     data: [83.6, 78.8, 98.5]

			    // }, {
			    //     name: 'Cukup Puas',
			    //     data: [48.9, 38.8, 39.3, 41.4, ]

			    // }, {
			    //     name: 'Kurang Puas',
			    //     data: [42.4, 33.2, 34.5, 39.7, ]

			    // }, {
			    //     name: 'Tidak Puas',
			    //     data: [42.4, 33.2, 34.5, 50.7, ]

			    // }]
			});

		</script>
