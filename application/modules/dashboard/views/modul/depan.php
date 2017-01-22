<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Select Warehouse</h3>

<?php
$r='';
$r=explode(",",trim($akses));

?>
<select name="a" class="form-control" onChange="document.location = this.value">
        <option value="">Select Your Distribution Center</option>
        <?php foreach ($r as $a): ?>

          <option value="<?php echo site_url("warehouse/$a")?>"><?php echo $a ;?></option>
        <?php endforeach; ?>
</select>


    </div>
  </div>
</div>
<!-- /page content -->
