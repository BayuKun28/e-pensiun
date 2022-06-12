<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('jabatan_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
    }
    public function index()
    {
        $data['title'] = 'Master Jabatan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['jabatan'] = $this->jabatan_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('jabatan/index', $data);
    }
    public function tambah()
    {
        $data = array(
            'jabatan' => $this->input->post('jabatan')
        );
        $this->db->insert('jabatan', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Jabatan');
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'jabatan' => $this->input->post('jabatanedit')
        );
        $this->db->where('id', $id);
        $this->db->update('jabatan', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Jabatan');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jabatan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Jabatan');
    }
    public function getJabatan()
    {
        $jab = $this->input->get('jab');
        $query = $this->jabatan_model->getjabatan2($jab, 'jabatan');
        echo json_encode($query);
    }
}
