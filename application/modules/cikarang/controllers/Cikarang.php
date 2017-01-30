<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cikarang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
     $a=$this->session->userdata('wh1');
     var_dump($a);

  }

}
