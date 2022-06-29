<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tandatangan_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM jabatan where ttd = 1";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function gettd()
    {
        $query = "SELECT p.nama_pegawai,p.nip,j.jabatan FROM pegawai p 
                    LEFT JOIN jabatan j on j.id = p.jabatan
                    WHERE j.ttd = 1
                    LIMIT 1";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function updateallttd()
    {
        $query = "

        UPDATE jabatan j SET j.ttd = 0

        ";
        return $this->db->query($query);
    }
}
