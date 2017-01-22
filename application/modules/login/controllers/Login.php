<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if($this->session->userdata('role') == 'super-user')
			{
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == 'finance')
			{
				redirect('user');
			}
			elseif($this->session->userdata('role') == 'user')

			{
				redirect('user');
			}
			elseif($this->session->userdata('role') == 'warehouse')

			{
				redirect('user');
			}

    
    $this->load->view('login');
  }

}
