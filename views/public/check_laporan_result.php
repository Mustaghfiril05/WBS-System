<div class="container">
  <div class="page-header">
    <div class="row"> 
    </div>
  </div>
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
  <hr>
  <form>
    <div class="col-lg-12">
      <fieldset>
        <div class="card border-primary mb-3" >
          <div class="card-header">Check Laporan</div>
          <div class="card-body"> 
            <p class="card-text">
              <div class="col-lg-12 ">
                  <?php foreach($result->result() as $row){?>
                    <div class="form-group">
                      <label >Nomor Laporan : <?= $row->id_laporan;?></label> <br>
                      <label >Pihak Terlapor : <?= $row->pihak_terlapor?> </label> 
                    </div>  
                  <?php }?> 
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
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>       
                <tr>
                  <td>Identifikasi Awal oleh Tim TP3</td>
                  <?php foreach($pro2->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Persetujuan Direksi atas Identifikasi Awal</td>
                  <?php foreach($pro3->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Identifikasi Lanjut Oleh Tim TP3</td>
                  <?php foreach($pro4->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>     
                <tr>
                  <td>Persetujuan Direksi atas Identifikasi Lanjut</td>
                  <?php foreach($pro5->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>         
                <tr>
                  <td>Pemberian Sanksi / Lapor ke Pihak Berwajib</td>
                  <?php foreach($pro6->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>    
                <tr>
                  <td>Close</td>
                  <?php foreach($pro7->result() as $row) {?>
                  <td ><img src="<?php echo base_url('assets/img/checked.png') ?>"></td>
                  <td ><?= date("d-m-Y",strtotime($row->tanggal_pembuatan)) ?></td>
                  <?php }  ?>
                </tr>         
              </table>             
              </div> 
            </p>
          </div>
        </div>          
      </fieldset>
    </div>
  </form>
</div>