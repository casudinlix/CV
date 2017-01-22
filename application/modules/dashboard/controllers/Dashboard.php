<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    if (!$this->session->userdata('role')=='super-user') {
			redirect('home');
		}
  }

  function index()
  {


      $data['title']='Rumah Kreasi';
      $data['namaku']=$this->session->userdata('nama');
      $data['akses']=$this->session->userdata('wh');

         
      $this->load->view('dashboard',$data);
      $this->load->view('modul/depan',$data);

      $this->load->view('bawah',$data);
      # code...
    }
public function setting_users()
{
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();


  $this->load->view('users/dashboard',$data);
  $this->load->view('users/modul/administrator/setting/user',$data);
  $this->load->view('users/bawah',$data);

}
public function add_user()
{
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();

  $this->load->view('users/dashboard',$data);
  $this->load->view('users/modul/administrator/setting/add_user',$data);
  $this->load->view('users/bawah',$data);
}
public function edit_user()
{
$id=$this->uri->segment(3);

$data['user']=$this->db->get_where('users',array('username'=>$id))->row_array();
$data['title']='Rumah Kreasi';
$data['namaku']=$this->session->userdata('nama');
$this->load->view('users/dashboard',$data);
$this->load->view('users/modul/administrator/setting/edit_user',$data);
$this->load->view('users/bawah',$data);

}
public function FunctionName($value='')
{
  # code...
}
}
