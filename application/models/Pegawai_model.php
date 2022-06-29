<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT p.id,p.nama_pegawai,p.nip,p.tgl_lahir,p.tgl_pensiun,p.jabatan as idjabatan,j.jabatan,p.jk,p.alamat,p.pangkat as idpangkat,pa.pangkat
                    FROM pegawai p 
                    LEFT JOIN jabatan j on j.id = p.jabatan
                    LEFT JOIN pangkat pa on pa.id = p.pangkat
                    ORDER BY p.id ASC
                    ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function edit($id)
    {
        $query = "SELECT p.id,p.nama_pegawai,p.nip,p.tgl_lahir,p.jabatan as idjabatan,j.jabatan,p.jk,p.alamat,p.pangkat as idpangkat,pa.pangkat
                    FROM pegawai p 
                    LEFT JOIN jabatan j on j.id = p.jabatan
                    LEFT JOIN pangkat pa on pa.id = p.pangkat
                    WHERE p.id = '$id'
                    ORDER BY p.id";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function getnip2($nip)
    {
        $query = "SELECT p.nip FROM pegawai p
                    WHERE p.id NOT IN (SELECT id_pegawai FROM pendaftaran ) 
                    AND p.nip LIKE '%$nip%' ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getautopegawai($nip)
    {
        $query = "SELECT * FROM pegawai WHERE nip = '$nip' ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function updatebt($id)
    {
        $query = "UPDATE pegawai p JOIN pendaftaran p2 on p2.id_pegawai = p.id SET p.bt = 0 WHERE p2.id = '$id'";
        return $this->db->query($query);
        echo json_encode($query);
    }
}
