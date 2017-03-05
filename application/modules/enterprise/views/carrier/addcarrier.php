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
              <h2>Form Add Carrier <small>different form elements</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
 <form class="form-horizontal" action="<?php echo site_url('aksi/save_carrier')?>" method="post">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code Carrier<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='code' id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Police Number <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nopol" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Company <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="com" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <select class="jenis form-control" tabindex="-1" name='type'>
                      <option></option>
<?php foreach ($car as $key): ?>
  <option value="<?php echo $key;?>"><?php echo $key?></option>
<?php endforeach; ?>

                    </select>


</div>
</div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="vendor form-control" tabindex="-1" name='status'>
                          <option></option>
                  <?php foreach ($status as $key): ?>
                  <option value="<?php echo $key?>"><?php echo $key?></option>
                  <?php endforeach; ?>

                        </select>

                  </div>
                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?php echo site_url('enterprise/carrier')?>" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
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
