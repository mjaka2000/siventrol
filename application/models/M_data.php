<?php

class M_data extends CI_Model
{
    ####################################
    //* CRUD
    ####################################

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function select($tabel)
    {
        $query = $this->db->get($tabel);
        return $query->result();
    }

    public function update($tabel, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    ####################################
    //! Batas Query User (Jangan diubah)
    ####################################

    public function get_user($tabel, $username) // Query get avatar User
    {
        $query = $this->db->select()
            ->from($tabel)
            ->where('username', $username)
            ->get();
        return $query->result();
    }

    public function update_avatar($where, $data) // Query update Avatar User
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tb_user');
    }

    public function update_password($tabel, $where, $data) // Update password user
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    ####################################
    //! End Batas Query User (Jangan diubah)
    ####################################
    ####################################
    //! Old query but still use
    ####################################

    public function get_data($tabel, $where)
    {
        $query = $this->db->select()
            ->from($tabel)
            ->where($where)
            ->get();
        return $query->result();
    }
    ####################################
    //* Data Barang
    ####################################
    public function get_id_barang($tabel)
    {
        $query = $this->db->select_max('id_barang')
            ->from($tabel)
            ->get();
        return $query->result();
    }
    ####################################
    //* End Data Barang
    ####################################
}
