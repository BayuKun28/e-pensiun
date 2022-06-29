<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tandatangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('usiapensiun_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
        $this->load->model('tandatangan_model');
    }
    public function index()
    {
        $data['title'] = 'Setting Tanda Tangan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['usia'] = $this->usiapensiun_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $data['ttd'] = $this->tandatangan_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tandatangan/index', $data);
    }
    public function edit()
    {
        $updateset0 = $this->tandatangan_model->updateallttd();

        $idedit = $this->input->post('jabatanedit');
        $data2 = array(
            'ttd' => 1
        );
        $this->db->where('id', $idedit);
        $this->db->update('jabatan', $data2);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Tandatangan');
    }
}
