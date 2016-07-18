        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Koperasi DKB Kantor Pusat
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assetdata/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assetdata/vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assetdata/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url();?>assetdata/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assetdata/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>assetdata/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="<?php echo base_url();?>assetdata/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Pilih",
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

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable').dataTable();
      });
    </script>
    <!-- /Datatables -->

    <script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    </script>

    <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
    
  </body>
</html>
