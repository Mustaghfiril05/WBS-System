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
              <a href="<?php echo site_url('admin/Alaporan/l_laporan') ?>">Laporan</a>
            </li>
            <li class="breadcrumb-item active">Update Progress</li>
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
                  <th>Status </th>
                </thead>
                <tr>
                  <td>Laporan Baru Dibuat </td>
                  <?php foreach($pro1->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan))?> </td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>       
                <tr>
                  <td>Identifikasi Awal oleh Tim KIK</td>
                  <?php foreach($pro2->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Persetujuan Direksi atas Identifikasi Awal</td>
                  <?php foreach($pro3->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Identifikasi Lanjut Oleh Tim Investigasi</td>
                  <?php foreach($pro4->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Persetujuan Direksi atas Identifikasi Lanjut</td>
                  <?php foreach($pro5->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>         
                <tr>
                  <td>Pemberian Sanksi / Lapor ke Pihak Berwajib</td>
                  <?php foreach($pro6->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>    
                <tr>
                  <td>Close</td>
                  <?php foreach($pro7->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-M-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <td>
                    <?php
                      if($row->is_approved){
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> di Setujui</button>
                    <?php
                      }else{
                    ?>
                      <button style="cursor:default" type="button" class="btn btn-sm btn-danger"><i class="fa fa-stopwatch"></i> Menunggu</button>
                    <?php
                      }
                    ?>
                  </td>
                  <?php }  ?>
                </tr>         
              </table> 

              <hr>
              <?php
                if($laporan->status_last_progress){
              ?>
                  <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addMasalah">Add New</button> -->
                  <?php echo form_open_multipart('admin/Alaporan/update_progress'); ?>
                  <div class="form-group">
                    <label for="progress" class="control-label">PROGRESS</label>
                    <select class="form-control" id="progress" name="progress">   
                      <option>-- Progress --</option>               
                      <?php 
                          foreach($progress->result() as $row)
                          { 
                            echo '<option value="'.$row->id_progress.'">'.$row->jenis_progress.'</option>';
                          }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-sm-4 col-md-6" style="padding-left: 0px">
                      <strong >Tanggal <a  style="text-align: center;color:#c0392b">*</a></strong>
                      <input name="tanggal_progress" class="form-control datepicker" id="tanggal_progress"  required>
                      <input type="hidden" name="id_laporan" id="id_laporan" value="<?php echo $laporan->id_laporan; ?>" >  
                      <input type="hidden" name="laporan_token" id="laporan_token" value="<?php echo $laporan->password_id_laporan; ?>" >  
                      <input type="hidden" name="email_pelapor" id="email_pelapor" value="<?php echo $laporan->created_by; ?>" >  
                      
                  </div>

                  <div class="form-group">
                    <label for="attachment" class="control-label">Attachment</label>
                    <input type="file" class="form-control-file" id="attachment" name="attachment" aria-describedby="fileHelp"> 
                  </div>

                  <div class="form-group" style="display:none">
                    
                  <input type="checkbox" name="email_dir"  value="email_dir" checked>Sertakan Notifikasi Email Berisi Update Progress  Ke Direksi<br>
                  </div>

                  <div class="form-group">                
                    <a href="<?php echo site_url('admin/Alaporan/l_laporan') ?>"><button type="button" class="btn btn-default" ><i class="fa fa-chevron-left"></i> Kembali</button></a>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                  </div>
                  <?php echo form_close();?>
              <?php
                }else{
              ?>
                  <div class="alert alert-info alert-sm"><i class="fa fa-info-circle"></i> Anda hanya bisa update progress, jika progress sebelumnya telah disetujui direksi.</div>
              <?php
                }
              ?>
              

            </button>

        </div>
        <!-- /.container-fluid --> 

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper --> 
  
  </body>

</html>
