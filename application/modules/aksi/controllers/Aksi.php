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
 $data=array('username'=>$username,'realname'=>$nama,'pass'=>$pass,'role'=>$role,'whid'=>$gudang);

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
  $data=array('realname'=>$nama,'pass'=>$pass,'role'=>$role,'whid'=>$gudang);
  $this->db->where('username',$id);

  $r=$this->db->update('users',$data);
  if ($r==TRUE) {
  $this->session->set_flashdata('m','value');
  $q=$this->session->userdata('wh1');
  redirect(strtolower($q).'/user');
}

}
public function save_item()
{
  $code=$this->input->post('code');
  $name=strtoupper($this->input->post('nama'));
  $user=$this->session->userdata('nama');
  $jenis=$this->input->post('jenis');
  $date=date("Y-m-d");
  $data=array('kd_produk'=>$code,'nama_produk'=>$name,'jenis'=>$jenis,'update_user'=>$user,'last'=>$date);
  $this->db->insert('m_produk',$data);
$this->session->set_flashdata('item', 'value');
redirect('enterprise/item');
  # code...
}
public function edit_item()
{
    $id=$this->input->post('id');
$nama=$this->input->post('nama');
$jenis=$this->input->post('jenis');
$user=$this->session->userdata('nama');
$date=date("Y-m-d");
$data=array('nama_produk'=>$nama,'jenis'=>$jenis,'update_user'=>$user,'last'=>$date);
  $this->db->where('kd_produk',$id);

  $r=$this->db->update('m_produk',$data);
  if ($r==TRUE) {
  $this->session->set_flashdata('edit_item','value');
  $q=$this->session->userdata('wh1');
  redirect(strtolower($q).'/item');
}

}
public function edit_price()
{
  $id=$this->input->post('id');
$nama=$this->input->post('nama');
$hargabeli=$this->input->post('hargabeli');
$hargajual=$this->input->post('hargajual');
$user=$this->session->userdata('nama');
$date=date("Y-m-d");
$data=array('nama_produk'=>$nama,'harga_beli'=>$hargabeli,'harga_jual'=>$hargajual,'last'=>$date);
$this->db->where('kd_produk',$id);

$r=$this->db->update('m_produk',$data);
if ($r==TRUE) {
$this->session->set_flashdata('edit_price','value');
$q=$this->session->userdata('wh1');
redirect(strtolower($q).'/price');
}

  # code...
}

}
