</div>
<!-- /page content -->
    </div>
		</div>
		
	<!-- JavaScript -->		
	
	<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/custom.js"></script>

	<!-- gauge js -->
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/gauge/gauge.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/gauge/gauge_demo.js"></script>
  
	<!-- bootstrap progress js -->
		<script src="<?php echo base_url();?>asset/js/progressbar/bootstrap-progressbar.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/nicescroll/jquery.nicescroll.min.js"></script>
  
	<!-- icheck -->
		<script src="<?php echo base_url();?>asset/js/icheck/icheck.min.js"></script>
	
	<!-- daterangepicker -->
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/moment/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/datepicker/daterangepicker.js"></script>
  
	<!-- chart js -->
		<script src="<?php echo base_url();?>asset/js/chartjs/chart.min.js"></script>
  
	<!-- Datatables-->
        <script src="<?php echo base_url();?>asset/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/datatables/dataTables.scroller.min.js"></script>

	<!-- flot js -->
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.pie.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.orderBars.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.time.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/date.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.spline.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.stack.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/curvedLines.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/flot/jquery.flot.resize.js"></script>
  
	<!-- input mask -->
		<script src="<?php echo base_url();?>asset/js/input_mask/jquery.inputmask.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/datetimepicker_css.js"></script>
	<!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'right',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };

      $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

      $('#reportrange_right').daterangepicker(optionSet1, cb);

      $('#reportrange_right').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange_right').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });

      $('#options1').click(function() {
        $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
      });

      $('#options2').click(function() {
        $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
      });

      $('#destroy').click(function() {
        $('#reportrange_right').data('daterangepicker').remove();
      });

    });
  </script>
  <script>
  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker3').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker4').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker5').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker6').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker7').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker8').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker9').datepicker({
      autoclose: true
    });

    //Date picker
    $('#datepicker10').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker11').datepicker({
      autoclose: true
    });
	
	$('#datepicker12').datepicker({
      autoclose: true
    });
	
	$('#datepicker13').datepicker({
      autoclose: true
    });
	
	$('#datepicker14').datepicker({
      autoclose: true
    });
	
	$('#datepicker15').datepicker({
      autoclose: true
    });
	
	$('#datepicker16').datepicker({
      autoclose: true
    });
	
	$('#datepicker17').datepicker({
      autoclose: true
    });
	
	$('#datepicker18').datepicker({
      autoclose: true
    });
	
	$('#datepicker19').datepicker({
      autoclose: true
    });
	
	$('#datepicker20').datepicker({
      autoclose: true
    });
	</script>
	<!-- Datatable -->
	<script type="text/javascript">
        $(document).ready(function() 
		{
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable
			({
				keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable
			({
				ajax: "js/datatables/json/scroller-demo.json",
				deferRender: true,
				scrollY: 380,
				scrollCollapse: true,
				scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable
			({
				fixedHeader: true
            });
        });
        TableManageButtons.init();
    </script>
</body>
</html>
