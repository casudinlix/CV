<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
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
                        $data=$this->load->view('login');
		}







	 public function cek()
	{
    if (empty($_POST)) {
  		# code...
  		$s = "<script>
    alert('Akses Di tolak');
  </script>";
  echo "<script language='JavaScript'>top.location='javascript:history.go(-1)'; </script> ";
  echo $s;
  die();
  	}else{
		$nip = $this->input->post('username');
		$pass = base64_encode($this->input->post('pass'));
		$cek = $this->login->cek($nip, $pass);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['id'] = $data->id_a;
				$sess_data['username'] = $data->username;
				$sess_data['nama'] = $data->realname;
				//$sess_data['foto'] = $data->foto;
				$sess_data['role'] = $data->role;
        $sess_data['grop'] = $data->user_grop;
				$this->session->set_userdata($sess_data);

			}
			if($this->session->userdata('role') == 'super-user')
			{
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == 'finance')
			{
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == 'user')
			{
				redirect('dashboard');
			}


  }
	$this->session->set_flashdata('gagal', 'value');
	    redirect('home');
}

}
	function keluar()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	}
