<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (empty($_POST)) {
    $this->session->set_flashdata('eror', 'value');
    redirect('eror','refresh');
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
public function save_user()
{
  $username =$this->input->post('username');
  $nama=$this->input->post('realname');
  $pass=base64_encode($this->input->post('pass'));
  $role=$this->input->post('role');
$data=array('username'=>$username,'realname'=>$nama,'pass'=>$pass,'role'=>$role);

  $r=$this->db->insert('users', $data);
  if ($r==TRUE) {
  $this->session->set_flashdata('m','value');

  redirect('dashboard/setting_users','refresh');

}else {
  user_error();
}
  # code...
}

}
