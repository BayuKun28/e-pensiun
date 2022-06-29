<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function read($usia, $kondisi)
    {
        $query = "SELECT p2.id as idpegawai,
                    p2.nama_pegawai,
                    p2.nip,
                    p2.jk,
                    p2.tgl_lahir,
                    p2.tgl_pensiun,
                    p2.alamat,
                    p2.jabatan as idjabatan,
                    j.jabatan,
                    (timestampdiff(YEAR,now(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) as sisamasa,
                    (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) AS selisih_bulan,p2.bt
                FROM pegawai p2 
                LEFT JOIN jabatan j on j.id = p2.jabatan 
                $kondisi
                ORDER BY selisih_bulan ASC
                    ";
        // die($query);
        // var_dump($query);
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function cetak($usia, $id)
    {
        $query = "SELECT p2.id as idpegawai,
                    p2.nama_pegawai,
                    p2.nip,
                    p2.jk,
                    p2.tgl_lahir,
                    p2.tgl_pensiun,
                    p2.alamat,
                    p2.jabatan as idjabatan,
                    j.jabatan,
                    (timestampdiff(YEAR,now(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) as sisamasa,
                    (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) AS selisih_bulan,p2.bt,p2.pangkat as idpangkat,pa.pangkat
                FROM pegawai p2 
                LEFT JOIN jabatan j on j.id = p2.jabatan 
                LEFT JOIN pangkat pa on pa.id = p2.pangkat
                WHERE p2.id = '$id'
                    ";
        // die($query);
        // var_dump($query);
        return $this->db->query($query)->row_array();
    }
}
