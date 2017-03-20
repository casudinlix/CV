<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Select Warehouse</h3>

        <?php


        ?>
        <form class="" action="<?php echo site_url('warehouse') ?>" method="post">
          <select name="a" class="form-control" required="">
                  <option value="">Select Your Distribution Center</option>
                  <?php foreach (explode(",",$akses) as $a): ?>

          <option><?php echo $a ;?></option>
                  <?php endforeach; ?>
          </select>
<input type='submit' class='form-control input-lg btn btn-info' placeholder='' value="Go!">

        </form>

    </div>
  </div>
</div>
<!-- /page content -->
