<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    if ($this->session->userdata('grop')==false) {
			redirect('home');
		}
  }

  function index()
  {


      $data['title']='Rumah Kreasi';
      $data['namaku']=$this->session->userdata('nama');

      $this->load->view('users/dashboard',$data);
      $this->load->view('users/modul/depan',$data);

      $this->load->view('users/bawah',$data);
      # code...
    }
public function setting_users()
{
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();
$data['m']=$this->session->flashdata('m');
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

}
