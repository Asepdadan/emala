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

  var tabel =  $('#tabel_pengajuan_peserta').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/get/peserta-pelatihan')}}",
                  "dataType" : "JSON"
                },
                initComplete: function () {
                    this.api().columns(1).every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $("#tipe_pelatihanid") )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                    this.api().columns(5).every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $("#status") )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                },

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
                url : "{{ url('backend/delete/peserta-pelatihan') }}",
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

  function lihat(id){
    var modal = $("#viewModal").modal("show");
    modal.find(".modal-title").text("View dan Verifikasi Peserta");


    $.ajax({
      url : "{{url('backend/get/detail-peserta-pelatihan')}}",
      type : "GET",
      data : "id="+id,
      dataType : "html",
      success : function(data){
        modal.find("#isi").html(data);
      }
    })
  }

  function ubah_status(id,status){
    $.ajax({
      url : "{{url('backend/ubah_status/peserta-pelatihan')}}",
      type : "GET",
      data : "id="+id+"&status="+status,
      success : function(data){
        $("#viewModal").modal("hide");
        tabel.ajax.reload();

      }
    })
  }

</script>