		 <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        {!! Html::script('assets/template/js/vendor/jquery.min.js') !!}
        {!! Html::script('assets/template/js/vendor/bootstrap.min.js') !!}
        {!! Html::script('assets/template/js/plugins.js') !!}
        {!! Html::script('assets/template/js/app.js') !!}
        {!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}

  
        <script>
    	jQuery(document).ready(function() {
  			 


    	});

    	

    	$('#keluhan').bootstrapValidator({
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
	        fields: {
	            nama: {
	                message: 'The date is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Nama tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 4,
	                        max: 100,
	                        message: 'Nama minimal 4 karakter and dan tidak lebih dari 100 karakter'
	                    },
	                }
	            },
	            // no_telp: {
	            //     message: 'No Telp tidak boleh selain number',
	            //     validators: {
	            //         notEmpty: {
	            //             message: 'No Telp/Handphone tidak boleh kosong'
	            //         },
	            //         stringLength: {
	            //             min: 11,
	            //             max: 13,
	            //             message: 'No Telp/Handphone minimal 11 karakter and dan tidak lebih dari 13 karakter'
	            //         },
	            //         numeric: {
		           //          validators: {
		           //              integer: {
		           //                  message: 'No Telp tidak boleh selain number',
		           //              }
		           //          }
		           //      }
	            //     },
	            // },
	            sebagai: {
	                message: 'The sebagai is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field sebagai belum di pilih'
	                    }
	                }
	            },
	            isi_laporan: {
	                message: 'The isi laporan is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field isi isi laporan tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 10,
	                        max: 200,
	                        message: 'No isi_laporan minimal 10 karakter and dan tidak lebih dari 200 karakter'
	                    },
	                }
	            },
	            file: {
	                message: 'The isi file is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field isi isi laporan tidak boleh kosong'
	                    },
	                }
	            }

	        },
	        onSuccess: function(e, a) {
	            //this section before submit
	            //alert($("#keluhan").serialize());
	            //alert(a);

        	}
	    });

    	var maxAppend = 0;

    	function addmore(){
    		if (maxAppend >= 4){
    			alert("hanya boleh 5 file");
    			return;
    		}
    		var html = '<div class="form-group"><div class="col-md-12"><label for="isi_laporan" >Attachment</label><input type="file" name="file[]" class="form-control" id="file_keluhan[]"></div></div>';
    		maxAppend++;

    		$("#attachment").append(html);

    	}


        </script>