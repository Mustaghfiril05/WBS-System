        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="">List Laporan </a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
 

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              LIST DATA LAPORAN
            
            </div>
            <div class="card-body">
              <form>
              <div class="row">
                <div class="col-md-2">
                <a href="<?=base_url()?>Laporan/xls" class="btn btn-info">Export to Excel</a>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="select2plg">
                      <option value="">--JENIS PELANGGARAN--</option>

                      <?php
                        foreach($masalah as $m){
                      ?>
                          <option value="<?=$m->id_masalah?>"><?=$m->jenis_masalah?></option>
                      <?php
                        }
                      ?>
                    </select>

                </div>
                <div class="col-md-4">
                <select class="form-control" id="select2prog">
                      <option value="">--PROGRESS LAPORAN--</option>

                      <?php
                        foreach($progress as $pgr){
                      ?>
                          <option value="<?=$pgr->id_progress?>"><?=$pgr->jenis_progress?></option>
                      <?php
                        }
                      ?>
                    </select>
                </div>
                <div class="col-md-1">
                <button type="button" class="btn btn-filter btn-primary">Terapkan</button>
                </div>
                <div class="col-md-1">
                <button type="reset" class="btn btn-filter-reset btn-warning pull-right">Reset</button>
                </div>
              </div>
              </form>
              <hr>
              <div class="table-responsive table-laporan">

              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

        </div>
        <!-- /.container-fluid --> 

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper --> 


  </body>
        <!-- Logout Modal-->
  <div class="modal fade" id="detailLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"></div>
          
        </div>
      </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
        $.fn.dataTable.moment( 'D-MMM-YYYY' );
        $.fn.dataTable.moment = function ( format, locale ) {
          var types = $.fn.dataTable.ext.type;
          // Add type detection
          types.detect.unshift( function ( d ) {
              return moment( d, format, locale, true ).isValid() ?
                  'moment-'+format :
                  null;
          } );
          // Add sorting method - use an integer for the sorting
          types.order[ 'moment-'+format+'-pre' ] = function ( d ) {
              return moment( d, format, locale, true ).unix();
          };
      };

      function initDT(data={}){
        $.get("<?=base_url().'admin/Alaporan/laporan_filter'?>",data,function(response){
          $(".table-laporan").html(response);
          $('#datatable').DataTable({
              // scrollX: 200,
              // scroller: true,
              responsive: {
                  // details: {
                      // display: $.fn.dataTable.Responsive.display.modal( {
                      //     header: function ( row ) {
                      //         var data = row.data();
                      //         return 'Details for '+' '+data[0];
                      //     }
                      // } ),
                      // renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                      //     tableClass: 'table'
                      // } )
                  // }
              }
          });
        })
      }

      initDT();

      $(".btn-filter").click(function(){
        if($("#select2prog").val() != "" || $("#select2plg").val()!="" ){
          initDT({prog:$("#select2prog").val(),plg:$("#select2plg").val()});
        }
      });
      $(".btn-filter-reset").click(function(){
        initDT();

      });

      $("body").on("click",".btn-detail-lap", function () {
        // $("#detailLaporan .modal-body").html("");
        $.get("<?=base_url().'admin/Alaporan/detailLaporan';?>",{id:$(this).attr("id")},function(response){
          $("#detailLaporan .modal-title").html("<i class='fa fa-file'></i> Detail Laporan");
          $("#detailLaporan .modal-body").html(response);
          $("#detailLaporan").modal('show');
        },'html');
      });

      $("body").on("click",".btn-detail-pelapor", function () {
        // /alert($(this).attr("id"));
        $("#detailLaporan .modal-body").html("");
        $.get("<?=base_url().'admin/Alaporan/detailPelapor';?>",{id:$(this).attr("id")},function(response){
          $("#detailLaporan .modal-title").html("<i class='fa fa-user'></i> Detail Pelapor");
          $("#detailLaporan .modal-body").html(response);
          $("#detailLaporan").modal('show');
        },'html');
      });
      
  } );
  </script>

</html>
