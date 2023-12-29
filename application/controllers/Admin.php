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
}
