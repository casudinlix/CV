<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eror extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['eror']=$this->session->set_flashdata('eror', 'value');
    $this->load->view('eror', $data);
  }

}
