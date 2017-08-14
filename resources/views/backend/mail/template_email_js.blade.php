 <!-- jQuery 2.1.3 -->
    
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

    {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

    {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

    {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}
	
	<script>


		 var tabel =  $('#tabel_email').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/getTemplateEmail')}}",
                  "dataType" : "JSON"
                }
              });

		$('#modal-view').on('show.bs.modal', function (event) {

		  var modal = $(this)
		  modal.find('.modal-title').text('Lihat keluhan')
		});

		$("#refresh").click(function(event) {
			/* Act on the event */
			tabel.ajax.reload();
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
              url : "{{ url('backend/deleteTemplateEmail') }}",
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
		
	</script>

