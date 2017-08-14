 <!-- jQuery 2.1.3 -->
    
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

    {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

    {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

    {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}
    {!! Html::script('assets/plugins/fancybox/jquery.fancybox.min.js') !!}
	
	<script>
  jQuery(document).ready(function($) {
    $("#pesan").hide();  
  });
  

		 var tabel =  $('#tabel_keluhan').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/getDataKeluhan')}}",
                  "dataType" : "JSON"
                }
              });

		$('#viewModal').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      var id = recipient;
		  var modal = $(this)
		  modal.find('.modal-title').text('Lihat keluhan')

      $.ajax({
        url : "{{url('backend/get/keluhan')}}",
        data : "id="+id,
        dataType : "html",
        success : function(data){
          $("#isi").html(data)
        }
      });

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
              url : "{{ url('backend/deleteKeluhan') }}",
              type : "GET",
              data : "id="+id,
              dataType : "json",
              success : function(data){
                tabel.ajax.reload();
                $("#pesan").fadeIn('slow').delay(4000).fadeOut('slow');
                $("#info").html(data.info);
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

