
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            @ 2017 <a href="https://www.rumahkreasikita.com" target="_blank">Rumah Kreasikita</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
        <!-- Select2 -->
        <script src="<?php echo duddin();?>select2/dist/js/select2.full.min.js"></script>

        <!-- Select2 -->
        <script>
          $(document).ready(function() {
            $(".select2_single").select2({
              placeholder: "Select a Role",
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

       $('#user').dataTable({
         keys: true,
         "processing": true,
         "serverSide": false,

        fixedHeader: true,
        "serverSide": true,
        "ajax": "<?php echo site_url('ajax/users'); ?>",

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
