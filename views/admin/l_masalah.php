        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">MASTER KATEGORI MASALAH</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
 

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              MASTER KATEGORI MASALAH</div>
            <div class="card-body">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addMasalah">Add New</button>

              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID MASALAH</th>
                      <th>DESKRIPSI MASALAH</th>
                      <th>EDIT</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($mmasalah->result() as $row){?>
                  <tr>
                      <td style="vertical-align: middle;"><?php echo $row->id_masalah;?></td>
                      <td style="vertical-align: middle;"><?php echo $row->jenis_masalah;?></td>
                      <td style="vertical-align: middle;"></td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid --> 

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper --> 

    <!-- Modal add new Masalah--> 
    <?php echo form_open_multipart('admin/Alaporan/insert_masalah'); ?>
    <div class="modal fade" id="addMasalah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Masalah</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            
          </div>
          <div class="modal-body">
        
              <div class="form-group">
                <label for="id_masalah" class="control-label">ID MASALAH</label>
                <input type="text" name="id_masalah" class="form-control" id="id_masalah">
              </div>
              <div class="form-group">
                <label for="masalah_desc" class="control-label">DESKRIPSI MASALAH</label>
                <input type="text" name="masalah_desc" class="form-control" id="masalah_desc">
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <?= form_close();?>

  
  </body>

</html>
