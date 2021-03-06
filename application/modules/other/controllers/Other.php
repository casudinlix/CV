<?php
class Other extends CI_Controller{

    function __construct() {
        parent::__construct();

    }

    function index(){
        $data['propinsi'] = $this->db->get('provinsi');

    }

    function kabupaten(){
        $propinsiID = $_GET['id'];
        $kabupaten   = $this->db->get_where('kabupaten',array('id_prov'=>$propinsiID));
        echo " <div class='form-group'>
                <label>District</label>";
        echo "<select id='kabupaten' name='kab' onChange='loadKecamatan()' class='form-control'>";
        foreach ($kabupaten->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama</option>";
        }
        echo "</select></div>";
    }

    function kecamatan(){
        $kabupatenID = $_GET['id'];
        $kecamatan   = $this->db->get_where('kecamatan',array('id_kabupaten'=>$kabupatenID));
        echo " <div class='form-group'>
                <label>Districts</label>";
        echo "<select id='kecamatan' name='kec' onChange='loadDesa()' class='form-control'>";
        foreach ($kecamatan->result() as $k)
        {
            echo "<option value='$k->nama'>$k->nama</option>";
        }
        echo"</select></div>";
    }

    function desa(){
        $kecamatanID  = $_GET['id'];
        $desa         = $this->db->get_where('desa',array('id_kecamatan'=>$kecamatanID));
        echo " <div class='form-group'>
                <label>Village</label>";
        echo "<select class='form-control' name='des'>";
        foreach ($desa->result() as $d)
        {
            echo "<option value='$d->nama'>$d->nama</option>";
        }
        echo"</select></div>";
    }
}
