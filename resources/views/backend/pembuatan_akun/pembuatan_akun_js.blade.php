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
  {!! Html::script('assets/backend/plugins/switcher/bootstrap-toggle.min.js') !!}
  
<script>

  var tabel =  $('#tabel_akun').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/getAkunPimpinan')}}",
                  "dataType" : "JSON"
                }
              });



  
$('#pembuatan_akun').bootstrapValidator({
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
                      remote: {
                        url: "{{url('backend/checkUsername')}}",
                        message: 'The username is not available please input unique',
                        type: 'GET'
                      }
                  }
              },
              nama: {
                  message: 'The Username is not valid',
                  validators: {
                      notEmpty: {
                          message: 'Username tidak boleh kosong'
                      },
                      stringLength: {
                          min: 4,
                          max: 150,
                          message: 'Username minimal 4 karakter and dan tidak lebih dari 150 karakter'
                      },
                  }
              },
              email: {
                  message: 'The email is not valid',
                  validators: {
                      notEmpty: {
                          message: 'email tidak boleh kosong'
                      },
                      remote: {
                        url: "{{url('backend/checkEmail')}}",
                        message: 'The Email is not available please input unique',
                        type: 'GET'
                      },
                       emailAddress: {
                          message: 'The input is not a valid email address'
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
                url : "{{ url('backend/deleteAkunPimpinan') }}",
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

   // function ubah(id){
    
   //  var modal = $("#EditModal").modal("show");
   //  modal.find(".modal-title").text('Edit Akun');

    
   //  // $('#EditModal').on('show.bs.modal', function (event) {
   //  //   var modal = $(this)
   //  //   modal.find('.modal-title').text("Lihat Pegawai Pengguna")
   //    $("#switch").change(function(event) {
   //      /* Act on the event */
   //        //alert($("#switch").val())
   //        alert($(this).val())
   //        $("#inputPassword").toggle(function(){

   //        });
   //        // if($("#switch").val() == "on"){
   //        //   modal.find("#inputPassword").show();
   //        //   modal.find("[name=password]").val(data.password);                  
   //        // }else{
   //        //   modal.find("#inputPassword").hide();
   //        //   modal.find("#inputPassword").val("");
   //        // }
   //    });


          
   //    $.ajax({
   //      url : "{{url('backend/get/users')}}",
   //      type : "GET",
   //      data : "id="+id,
   //      dataType : "json",
   //      success : function(data){
   //        modal.find("[name=username]").val(data.username);          
   //        modal.find("[name=nama]").val(data.nama);          
   //        modal.find("[name=email]").val(data.email);          

   //      }
   //    })


     
   //  // })

   // }

</script>