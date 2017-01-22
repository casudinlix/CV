<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
public function cikarang($value='')
{

$wh=$this->uri->segment(2);
$id=$this->session->userdata('id');
$ip=$this->input->ip_address();
$data=array('warehouse'=>$wh,'ip'=>$ip);
$this->db->where('id_a', $id);
$this->db->update('users', $data);
$cek = $this->m_login->wh($wh);

if($cek->num_rows() == 1)
{
  foreach($cek->result() as $data){
    $sess_data['id'] = $data->id_a;
    $sess_data['username'] = $data->username;
    $sess_data['nama'] = $data->realname;
    $sess_data['wh'] = $data->id_b;
    $sess_data['wh1'] = $data->warehouse;
    $sess_data['role'] = $data->role;
    $this->session->set_userdata($sess_data);

  }
}


  redirect(strtolower($wh),'refresh');



}
public function jakarta($value='')
{

  $wh=$this->uri->segment(2);
  $id=$this->session->userdata('id');
  $ip=$this->input->ip_address();
  $data=array('warehouse'=>$wh,'ip'=>$ip);
  $this->db->where('id_a', $id);
  $this->db->update('users', $data);

  $this->session->set_userdata($wh);
    redirect(strtolower($wh),'refresh');
}
public function bandung($value='')
{

  $wh=$this->uri->segment(2);
  $id=$this->session->userdata('id');
  $ip=$this->input->ip_address();
  $data=array('warehouse'=>$wh,'ip'=>$ip);
  $this->db->where('id_a', $id);
  $this->db->update('users', $data);

  $this->session->set_userdata($wh);
    redirect(strtolower($wh),'refresh');
}
public function Enterprise($value='')
{

  $wh=$this->uri->segment(2);
  $id=$this->session->userdata('id');
  $ip=$this->input->ip_address();
  $data=array('warehouse'=>$wh,'ip'=>$ip);
  $this->db->where('id_a', $id);
  $this->db->update('users', $data);

  $this->session->set_userdata($wh);
    redirect(strtolower($wh),'refresh');
}
}
