<?php

class Manage_model extends CI_Model
{
    public function getDataDesa()
    {
        return $this->db->get('desa')->result_array();
    }

    public function getDesaById($id)
    {
        $this->db->select('*');
        $this->db->from('desa');
        $this->db->where('id', $id);
        $query = $this->db->get()->row_array();
        return $query;
        // return $this->db->get_where('kreditor', ['id_kreditor' => $id])->row_array();
    }

    public function ubahDesa()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "nama_desa" => $this->input->post('desa', true)
            // "date_created" => time()
            //kalo dibutuhin tanggal dibuat ya fian :D
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('desa', $data);
    }

    public function tambahDataDesa()
    {
        return $this->db->insert('desa', ['nama_desa' => $this->input->post('desa')]);
    }



    // =================JENIS BARANG================
    public function getBarangById($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_barang');
        $this->db->where('id', $id);
        $query = $this->db->get()->row_array();
        return $query;
        // return $this->db->get_where('kreditor', ['id_kreditor' => $id])->row_array();
    }

    public function ubahBarang()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "tipe_barang" => $this->input->post('jenis_barang', true)
            // "date_created" => time()
            //kalo dibutuhin tanggal dibuat ya fian :D
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jenis_barang', $data);
    }


    public function getDataJenisBarang()
    {
        return $this->db->get('jenis_barang')->result_array();
    }
    public function tambahDataJenisBarang()
    {
        return $this->db->insert('jenis_barang', ['tipe_barang' => $this->input->post('jenis_barang')]);
    }
}
