<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">

              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>My Profile</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
 <form class="form-horizontal" action="<?php echo site_url('aksi/saveme')?>" method="post">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='username' id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $me?>" readonly="">
                    <input type="hidden" name="id" value="<?php echo $me?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Real Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="last-name" name="realname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $aku['realname']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" id="password"  required="required" class="form-control col-md-7 col-xs-12" name="pass" value="<?php echo base64_decode ($aku['pass']) ?>">
      <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show password
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Warehouse</label>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="checkbox">
      <?php foreach (explode(',',$aku['whid']) as $key): ?>
        <label>
      <input type="checkbox" class="flat" name="wh[]" value="<?php echo $key ?>" checked="checked"><?php echo $key ?>
        </label>
      <?php endforeach; ?>
    </div>
  </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12">
<div class="checkbox">
<?php foreach ($wh as $key): ?>

    <label>
      <input type="checkbox" class="flat" name="wh[]" value="<?php echo $key->nama_wh ?>"><?php echo $key->nama_wh ?>
    </label>

<?php endforeach; ?>
  </div>
                  </div>
                </div>



                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?php echo site_url('enterprise')?>" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" value="Update" class="btn btn-success">
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
<!-- /page content -->
