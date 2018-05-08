<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.3
    </div>
    <strong>Copyright &copy; 2017 <a href="#">SIMADES</a>.</strong> All rights reserved.
</footer>

  
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/dist/js/app.min.js')?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/dist/js/demo.js')?>"></script>

<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/chartjs/Chart.min.js')?>"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/flot/jquery.flot.min.js')?>"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/flot/jquery.flot.resize.min.js')?>"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/flot/jquery.flot.pie.min.js')?>"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/flot/jquery.flot.categories.min.js')?>"></script>
<!-- Page script -->
<script type="application/javascript">
  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if ((charCode < 65) || (charCode == 32))
            return false;         
         return true;
      }
</script>
<script type="application/javascript">
  function isNumberKeyTrue(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 65)
            return false;         
         return true;
      }
</script>
<?php
  if($isi=='dashboard'){
    require_once('js.php');

  }
  else if($isi=='dashboard2'){
    require_once('js2.php');

  }
  else if($isi=='mutasi'){
    require_once('js_mutasi.php');
  }
  else if($isi=='surat/surat_list'){
  	require_once('js_surat.php');
  }

?>
	

</body>
</html>
