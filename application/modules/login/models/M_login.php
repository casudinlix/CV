<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model{
	function cek($nip, $pass){
		$this->db->where('username', $nip);
		$this->db->where('pass', $pass);
		return $this->db->get('users');
	}
	public function wh($id)
	{
		$this->db->where('warehouse', $id);
		return $this->db->get('users');
	}
}
