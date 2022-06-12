<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangkat_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM pangkat";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getpangkat2($pang)
    {
        $query = "SELECT id,pangkat FROM pangkat WHERE pangkat LIKE '%$pang%' ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getoptionpangkat()
    {
        $query = "SELECT id,pangkat FROM pangkat ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
