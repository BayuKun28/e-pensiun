<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usiapensiun_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM usia_pensiun";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getUsia()
    {
        $this->db->select('usia');
        return $this->db->get('usia_pensiun')->row();
    }
    public function updateallpegawai($usia)
    {
        $query = "

        UPDATE pegawai p 
        JOIN pegawai p2 ON p2.id = p.id
        SET p.tgl_pensiun = (DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR))

        ";
        return $this->db->query($query);
    }
}
