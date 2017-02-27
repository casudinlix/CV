<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function create_po()
  {
    $wh=$this->session->userdata('wh1');
    $years                = date('Y');// tahun
		$get_3_number_of_year = substr($years, 3);// mengambil 3 angka dari sebelah kanan pada tahun sekarang
$bulan=date('m');
    $this->db->select('RIGHT(po_num,6) as kode', FALSE);
		$this->db->order_by('po_num', 'DESC');
		//$this->db->limit(1);
		$query  = $this->db->get('m_po')->num_rows();
		$query1 = $this->db->get('m_po')->result();
		$maxid  = $query1[0];
		//cek dulu apakah ada sudah ada kode di tabel.
		if ($query <> 0) {
			//jika kode ternyata sudah ada.
			$data = $query;
			$kode = intval($data)+1;
		} else {
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax  = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodejadi = "P0.".$get_3_number_of_year.$bulan.$kodemax;
		return $kodejadi;
    }
    # code...



}
