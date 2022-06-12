<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM jabatan";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getjabatan2($jab)
    {
        $query = "SELECT id,jabatan FROM jabatan WHERE jabatan LIKE '%$jab%' ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getoptionjabatan()
    {
        $query = "SELECT id,jabatan FROM jabatan ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
