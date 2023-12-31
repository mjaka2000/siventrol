<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        // $this->load->library('upload');
        // $this->load->library('mailer');
        if ($this->session->userdata('level') != '0') {
            redirect(site_url("login"));
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function index()
    {
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Home';
        $this->load->view('admin/index', $data);
    }

    ####################################
    //* Data Barang
    ####################################
    public function data_barang()
    {
        $data['list_data'] = $this->M_data->select('tb_barang');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Data Barang';
        $this->load->view('admin/d_barang/tbl_barang', $data);
    }

    public function tambah_barang()
    {
        $id_brg = $this->M_data->get_id_barang('tb_barang');
        foreach ($id_brg as $idbrg) {
            // if ($idbrg) {
            $isi = substr($idbrg->id_barang, 4);
            $id = (int) $isi;
            $id = $id + 1;
            $auto_id_brg = "BRG-" . str_pad($id, 4, "0", STR_PAD_LEFT);
            // }
        }
        $data['kd_brg'] = $auto_id_brg;
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Tambah Data Barang';
        $this->load->view('admin/d_barang/add_barang', $data);
    }

    public function proses_tambahbarang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('unit', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required');
        $this->form_validation->set_rules('diskon', 'Diskon', 'trim|required');

        if ($this->form_validation->run() === TRUE) {
            $kode_barang = $this->input->post('kode_barang', TRUE);
            $nama_barang = $this->input->post('nama_barang', TRUE);
            $unit = $this->input->post('unit', TRUE);
            $harga_beli = $this->input->post('harga_beli', TRUE);
            $harga_jual = $this->input->post('harga_jual', TRUE);
            $diskon = $this->input->post('diskon', TRUE);
            // $status           = 1;

            $data = array(
                'id_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'unit' => $unit,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'diskon' => $diskon,
            );
            $this->M_data->insert('tb_barang', $data);
            $this->session->set_flashdata('msg_sukses', 'Data Berhasil Disimpan');
            redirect(site_url('admin/data_barang'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Tambah Data Barang';
            $this->load->view('admin/d_barang/add_barang', $data);
        }
    }

    public function update_barang()
    {
        $uri = $this->uri->segment(3);
        $where = array('id_barang' => $uri);
        $data['edit_data'] = $this->M_data->get_data('tb_barang', $where);
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Edit Data Barang';
        $this->load->view('admin/d_barang/edit_barang', $data);
    }

    public function proses_updatebarang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('unit', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required');
        $this->form_validation->set_rules('diskon', 'Diskon', 'trim|required');

        if ($this->form_validation->run() === TRUE) {
            $kode_barang = $this->input->post('kode_barang', TRUE);
            $nama_barang = $this->input->post('nama_barang', TRUE);
            $unit = $this->input->post('unit', TRUE);
            $harga_beli = $this->input->post('harga_beli', TRUE);
            $harga_jual = $this->input->post('harga_jual', TRUE);
            $diskon = $this->input->post('diskon', TRUE);
            // $status           = 1;
            $where = array('id_barang' => $kode_barang);
            $data = array(
                // 'id_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'unit' => $unit,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'diskon' => $diskon,
            );
            $this->M_data->update('tb_barang', $data, $where);
            $this->session->set_flashdata('msg_sukses', 'Data Berhasil Diubah');
            redirect(site_url('admin/data_barang'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Edit Data Barang';
            $this->load->view('admin/d_barang/edit_barang', $data);
        }
    }

    public function hapus_barang()
    {
        $uri = $this->uri->segment(3);
        $where = array('id_barang' => $uri);
        $this->M_data->delete('tb_barang', $where);
        $this->session->set_flashdata('msg_sukses', 'Data Berhasil Dihapus');
        redirect(site_url('admin/data_barang'));
    }
}
