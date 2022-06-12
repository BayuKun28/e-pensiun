<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT p2.id as idpegawai,p.id,
                    p2.nama_pegawai,
                    p2.nip,
                    p2.jk,
                    p2.tgl_lahir,
                    p2.alamat,
                    p2.jabatan as idjabatan,
                    j.jabatan,p.tgl_input,p.tgl_pensiun
                FROM pendaftaran p 
                LEFT JOIN pegawai p2 on p2.id = p.id_pegawai
                LEFT JOIN jabatan j on j.id = p2.jabatan
                WHERE p2.bt = 1
                    ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function edit($id)
    {
        $query = "SELECT 
                    p2.nama_pegawai,
                    p2.nip,
                    p2.jk,
                    p2.tgl_lahir,
                    p2.alamat,
                    p2.jabatan as idjabatan,
                    j.jabatan,p.tgl_input,p.tgl_pensiun
                FROM pendaftaran p 
                LEFT JOIN pegawai p2 on p2.id = p.id_pegawai
                LEFT JOIN jabatan j on j.id = p2.jabatan
                WHERE p2.bt = 1 AND p2.id = '$id'";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
