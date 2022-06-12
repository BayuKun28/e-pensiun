<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usiapensiun extends CI_Controller
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
    }
    public function index()
    {
        $data['title'] = 'Setting Usia Pensiun';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['usia'] = $this->usiapensiun_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('usiapensiun/index', $data);
    }
    public function tambah()
    {
        $data = array(
            'usia' => $this->input->post('usia')
        );
        $this->db->insert('usia_pensiun', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Usiapensiun');
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'usia' => $this->input->post('usiaedit')
        );
        $this->db->where('id', $id);
        $this->db->update('usia_pensiun', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Usiapensiun');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('usia_pensiun');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Usiapensiun');
    }
}
