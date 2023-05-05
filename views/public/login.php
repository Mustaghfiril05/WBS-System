<div class="container">
  <div class="page-header">
    <div class="row"> 
    </div>
  </div>
  <hr>
    <div class="col-lg-12">
      <fieldset>
        <div class="card border-primary mb-3" >
          <div class="card-header">User Login</div>
          <div class="card-body"> 
            <p class="card-text">
            <?php echo validation_errors(); ?>
            <?php echo form_open('user/check'); ?> 
              <div class="col-lg-12 ">
                    <div class="form-group"> 
                      <input type="text" class="form-control" id="email" name="username"  placeholder="Email"> 
                      <!-- <input type="email" class="form-control" id="email" name="email"  placeholder="Email">  -->
                    </div> 
                    <div class="form-group"> 
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password"> 
                    </div>             
                    <!-- <div class="g-recaptcha" data-sitekey="6Lc3OUAUAAAAAEnhiWqTVZj1JhjY-rwf15GQnE9G"></div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>          
                  </div>
                </div>
              <?php echo form_close(); ?>
            </p>
          </div>
        </div>          
      </fieldset>
    </div>
</div>