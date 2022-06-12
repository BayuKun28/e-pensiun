<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangkat extends CI_Controller
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
        $this->load->model('pangkat_model');
    }
    public function index()
    {
        $data['title'] = 'Master Pangkat';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pangkat'] = $this->pangkat_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pangkat/index', $data);
    }
    public function tambah()
    {
        $data = array(
            'pangkat' => $this->input->post('pangkat')
        );
        $this->db->insert('pangkat', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Pangkat');
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'pangkat' => $this->input->post('pangkatedit')
        );
        $this->db->where('id', $id);
        $this->db->update('pangkat', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Pangkat');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pangkat');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Pangkat');
    }
    public function getPangkat()
    {
        $pang = $this->input->get('pang');
        $query = $this->pangkat_model->getpangkat2($pang, 'pangkat');
        echo json_encode($query);
    }
}
