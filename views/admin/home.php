        <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
          

          <div class="card mb-3">
            <div class="card-header">
              <form >
              <div class="row">
                <div class="col-md-5">
                <i class="fas fa-chart-area"></i>
                Total Laporan Per masalah
                </div>
                <div class="col-md-2">
                  <select class="form-control" id="pie-month">
                      <option value="">--Pilih Bulan--</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                </div>
                <div class="col-md-2">
                <select class="form-control" id="pie-year">
                <option value="">--Pilih Tahun--</option>

                  <?php
                    for ($i=date('Y'); $i > 2000 ; $i--) { 
                  ?>
                      <option value="<?=$i?>"><?=$i?></option>
                  <?php
                    }
                  ?>
                    </select>
                </div>
                <div class="col-md-1">
                  <button type="button" class="btn btn-info btn-filter-pie pull-left">Cari</button>
                </div>
                <div class="col-md-1">
                  <button type="reset" class="btn btn-warning btn-reset-pie pull-right">Tampilkan Semua</button>
                </div>
              </div>
              </form>
            </div>

            <div class="card-body">
                  <div class="alert alert-danger alert-nodata" style="display:none">Data tidak ditemukan.</div>
                <div id="kt_amcharts_prob" style="height: 380px;"></div>
            </div>
            <div class="card-footer small text-muted"> </div>
          </div>
          <div class="card mb-3">
          <div class="card-header">
              <form >
              <div class="row">
                <div class="col-md-7">
                <i class="fas fa-chart-area"></i>
                Total Laporan Per Bulan
                </div>
                <div class="col-md-2">
                <select class="form-control" id="line-year">
                  <option value="">--Pilih Tahun--</option>

                  <?php
                    for ($i=date('Y'); $i > 2000 ; $i--) { 
                  ?>
                      <option value="<?=$i?>"><?=$i?></option>
                  <?php
                    }
                  ?>
                    </select>
                </div>
                <div class="col-md-1">
                  <button type="button" class="btn btn-info btn-filter-line pull-left">Cari</button>
                </div>
                <div class="col-md-1">
                  <button type="reset" class="btn btn-warning btn-reset-line pull-right">Semua Tahun</button>
                </div>
              </div>
              </form>
            </div>
            <div class="card-body">
              <div id="kt_amcharts_month" style="height: 380px;"></div>
            </div>
            <div class="card-footer small text-muted"> </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    

  </body>

</html>
