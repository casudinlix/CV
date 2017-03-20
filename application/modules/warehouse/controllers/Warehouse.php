<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends MX_Controller{

   function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

  }

  function index()
  {
    $wh=$this->input->post('a');

    $id=$this->session->userdata('nip');
    $ip=$this->input->ip_address();
    $data=array('warehouse'=> $wh,'ip'=>$ip);
    $this->db->where('nip', $id);
    $this->db->update('users', $data);
    $cek = $this->m_login->wh($wh);
	   $sess_data['wh1'] = $wh;
     $this->session->set_userdata($sess_data);
     $wh=$this->session->userdata('wh1');

     if(!$wh)
     {
       $this->session->set_flashdata('gudang', 'value');
       redirect('dashboard');

       }
     if ($wh=='ENTERPRISE') {
       $sess_data['wh1'] = $wh;
       $sess_data['nip'] = $this->session->userdata('nip');
       $this->session->set_userdata($sess_data);
       redirect('enterprise');
     }
redirect('wms');
  }


public function pilih()
{
  $id=$this->session->userdata('nip');
  $data=array('warehouse'=>'Null');
  $this->db->where('nip', $id);
  $this->db->update('users', $data);
$this->session->unset_userdata('wh1');

  redirect('dashboard');
  # code...
}

}
