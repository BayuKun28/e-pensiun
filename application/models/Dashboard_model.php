<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function jumlahpensiun()
    {
        $query = "SELECT COUNT(p.id) as jumlahpensiun FROM pegawai p WHERE p.bt = 1";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function jumlahpegawaiaktif()
    {
        $query = "SELECT COUNT(p.id) as jumlahpegawaiaktif FROM pegawai p WHERE p.bt <> 1";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function jumlahuser()
    {
        $query = "SELECT COUNT(p.id) as jumlahuser FROM pengguna p";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
