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

    public function index()
    {
        $data['avatar'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));

        $data['title'] = 'Home';

        $this->load->view('admin/index', $data);
    }
}
