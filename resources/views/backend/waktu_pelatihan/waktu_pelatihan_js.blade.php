 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

  {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}
  {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.min.js') !!}

  


<script>

  var tabel =  $('#waktu_pelatihan').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/get/waktu_pelatihan')}}",
                  "dataType" : "JSON"
                },
                  "ordering": false
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


jQuery(document).ready(function($) {
  $("#ubah").hide();
   $('[name=tanggal]').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
   // .datepicker("setDate", new Date()) set date now
});



$("#simpan_waktu").click(function(event) {
  var url = $( '#form_waktu_pelatihan' ).attr( 'action' )
  var tipe = $("#inputTipe").val();
  var judul = $("#inputJudul").val();
  var keterangan = $("[name=keterangan]").val();
  var tanggal = $("[name=tanggal]").val();

    $.ajax({
      url : url,
      type : "POST",
      data : "tipe="+tipe+"&judul="+judul+"&tanggal="+tanggal+"&keterangan="+keterangan,
      dataType: "json",
      success : function(data){
        tabel.ajax.reload();
        $('#form_waktu_pelatihan')[0].reset();
        console.log(data);
      }
    })
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
                url : "{{ url('backend/delete/waktu_pelatihan') }}",
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
  var modal = $("#editModal").modal("show");
  modal.find(".modal-title").text("Edit Waktu Pelatihan");

}
</script>
