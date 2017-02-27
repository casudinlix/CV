<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(FCPATH."init.php");
class Ajax extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed :)');
		}



  }

  function index()
  {

  }
public function users()
{
//  $data='dd';
  $table = 'users';
  // Table's primary key
  $primaryKey = 'nip';
  $columns = array(
    array( 'db' => '`u`.`nip`', 'dt' => 0, 'field' => 'nip' ),
    //array( 'db' => 'username', 'dt' => 0, 'field' => 'username' ),
array( 'db' => '`u`.`realname`', 'dt' => 1, 'field' => 'realname' ),
    //array( 'db' => 'realname',  'dt' => 1, 'field' => 'realname' ),
    //array( 'db' => 'role',   'dt' => 2, 'field' => 'role' ),
array( 'db' => '`u`.`role`', 'dt' => 2, 'field' => 'role' ),
    array( 'db' => 'whid',     'dt' => 3, 'field' => 'whid'),


    array('db' => '`u`.`nip`', 'dt' => 4, 'field' => 'nip', 'formatter' => function( $d ) {


          return '<a href="'. site_url('enterprise/edit_user/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a> <a onclick=\'confirmDeleteuser("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i>Delete</a>';
      })
);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `users` AS `u`";
  $extraWhere = "`u`.`role` != 'super-user' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery,$extraWhere)
  );

}
public function delet_user($d)
{
//$id=$this->input->GET('id');
$id=$this->uri->segment(3);
$this->db->where('nip',$id);
$query=$this->db->delete('users');

  # code...
}
public function item()
{
//  $data='dd';
  $table = 'm_produk';
  // Table's primary key
  $primaryKey = 'kd_produk';
  $columns = array(
    array( 'db' => '`u`.`kd_produk`', 'dt' => 0, 'field' => 'kd_produk' ),
    array( 'db' => 'nama_produk', 'dt' => 1, 'field' => 'nama_produk' ),
    array( 'db' => '`u`.`jenis`', 'dt' => 2, 'field' => 'jenis' ),
    array( 'db' => '`u`.`vendor_name`', 'dt' => 3, 'field' => 'vendor_name' ),
    array( 'db' => 'update_user',  'dt' => 4, 'field' => 'update_user' ),
    array( 'db' => 'last',   'dt' => 5, 'field' => 'last','formater' =>function($e){
      return date($e);
      }),
//array( 'db' => '`u`.`role`', 'dt' => 2, 'field' => 'role' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),


    array('db' => '`u`.`kd_produk`', 'dt' => 6, 'field' => 'kd_produk', 'formatter' => function( $d ) {


          return '<a href="'. site_url('enterprise/edit_item/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a> <a onclick=\'confirmDelete2("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i>Delete</a>';
      })
);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `m_produk` AS `u`";
  //$extraWhere = "`u`.`role` != 'super-user' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery)
  );

}
public function delet_item($d)
{
//$id=$this->input->GET('id');
$id=$this->uri->segment(3);
$this->db->where('kd_produk',$id);
$query=$this->db->delete('m_produk');

  # code...
}
public function price($value='')
{
  $table = 'm_produk';
  // Table's primary key
  $primaryKey = 'kd_produk';
  $columns = array(
    array( 'db' => '`u`.`kd_produk`', 'dt' => 0, 'field' => 'kd_produk' ),
    array( 'db' => 'nama_produk', 'dt' => 1, 'field' => 'nama_produk' ),
    array( 'db' => '`u`.`jenis`', 'dt' => 2, 'field' => 'jenis' ),
    array( 'db' => 'harga_beli',  'dt' => 3, 'field' => 'harga_beli','formater' =>function($a){
      return number_format($e,',','00');
      }),
    array( 'db' => 'harga_jual',  'dt' => 4, 'field' => 'harga_jual' ),
    array( 'db' => 'last',   'dt' => 5, 'field' => 'last','formater' =>function($e){
      return date($e);
      }),
//array( 'db' => '`u`.`role`', 'dt' => 2, 'field' => 'role' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),


    array('db' => '`u`.`kd_produk`', 'dt' => 6, 'field' => 'kd_produk', 'formatter' => function( $d ) {


          return '<a href="'. site_url('enterprise/edit_price/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>';
      })
);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `m_produk` AS `u`";
  //$extraWhere = "`u`.`role` != 'super-user' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery)
  );
  # code...
}
public function location()
{
  $table = 'm_lokasi';
  // Table's primary key
  $primaryKey = 'lokasi';
  $columns = array(
    array( 'db' => '`u`.`lokasi`', 'dt' => 0, 'field' => 'lokasi' ),
    array( 'db' => 'nama_lokasi', 'dt' => 1, 'field' => 'nama_lokasi' ),
    array( 'db' => '`u`.`update_user`', 'dt' => 2, 'field' => 'update_user' ),
    //array( 'db' => 'last',  'dt' => 3, 'field' => 'last'),
    //array( 'db' => 'harga_jual',  'dt' => 4, 'field' => 'harga_jual' ),
    array( 'db' => 'last',   'dt' => 3, 'field' => 'last','formater' =>function($e){
      return date($e);
      }),
//array( 'db' => '`u`.`role`', 'dt' => 2, 'field' => 'role' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),


    array('db' => '`u`.`lokasi`', 'dt' => 4, 'field' => 'lokasi', 'formatter' => function( $d ) {


          return '<a href="'. site_url('enterprise/edit_location/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a> <a onclick=\'lokasi("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i>Delete</a>';
      })
);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `m_lokasi` AS `u`";
  //$extraWhere = "`u`.`role` != 'super-user' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery)
  );
  # code...
}
public function delet_location($d)
{
//$id=$this->input->GET('id');
$id=$this->uri->segment(3);
$this->db->where('lokasi',$id);
$query=$this->db->delete('m_lokasi');

  # code...
}
public function stock()

{
  $wh=$this->session->userdata('wh1');

  $table = 'join_stock';
  // Table's primary key
  $primaryKey = 'lpn';
  $columns = array(
    array( 'db' => '`u`.`lpn`', 'dt' => 0, 'field' => 'lpn' ),
    //array( 'db' => 'username', 'dt' => 0, 'field' => 'username' ),
    array( 'db' => '`u`.`kd_produk`', 'dt' => 1, 'field' => 'kd_produk' ),
    array( 'db' => 'nama_produk',  'dt' => 2, 'field' => 'nama_produk' ),
    array( 'db' => 'qty',   'dt' => 3, 'field' => 'qty' ),
    array( 'db' => 'free',   'dt' => 4, 'field' => 'free' ),
    array( 'db' => 'alocated',   'dt' => 5, 'field' => 'alocated' ),
    array( 'db' => 'hold',   'dt' => 6, 'field' => 'hold' ),
    array( 'db' => 'total',   'dt' => 7, 'field' => 'total' ),
    array( 'db' => '`u`.`lokasi`', 'dt' => 8, 'field' => 'lokasi' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),

);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `join_stock` AS `u`";
 $extraWhere = "`u`.`whid` = '$wh' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery,$extraWhere)
  );
  # code...
}
public function vendor()
{
  $wh=$this->session->userdata('wh1');

  $table = 'm_vendor';
  // Table's primary key
  $primaryKey = 'kd_vendor';
  $columns = array(
    array( 'db' => '`u`.`kd_vendor`', 'dt' => 0, 'field' => 'kd_vendor' ),
    //array( 'db' => 'username', 'dt' => 0, 'field' => 'username' ),
    array( 'db' => '`u`.`vendor_name`', 'dt' => 1, 'field' => 'vendor_name' ),
    array( 'db' => 'alamat',  'dt' => 2, 'field' => 'alamat' ),
    array( 'db' => 'tlp',   'dt' => 3, 'field' => 'tlp' ),
    array( 'db' => 'status',   'dt' => 4, 'field' => 'status' ),
    array( 'db' => 'update_by',   'dt' => 5, 'field' => 'update_by' ),
    //array( 'db' => 'hold',   'dt' => 6, 'field' => 'hold' ),
    //array( 'db' => 'total',   'dt' => 7, 'field' => 'total' ),
    //array( 'db' => '`u`.`lokasi`', 'dt' => 8, 'field' => 'lokasi' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),
    //
    array('db' => '`u`.`kd_vendor`', 'dt' => 6, 'field' => 'kd_vendor', 'formatter' => function( $d ) {


          return '<a href="'. site_url('enterprise/edit_vendor/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a> <a onclick=\'vendor("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i>Delete</a>';
      })
);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `m_vendor` AS `u`";
// $extraWhere = "`u`.`whid` = '$wh' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery)
  );
  # code...
}
public function delete_vendor($d)
{
  $id=$this->uri->segment(3);
  $this->db->where('kd_vendor',$id);
  $query=$this->db->delete('m_vendor');
  # code...
}
public function po()
{
  $wh=$this->session->userdata('wh1');

  $table = 'm_po';
  // Table's primary key
  $primaryKey = 'po_num';
  $columns = array(
    array( 'db' => '`u`.`po_num`', 'dt' => 0, 'field' => 'po_num' ),
    //array( 'db' => 'username', 'dt' => 0, 'field' => 'username' ),
    array( 'db' => '`u`.`po_total_qty`', 'dt' => 1, 'field' => 'po_total_qty' ),

    array( 'db' => 'created',   'dt' => 2, 'field' => 'created' ),
    array( 'db' => 'date',   'dt' => 3, 'field' => 'date' ),
    array( 'db' => 'due_date',   'dt' => 4, 'field' => 'due_date' ),
    array( 'db' => 'vendor_name',   'dt' => 5, 'field' => 'vendor_name' ),
    array( 'db' => 'status',   'dt' => 6, 'field' => 'status' ),
    array( 'db' => 'reason',   'dt' => 7, 'field' => 'reason' ),
    //array( 'db' => '`u`.`lokasi`', 'dt' => 8, 'field' => 'lokasi' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),
    //
    array('db' => '`u`.`po_num`', 'dt' => 8, 'field' => 'po_num', 'formatter' => function( $d ) {
          return '<a href="'. site_url('wms/edit_po/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i></a> <a onclick=\'poprint("' .'' . $d . '")\' href="#" class=\'btn btn-info\' ><i class=\'fa fa-print \' title=\'Print\'></i></a> <a onclick=\'po("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i></a>';
      })
);

//$hapus=array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {
  //    return '<a href="'. site_url('ajax/delet_user/') .'' . $d . '" class=\'btn btn-danger\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a>'; });

  // SQL server connection information
  $sql_details = array(
  	'user' => $this->db->username,
  	'pass' => $this->db->password,
  	'db'   => $this->db->database,
  	'host' => $this->db->hostname
  );
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  // require( 'ssp.class.php' );
  //require('inventory/produk/ssp.customized.class.php' );
  $joinQuery = "FROM `m_po` AS `u`";
 $extraWhere = "`u`.`whid` = '$wh' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery,$extraWhere)
  );
  # code...
}
public function delete_po($d)
{
  $id=$this->uri->segment(3);
  $wh=$this->session->userdata('wh1');
  $akses=$this->session->userdata('role')=='super-user';
$cek=$this->db->get_where('m_po',array('po_num'=>$id,'whid'=>$wh))->row_array();
if ($cek['status']=='NEW' AND $akses)  {
  $this->db->where(array('po_num'=>$id,'whid'=>$wh));
  $query=$this->db->delete('m_po');
  $this->db->where('po_num',$id);
  $this->db->delete('m_po_detil');

}else {
error();
}

  # code...
}
public function cari()
{
  $id=$this->uri->segment(3);
  $this->db->select('kd_produk, nama_produk,vendor_name');
   //$this->db->like();
   $this->db->like('kd_produk',$id);
   $this->db->or_like('nama_produk', $id);
   $this->db->or_like('vendor_name', $id);
  $query=$this->db->get('m_produk');
  $row=array();
  foreach ($query->result() as $key) {
    $row[]=$key;

    # code...
  }
  echo json_encode($row);
}
public function hapus_po($kd,$po)
{
  $kd=$this->uri->segment(3);
  $po=$this->uri->segment(4);

  $this->db->where('kd_produk', $kd);
  $this->db->where('po_num', $po);
  $this->db->delete('m_po_detil');

  # code...
}
}
