<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enterprise extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $wh=$this->session->userdata('wh1');
    $cek = $this->m_login->wh($wh);

    if($cek->num_rows() < 1)
    {
      $this->session->set_flashdata('gudang', 'value');
      redirect('dashboard');

      }
      # code...





  }

  function index()
  {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');


    $this->load->view('dashboard1',$data);
    $this->load->view('depan',$data);
    $this->load->view('bawah',$data);


  }
  public function user($value='')
  {
    $data['whe']=$this->session->userdata('wh1');
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['akses']=$this->session->userdata('wh');


    $this->load->view('dashboard1',$data);
    $this->load->view('user',$data);
    $this->load->view('bawah',$data);
    # code...
  }
  public function edit_user($value='')
  {
    $id=$this->uri->segment(3);
$data['whe']=$this->session->userdata('wh1');
    $data['user']=$this->db->get_where('users',array('username'=>$id))->row_array();
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $this->load->view('dashboard1',$data);
    $this->load->view('edit_user',$data);
    $this->load->view('bawah',$data);
    # code...
  }
  public function add_user($value='')
  {
    $data['title']='Rumah Kreasi';
    $data['namaku']=$this->session->userdata('nama');
    $data['user']=$this->db->get('users')->result();
    $data['whe']=$this->session->userdata('wh1');
    $this->load->view('dashboard1',$data);
    $this->load->view('add_user',$data);
    $this->load->view('bawah',$data);
    # code...

  }
 public function item($value='')
{



  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();
  $data['whe']=$this->session->userdata('wh1');
  $this->load->view('dashboard1',$data);
  $this->load->view('item/item',$data);
  $this->load->view('bawah',$data);

}
public function add_item($value='')
{
  $this->load->model('m_produk');
  $data['kode']=$this->m_produk->kode_item();
  $data['jenis']=$this->db->get('m_jenis')->result();
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();
  $data['whe']=$this->session->userdata('wh1');
  $this->load->view('dashboard1',$data);
  $this->load->view('item/add_item',$data);
  $this->load->view('bawah',$data);
  # code...
}
public function edit_item()
{
  $id=$this->uri->segment(3);
  $data['whe']=$this->session->userdata('wh1');
  $data['user']=$this->db->get_where('m_produk',array('kd_produk'=>$id))->row_array();
  $data['title']='Rumah Kreasi';
    $data['jenis']=$this->db->get('m_jenis')->result();
  $data['namaku']=$this->session->userdata('nama');
  $this->load->view('dashboard1',$data);
  $this->load->view('item/edit_item',$data);
  $this->load->view('bawah',$data);

  # code...
}
public function price()
{
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();
  $data['whe']=$this->session->userdata('wh1');
  $this->load->view('dashboard1',$data);
  $this->load->view('price/price',$data);
  $this->load->view('bawah',$data);

  # code...
}
public function edit_price($value='')
{
  $id=$this->uri->segment(3);
  $data['whe']=$this->session->userdata('wh1');
  $data['user']=$this->db->get_where('m_produk',array('kd_produk'=>$id))->row_array();
  $data['title']='Rumah Kreasi';
    $data['jenis']=$this->db->get('m_jenis')->result();
  $data['namaku']=$this->session->userdata('nama');
  $this->load->view('dashboard1',$data);
  $this->load->view('price/edit_price',$data);
  $this->load->view('bawah',$data);
  # code...
}
public function location($value='')
{
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();
  $data['whe']=$this->session->userdata('wh1');
  $this->load->view('dashboard1',$data);
  $this->load->view('location/location',$data);
  $this->load->view('bawah',$data);

  # code...
}
public function add_location($value='')
{
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $data['user']=$this->db->get('users')->result();
  $data['whe']=$this->session->userdata('wh1');
  $this->load->view('dashboard1',$data);
  $this->load->view('location/add_location',$data);
  $this->load->view('bawah',$data);
  # code...
}
public function edit_location($value='')
{
  $id=$this->uri->segment(3);
  $data['whe']=$this->session->userdata('wh1');
  $data['user']=$this->db->get_where('m_lokasi',array('lokasi'=>$id))->row_array();
  $data['title']='Rumah Kreasi';
  $data['namaku']=$this->session->userdata('nama');
  $this->load->view('dashboard1',$data);
  $this->load->view('location/edit_location',$data);
  $this->load->view('bawah',$data);
  # code...
}
}
