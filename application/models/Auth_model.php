<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('pengguna');
    }

    public function read()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT * FROM pengguna WHERE id <> $id ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function detail($id)
    {
        $query = "SELECT * FROM pengguna WHERE id = $id";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function cekusername($username)
    {
        $query = "SELECT * FROM pengguna WHERE username = '$username' ";
        return $this->db->query($query)->num_rows();
        echo json_encode($query);
    }
}
