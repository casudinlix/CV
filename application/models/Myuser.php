<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myuser extends CI_Model {

 public $id;
 public $name;
 public $pass;
 public $role;
 public $grop;

 function __construct (){
 	parent::__construct();
	$this->load->library('session');
 }

 function set($name,$pass){

$data=array('username'=>$name,'pass'=>$pass);
$query=$this->db->get_where("users",$data);

  if($query->num_rows()> 0){
 	$row=$query->row();
 	$this->name=$row->username;
 	$this->pass=$row->pass;
 	$this->role=$row->role;
 	$this->grop=$row->user_grop;
 	$data_sessi=array('login'=>true,

	 				  'username'=>$row->username,
	 				  'pass'=>$this->pass,
	 				  'role'=>$this->role,
          'user_grop'=>$this->user_grop);
	 $this->session->set_userdata($data_sessi);


	 // mulai generate access security key
	 if(!$this->session->userdata("random_filemanager_key")){
	 	$karakter = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 	$hasil = '';
		 for ($i = 0; $i < 10; $i++) {
		      $hasil .= $karakter[rand(0, strlen($karakter) - 1)];
		 }
		 $this->session->set_userdata(array("random_filemanager_key"=>$hasil));
	 };

 	 return true;
 	}
 	else {
 		$data_sessi=array('login'=>false,

	 						'username'=>'',
	 						'pass'=>"",
              'role'=>"",
            'user_grop'=>'');
	 	$this->session->set_userdata($data_sessi);
 		return false;
 	}
 }



}


?>
