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

    public function numrows($tabel)
    {
        $query = $this->db->select()
            ->from($tabel)
            ->get();
        return $query->num_rows();
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
    //* Data Supplier
    ####################################
    public function get_id_supplier($tabel)
    {
        $query = $this->db->select_max('id_supplier')
            ->from($tabel)
            ->get();
        return $query->result();
    }

    ####################################
    //* Data Pelanggan
    ####################################
    public function get_id_pelanggan($tabel)
    {
        $query = $this->db->select_max('id_pelanggan')
            ->from($tabel)
            ->get();
        return $query->result();
    }

    ####################################
    //* Data Barang Masuk
    ####################################
    public function get_id_brg_msk($tabel)
    {
        $query = $this->db->select_max('id_brg_msk')
            ->from($tabel)
            ->get();
        return $query->result();
    }

    public function sel_brg_msk($tabel)
    {
        $query = $this->db->select()
            ->from($tabel)
            ->join('tb_barang', 'tb_barang.id_barang = ' . $tabel . '.id_barang')
            // ->join('tb_supplier', 'tb_supplier.id_supplier = ' . $tabel . '.id_supplier')
            ->get();
        return $query->result();
    }
}
