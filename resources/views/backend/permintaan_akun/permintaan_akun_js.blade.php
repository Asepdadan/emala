 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

  {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}

  


<script>

  var tabel =  $('#tabel_permintaan_akun').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/getPegawaiPengguna')}}",
                  "dataType" : "JSON"
                }
              });

$('#viewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var id = parseInt(recipient);
  var url = "{{url('backend/getDetailPegawaiPengguna')}}";
  var modal = $(this)
  modal.find('.modal-title').text("Detail Pegawai Pengguna")
  modal.find('.modal-body input').val(id)
  

  $.ajax({
    url : url,
    type : "GET",
    data : "id="+id,
    success : function(data){
      modal.find('#isi').html(data)
    }
  })

 
})


</script>