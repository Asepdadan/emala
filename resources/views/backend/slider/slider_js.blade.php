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
  var tabel =  $('#slider').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/get/customize-slider')}}",
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
    url : "{{url('backend/show/customize-slider')}}",
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
              url : "{{ url('backend/delete/customize-slider') }}",
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


    $('#editModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      var id = parseInt(recipient);
      var modal = $(this)
      modal.find('.modal-title').text("Edit Slider")
      
      var url = "{{url('backend/get/detail/customize-slider')}}";
      $.ajax({
        url : url,
        type : "GET",
        data : "id="+id,
        dataType : "json",
        success : function(data){
          $("[name='id']").val(data.id);
          $("[name='Murl']").val(data.url);
          $("[name='Misi']").val(data.isi);
          if(data.status == 1){
            modal.find("#inputStatus1").attr({ checked : "on"});
           }else{
            modal.find("#inputStatus0").attr({ checked : "on"});
           }
          console.log(data);
        }
      })
    
    })

$("#ubah").click(function() {
  var id = $("[name='id']").val();
  var url = $("[name='Murl']").val();
  var isi = $("[name='Misi']").val();
  var status = $("[name='Mstatus']").val();

  $.ajax({
    url : "{{url('backend/edit/customize-slider')}}",
    type : "POST",
    data : "url="+url+"&isi="+isi+"&status="+status+"&id="+id,
    success : function(data){
      // tabel.ajax.reload();
      // $('#editModal').modal('hide')
      
      console.log(data);
    }
  });



});
    
 


$(document).ready(function() {
  

});



</script>