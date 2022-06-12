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
}
