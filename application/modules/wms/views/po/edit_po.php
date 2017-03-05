<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">


<h2><?php echo $this->uri->segment(3) ?></h2>

  </li>
  <?php foreach ($status as $e ): ?>

<?php if ($e->status=='CLOSE' || $e->status=='CANCEL'): ?>

<?php
$this->session->set_flashdata('postatus', 'value');
redirect('wms/po');

?>
<?php endif; ?>
<?php if (!$role): ?>
  <?php $this->session->set_flashdata('postatus', 'value');
  redirect('wms/po');?>
<?php endif; ?>
  <?php endforeach; ?>



  </li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<div class="row">
  <form class="" action="<?php echo site_url('aksi/editpo')?>" method="post">
  <div class="col-md-6 col-sm-12 col-xs-12 form-group input-group">
<input type="hidden" name="po" value="<?php echo $this->uri->segment(3)?>">
    <input type="text" placeholder="Product Code" class="form-control" name="code"  required="TRUE">
    <span class="input-group-btn">
    <input type="button" value="Select" class="btn btn-info" id="lookup1"/><i class=""></i>
  </span>

  </div>

  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
    <input type="text" class="form-control"  name="nama" placeholder="Product Name" required="TRUE">
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
    <input type="text" class="form-control" name="vendor" placeholder="Vendor" required="TRUE">
  </div>

  <div class="col-md-3 col-sm-7 col-xs-6 form-group">
    <input type="number" class="form-control"  name="qty" placeholder="QTY" required="TRUE" autocomplete="off">
  </div>

</div>

<input type="submit" name="submit" value="Add" class="btn btn-primary">
<input type="reset" name="reset" value="Reset" class="btn btn-danger">
</form>


<form class="" action="<?php echo site_url('aksi/editpostingpo/')?>" method="post">
  <div class="control-group">
    <div class="controls">
      <div class="col-md-4 xdisplay_inputx form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" id="datepicker" placeholder="<?php echo $po1->due_date?>" name='duedate' required="" autocomplete="off" value="<?php echo $po1->due_date?>">
        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
        <select class="jenis form-control" tabindex="-1" name='type' required="true">
          <option value="<?php echo $po1->po_type?>"><?php echo $po1->po_type ?></option>
<?php foreach ($type as $key): ?>
<option value="<?php echo $key->po_type;?>"><?php echo $key->po_type;?></option>
<?php endforeach; ?>

        </select>

  
  <input type="submit" name="Posting" value="Posting" class="btn btn-warning">
  <a href="<?php echo site_url('wms/po')?>" class="btn btn-danger">Back</a>
      </div>
<input type="hidden" name="po" value="<?php echo $this->uri->segment(3)?>">
    </div>

  </div>
  <div class="table-responsive">
<div class="well" style="overflow-y: scroll; height:300px;">

<table class="table table-bordered">

<?php $no=1; ?>
                      <tr>
<th>No</th>
                        <th>PO Number</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
<th>Vendor Name</th>
<th>PO QTY</th>
                        <th>Action</th>
                      </tr>
                    </thead>


  <tbody>

      <?php if ($po==NULL): ?>

      <?php else: ?>
        <?php foreach ($po as $key): ?>
          <tr>
            <?php $kd=$key->kd_produk  ?>
            <?php $po=$key->po_num ?>
            <td><?php echo $no ?></td>
          <td><?php echo $key->po_num ?></td>
          <td><?php echo $key->kd_produk ?></td>
          <td><?php echo $key->nama_produk ?></td>
          <td><?php echo $key->vendor_name ?></td>
          <td><?php echo $key->po_qty ?></td>
          <input type="hidden" name="vendor" value="<?php echo $key->vendor_name ?>">
<td><a <a onClick="podel('<?php echo $kd.'/'.$po?>')" href="#"><i class="fa fa-trash btn btn-danger"></i></a></td>
</tr>
<?php $no++; ?>
        <?php endforeach; ?>

      <?php endif; ?>



  </tbody>
</table>
</div>

</div>
</form>






</div>
</div>


    </div>
  </div>
</div>
<!-- /page content -->
