 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

	{!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}

	{!! Html::script('assets/backend/plugins/bootstrap-notify/bootstrap-notify.min.js') !!}    

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

  {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}



  


<script>

$("#switch").change(function(event) {
  /* Act on the event */
  $("#toggle").toggle();

});

  var tabel =  $('#gambar_home').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/get/header_home')}}",
                  "dataType" : "JSON"
                }
              });

$('#viewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var id = parseInt(recipient);
  var modal = $(this)
  modal.find('.modal-title').text("Gambar Home")
  modal.find('.modal-body input').val(id)
  

  $.ajax({
    url : "{{url('backend/get/gambar-home')}}",
    type : "GET",
    data : "id="+id,
    success : function(data){
      modal.find('#isi').html(data)
    }
  })

 
})
  
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
              url : "{{ url('backend/delete/gambar-home') }}",
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

function edit(id){
 

    var url = "{{url('getDataTentangKami')}}";
    $.ajax({
      url : url,
      type : "GET",
      data : "id="+id,
      dataType : "json",
      success : function(data){
        
        var id = data[0].id;
        var judul = data[0].judul;
        var isi = data[0].isi;
        $("[name='judul']").val(judul);
        $("[name='isi']").val(isi);
        $("#simpan").hide();
        $("#ubah").show();
        $("").show();
      }
    })
  
 
}


$(document).ready(function() {
  $("#ubah").hide();


});



</script>