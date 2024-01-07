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
        $data['dtBrg'] = $this->M_data->numrows('tb_barang');
        $data['dtSpl'] = $this->M_data->numrows('tb_supplier');
        $data['dtPlg'] = $this->M_data->numrows('tb_pelanggan');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Home';
        $this->load->view('admin/index', $data);
    }

    ####################################
    //* Users
    ####################################
    public function data_users()
    {
        $data['list_data'] = $this->M_data->select('tb_user');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Users';
        $this->load->view('admin/d_users/tbl_users', $data);
    }

    public function tambah_users()
    {
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Users';
        $this->load->view('admin/d_users/add_user', $data);
    }

    public function proses_tambahuser()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'Level User', 'required');

        if ($this->form_validation->run() == true) {

            $nama_lengkap     = $this->input->post('nama_lengkap', true);
            $username     = $this->input->post('username', true);
            $password     = $this->input->post('password', true);
            $level         = $this->input->post('level', true);

            $data = array(
                'nama_lengkap'    => $nama_lengkap,
                'username'    => $username,
                'password'     => $this->hash_password($password),
                'level'         => $level,
                // 'nama_file' => 'nopic.png'

            );
            $this->M_data->insert('tb_user', $data);
            $this->session->set_flashdata('msg_sukses', 'User Berhasil Disimpan');
            redirect(site_url('admin/data_users'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Users';
            $this->load->view('admin/d_users/add_user', $data);
        }
    }

    public function update_user()
    {
        $id_user = $this->uri->segment(3);
        $where = array('id_user' => $id_user);
        $data['list_data'] = $this->M_data->get_data('tb_user', $where);
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Edit User';
        $this->load->view('admin/d_users/edit_user', $data);
    }

    public function proses_edituser()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('level', 'Level User', 'required');

        if ($this->form_validation->run() == true) {

            $id_user    = $this->input->post('id_user', true);
            $nama_lengkap     = $this->input->post('nama_lengkap', true);
            $username     = $this->input->post('username', true);
            $level         = $this->input->post('level', true);

            $where = array('id_user' => $id_user);
            $data = array(
                'nama_lengkap'    => $nama_lengkap,
                'username'    => $username,
                'level'         => $level,
                // 'nama_file' => 'nopic.png'

            );
            $this->M_data->update('tb_user', $data, $where);
            $this->session->set_flashdata('msg_sukses', 'User Berhasil Diubah');
            redirect(site_url('admin/data_users'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Edit User';
            $this->load->view('admin/d_users/edit_user', $data);
        }
    }

    public function hapus_user()
    {
        $id_user = $this->uri->segment(3);
        $where = array('id_user' => $id_user);
        $this->M_data->delete('tb_user', $where);
        $this->session->set_flashdata('msg_sukses', 'Data Berhasil Dihapus');
        redirect(site_url('admin/data_users'));
    }
    ####################################
    //* End Users
    ####################################
    ####################################
    //* Profile
    ####################################
    public function profile()
    {
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Profile';
        $this->load->view('admin/d_users/profile', $data);
    }

    public function proses_newpassword()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required');
        $this->form_validation->set_rules('confirm_new_password', 'Konfirmasi Password Baru', 'required|matches[new_password]');

        if ($this->form_validation->run() == true) {

            $username = $this->input->post('username');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $new_password = $this->input->post('new_password');

            $data = array(
                'nama_lengkap' => $nama_lengkap,
                'password' => $this->hash_password($new_password)
            );
            $where = array(
                'id_user' => $this->session->userdata('id_user')
            );
            $this->M_data->update_password('tb_user', $where, $data);
            $this->session->set_flashdata('msg_sukses', 'Password Berhasil Diganti, Silahkan Logout dan Login Kembali');
            redirect(site_url('admin/profile'));
        } else {
            $data['avatar'] = $this->M_data->get_avatar('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Profile';
            $this->load->view('admin/users/profile', $data);
        }
    }

    ####################################
    //* End Profile
    ####################################
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
            $auto_id_brg = "BRG-" . str_pad($id, 1, "0", STR_PAD_LEFT);
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
            $id_barang = $this->input->post('id_barang', TRUE);
            $nama_barang = $this->input->post('nama_barang', TRUE);
            $unit = $this->input->post('unit', TRUE);
            $harga_beli = $this->input->post('harga_beli', TRUE);
            $harga_jual = $this->input->post('harga_jual', TRUE);
            $diskon = $this->input->post('diskon', TRUE);
            // $status           = 1;

            $data = array(
                'id_barang' => $id_barang,
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
            $id_barang = $this->input->post('id_barang', TRUE);
            $nama_barang = $this->input->post('nama_barang', TRUE);
            $unit = $this->input->post('unit', TRUE);
            $harga_beli = $this->input->post('harga_beli', TRUE);
            $harga_jual = $this->input->post('harga_jual', TRUE);
            $diskon = $this->input->post('diskon', TRUE);
            // $status           = 1;
            $where = array('id_barang' => $id_barang);
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

    ####################################
    //* End Data Barang
    ####################################
    ####################################
    //* Data Supplier
    ####################################
    public function data_supplier()
    {
        $data['list_data'] = $this->M_data->select('tb_supplier');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Data Supplier';
        $this->load->view('admin/d_supplier/tbl_supplier', $data);
    }

    public function tambah_supplier()
    {
        $id_spl = $this->M_data->get_id_supplier('tb_supplier');
        foreach ($id_spl as $idspl) {
            // if ($idbrg) {
            $isi = substr($idspl->id_supplier, 4);
            $id = (int) $isi;
            $id = $id + 1;
            $auto_id_spl = "SPL-" . str_pad($id, 1, "0", STR_PAD_LEFT);
            // }
        }
        $data['kd_spl'] = $auto_id_spl;
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Tambah Data Supplier';
        $this->load->view('admin/d_supplier/add_supplier', $data);
    }

    public function proses_tambahsupplier()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('kota_supplier', 'Kota', 'trim|required');
        $this->form_validation->set_rules('email_supplier', 'Email', 'trim|required');
        $this->form_validation->set_rules('kontak_supplier', 'Kontak', 'trim|required|max_length[13]');

        if ($this->form_validation->run() === TRUE) {
            $id_supplier = $this->input->post('id_supplier', TRUE);
            $nama_supplier = $this->input->post('nama_supplier', TRUE);
            $alamat_supplier = $this->input->post('alamat_supplier', TRUE);
            $kota_supplier = $this->input->post('kota_supplier', TRUE);
            $email_supplier = $this->input->post('email_supplier', TRUE);
            $kontak_supplier = $this->input->post('kontak_supplier', TRUE);
            // $status           = 1;

            $data = array(
                'id_supplier' => $id_supplier,
                'nama_supplier' => $nama_supplier,
                'alamat_supplier' => $alamat_supplier,
                'kota_supplier' => $kota_supplier,
                'email_supplier' => $email_supplier,
                'kontak_supplier' => $kontak_supplier,
            );
            $this->M_data->insert('tb_supplier', $data);
            $this->session->set_flashdata('msg_sukses', 'Data Berhasil Disimpan');
            redirect(site_url('admin/data_supplier'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Tambah Data Supplier';
            $this->load->view('admin/d_supplier/add_supplier', $data);
        }
    }

    public function update_supplier()
    {
        $uri = $this->uri->segment(3);
        $where = array('id_supplier' => $uri);
        $data['edit_data'] = $this->M_data->get_data('tb_supplier', $where);
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Edit Data Supplier';
        $this->load->view('admin/d_supplier/edit_supplier', $data);
    }

    public function proses_updatesupplier()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('kota_supplier', 'Kota', 'trim|required');
        $this->form_validation->set_rules('email_supplier', 'Email', 'trim|required');
        $this->form_validation->set_rules('kontak_supplier', 'Kontak', 'trim|required|max_length[13]');

        if ($this->form_validation->run() === TRUE) {
            $id_supplier = $this->input->post('id_supplier', TRUE);
            $nama_supplier = $this->input->post('nama_supplier', TRUE);
            $alamat_supplier = $this->input->post('alamat_supplier', TRUE);
            $kota_supplier = $this->input->post('kota_supplier', TRUE);
            $email_supplier = $this->input->post('email_supplier', TRUE);
            $kontak_supplier = $this->input->post('kontak_supplier', TRUE);
            // $status           = 1;
            $where = array('id_supplier' => $id_supplier);
            $data = array(
                // 'id_supplier' => $id_supplier,
                'nama_supplier' => $nama_supplier,
                'alamat_supplier' => $alamat_supplier,
                'kota_supplier' => $kota_supplier,
                'email_supplier' => $email_supplier,
                'kontak_supplier' => $kontak_supplier,
            );
            $this->M_data->update('tb_supplier', $data, $where);
            $this->session->set_flashdata('msg_sukses', 'Data Berhasil Diubah');
            redirect(site_url('admin/data_supplier'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Edit Data Supplier';
            $this->load->view('admin/d_supplier/edit_supplier', $data);
        }
    }

    public function hapus_supplier()
    {
        $uri = $this->uri->segment(3);
        $where = array('id_supplier' => $uri);
        $this->M_data->delete('tb_supplier', $where);
        $this->session->set_flashdata('msg_sukses', 'Data Berhasil Dihapus');
        redirect(site_url('admin/data_supplier'));
    }
    ####################################
    //* End Data Supplier 
    ####################################
    ####################################
    //* Data Pelanggan
    ####################################

    public function data_pelanggan()
    {
        $data['list_data'] = $this->M_data->select('tb_pelanggan');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Data Pelanggan';
        $this->load->view('admin/d_pelanggan/tbl_pelanggan', $data);
    }

    public function tambah_pelanggan()
    {
        $id_plg = $this->M_data->get_id_pelanggan('tb_pelanggan');
        foreach ($id_plg as $idplg) {
            // if ($idplg) {
            $isi = substr($idplg->id_pelanggan, 4);
            $id = (int) $isi;
            $id = $id + 1;
            $auto_id_plg = "PLG-" . str_pad($id, 1, "0", STR_PAD_LEFT);
            // }
        }
        $data['kd_plg'] = $auto_id_plg;
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Tambah Data Pelanggan';
        $this->load->view('admin/d_pelanggan/add_pelanggan', $data);
    }

    public function proses_tambahpelanggan()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Nama Pelanggan', 'trim|required');
        $this->form_validation->set_rules('kota_pelanggan', 'Kota', 'trim|required');
        $this->form_validation->set_rules('email_pelanggan', 'Email', 'trim|required');
        $this->form_validation->set_rules('kontak_pelanggan', 'Kontak', 'trim|required|max_length[13]');

        if ($this->form_validation->run() === TRUE) {
            $id_pelanggan = $this->input->post('id_pelanggan', TRUE);
            $nama_pelanggan = $this->input->post('nama_pelanggan', TRUE);
            $alamat_pelanggan = $this->input->post('alamat_pelanggan', TRUE);
            $kota_pelanggan = $this->input->post('kota_pelanggan', TRUE);
            $email_pelanggan = $this->input->post('email_pelanggan', TRUE);
            $kontak_pelanggan = $this->input->post('kontak_pelanggan', TRUE);
            // $status           = 1;

            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $nama_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan,
                'kota_pelanggan' => $kota_pelanggan,
                'email_pelanggan' => $email_pelanggan,
                'kontak_pelanggan' => $kontak_pelanggan,
            );
            $this->M_data->insert('tb_pelanggan', $data);
            $this->session->set_flashdata('msg_sukses', 'Data Berhasil Disimpan');
            redirect(site_url('admin/data_pelanggan'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Tambah Data Pelanggan';
            $this->load->view('admin/d_pelanggan/add_pelanggan', $data);
        }
    }

    public function update_pelanggan()
    {
        $uri = $this->uri->segment(3);
        $where = array('id_pelanggan' => $uri);
        $data['edit_data'] = $this->M_data->get_data('tb_pelanggan', $where);
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Edit Data Pelanggan';
        $this->load->view('admin/d_pelanggan/edit_pelanggan', $data);
    }

    public function proses_updatepelanggan()
    {

        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Nama Pelanggan', 'trim|required');
        $this->form_validation->set_rules('kota_pelanggan', 'Kota', 'trim|required');
        $this->form_validation->set_rules('email_pelanggan', 'Email', 'trim|required');
        $this->form_validation->set_rules('kontak_pelanggan', 'Kontak', 'trim|required|max_length[13]');

        if ($this->form_validation->run() === TRUE) {
            $id_pelanggan = $this->input->post('id_pelanggan', TRUE);
            $nama_pelanggan = $this->input->post('nama_pelanggan', TRUE);
            $alamat_pelanggan = $this->input->post('alamat_pelanggan', TRUE);
            $kota_pelanggan = $this->input->post('kota_pelanggan', TRUE);
            $email_pelanggan = $this->input->post('email_pelanggan', TRUE);
            $kontak_pelanggan = $this->input->post('kontak_pelanggan', TRUE);
            // $status           = 1;

            $where = array('id_pelanggan' => $id_pelanggan);
            $data = array(
                // 'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $nama_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan,
                'kota_pelanggan' => $kota_pelanggan,
                'email_pelanggan' => $email_pelanggan,
                'kontak_pelanggan' => $kontak_pelanggan,
            );
            $this->M_data->update('tb_pelanggan', $data, $where);
            $this->session->set_flashdata('msg_sukses', 'Data Berhasil Diubah');
            redirect(site_url('admin/data_pelanggan'));
        } else {
            $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
            $data['title'] = 'Edit Data Pelanggan';
            $this->load->view('admin/d_pelanggan/edit_pelanggan', $data);
        }
    }

    public function hapus_pelanggan()
    {
        $uri = $this->uri->segment(3);
        $where = array('id_pelanggan' => $uri);
        $this->M_data->delete('tb_pelanggan', $where);
        $this->session->set_flashdata('msg_sukses', 'Data Berhasil Dihapus');
        redirect(site_url('admin/data_pelanggan'));
    }
    ####################################
    //* End Data Pelanggan
    ####################################
    ####################################
    //* Data Barang Masuk
    ####################################
    public function barang_masuk()
    {
        $data['list_data'] = $this->M_data->sel_brg_msk('tb_brg_msk');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Data Barang Masuk';
        $this->load->view('admin/d_brg_msk/tbl_brg_msk', $data);
    }

    public function tambah_barang_masuk()
    {
        $id_bm = $this->M_data->get_id_brg_msk('tb_barang_masuk');
        foreach ($id_bm as $idbm) {
            // if ($idbrg) {
            $isi = substr($idbm->id_brg_msk, 3);
            $id = (int) $isi;
            $id = $id + 1;
            $auto_id_bm = "BM-" . str_pad($id, 1, "0", STR_PAD_LEFT);
            // }
        }
        $data['id_BM'] = $auto_id_bm;

        $data['brg_msk'] = $this->M_data->select('tb_barang');
        $data['spl'] = $this->M_data->select('tb_supplier');
        $data['list_data'] = $this->M_data->sel_brg_msk('tb_det_brg_msk');
        $data['user'] = $this->M_data->get_user('tb_user', $this->session->userdata('name'));
        $data['title'] = 'Tambah Data Barang Masuk';
        $this->load->view('admin/d_brg_msk/add_brg_msk', $data);
    }

    public function add_brg_msk()
    {
        $id_barang = $this->input->post('id_barang', TRUE);
        $id_supplier = $this->input->post('id_supplier', TRUE);
        $qty_masuk = $this->input->post('qty_masuk', TRUE);

        $data = array(
            'id_barang' => $id_barang,
            'id_supplier' => $id_supplier,
            'qty_masuk' => $qty_masuk
        );
    }
    ####################################
    //* End Data Barang Masuk
    ####################################
}
