<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('pegawai_model');
        $this->load->model('usiapensiun_model');
        $this->load->model('notifikasi_model');
    }
    public function index()
    {
        $data['title'] = 'Master Pegawai';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pegawai'] = $this->pegawai_model->read();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pegawai/index', $data);
    }

    public function FormInput()
    {
        $data['title'] = 'Master Pegawai / Input';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/input', $data);
    }
    public function tambah()
    {
        $data = array(
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'nip' => $this->input->post('nip'),
            'jk' => $this->input->post('jk'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan'),
            'pangkat' => $this->input->post('pangkat')
        );
        $this->db->insert('pegawai', $data);
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $updatesemuapegawai = $this->usiapensiun_model->updateallpegawai($usia);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Pegawai');
    }
    public function FormEdit()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Master Pegawai / Edit';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pegawai'] = $this->pegawai_model->edit($id);
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/edit', $data);
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'nip' => $this->input->post('nip'),
            'jk' => $this->input->post('jk'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan'),
            'pangkat' => $this->input->post('pangkat')
        );
        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $updatesemuapegawai = $this->usiapensiun_model->updateallpegawai($usia);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Pegawai');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pegawai');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Pegawai');
    }

    public function FormDetail()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Master Pegawai / Detail';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pegawai'] = $this->pegawai_model->edit($id);
        $usia = $this->usiapensiun_model->getUsia()->usia;
        $data['notifikasi'] = $this->notifikasi_model->read($usia);
        $data['jumlah'] = $this->notifikasi_model->jumlah($usia);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/detail', $data);
    }

    public function getNip()
    {
        $nip = $this->input->get('nip');
        $query = $this->pegawai_model->getnip2($nip, 'nip');
        echo json_encode($query);
    }
    public function pegawaiauto()
    {
        $nip = $this->input->get('nip');
        $query = $this->pegawai_model->getautopegawai($nip);
        echo json_encode($query);
    }
}
