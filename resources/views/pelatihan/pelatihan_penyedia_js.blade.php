 <!-- jQuery 2.1.3 -->
    {!! Html::script('assets/backend/js/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/backend/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/backend/js/app.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/jquery.dataTables.min.js') !!}

  {!! Html::script('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
  


<script>

  var tabel =  $('#tabel_pelatihan_rekanan').DataTable({
                "processing": true,
               // "serverSide": true,
                "ajax": {"url": "{{ url('pelatihan/getDataPenyedia')}}",
                  "dataType" : "JSON"
                },
                // initComplete: function () {
                //     this.api().columns().every( function () {
                //         var column = this;
                //         var select = $('<select><option value=""></option></select>')
                //             .appendTo( $(column.header()).empty() )
                //             .on( 'change', function () {
                //                 var val = $.fn.dataTable.util.escapeRegex(
                //                     $(this).val()
                //                 );
         
                //                 column
                //                     .search( val ? '^'+val+'$' : '', true, false )
                //                     .draw();
                //             } );
         
                //         column.data().unique().sort().each( function ( d, j ) {
                //             select.append( '<option value="'+d+'">'+d+'</option>' )
                //         } );
                //     } );
                // }
              });


$("#daftar_pejabat_pengadaan").click(function(event) {
    /* Act on the event */
    $.ajax({
        url : "{{url('pelatihan/form_pejabat_pengadaan')}}",
        type : "GET",
        success : function(data){
            $("#result_pejabat_pengadaan").html(data)
            console.log(data);
        }
    })

});

$("#lihat_pejabata_pengadaan").click(function(event) {
    /* Act on the event */
    $.ajax({
        url : "{{url('pelatihan/get/pejabat_pengadaan')}}",
        type : "GET",
        success : function(data){
            $("#result_pejabat_pengadaan").html(data);
        }
    })
});

$("#lihat_ppk").click(function(event) {
    /* Act on the event */
    $.ajax({
        url : "{{url('pelatihan/get/ppk')}}",
        type : "GET",
        success : function(data){
            $("#result_ppk").html(data);
        }
    })
});


$("#lihat_auditor").click(function(event) {
    /* Act on the event */
    $.ajax({
        url : "{{url('pelatihan/get/auditor')}}",
        type : "GET",
        success : function(data){
            $("#result_auditor").html(data);
        }
    })
});

$("#lihat_pokja_ulp").click(function(event) {
    /* Act on the event */
    $.ajax({
        url : "{{url('pelatihan/get/pokja')}}",
        type : "GET",
        success : function(data){
            $("#result_pokja").html(data);
        }
    })
});





// $("#daftar_ppk").click(function(event) {
//     $.ajax({
//         url : "{{url('pelatihan/form_ppk')}}",
//         type : "GET",
//         success : function(data){
//             $("#result_ppk").html(data)
//         }
//     })
    
// });
</script>