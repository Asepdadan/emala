		 <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        {!! Html::script('assets/template/js/vendor/jquery.min.js') !!}
        {!! Html::script('assets/template/js/vendor/bootstrap.min.js') !!}
        {!! Html::script('assets/template/js/plugins.js') !!}
        {!! Html::script('assets/template/js/app.js') !!}
        {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.min.js') !!}
        {!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}

        <script>
    	jQuery(document).ready(function() {
    		$('#verifycodeOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
			 
			function randomNumber(min, max) {
		        return Math.floor(Math.random() * (max - min + 1) + min);
		    };

		    function generateCaptcha() {
		        $('#verifycodeOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
		    }

		    generateCaptcha();
		    

    	});


    	$('#form_pelatihan_rekanan').bootstrapValidator({
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
	            alamat: {
	                message: 'The alamat is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'The alamat tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 6,
	                        max: 300,
	                        message: 'alamat minimal 6 karakter dan maximal 300'
	                    }
	                }
	            },
	            nama_perusahaan: {
	                message: 'Nama perusahaan tidak boleh selain number',
	                validators: {
	                    notEmpty: {
	                        message: 'Nama perusahaan tidak boleh kosong'
	                    }
	                }
	            },
	            email: {
	                validators: {
	                    notEmpty: {
	                        message: 'The email tidak boleh kosong'
	                    },
	                    emailAddress: {
	                        message: 'The input is not a valid email address'
	                    }
	                }
	            },
	            no_hp: {
	                validators: {
	                    notEmpty: {
	                        message: 'The No hp tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 11,
	                        max: 13,
	                        message: 'No Hp minimal 12 karakter and dan tidak lebih dari 13 karakter'
	                    },
	                }
	            },
	           	tanggal_pelatihan: {
	                validators: {
	                    notEmpty: {
	                        message: 'The Tanggal Pelatihan tidak boleh kosong'
	                    }
	                }
	            },          
	            verifycode: {
                    validators: {
                        callback: {
                            message: 'Jawaban anda salah',
                            callback: function (value, validator, $field) {
                                
                                var items = $('#verifycodeOperation').html().split(' '),
                                    sum   = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
                        }
                    }
                }
	        }
	        
	    });


    	
        </script>