<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('pendaftaran_model');
        $this->load->model('jabatan_model');
        $this->load->model('pegawai_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
    }
    public function index()
    {
        $data['title'] = 'Master Pendaftaran';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pendaftaran'] = $this->pendaftaran_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendaftaran/index', $data);
    }

    public function FormInput()
    {
        $data['title'] = 'Master Pendaftaran / Input';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['xjabatan'] = $this->jabatan_model->getoptionjabatan();
        $xtgl_input = date('Y-m-d');
        $data['tgl_input'] = $xtgl_input;
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/input', $data);
    }
    public function tambah()
    {
        if (!empty($this->input->post('idedit'))) {


            $data = array(
                'id_pegawai' => $this->input->post('idedit'),
                'tgl_input' => $this->input->post('tgl_input'),
                'tgl_pensiun' => $this->input->post('tgl_pensiun')
            );
            $this->db->insert('pendaftaran', $data);

            $data2 = array(
                'bt' => 1
            );
            $idedit = $this->input->post('idedit');
            $this->db->where('id', $idedit);
            $this->db->update('pegawai', $data2);
            $this->session->set_flashdata('message', 'Berhasil Ditambah');
            redirect('Pendaftaran');
        } else {
            $this->session->set_flashdata('message', 'Isi NIP');
            redirect('Pendaftaran/FormInput');
        }
    }
    public function FormEdit()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Master Pendaftaran / Edit';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pendaftaran'] = $this->pendaftaran_model->edit($id);
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/edit', $data);
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $xtgllastupdate = date('Y-m-d');
        $data = array(
            'tgl_pensiun' => $this->input->post('tgl_pensiunedit'),
            'tgl_last_update' => $xtgllastupdate
        );
        $this->db->where('id', $id);
        $this->db->update('pendaftaran', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Pendaftaran');
    }

    public function delete($id)
    {
        $this->pegawai_model->updatebt($id);
        $this->db->where('id', $id);
        $this->db->delete('pendaftaran');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Pendaftaran');
    }
}
