<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wms extends MX_Controller{

   function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $wh=$this->session->userdata('wh1');
    $login=$this->session->userdata('login');
    $role=$this->session->userdata('role')=='super-user';



    if(!$wh)
    {
      $this->session->set_flashdata('gudang', 'value');
      redirect('dashboard');

      }
  }

  function index()
  {

if ($this->session->userdata('login')==TRUE) {
  $data['whe']=$this->session->userdata('wh1');
  $data['title']='WMS-Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['akses']=$this->session->userdata('wh');

  $data['wh2']=$this->session->userdata('pilih');
  $this->load->view('dashboard1',$data);
  $this->load->view('depan',$data);
  $this->load->view('bawah',$data);

}else {
  redirect('dashboard');
}


  }

public function home()
{

if ($this->session->userdata('login')==TRUE) {
    $data['role']=$this->session->userdata('role')=='super-user';
  $data['whe']=$this->session->userdata('wh1');
  $data['title']='WMS-Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['akses']=$this->session->userdata('wh');
  $data['wh2']=$this->session->userdata('pilih');

  $this->load->view('dashboard1',$data);
  $this->load->view('depan',$data);
  $this->load->view('bawah',$data);
}else {
    redirect('dashboard');
}

}
public function stock()
{
  if ($this->session->userdata('login')==TRUE) {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='WMS-Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');
    $data['wh2']=$this->session->userdata('pilih');
    $this->load->view('dashboard1',$data);
    $this->load->view('product/produk',$data);
    $this->load->view('bawah',$data);
  }else{
      redirect('dashboard');
  }


}
public function me()
{
  if ($this->session->userdata('login')==TRUE) {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='WMS-Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');
    $data['wh2']=$this->session->userdata('pilih');
    $data['me']=$this->session->userdata('nip');
    $data['aku']=$this->db->get_where('users',array('nip'=>$this->session->userdata('nip')))->row_array();
    if ($this->session->userdata('role')=='super-admin') {
      $data['gudang']=$this->db->get('wh')->row_array();
    }
    $data['gudang']=$this->db->get_where('wh',array('role'=>'all'))->result_array();


    $this->load->view('dashboard1',$data);
    $this->load->view('me/me',$data);
    $this->load->view('bawah',$data);
  }else{
      redirect('dashboard');
  }

  # code...
}
public function po()
{
  if ($this->session->userdata('login')==TRUE) {
    $data['whe']=$this->session->userdata('wh1');
    $data['role']=$this->session->userdata('role')=='super-user';
    $data['title']='WMS-Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');
    $data['wh2']=$this->session->userdata('pilih');
    $data['me']=$this->session->userdata('nip');
    $data['aku']=$this->db->get_where('users',array('nip'=>$this->session->userdata('nip')))->row_array();
    if ($this->session->userdata('role')=='super-admin') {
      $data['gudang']=$this->db->get('wh')->row_array();
    }
    $data['gudang']=$this->db->get_where('wh',array('role'=>'all'))->result_array();


    $this->load->view('dashboard1',$data);
    $this->load->view('po/po',$data);
    $this->load->view('bawah',$data);
  }else{
      redirect('dashboard');
  }
}
public function create_po()
{
  if ($this->session->userdata('login')==TRUE) {
    $data['role']=$this->session->userdata('role')=='super-user';
    $this->load->model('m_produk');
    $data['kode']=$this->m_produk->create_po();
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='WMS-Rumah Kreasi';
    $data['type']=$this->db->get('m_type_po')->result();
    $data['po']=$this->db->get_where('m_po_detil',array('po_num'=>$this->m_produk->create_po()))->result();
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');
    $data['wh2']=$this->session->userdata('pilih');
    $data['me']=$this->session->userdata('nip');


    $this->load->view('dashboard1',$data);
    $this->load->view('po/create_po',$data);
    $this->load->view('bawah',$data);
  }else{
      redirect('dashboard');
  }

  # code...
}
public function poprint($value='')
{
  $this->load->model('m_produk');
  $data['kode']=$this->m_produk->create_po();
  $data['whe']=$this->session->userdata('wh1');
  $data['title']='WMS-Rumah Kreasi';
  $data['po']=$this->db->get_where('m_po_detil',array('po_num'=>$this->m_produk->create_po()))->result();
  $data['namaku']=$this->session->userdata('nama');
  $data['akses']=$this->session->userdata('wh');
  $data['wh2']=$this->session->userdata('pilih');
  $data['me']=$this->session->userdata('nip');
  $data['id']=$this->uri->segment(3);

  $this->load->view('po/po_print',$data);
  # code...
}
public function edit_po()
{
  if ($this->session->userdata('login')==TRUE) {
    //$this->load->model('m_produk');
    $data['role']=$this->session->userdata('role')=='super-user';
    $id=$this->uri->segment(3);
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='WMS-Rumah Kreasi';
    $data['po']=$this->db->get_where('m_po_detil',array('po_num'=>$id))->result(); $data['status']=$this->db->get_where('m_po',array('po_num'=>$id))->result();
    $data['type']=$this->db->get('m_type_po')->result();
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');
    $data['wh2']=$this->session->userdata('pilih');
    $data['me']=$this->session->userdata('nip');
    $data['po1']=$this->db->get_where('m_po',array('po_num'=>$id))->row();


    $this->load->view('dashboard1',$data);
    $this->load->view('po/edit_po',$data);
    $this->load->view('bawah',$data);
  }else{
      redirect('dashboard');
  }
  # code...
}
public function asn()
{
  
}
}
