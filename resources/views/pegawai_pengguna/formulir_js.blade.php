		 <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        {!! Html::script('assets/template/js/vendor/jquery.min.js') !!}
        {!! Html::script('assets/template/js/vendor/bootstrap.min.js') !!}
        {!! Html::script('assets/template/js/plugins.js') !!}
        {!! Html::script('assets/template/js/app.js') !!}
        {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.min.js') !!}
        {!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}

        <script src='https://www.google.com/recaptcha/api.js'></script>


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

		    $('#inputmasa_berlaku').datepicker({
		      autoclose: true,
		      format: 'yyyy-mm-dd'
		    }).datepicker("setDate", new Date());
		    
		    $(".remove").click(function(event) {
		    	/* Act on the event */
		    	$("#inputmasa_berlaku").val("");
		    });
		    

    	});

    	$('#form_pegawai_pengguna').bootstrapValidator({
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
	            nip: {
	                message: 'The NIP is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'The NIP is required and cannot be empty'
	                    }
	                }
	            },
	            userid: {
	                message: 'The userid is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'The userid is required and cannot be empty'
	                    },
	                    stringLength: {
	                        min: 6,
	                        max: 300,
	                        message: 'The userid must be more than 6 and less than 30 characters long'
	                    },
	                    remote: {
	                        url: "{{url('aksi/pegawai_pengguna/checkUsername')}}",
	                        message: 'Userid sudah terdaftar silahkan masukan userid yg unik',
	                        type: 'GET'
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
	            no_hp: {
	                message: 'No Handphone tidak boleh selain number',
	                validators: {
	                    notEmpty: {
	                        message: 'No Handphone tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 11,
	                        max: 13,
	                        message: 'No Handphone minimal 11 karakter and dan tidak lebih dari 13 karakter'
	                    },
	                    numeric: {
		                    validators: {
		                        integer: {
		                            message: 'No Handphone tidak boleh selain number',
		                        }
		                    }
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
	                    },
	                    remote: {
	                        url: "{{url('aksi/pegawai_pengguna/checkEmail')}}",
	                        message: 'Email sudah terdaftar silahkan masukan email yg unik',
	                        type: 'GET'
	                    }
	                }
	            },
	            golongan: {
	                message: 'The golongan is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field golongan tidak boleh kosong'
	                    }
	                }
	            },
	            pangkat: {
	                message: 'The pangkat is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field pangkat tidak boleh kosong'
	                    }
	                }
	            },
	            jabatan: {
	                message: 'The jabatan is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field jabatan tidak boleh kosong'
	                    }
	                }
	            },
	            no_sk: {
	                message: 'The No SK is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field No SK tidak boleh kosong'
	                    }
	                }
	            },
	            masa_berlaku: {
	                message: 'The Masa Berlaku is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Field Masa Berlaku tidak boleh kosong'
	                    }
	                }
	            },
	            file: {
	                validators: {
	                    notEmpty: {
	                        message: 'File sk tidak boleh kosong'
	                    },
	                    file: {
					      extension: 'pdf',
					      type: 'application/pdf',
					      maxSize: 150*1024*1024,   // 5 150kb
					      message: 'tipe file hanya pdf dan besar maximal 150kb.'
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
                },
                onSuccess: function(e, data) {
		            //this section before submit
		            alert("berhasil");
		        }
	        }
	        
	    });


    	
        </script>