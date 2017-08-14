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

		    $('#tanggal_kunjungan').datepicker({
		      autoclose: true,
		      format: 'yyyy-mm-dd'
		    }).datepicker("setDate", new Date());
		    
		    $(".remove").click(function(event) {
		    	/* Act on the event */
		    	$("#tanggal_kunjungan").val("");
		    });
		    

    	});

    	$("#inputSeb").change(function(event) {
    		/* Act on the event */
    		if($("#inputSeb").val() == "Publik"){
	    		$("#group_p").hide();
	    		//$("#group_admin").hide();
    		}else{
    			$("#group_p").show();
	    		//$("#group_admin").show();
    		}
    	});

    	$('#form_buku_tamu').bootstrapValidator({
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
	            sebagai: {
	                message: 'The sebagai is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'The sebagai is required and cannot be empty'
	                    }
	                }
	            },
	            panggilan: {
	                message: 'The panggilan is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'The panggilan is required and cannot be empty'
	                    }
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
	            no_telp: {
	                message: 'No Telp tidak boleh selain number',
	                validators: {
	                    notEmpty: {
	                        message: 'No Telp tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 6,
	                        max: 13,
	                        message: 'No Telp minimal 11 karakter and dan tidak lebih dari 13 karakter'
	                    },
	                    numeric: {
		                    validators: {
		                        integer: {
		                            message: 'No Telp tidak boleh selain number',
		                        }
		                    }
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
	            nama_admin: {
	                message: 'The nama Admin is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field nama Admin tidak boleh kosong'
	                    }
	                }
	            },
	            tujuan: {
	                message: 'The tujuan is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field tujuan tidak boleh kosong'
	                    }
	                },
	                stringLength: {
                        min: 6,
                        max: 150,
                        message: 'No Telp minimal 11 karakter and dan tidak lebih dari 13 karakter'
                    },
	            },
	            tanggal_kunjungan: {
	                message: 'The Masa Berlaku is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field Masa Berlaku tidak boleh kosong'
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