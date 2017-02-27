<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model{
	function cek($nip, $pass){
		$this->db->where('nip', $nip);
		$this->db->where('pass', $pass);
		return $this->db->get('users');
	}
	public function wh($wh,$role)
	{
		return $this->db->get_where('users',array('warehouse'=>$wh,'role'=>$role));


	}
}
