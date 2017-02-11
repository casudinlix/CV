<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cikarang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    if (!$this->session->userdata('pilih') AND $this->session->userdata('wh1') ) {
      redirect('home');
    }
  }

  function index()
  {

      $data['whe']=$this->session->userdata('wh1');
      $data['title']='Rumah Kreasi';
      $data['namaku']=$this->session->userdata('nama');
      $data['akses']=$this->session->userdata('wh');

      $data['wh2']=$this->session->userdata('pilih');
      $this->load->view('dashboard1',$data);
      $this->load->view('depan',$data);
      $this->load->view('bawah',$data);




  }
  public function product_master()
  {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');

    $data['wh2']=$this->session->userdata('pilih');
    $this->load->view('dashboard1',$data);
    $this->load->view('product/produk',$data);
    $this->load->view('bawah',$data);
    # code...
  }

}
