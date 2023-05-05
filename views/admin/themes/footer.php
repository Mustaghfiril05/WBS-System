
  <?php
    if($this->router->fetch_method()!='approving_progress'){
  ?>
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>&nbsp;Copyright © 2020 &nbsp;<a href="https://alppetro.co.id/"> PT. ALP petro industry</a></span>
            </div>
          </div>
        </footer>
    <?php } ?> 
 
        <!-- Bootstrap core JavaScript-->
    <!-- <script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> -->
    

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/buttons.flash.min.js') ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/admin/vendor/chart.js/Chart.min.js') ?>"></script>
    <!-- <script src="<?php echo base_url('assets/admin/vendor/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.js') ?>"></script> -->
    
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/admin/js/sb-admin.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/amcharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/animate.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/export.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/radar.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/serial.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/pie.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/polarScatter.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/amcharts/light.js') ?>"></script>
</body>
	<script type="text/javascript">
		$('.datepicker').datepicker({
			language: "id",
			format: 'dd-mm-yyyy'
		});
    function initPie(data={}){
      $.get("<?=base_url().'admin/home/pie_data'?>",data,function(response){
          if(response.message){
            $(".alert-nodata").slideDown('fast').delay(2000).slideUp('fast');
          }
          var chart = AmCharts.makeChart("kt_amcharts_prob", {
                "type": "pie",
                "theme": "light",
                "dataProvider":response ,
                "valueField": "total",
                "titleField": "name",
                "balloon": {
                    "fixedPosition": true
                },
                "export": {
                    "enabled": true
                }
            });
        },'json');

    }
    function initLine(data={}){
      $.get("<?=base_url().'admin/home/line_data'?>",data,function(response){
        var chart = AmCharts.makeChart("kt_amcharts_month", {
                    "theme": "light",
                    "type": "serial",
                    "dataProvider":response,
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "Total Laporan pada bulan [[category]] : <b>[[value]]</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "title": "total laporan",
                        "type": "column",
                        "valueField": "total"
                    }],
                    "plotAreaFillAlphas": 0.1,
                    "depth3D": 60,
                    "angle": 30,
                    "categoryField": "name",
                    "categoryAxis": {
                        "gridPosition": "start"
                    },
                    "export": {
                        "enabled": true
                    }
                });
            },'json')
    }
    initLine();
    initPie();

    $(".btn-filter-pie").click(function(){
      if($("#pie-year").val()!="" && $("#pie-month").val()!="" ){
        initPie({'year':$("#pie-year").val(),'month':$("#pie-month").val()});
      }
    })

    $(".btn-reset-pie").click(function(){
      initPie();
    })

    $(".btn-filter-line").click(function(){
      if($("#line-year").val()!="" ){
        initLine({'year':$("#line-year").val()});
      }
    })

    $(".btn-reset-line").click(function(){
      initLine();
    })

    

	</script>

</html>