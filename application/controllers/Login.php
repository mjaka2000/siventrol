<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function token_generate()
    {
        return $tokens = md5(uniqid(rand(), true));
    }

    public function index()
    {
        $data['token_generate'] = $this->token_generate();
        $this->session->set_userdata($data);
        $data['title'] = 'Login';
        $this->load->view('login/login', $data);
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        date_default_timezone_set("ASIA/KUALA_LUMPUR");

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            // if ($this->session->userdata('token_generate') === $this->input->post('token')) {
            $cek =  $this->M_login->cek_user('tb_user', $username);
            if ($cek->num_rows() != 1) {
                $this->session->set_flashdata('msg', 'Username Dan Password Salah');
                redirect(site_url());
            } else {

                $isi = $cek->row();
                if (password_verify($password, $isi->password)) {
                    $data_session = array(
                        'id_user' => $isi->id_user,
                        'username' => $username,
                        'nama_lengkap' => $isi->nama_lengkap,
                        'status' => 'login',
                        'level' => $isi->level,
                        // 'nama_file' => $isi->nama_file,
                        'last_login' => $isi->last_login
                    );

                    $this->session->set_userdata($data_session);

                    $this->M_login->edit_user(['username' => $username], ['last_login' => date('Y-m-d H:i:s')]);

                    if ($isi->level == 0) {
                        redirect(site_url('admin'));
                    } else {
                        redirect(site_url('user'));
                    }
                } else {
                    $this->session->set_flashdata('msg', 'Username Dan Password Salah');
                    redirect(site_url());
                }
            }
            // } else {
            // 	redirect(site_url());
            // }
        }
    }
}
