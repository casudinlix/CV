<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enterprise extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $wh=$this->session->userdata('wh1');
    $cek = $this->m_login->wh($wh);

    if($cek->num_rows() < 1)
    {
      $this->session->set_flashdata('gudang', 'value');
      redirect('dashboard');

      }
      # code...





  }

  function index()
  {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');


    $this->load->view('dashboard1',$data);
    $this->load->view('depan',$data);
    $this->load->view('bawah',$data);


  }
  public function user($value='')
  {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');


    $this->load->view('dashboard1',$data);
    $this->load->view('user',$data);
    $this->load->view('bawah',$data);
    # code...
  }
  public function edit_user($value='')
  {
    $id=$this->uri->segment(3);
$data['whe']=$this->session->userdata('wh1');
    $data['user']=$this->db->get_where('users',array('username'=>$id))->row_array();
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $this->load->view('dashboard1',$data);
    $this->load->view('edit_user',$data);
    $this->load->view('bawah',$data);
    # code...
  }
  public function add_user($value='')
  {
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['user']=$this->db->get('users')->result();
$data['whe']=$this->session->userdata('wh1');
    $this->load->view('dashboard1',$data);
    $this->load->view('add_user',$data);
    $this->load->view('bawah',$data);
    # code...
  }

}
