<div class="container">
  <div class="page-header">
    <div class="row"> 
    </div>
  </div>
  <hr>
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('laporan/check_laporan'); ?>
    <div class="col-lg-12">
      <fieldset>
        <div class="card border-primary mb-3" >
          <div class="card-header">Check Laporan</div>
          <div class="card-body"> 
            <p class="card-text">
              <div class="col-lg-12 ">
                    <?php 
                      if(isset($msg)) echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'.$msg.'</div>';
                    ?>
                    <div class="form-group">
                      <label >Nomor Laporan</label>
                      <input type="text" class="form-control" id="no_laporan" name="no_laporan" placeholder="Nomor Laporan"> 
                    </div> 
                    <div class="form-group">
                      <label >Password Laporan</label>
                      <input type="password" class="form-control" id="password_laporan" name="password_laporan" placeholder="Password Laporan"> 
                    </div>             
                    <!-- <div class="g-recaptcha" data-sitekey="6Lc3OUAUAAAAAEnhiWqTVZj1JhjY-rwf15GQnE9G"></div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>          
                  </div>
                </div>
            </p>
          </div>
        </div>          
      </fieldset>
    </div>
    <?php echo form_close();?>
</div>