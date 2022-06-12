<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM tahun";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function gettahun2($thn)
    {
        $query = "SELECT * FROM tahun t
                    WHERE t.tahun LIKE '%$thn%' ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
