<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                  <div>
<?php if ($role || $admin): ?>
    <a href="<?php echo site_url('wms/create_po')?>" class="btn btn-success"><i class="fa fa-truck">Create PO</i></a>   <a href="<?php echo site_url('wms/pointernal')?>" class="btn btn-info"><i class="fa fa-truck">Create PO Internal</i></a></div>
<?php else: ?>
    <a href="#" disabled class="btn btn-success"><i class="fa fa-truck">Create PO</i></a></div>
<?php endif; ?>

                   <h2>List<small>Items</small></h2>

                   <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>

                   </ul>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
<br>
 <table id="po"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                     <thead>
                       <tr>

                         <th>PO Number</th>
                         <th>PO QTY </th>
                         <th>Open QTY</th>

<th>Created BY</th>
<th>PO Type</th>
<th>Date</th>
<th>Due Date</th>
<th>Vendor</th>
<th>Status</th>

                         <th>Action</th>
                       </tr>
                     </thead>


                     <tbody>
                       <tr>


                       </tr>

                     </tbody>
                   </table>
