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
$("#pesan").hide();
$("#switch").change(function(event) {
  /* Act on the event */
  $("#toggle").toggle();

});

  var tabel =  $('#survey').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/get/survey')}}",
                  "dataType" : "JSON"
                }
              });

$('#viewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var id = parseInt(recipient);
  var modal = $(this)
  modal.find('.modal-title').text("Edit Soal Survey")
  modal.find('.modal-body input').val(id)
  
  var url = "{{url('backend/getSurvey')}}";
  $.ajax({
    url : url,
    type : "GET",
    data : "id="+id,
    dataType : "json",
    success : function(data){
      modal.find("#inputId").val(data.data.id)
      modal.find("#inputSoal").val(data.data.soal)
      if(data.data.status == 1){
        modal.find("#inputStatus1").attr({ checked : "on"});
       }else{
        modal.find("#inputStatus0").attr({ checked : "on"});
       }
            
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
              url : "{{ url('backend/delete/survey') }}",
              type : "GET",
              data : "id="+id,
              success : function(data){
                $("#pesan").fadeIn('slow').delay(5000).fadeOut('slow');
                $("#result").html(data);
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
 

    
    $.ajax({
      url : url,
      type : "GET",
      data : "id="+id,
      dataType : "json",
      success : function(data){
        
        
      }
    })
  
 
}


$(document).ready(function() {
  $("#ubah").hide();


});



</script>