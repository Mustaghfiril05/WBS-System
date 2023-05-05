        <style type="text/css">
          table.greyGridTable {
          border: 2px solid #FFFFFF;
          width: 100%;
          text-align: center;
          border-collapse: collapse;
        }
        table.greyGridTable td, table.greyGridTable th {
          border: 1px solid #FFFFFF;
          padding: 3px 4px;
        }
        table.greyGridTable tbody td {
          font-size: 13px;
        }
        table.greyGridTable tr:nth-child(even) {
          background: #EBEBEB;
        }
        table.greyGridTable thead {
          background: #FFFFFF;
          border-bottom: 4px solid #2ECC71;
        }
        table.greyGridTable thead th {
          font-size: 15px;
          font-weight: bold;
          color: #333333;
          text-align: center;
          border-left: 2px solid #2ECC71;
        }
        table.greyGridTable thead th:first-child {
          border-left: none;
        }

        table.greyGridTable tfoot td {
          font-size: 14px;
        }
        </style>
        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:;">Laporan</a>
            </li>
            <li class="breadcrumb-item active">Setujui Progress</li>
          </ol>
 
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Progress Laporan <b><?php echo $laporan->id_laporan; ?></b> -- Dilaporkan oleh : <b><?=$laporan->created_by;?></b>, Pihak Terlapor : <b><?php echo $laporan->pihak_terlapor; ?></b></div>
            <div class="card-body">
              <table width="100%" align="center" class="greyGridTable">
                <thead>
                  <th>Progress</th>
                  <th>Check</th>
                  <th>Tanggal</th>
                </thead>
                <tr>
                  <td>Laporan Baru Dibuat</td>
                  <?php foreach($pro1->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>       
                <tr>
                  <td>Identifikasi Awal oleh Tim KIK</td>
                  <?php foreach($pro2->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Persetujuan Direksi atas Identifikasi Awal</td>
                  <?php foreach($pro3->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Identifikasi Lanjut Oleh Tim Investigasi</td>
                  <?php foreach($pro4->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Persetujuan Direksi atas Identifikasi Lanjut</td>
                  <?php foreach($pro5->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>         
                <tr>
                  <td>Pemberian Sanksi / Lapor ke Pihak Berwajib</td>
                  <?php foreach($pro6->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>    
                <tr>
                  <td>Close</td>
                  <?php foreach($pro7->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>         
              </table> 

              <hr>


              <div class="form-group">     
                <form action="<?=base_url("admin/Alaporan/progress_approved/".$laporan->id_last_progress);?>">
                Progress terakhir : <b class="text-success"><?=$laporan->last_progress?></b>
                <hr>
                <a href="<?php echo site_url() ?>"><button type="button" class="btn btn-default" ><i class="fa fa-chevron-left"></i> Kembali</button></a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Setujui</button>
                </form>
              </div>

            </div>

        </div>
        <!-- /.container-fluid --> 

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper --> 
  
  </body>

</html>
