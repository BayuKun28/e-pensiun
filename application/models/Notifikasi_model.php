<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    public function read($usia)
    {
        $query = " SELECT p2.id as idpegawai,
                    p2.nama_pegawai,
                    p2.nip,
                    p2.jk,
                    p2.tgl_lahir,
                    p2.tgl_pensiun,
                    p2.alamat,
                    p2.jabatan as idjabatan,
                    j.jabatan,
                    (timestampdiff(YEAR,now(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) as sisamasa,
                    (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) AS selisih_bulan
                FROM  pegawai p2 
                LEFT JOIN jabatan j on j.id = p2.jabatan
             WHERE (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) <=12 AND (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) >= 1
             ORDER BY selisih_bulan ASC
             LIMIT 5

        ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function jumlah($usia)
    {
        $query = "SELECT  COUNT(p2.id) as jumlah
                        FROM  pegawai p2 
                        LEFT JOIN jabatan j on j.id = p2.jabatan
                    WHERE (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) <=12 AND (TIMESTAMPDIFF(MONTH,NOW(),(DATE_ADD(p2.tgl_lahir, INTERVAL $usia YEAR)))) >= 0
        ";
        return $this->db->query($query)->row_array();
    }
}
