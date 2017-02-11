<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function list()
  {
    return $this->db->get('m_produk')->result();
    # code...
  }
  public function jenis()
  {
    return $this->db->get('m_jenis')->result();
    # code...
  }
  public function kode_item()
  {
    $create = strtoupper(uniqid(rand(),true));
    //$s='SB.';
    $d=date('Y');
    $b=date('m');
    $h=date('d');
    $style = $b.$h.substr($create,0,3);
    return $style;
    # code...
  }

}
