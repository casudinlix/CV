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
              <h2>Form Edit Facility <small>different form elements</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
 <form class="form-horizontal" action="<?php echo site_url('aksi/editwh')?>" method="post">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">WH ID<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='whid' id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $this->uri->segment(3)?>" readonly="">
                    <input type="hidden" name="id" value="<?php echo $this->uri->segment(3)?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">WH Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="last-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $gudang->nama_wh?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea name="address"class="form-control"><?php echo $gudang->alamat ?></textarea>

                  </div>
                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name='phone' id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return hanyaAngka(event)" value="<?php echo $gudang->tlp ?>" >
                                  </div>
                                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?php echo site_url('enterprise/user')?>" class="btn btn-danger">Cancel</a>
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
