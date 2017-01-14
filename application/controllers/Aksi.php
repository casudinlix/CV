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

}
