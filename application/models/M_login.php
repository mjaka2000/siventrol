<?php

class M_login extends CI_Model
{

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    // public function cek_username($tabel, $username)
    // {
    //     return $this->db->select('username')
    //         ->from($tabel)
    //         ->where('username', $username)
    //         ->get()->result();
    // }

    public function cek_user($tabel, $username)
    {
        return  $this->db->select('*')
            ->from($tabel)
            ->where('username', $username)
            ->get();
    }

    // function cek_login($table, $where)
    // {
    //     return $this->db->get_where($table, $where);
    // }

    // function cek_uname($table, $where)
    // {
    //     return $this->db->where($table, $where);
    // }

    function edit_user($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('tb_user', $data);
    }


    ####################################
    //* New Query
    ####################################
    // public function get_id_user($tabel, $nama)
    // {
    //     $query = $this->db->select('id_user')
    //         ->from($tabel)
    //         ->where('nama', $nama)
    //         ->get()->row();
    //     return $query->result();
    // }
}
