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
  $primaryKey = 'username';
  $columns = array(
    array( 'db' => '`u`.`username`', 'dt' => 0, 'field' => 'username' ),
    //array( 'db' => 'username', 'dt' => 0, 'field' => 'username' ),
array( 'db' => '`u`.`realname`', 'dt' => 1, 'field' => 'realname' ),
    //array( 'db' => 'realname',  'dt' => 1, 'field' => 'realname' ),
    //array( 'db' => 'role',   'dt' => 2, 'field' => 'role' ),
array( 'db' => '`u`.`role`', 'dt' => 2, 'field' => 'role' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),


    array('db' => '`u`.`username`', 'dt' => 3, 'field' => 'username', 'formatter' => function( $d ) {


          return '<a href="'. site_url('enterprise/edit_user/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a> <a onclick=\'confirmDelete2("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i>Delete</a>';
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
  //$extraWhere = "`u`.`role` != 'super-user' ";
  echo json_encode(
  	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,  $joinQuery)
  );

}
public function delet_user($d)
{
//$id=$this->input->GET('id');
$id=$this->uri->segment(3);
$this->db->where('username',$id);
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
    array( 'db' => 'update_user',  'dt' => 3, 'field' => 'update_user' ),
    array( 'db' => 'last',   'dt' => 4, 'field' => 'last','formater' =>function($e){
      return date($e);
      }),
//array( 'db' => '`u`.`role`', 'dt' => 2, 'field' => 'role' ),
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),


    array('db' => '`u`.`kd_produk`', 'dt' => 5, 'field' => 'kd_produk', 'formatter' => function( $d ) {


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
}
