<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (empty($_POST)) {
    $this->session->set_flashdata('eror', 'value');
    redirect('eror','refresh');
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
public function save_user()
{
  $q=$this->session->userdata('wh1');
  $username =$this->input->post('username',TRUE);
  $nama=$this->input->post('realname',TRUE);
   $gudang= implode(',',$this->input->post('wh'));
   $pass=base64_encode($this->input->post('pass'));
   $role=$this->input->post('role',TRUE);
 $data=array('nip'=>$username,'realname'=>$nama,'pass'=>$pass,'role'=>$role,'whid'=>$gudang);

   $r=$this->db->insert('users', $data);
   if ($r==TRUE) {
   $this->session->set_flashdata('m','value');

   redirect(strtolower($q).'/user');

 }else {
   user_error();
 }
  # code...
}
public function edit_user( )
{
    $id=$this->input->post('id');
//  $username =$this->input->post('username');
  $nama=$this->input->post('realname',TRUE);
  $pass=base64_encode($this->input->post('pass',TRUE));
  $gudang= implode(',',$this->input->post('wh',TRUE));
  $role=$this->input->post('role',TRUE);
  $data=array('realname'=>$nama,'pass'=>$pass,'whid'=>$gudang);
  $this->db->where('nip',$id);

  $r=$this->db->update('users',$data);
  if ($r==TRUE) {
  $this->session->set_flashdata('m','value');
  $q=$this->session->userdata('wh1');
  redirect('enterprise/user');
}

}
public function save_item()
{
  $code=$this->input->post('code');
  $name=strtoupper($this->input->post('nama',TRUE));
  $user=$this->session->userdata('nama',TRUE);
  $jenis=$this->input->post('jenis',TRUE);
  $vendor=$this->input->post('vendor',TRUE);
  $date=date("Y-m-d");
  $data=array('kd_produk'=>$code,'nama_produk'=>$name,'jenis'=>$jenis,'vendor_name'=>$vendor,'update_user'=>$user,'last'=>$date);
  $this->db->insert('m_produk',$data);
$this->session->set_flashdata('item', 'value');
redirect('enterprise/item');
  # code...
}
public function edit_item()
{
    $id=$this->input->post('id');
$nama=$this->input->post('nama',TRUE);
$jenis=$this->input->post('jenis',TRUE);
$user=$this->session->userdata('nama',TRUE);
$vendor=$this->input->post('vendor',TRUE);
$date=date("Y-m-d");
$data=array('nama_produk'=>$nama,'jenis'=>$jenis,'vendor_name'=>$vendor,'update_user'=>$user,'last'=>$date);
  $this->db->where('kd_produk',$id);

  $r=$this->db->update('m_produk',$data);
  if ($r==TRUE) {
  $this->session->set_flashdata('edit_item','value');
  $q=$this->session->userdata('wh1');
  redirect(strtolower($q).'/item');
}

}
public function edit_price()
{
  $id=$this->input->post('id');
$nama=$this->input->post('nama');
$hargabeli=$this->input->post('hargabeli');
$hargajual=$this->input->post('hargajual');
$user=$this->session->userdata('nama');
$date=date("Y-m-d");
$data=array('nama_produk'=>$nama,'harga_beli'=>$hargabeli,'harga_jual'=>$hargajual,'last'=>$date);
$this->db->where('kd_produk',$id);

$r=$this->db->update('m_produk',$data);
if ($r==TRUE) {
$this->session->set_flashdata('edit_price','value');
$q=$this->session->userdata('wh1');
redirect(strtolower($q).'/price');
}

  # code...
}
public function save_location($value='')
{
  $loc=$this->input->post('loc');
  $name=strtoupper($this->input->post('nama'));
  $user=$this->session->userdata('nama');

  $date=date("Y-m-d");
  $data=array('lokasi'=>$loc,'nama_lokasi'=>$name,'update_user'=>$user,'last'=>$date);
  $this->db->insert('m_lokasi',$data);
$this->session->set_flashdata('location', 'value');
redirect('enterprise/location');
  # code...
}
public function edit_location($value='')
{
  $id=$this->input->post('id');
$nama=$this->input->post('nama');
$user=$this->session->userdata('nama');
$date=date("Y-m-d");
$data=array('nama_lokasi'=>$nama,'update_user'=>$user,'last'=>$date);
$this->db->where('lokasi',$id);

$r=$this->db->update('m_lokasi',$data);
if ($r==TRUE) {
$this->session->set_flashdata('edit_location','value');
$q=$this->session->userdata('wh1');
redirect(strtolower($q).'/location');
}
  # code...
}
public function save_vendor()
{
  $kode=$this->input->post('ven');
  $nama= strtoupper($this->input->post('nama'));
  $alamat=strtoupper( $this->input->post('alamat'));
  $tlp=$this->input->post('tlp');
  $status=$this->input->post('status');
  $aku=$this->session->userdata('nama');

  $data=array('kd_vendor'=>$kode,'nama_vendor'=>$nama,'alamat'=>$alamat,'tlp'=>$tlp,'status'=>$status,'update_by'=>$aku);
  $this->db->insert('m_vendor', $data);

  $this->session->set_flashdata('vendor', 'value');
  redirect('enterprise/vendor');
  # code...
}
public function edit_vendor($value='')
{
$id=$this->input->post('id');
  $kode=$this->input->post('ven');
  $nama= strtoupper($this->input->post('nama'));
  $alamat=strtoupper( $this->input->post('alamat'));
  $tlp=$this->input->post('tlp');
  $status=$this->input->post('status');
  $aku=$this->session->userdata('nama');
  $data=array('kd_vendor'=>$kode,'vendor_name'=>$nama,'alamat'=>$alamat,'tlp'=>$tlp,'status'=>$status,'update_by'=>$aku);
  $this->db->where('kd_vendor', $id);
$this->db->update('m_vendor', $data);
  $this->session->set_flashdata('vendor1', 'value');
  redirect('enterprise/vendor');

  # code...
}
public function tambahpo()
{
  $id=$this->input->post('po');
  $code=$this->input->post('code',TRUE);
  $nama=$this->input->post('nama',TRUE);
  $vendor=$this->input->post('vendor',TRUE);
  $qty=$this->input->post('qty',TRUE);

  $cek=$this->db->get_where('m_po_detil',array('po_num'=>$id,'kd_produk'=>$code,'nama_produk'=>$nama,'vendor_name'=>$vendor,'po_qty'=>$qty))->result();
  $rows=$cek->num_rows;
  if ($rows > 0) {
    $data=array('po_num'=>$id,'kd_produk'=>$code,'nama_produk'=>$nama,'vendor_name'=>$vendor,'po_qty'=>$qty);
$this->db->where('kd_produk', $id);
$this->db->where('po_num', $id);
$this->db->update('m_po_detil', $data);
redirect($_SERVER['HTTP_REFERER']);

//redirect('wms/create_po');
  }else{

  $data=array('po_num'=>$id,'kd_produk'=>$code,'nama_produk'=>$nama,'vendor_name'=>$vendor,'po_qty'=>$qty);
  $this->db->insert('m_po_detil', $data);
  $this->session->set_flashdata('oke', 'value');
  redirect($_SERVER['HTTP_REFERER']);

  //redirect('wms/create_po');
}
  # code...
}
public function postingpo()
{
$wh=$this->session->userdata('wh1');
$id=$this->input->post('po');
$user=$this->session->userdata('nama');
$date=date('Y-m-d H:i:s');
 $duedate=date('Y-m-d',strtotime($this->input->post('duedate')));
 $res=$this->input->post('reason');
$this->db->select_sum('po_qty');
$type=$this->input->post('type');
$query=$this->db->get_where('m_po_detil',array('po_num'=>$id));
$qty=$query->row()->po_qty;
$query->result();
 $vendor=$this->input->post('vendor');
$row=$query->num_rows();
$data=array('po_num'=>$this->input->post('po'),
'po_total_qty'=>$qty,'open_qty'=>$qty,'created'=>$user,'po_type'=>$type,
'date'=>$date, 'due_date'=>$duedate,'status'=>'NEW','whid'=>$wh,'vendor_name'=>$vendor
);
$this->db->insert('m_po', $data);
redirect('wms/po');

}
public function editpo($value='')
{
  $id=$this->input->post('po');
  $code=$this->input->post('code',TRUE);
  $nama=$this->input->post('nama',TRUE);
  $vendor=$this->input->post('vendor',TRUE);
  $qty=$this->input->post('qty',TRUE);

  $cek=$this->db->get_where('m_po_detil',array('po_num'=>$id,'kd_produk'=>$code,'nama_produk'=>$nama,'vendor_name'=>$vendor,'po_qty'=>$qty))->result();
  $rows=$cek->num_rows;
  if ($rows > 0) {
    $data=array('po_num'=>$id,'kd_produk'=>$code,'nama_produk'=>$nama,'vendor_name'=>$vendor,'po_qty'=>$qty);
$this->db->where('kd_produk', $id);
$this->db->where('po_num', $id);
$this->db->update('m_po_detil', $data);
redirect('wms/edit_po/'.$id);
  }else{

  $data=array('po_num'=>$id,'kd_produk'=>$code,'nama_produk'=>$nama,'vendor_name'=>$vendor,'po_qty'=>$qty);
  $this->db->insert('m_po_detil', $data);
  $this->session->set_flashdata('oke', 'value');
  redirect('wms/edit_po/'.$id);
}
  # code...
}
public function editpostingpo($value='')
{
  $wh=$this->session->userdata('wh1');
  $id=$this->input->post('po');
  $user=$this->session->userdata('nama');
  $date=date('Y-m-d H:i:s');
   $duedate=date('Y-m-d',strtotime($this->input->post('duedate')));
   $res=$this->input->post('reason');
  $this->db->select_sum('po_qty');
  $type=$this->input->post('type');
  $query=$this->db->get_where('m_po_detil',array('po_num'=>$id));
  $qty=$query->row()->po_qty;
  $query->result();
   $vendor=$this->input->post('vendor');
  $row=$query->num_rows();
  $data=array('po_num'=>$this->input->post('po'),
  'po_total_qty'=>$qty,'created'=>$user,'po_type'=>$type,
  'date'=>$date, 'due_date'=>$duedate,'status'=>'NEW','whid'=>$wh,'vendor_name'=>$vendor
  );
  $this->db->where('po_num', $id);
  $this->db->update('m_po', $data);
  redirect('wms/po');

}
public function save_carrier($value='')
{
  $code=strtoupper($this->input->post('code')) ;
  $nopol=strtoupper($this->input->post('nopol'));
  $com=strtoupper($this->input->post('com'));
  $type=$this->input->post('type');
  $status=$this->input->post('status');
  $data=array('code_carrier'=>$code,'nopol'=>$nopol,'company'=>$com,'type'=>$type,'status'=>$status);
  $this->db->insert('m_carrier', $data);
  redirect('enterprise/carrier');
}
public function editcarrier()
{
  $id=$this->uri->segment(3);
  $code=strtoupper($this->input->post('code')) ;
  $nopol=strtoupper($this->input->post('nopol'));
  $com=strtoupper($this->input->post('com'));
  $type=$this->input->post('type');
  $status=$this->input->post('status');
  $data=array('nopol'=>$nopol,'company'=>$com,'type'=>$type,'status'=>$status);
  $this->db->where('code_carrier', $code);
  $this->db->update('m_carrier', $data);
  $this->session->set_flashdata('oke', 'value');
redirect('enterprise/carrier');
}
public function saveship($value='')
{

  $code=strtoupper($this->input->post('code'));
  $com=strtoupper($this->input->post('com'));
  $ad=strtoupper($this->input->post('address'));

  $pho=$this->input->post('phone');
  $add=$this->session->userdata('nama');
  $date=date('Y-m-d H:i:s');
  $data=array('shipto'=>$code,
'company'=>$com,'address'=>$ad,'phone'=>$pho,'added'=>$add,
'adddate'=>$date);
$this->db->where('shipto', $code);
$cek=$this->db->get('m_ship_to')->num_rows();
if ($cek==1) {

  $this->session->set_flashdata('duplikat', 'value');
	    redirect('enterprise/addship');
}else{
$this->db->insert('m_ship_to', $data);
redirect('enterprise/ship');
}
}
public function editship($value='')
{
  $code=strtoupper($this->input->post('code'));
  $com=strtoupper($this->input->post('com'));
  $ad=strtoupper($this->input->post('address'));

  $pho=$this->input->post('phone');
  $add=$this->session->userdata('nama');
  $date=date('Y-m-d H:i:s');
  $data=array('shipto'=>$code,
'company'=>$com,'address'=>$ad,'phone'=>$pho,'added'=>$add,
'adddate'=>$date);
$this->db->where('shipto', $code);
$this->db->update('m_ship_to', $data);
redirect('enterprise/ship');
}
public function saveme()
{
  $id=$this->input->post('id');
  //  $username =$this->input->post('username');
  $nama=$this->input->post('realname',TRUE);
  $pass=base64_encode($this->input->post('pass',TRUE));
  $gudang= implode(',',$this->input->post('wh',TRUE));
  $role=$this->input->post('role',TRUE);
  $data=array('realname'=>$nama,'pass'=>$pass,'whid'=>$gudang);
  $this->db->where('nip',$id);

  $r=$this->db->update('users',$data);
  if ($r==TRUE) {
  $this->session->set_flashdata('m','value');
  $q=$this->session->userdata('wh1');
  redirect('enterprise/user');
  }
}
public function savewh($value='')
{
  $code=strtoupper($this->input->post('whid'));
  $nama=strtoupper($this->input->post('nama'));
  $ad=strtoupper($this->input->post('address'));

  $pho=$this->input->post('phone');
  $add=$this->session->userdata('nama');
  $date=date('Y-m-d H:i:s');
  $data=array('whid'=>$code,
'nama_wh'=>$nama,'alamat'=>$ad,'tlp'=>$pho,'added'=>$add);
$this->db->where('whid', $code);
$cek=$this->db->get('wh')->num_rows();
if ($cek==1) {

  $this->session->set_flashdata('duplikat', 'value');
	    redirect('enterprise/addwh');
}else{
$this->db->insert('wh', $data);
redirect('enterprise/wh');
}
}
public function editwh($value='')
{
  $id=$this->input->post('id');
  $code=strtoupper($this->input->post('whid'));
  $nama=strtoupper($this->input->post('nama'));
  $ad=strtoupper($this->input->post('address'));

  $pho=$this->input->post('phone');
  $add=$this->session->userdata('nama');
  $date=date('Y-m-d H:i:s');
  $data=array('whid'=>$code,
'nama_wh'=>$nama,'alamat'=>$ad,'tlp'=>$pho,'added'=>$add);
$this->db->where('whid', $code);
$this->db->update('wh', $data);
redirect('enterprise/wh');
}
}
