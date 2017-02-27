<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MX_Controller {
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
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == 'user')

			{
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == 'warehouse')

			{
				redirect('dashboard');
			}

   redirect('login');
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
		$nip = $this->input->post('username',TRUE);
		$pass = base64_encode($this->input->post('pass',TRUE));


		$cek = $this->m_login->cek($nip, $pass);

		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['login'] =TRUE;
				$sess_data['nip'] = $data->nip;
				$sess_data['nama'] = $data->realname;
				$sess_data['wh'] =  $data->whid;
				$sess_data['role'] = $data->role;
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
	    redirect('login');
}

}
	function keluar()
	{
			$id=$this->session->userdata('nip');
			$data=array('warehouse'=>'Null');
			$this->db->where('nip', $id);
			$this->db->update('users', $data);
$semua=$this->session->all_userdata();
$this->session->unset_userdata($semua);
		$this->session->sess_destroy();

		redirect('login');
	}
	}
