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
    //array( 'db' => 'user_grop',     'dt' => 3, 'field' => 'user_grop'),


    array('db' => '`u`.`nip`', 'dt' => 3, 'field' => 'nip', 'formatter' => function( $d ) {
          return '<a href="'. site_url('dashboard/edit_user/') .'' . $d . '" class=\'btn btn-warning\'><i class=\'fa fa-edit\' title=\'Edit\'></i>Edit</a> <a onclick=\'confirmDelete2("' .'' . $d . '")\' href="#" class=\'btn btn-danger\' ><i class=\'fa fa-trash \' title=\'Delete\'></i>Delete</a>';
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

}
