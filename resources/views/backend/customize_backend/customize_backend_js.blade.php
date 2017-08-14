 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

  {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}

  {!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}
  {!! Html::script('assets/plugins/fancybox/jquery.fancybox.min.js') !!}


<script>

  var tabel =  $('#tabel_custom').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/get/customize-backend')}}",
                  "dataType" : "JSON"
                }
              });

$(document).ready(function() {
$("#form_customize_frontedn").bootstrapValidator({
      button: {
            selector: '[type="submit"]',
        },
        err: {
                container: '#errors'
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
            foto: {
                  validators: {
                      notEmpty: {
                          message: 'Foto logo tidak boleh kosong'
                      },
                      file: {
                        extension: 'png,jpg,jpeg',
                        type: 'image/png,image/jpeg',
                        maxSize: 2097152,   //  2048 * 1024
                        message: 'tipe file hanya pdf dan besar maximal 2mb.'
                    }
                  }
              },
              judul_header: {
                  validators: {
                      notEmpty: {
                          message: 'Judul Header tidak boleh kosong'
                      },
                      stringLength: {
                          min: 4,
                          max: 10,
                          message: 'Judul Header minimal 4 karakter and dan tidak lebih dari 10 karakter'
                      },
                  }
              },
              judul_footer: {
                  validators: {
                      notEmpty: {
                          message: 'Judul Footer tidak boleh kosong'
                      },
                      stringLength: {
                          min: 4,
                          max: 40,
                          message: 'Judul Footer minimal 4 karakter and dan tidak lebih dari 20 karakter'
                      },
                  }
              },
              versi: {
                  validators: {
                      notEmpty: {
                          message: 'versi tidak boleh kosong'
                      },
                      stringLength: {
                          min: 4,
                          max: 10,
                          message: 'versi minimal 4 karakter and dan tidak lebih dari 10 karakter'
                      },
                  }
              },

          }
      });
            
        
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
              url : "{{ url('backend/delete/customize-backend') }}",
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

 function ubah(id){
    var modal = $("#ubahModal").modal("show");
    modal.find(".modal-title").text("Ubah backend");
    

    $.ajax({
      url : "{{url('backend/edit/customize-backend')}}",
      type : "GET",
      data : "id="+id,
      success : function(data){
        modal.find("#isi").html(data);    
      }
    })
 }

</script>