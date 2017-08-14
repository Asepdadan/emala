 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

	{!! Html::script('assets/plugins/validator/bootstrap-validator.js') !!}

	{!! Html::script('assets/backend/plugins/ckeditor/ckeditor.js') !!}    

	{!! Html::script('assets/backend/plugins/ckeditor/adapters/jquery.js') !!}    

	{!! Html::script('assets/backend/plugins/bootstrap-notify/bootstrap-notify.min.js') !!}    

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

  {!! Html::script('assets/backend/plugins/bootbox/bootbox.min.js') !!}

  {!! Html::script('assets/backend/plugins/switcher/bootstrap-toggle.min.js') !!}

  


<script>

$("#switch").change(function(event) {
  /* Act on the event */
  $("#toggle").toggle();

});

  var tabel =  $('#tabel_tentang_kami').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('backend/getDataTentangKami')}}",
                  "dataType" : "JSON"
                }
              });

$('#viewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var id = parseInt(recipient);
  var url = "{{url('getIsiTentangKami')}}";
  var modal = $(this)
  modal.find('.modal-title').text("Tentang Kami")
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
              url : "{{ url('backend/deleteTentangKami') }}",
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

  $("#status").click(function(event) {
    /* Act on the event */
    $("#checkbox").prop('checked', true);

  });

  //$( '#inputisi' ).ckeditor();
  $( 'textarea' ).ckeditor({
  	height  : '300px',
  });

$(document).ready(function() {
  $("#ubah").hide();
  $('#tentang-kami').bootstrapValidator({
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
	            judul: {
	                message: 'The Judul is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'Judul tidak boleh kosong'
	                    },
	                    stringLength: {
	                        min: 4,
	                        max: 100,
	                        message: 'Judul minimal 4 karakter and dan tidak lebih dari 100 karakter'
	                    },
	                }
	            },
	            isi: {
	                message: 'The isi is not valid',
	                validators: {
	                    notEmpty: {
	                        message: 'isi tidak boleh kosong'
	                    },
	                    callback: {
                            message: 'The isi must be less than 200 characters long',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                // Get the plain text without HTML
                                var div  = $('<div/>').html(value).get(0),
                                    text = div.textContent || div.innerText;

                                return text.length <= 100000;
                            }
                        }
	                }
	            },
	        },onSuccess: function(e, data) {
       //             var judul = $("[name=judul]").val();
       //             var isi = $("[name=isi]").val();
       //             $.ajax({
       //             		url : "{{url('backend/aksi/tentang-kami')}}",
       //             		type : "POST",
       //             		data : "judul="+judul+"&isi="+isi,
       //             		dataType : "json",
       //             		success : function(data){
       //             			
       //             			alert(data);
       //             		}
       //             })
       			                        
            }
	})
  	.find('[name="isi"]')
    .ckeditor()
    .editor
    .on('change', function() {
      $('#tentang-kami').bootstrapValidator('revalidateField', 'isi');
    });


// $("#simpan").click(function(event) {
// 	/* Act on the event */
// 	  var form = $("#tentang-kami").bootstrapValidator('validate');

//     if(form == true){
//     	alert("no");
//     }else{
//     	alert("yes");
//     }
// });

});



</script>