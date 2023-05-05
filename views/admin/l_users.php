<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">List Users </a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      LIST DATA USERS</div>
    <div class="card-body">
      
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">New User</button>
      <div class="table-responsive">
        <table style="font-size: 14px" class="table table-striped table-bordered nowrap" id="datatable" width="100%" >
          <thead>
            <tr style="text-align: center;">
              <th>NAMA LENGKAP</th>
              <th>JABATAN</th>
              <th>E-MAIL</th>
              <th>USERNAME</th>
              <th>LEVEL</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if ($users) {
            foreach($users as $row){
            ?>
          <tr>
              <td style="vertical-align: middle; text-align: center;">
                <?=$row->name?>
              </td>
              <td style="vertical-align: middle; text-align: center;">
                <?=$row->jabatan?>
              </td>
              <td style="vertical-align: middle; text-align: center;">
                <?=$row->email?>
              </td>
              <td style="vertical-align: middle; text-align: center;">
                <?=$row->username?>
              </td>
              <td style="vertical-align: middle; text-align: center;">
              <?=$row->level?>
              </td>
          </tr>
          <?php }
            }?>
          </tbody>
        </table>
    
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

<?php echo form_open_multipart('admin/Alaporan/insert_user'); ?>
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            
          </div>
          <div class="modal-body">
          <div class="row">
            <div class="col-md-6">Nama Lengkap</div>
            <div class="col-md-6" style="margin-bottom:10px;">
              <input type="text" class="form-control"  name="fullname" required="required">
            </div>
            <div class="col-md-6">Jabatan</div>
            <div class="col-md-6" style="margin-bottom:10px;">
              <input type="text" class="form-control"  name="jabatan" required="required">
            </div>
            
            <div class="col-md-6">E-mail</div>
            <div class="col-md-6" style="margin-bottom:10px;">
              <input type="email" class="form-control"  name="email" required="required">
            </div>
            
            <div class="col-md-6">Username</div>
            <div class="col-md-6" style="margin-bottom:10px;">
              <input type="text" class="form-control"  name="username" required="required">
            </div>
            
            <div class="col-md-6">Password</div>
            <div class="col-md-6" style="margin-bottom:10px;">
              <input type="password" class="form-control" name="password" required="required">
            </div>

            <div class="col-md-6">Password</div>
            <div class="col-md-6" style="margin-bottom:10px;">
              <select  class="form-control" name="level" required="required">
                <option value="">-- pilih opsi --</option>
                <option value="direksi">Direksi</option>
                <option value="admin">Admin</option>
              </select>
            </div>
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

<script type="text/javascript">
$(document).ready(function() {


$('#datatable').DataTable( {
  scrollX: 200,
  scroller: true,
  dom: 'Bfrtip',

  responsive: {
      details: {
          display: $.fn.dataTable.Responsive.display.modal( {
              header: function ( row ) {
                  var data = row.data();
                  return 'Details for '+' '+data[0];
              }
          } ),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
              tableClass: 'table'
          } )
      }
  }
} );
} );
</script>

</html>
