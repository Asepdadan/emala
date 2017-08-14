 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

	{!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}    

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

  {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}

  
<script>
jQuery(document).ready(function($) {
  $("#pembuatan_akun").hide();
});

  var tabel =  $('#tabel_pegawai_pengguna').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/getPegawaiPengguna')}}",
                  "dataType" : "JSON"
                }
              });

  
$('#pembuatan_akun_pengguna').bootstrapValidator({
        button: {
            selector: '[type="submit"]',
        },
        framework: 'bootstrap',
            excluded: [':disabled'],
        live: 'enabled',
         message: 'This value is not valid',
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              username: {
                  message: 'The Username is not valid',
                  validators: {
                      notEmpty: {
                          message: 'Username tidak boleh kosong'
                      },
                      stringLength: {
                          min: 4,
                          max: 100,
                          message: 'Username minimal 4 karakter and dan tidak lebih dari 100 karakter'
                      },
                  }
              },
              email: {
                  message: 'The email is not valid',
                  validators: {
                      notEmpty: {
                          message: 'email tidak boleh kosong'
                      },
                       emailAddress: {
                          message: 'The input is not a valid email address'
                      }
                  }
              },
              password: {
                  message: 'The password is not valid',
                  validators: {
                      notEmpty: {
                          message: 'passwordpassword tidak boleh kosong'
                      },
                  }
              },
              ulangi_password: {
                message: 'The password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password harus sesuai'
                    },
                    stringLength: {
                        min: 6,
                        max: 150,
                        message: 'The password must be more than 6 and less than 150 characters long'
                    }
                }
            },
          }
      });

function hapus(id){
    bootbox.confirm({
      message: "Apakah anda yakin akan menghapus ?",
      buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result == true){
              $.ajax({
                url : "{{ url('backend/deletePegawaiPengguna') }}",
                type : "GET",
                data : "id="+id,
                success : function(data){
                  tabel.ajax.reload();
                }
              });
            }else{
              tabel.ajax.reload();
            }

            tabel.ajax.reload();
        }
      });

  }

  function create(id){
    

    $("#pembuatan_akun").show("slow",function(){
        $.ajax({
        url : "{{url('backend/form_pembuatan_akun')}}",
        type : "GET",
        data : "id="+id,
        success : function(data){
          $("[name=userid]").val(data.userId);    
          $("[name=email]").val(data.email);    
        }
      });
    });
    

  }

  function lihat(id){
    $('#viewModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      var modal = $(this)
      modal.find('.modal-title').text("Lihat Pegawai Pengguna")
      
      $.ajax({
        url : "{{url('backend/getDetailPegawaiPengguna')}}",
        type : "GET",
        data : "id="+id,
        
        success : function(data){
          
          modal.find('.modal-body #isi').html(data)
          console.log(data);
                
        }
      })

     
    })
  }


</script>