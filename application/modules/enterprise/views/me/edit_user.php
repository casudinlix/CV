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
              <h2>Form Edit Users <small>different form elements</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
 <form class="form-horizontal" action="<?php echo site_url('aksi/edit_user')?>" method="post">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='username' id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $this->uri->segment(3)?>" readonly="">
                    <input type="hidden" name="id" value="<?php echo $this->uri->segment(3)?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">realname <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="last-name" name="realname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['realname']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" id="password"  required="required" class="form-control col-md-7 col-xs-12" name="pass" value="<?php echo base64_decode ($user['pass']) ?>">
      <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show password

                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Warehouse</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="checkbox">
                      <?php foreach (explode(',',$user['whid']) as $key): ?>
                        <label>
 <input type="checkbox" class="flat" name="wh[]" value="<?php echo $key ?>" checked="checked"><?php echo $key ?>
                        </label>
                      <?php endforeach; ?>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" name="wh[]" value="Cikarang">Cikarang
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" name="wh[]" value="Bandung"> Bandung
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" name='wh[]' value="Jakarta"> Jakarta
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" name="wh[]" value="Enterprise">Enterprise
                        </label>
                      </div>

                    </div>


                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name='role'>
                      <option><?php echo $user['role'] ?></option>
                      <option value="super-user">Super User</option>
                      <option value="finance">Finace</option>
                      <option value="wherehouse">WareHouse</option>
                      <option value="user">User</option>

                    </select>


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
