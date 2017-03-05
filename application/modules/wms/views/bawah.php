</div>
</div>
</div>
</div>
</div>
</div>
    <!-- jQuery -->
    <script src="<?php echo duddin();?>jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo duddin();?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo duddin();?>fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo duddin();?>nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo duddin();?>malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo duddin();?>build/js/custom.min.js"></script>
    <script src="<?php echo duddin();?>bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
    <!-- Datatables -->
        <script src="<?php echo duddin();?>datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo duddin();?>datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="<?php echo duddin();?>datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="<?php echo duddin();?>jszip/dist/jszip.min.js"></script>
        <script src="<?php echo duddin();?>pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo duddin();?>pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo duddin();?>switchery/dist/switchery.min.js"></script>
          <script src="<?php echo duddin();?>iCheck/icheck.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo duddin()?>auto/js/jquery.lookupbox.min.js"></script>


        <script src="<?php echo duddin();?>select2/dist/js/select2.full.min.js"></script>

          <script src="<?php echo duddin()?>auto/js/jquery-ui.min.js"></script>
<script src="<?php echo duddin()?>bootstrap-daterangepicker/daterangepicker.js"></script>
<!---daterangepicker-->

          <!--INI Untuk Jquery-->
          <script>

function poprint($d) {

    window.open("<?php echo site_url('wms/poprint/')?>"+$d, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=1500,left=400,width=800,height=600");
}
</script>
          <script>
              $(document).ready(function () {

                $("#lookup1").lookupbox({

                  title: 'Search Product',

                  url: '<?php echo site_url('ajax/cari/')?>',
                  imgLoader: '<img src="<?php echo duddin()?>auto/images/loader.gif" />',
                  width: 500,
                  onItemSelected: function(data){
                    $('input[name=code]').val(data.kd_produk);
                    $('input[name=nama]').val(data.nama_produk);
                    $('input[name=vendor]').val(data.vendor_name);
                  },
                  tableHeader: ['Product Code', 'Product Name','Vendor']
                });
              });
              </script>
        <script type="text/javascript">
        function checkPasswordMatch() {
          var password = $("#txtNewPassword").val();
          var confirmPassword = $("#txtConfirmPassword").val();

          if (password != confirmPassword)
              $("#divCheckPasswordMatch").html("Passwords do not match!").css("color","red");

          else
              $("#divCheckPasswordMatch").html("Passwords match.").css("color","green");

        }

        $(document).ready(function () {
         $("#txtConfirmPassword").keyup(checkPasswordMatch);
        });
        </script>
        <!--Untuk sweetalert-->
<?php if ($this->session->flashdata('m','value')): ?>
  <script type="text/javascript">
  swal("Good job!", "Data Has Ben Saved!", "success")
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('item','value')): ?>
  <script type="text/javascript">
  swal("Good job!", "Data Has Ben Saved!", "success")
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('edit_item','value')): ?>
  <script type="text/javascript">
  swal("Item Updated !")
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('edit_price','value')): ?>
  <script type="text/javascript">
  swal("Price Updated !")
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('location','value')): ?>
  <script type="text/javascript">
  swal("Good job!", "Data Has Ben Saved!", "success")
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('edit_location','value')): ?>
  <script type="text/javascript">
  swal("Location Updated !")
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('postatus','value')): ?>
  <script type="text/javascript">
  swal("Disallowed!", "Please Check PO Status OR Denied", "error");
  </script>
<?php endif; ?>
<!---akhir sweetalert-->

<script type="text/javascript">
function confirmDelete2($d) {
var id = $d;
  swal({
title: "Are you sure?",
text: "You will not be able to recover this User!",
type: "warning",
showCancelButton: true,
closeOnConfirm: false,
showLoaderOnConfirm: true
},


 function (isConfirm) {



    var url1= "<?php echo site_url('ajax/delet_user/') ?>";

      if (!isConfirm) return;
      $.ajax({
          url: url1+id,
          type: "POST",

          dataType: "HTML",
          success: function () {
              setTimeout(function () {
                  swal(" request finished!");
                  window.location.reload();
        }, 4000);


          },
          error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
          }

      });

});
}

</script>
<script type="text/javascript">
function confirmDelete2($d) {
var id = $d;
  swal({
title: "Are you sure?",
text: "You will not be able to recover this Item!",
type: "warning",
showCancelButton: true,
closeOnConfirm: false,
showLoaderOnConfirm: true
},


 function (isConfirm) {



    var url1= "<?php echo site_url('ajax/delet_item/') ?>";

      if (!isConfirm) return;
      $.ajax({
          url: url1+id,
          type: "POST",

          dataType: "HTML",
          success: function () {
              setTimeout(function () {
                  swal(" request finished!");
                  window.location.reload();
        }, 4000);


          },
          error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
          }

      });

});
}

</script>
<script type="text/javascript">
function lokasi($d) {
var id = $d;
  swal({
title: "Are you sure?",
text: "You will not be able to recover this Location!",
type: "warning",
showCancelButton: true,
closeOnConfirm: false,
showLoaderOnConfirm: true
},


 function (isConfirm) {



    var url1= "<?php echo site_url('ajax/delet_location/') ?>";

      if (!isConfirm) return;
      $.ajax({
          url: url1+id,
          type: "POST",

          dataType: "HTML",
          success: function () {
              setTimeout(function () {
                  swal(" request finished!");
                  window.location.reload();
        }, 4000);


          },
          error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
          }

      });

});
}

</script>

<script type="text/javascript">
function po($d) {
var id = $d;
  swal({
title: "Are you sure?",
text: "You will not be able to recover this "+id,
type: "warning",
showCancelButton: true,
closeOnConfirm: false,
showLoaderOnConfirm: true
},


 function (isConfirm) {



    var url1= "<?php echo site_url('ajax/delete_po/') ?>";

      if (!isConfirm) return;
      $.ajax({
          url: url1+id,
          type: "POST",

          dataType: "HTML",
          success: function () {
              setTimeout(function () {
                  swal(" request finished!");
                  window.location.reload();
        }, 4000);


          },
          error: function (xhr, ajaxOptions, thrownError) {


              swal("Disallowed!", "Please Check PO Status OR Denied Permission", "error");
          }

      });

});
}

</script>

<script type="text/javascript">
function podel($kd,$po) {
var id = $kd;
var po =$po
  swal({
title: "Are you sure?",
text: "You will not be able to recover this "+id,
type: "warning",
showCancelButton: true,
closeOnConfirm: false,
showLoaderOnConfirm: true
},


 function (isConfirm) {



    var url1= "<?php echo site_url('ajax/hapus_po/') ?>";

      if (!isConfirm) return;
      $.ajax({
          url: url1+id,
          type: "POST",

          dataType: "HTML",
          success: function () {
              setTimeout(function () {
                  swal(" request finished!");
                  window.location.reload();
        }, 4000);


          },
          error: function (xhr, ajaxOptions, thrownError) {


              swal("Disallowed!", "Please Check PO Status", "error");
          }

      });

});
}

</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <script>
    $( function() {
      var progressTimer,
        progressbar = $( "#progressbar" ),
        progressLabel = $( ".progress-label" ),
        dialogButtons = [{
          text: "Cancel Download",
          click: closeDownload
        }],
        dialog = $( "#dialog" ).dialog({
          autoOpen: false,
          closeOnEscape: false,
          resizable: false,
          buttons: dialogButtons,
          open: function() {
            progressTimer = setTimeout( progress, 2000 );
          },
          beforeClose: function() {
            downloadButton.button( "option", {
              disabled: false,
              label: "Start Download"
            });
          }
        }),
        downloadButton = $( "#downloadButton" )
          .button()
          .on( "click", function() {
            $( this ).button( "option", {
              disabled: true,
              label: "Downloading..."
            });
            dialog.dialog( "open" );
          });

      progressbar.progressbar({
        value: false,
        change: function() {
          progressLabel.text( "Current Progress: " + progressbar.progressbar( "value" ) + "%" );
        },
        complete: function() {
          progressLabel.text( "Complete!" );
          dialog.dialog( "option", "buttons", [{
            text: "Close",
            click: closeDownload
          }]);
          $(".ui-dialog button").last().trigger( "focus" );
        }
      });

      function progress() {
        var val = progressbar.progressbar( "value" ) || 0;

        progressbar.progressbar( "value", val + Math.floor( Math.random() * 3 ) );

        if ( val <= 99 ) {
          progressTimer = setTimeout( progress, 50 );
        }
      }

      function closeDownload() {
        clearTimeout( progressTimer );
        dialog
          .dialog( "option", "buttons", dialogButtons )
          .dialog( "close" );
        progressbar.progressbar( "value", false );
        progressLabel
          .text( "Starting download..." );
        downloadButton.trigger( "focus" );
      }
    } );
    </script>
<!--Untuk sweetalert-->

        <!-- Select2 -->
        <script>
          $(document).ready(function() {
            $(".select2_single").select2({
              placeholder: "Select a Role",
              allowClear: true
            });
            $(".jenis").select2({
              placeholder: "Select a Type",
              allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
              maximumSelectionLength: 4,
              placeholder: "With Max Selection limit 4",
              allowClear: true
            });
          });
        </script>

        <!-- /Select2 -->
<!--Untuk Scrip data tables !-->
<!-- Datatables -->
   <script>
     $(document).ready(function() {
       var handleDataTableButtons = function() {
         if ($("#datatable-buttons").length) {
           $("#datatable-buttons").DataTable({
             dom: "Bfrtip",
             buttons: [
               {
                 extend: "copy",
                 className: "btn-sm"
               },
               {
                 extend: "csv",
                 className: "btn-sm"
               },
               {
                 extend: "excel",
                 className: "btn-sm"
               },
               {
                 extend: "pdfHtml5",
                 className: "btn-sm"
               },
               {
                 extend: "print",
                 className: "btn-sm"
               },
             ],
             responsive: true
           });
         }
       };

       TableManageButtons = function() {
         "use strict";
         return {
           init: function() {
             handleDataTableButtons();
           }
         };
       }();

       $('#produk').dataTable({
         keys: true,
         "processing": true,
         "serverSide": true,
          responsive: true,
        fixedHeader: true,
        "serverSide": true,
        "ajax": "<?php echo site_url('ajax/stock'); ?>"
      });

      $('#po').dataTable({
        keys: true,
        "processing": true,
        "serverSide": true,
         responsive: true,
       fixedHeader: true,
       "serverSide": true,
       "ajax": "<?php echo site_url('ajax/po'); ?>"
     });
      $('#item').dataTable({
        keys: true,
        "processing": true,
        "serverSide": true,
         responsive: true,
       fixedHeader: true,
       "serverSide": true,
       "ajax": "<?php echo site_url('ajax/item'); ?>"
     });
     $('#price').dataTable({
       keys: true,
       "processing": true,
       "serverSide": true,
        responsive: true,
      fixedHeader: true,
      "serverSide": true,
      "ajax": "<?php echo site_url('ajax/price'); ?>"
     });
     $('#location').dataTable({
       keys: true,
       "processing": true,
       "serverSide": true,
        responsive: true,
      fixedHeader: true,
      "serverSide": true,
      "ajax": "<?php echo site_url('ajax/location'); ?>"
     });


       $('#datatable-keytable').DataTable({
         keys: true
       });

       $('#datatable-responsive').DataTable();

       $('#datatable-scroller').DataTable({
         ajax: "js/datatables/json/scroller-demo.json",
         deferRender: true,
         scrollY: 380,
         scrollCollapse: true,
         scroller: true,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       });

       $('#datatable-fixed-header').DataTable({
         fixedHeader: true
       });

       var $datatable = $('#datatable-checkbox');

       $datatable.dataTable({
         'order': [[ 1, 'asc' ]],
         'columnDefs': [
           { orderable: false, targets: [0] }
         ]
       });
       $datatable.on('draw.dt', function() {
         $('input').iCheck({
           checkboxClass: 'icheckbox_flat-green'
         });
       });

       TableManageButtons.init();
     });
   </script>
   <!-- /Datatables -->

<!--Tutup Scrip data tables !-->

  </body>
</html>
