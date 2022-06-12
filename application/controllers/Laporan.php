<?php
// defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Dompdf\Dompdf as Dompdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Writer\PowerPoint2007;
use PhpOffice\PhpPresentation\Style\Alignment;

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('pegawai_model');
        $this->load->model('laporan_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
        $this->load->model('tandatangan_model');
    }

    public function tanggal_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }
    public function ftgl_pensiun($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $bulan[(int)$split[1]] . ' ' . $split[0];
    }
    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $usia = $this->usiapensiun_model->getUsia()->usia;

        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);

        $xthn = $this->input->post('tahun');


        if (!empty($xthn)) {
            $xthn = $this->input->post('tahun');
            $kondisi = 'WHERE (YEAR((DATE_ADD(p2.tgl_lahir, INTERVAL ' . $usia . ' YEAR)))) = ' . $xthn . '';
        } else {
            $kondisi = '';
        }

        $data['xthn'] = $xthn;
        $data['laporan'] = $this->laporan_model->read($usia, $kondisi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/index', $data);
    }

    public function cetak()
    {
        $data['title'] = 'Laporan Data Pensiun';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $usia = $this->usiapensiun_model->getUsia()->usia;

        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);

        $xthn = $this->input->get('xthn');


        if (!empty($xthn)) {
            $xthn = $this->input->get('xthn');
            $kondisi = 'WHERE (YEAR((DATE_ADD(p2.tgl_lahir, INTERVAL ' . $usia . ' YEAR)))) = ' . $xthn . '';
        } else {
            $kondisi = '';
        }

        $data['xthn'] = $xthn;
        $data['laporan'] = $this->laporan_model->read($usia, $kondisi);

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('laporan/cetak', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Pensiun ' . $xthn, array("Attachment" => false));
    }

    public function verifikasi()
    {
        $id = $this->input->post('idverifikasi');
        $data = array(
            'bt' => $this->input->post('vverifikasi')
        );
        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Laporan');
    }

    public function cetaksurat()
    {
        $id = $this->input->get('pegawai');
        $data['title'] = 'Surat Keterangan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['pegawai'] = $this->laporan_model->cetak($usia, $id);

        $tanggal = $this->laporan_model->cetak($usia, $id);
        $data['tanggalpensiun'] = $this->ftgl_pensiun($tanggal['tgl_pensiun']);
        $data['tanggallahir'] = $this->tanggal_indo($tanggal['tgl_lahir']);
        $data['hariini'] = $this->tanggal_indo(date('Y-m-d'));

        $data['ttd'] = $this->tandatangan_model->gettd();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('laporan/cetaksurat', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Surat Keterangan ', array("Attachment" => false));
    }
    public function docxsurat()
    {
        $data['title'] = 'Surat Keterangan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $html = $this->load->view('laporan/cetaksurat', $data, true);
        $section->load_html($html);

        $writer = new Word2007($phpWord);

        $filename = "Surat Keterangan";

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
