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
  $q=$this->session->userdata('wh1');
  $username =$this->input->post('username');
  $nama=$this->input->post('realname');
   $gudang= implode(',',$this->input->post('wh'));
   $pass=base64_encode($this->input->post('pass'));
   $role=$this->input->post('role');
 $data=array('username'=>$username,'realname'=>$nama,'pass'=>$pass,'role'=>$role,'id_b'=>$gudang);

   $r=$this->db->insert('users', $data);
   if ($r==TRUE) {
   $this->session->set_flashdata('m','value');

   redirect(strtolower($q).'/user');

 }else {
   user_error();
 }
  # code...
}
public function edit_user( )
{
    $id=$this->input->post('id');
//  $username =$this->input->post('username');
  $nama=$this->input->post('realname');
  $pass=base64_encode($this->input->post('pass'));
  $gudang= implode(',',$this->input->post('wh'));
  $role=$this->input->post('role');
  $data=array('realname'=>$nama,'pass'=>$pass,'role'=>$role,'id_b'=>$gudang);
  $this->db->where('username',$id);

  $r=$this->db->update('users',$data);
  if ($r==TRUE) {
  $this->session->set_flashdata('m','value');
  $q=$this->session->userdata('wh1');
  redirect(strtolower($q).'/user');
}

}

}
