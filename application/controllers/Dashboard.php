<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        // $this->load->model('dashboard_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
        $this->load->model('dashboard_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);

        $data['jumlahpensiun'] = $this->dashboard_model->jumlahpensiun();
        $data['jumlahpegawaiaktif'] = $this->dashboard_model->jumlahpegawaiaktif();
        $data['jumlahuser'] = $this->dashboard_model->jumlahuser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
    }
}
