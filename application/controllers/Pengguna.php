<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('tahun_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
    }
    public function index()
    {
        $data['title'] = 'Master Pengguna';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['tahun'] = $this->tahun_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengguna/index', $data);
    }
    public function tambah()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'username' => $this->input->post('username'),
            'username' => $this->input->post('username'),
            'username' => $this->input->post('username')
        );
        $this->db->insert('tahun', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Tahun');
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'tahun' => $this->input->post('tahunedit')
        );
        $this->db->where('id', $id);
        $this->db->update('tahun', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Tahun');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tahun');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Tahun');
    }
    public function getTahun()
    {
        $thn = $this->input->get('thn');
        $query = $this->tahun_model->gettahun2($thn, 'thn');
        echo json_encode($query);
    }
}
