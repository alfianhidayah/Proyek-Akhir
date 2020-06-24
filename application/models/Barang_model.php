<?php

class Barang_model extends CI_Model
{
    public function getAllBarang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kreditor', 'kreditor.id_kreditor = barang.id_kreditor');
        $this->db->join('jenis_barang', 'jenis_barang.id = barang.barang_id');
        $this->db->join('jenis_status', 'jenis_status.id = barang.status_id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllBarang1()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kreditor', 'kreditor.id_kreditor = barang.id_kreditor');
        $this->db->join('jenis_barang', 'jenis_barang.id = barang.barang_id');
        $this->db->join('jenis_status', 'jenis_status.id = barang.status_id');
        $this->db->join('jenis_angsuran', 'jenis_angsuran.id = barang.angsuran_id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getJenisAngsuran()
    {
        return $this->db->get('jenis_angsuran')->result_array();
    }

    public function getTanggalMasuk()
    {
        $datestring = '%Y-%m-%d';
        $time = time();
        return mdate($datestring, $time);
    }

    public function getJenisBarang()
    {
        return $this->db->get('jenis_barang')->result_array();
    }

    public function getIdBarang()
    {
        $this->db->select('RIGHT(barang.id_barang,4) as idbarang', FALSE);
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->idbarang) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "BRG" . $kodemax;

        return $kodejadi;
    }

    public function tambahDataBarang()
    {
        $kredit_total = $this->input->post('kredit_total');
        $uang_muka = $this->input->post('uang_muka');
        $sisa_kredit = $kredit_total - $uang_muka;
        $data = [
            "id_kreditor" => $this->input->post('id_kreditor', true),
            "id_barang" => $this->input->post('id_barang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "barang_id" => $this->input->post('barang_id', true),
            "harga_barang" => $this->input->post('harga_barang', true),
            "uang_muka" => $this->input->post('uang_muka', true),
            "kredit_total" => $this->input->post('kredit_total', true),
            "tanggal_masuk" => $this->input->post('tanggal_masuk', true),
            "id_kreditor" => $this->input->post('id_kreditor', true),
            "angsuran_id" => $this->input->post('angsuran_id', true),
            "nominal_angsuran" => $this->input->post('nominal_angsuran', true),
            "kredit_masuk" => 0,
            "sisa_kredit" => $sisa_kredit,
            "status_id" => 1
        ];
        $this->db->insert('barang', $data);
    }

    public function getAllBarangById($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kreditor', 'kreditor.id_kreditor = barang.id_kreditor');
        $this->db->join('jenis_barang', 'jenis_barang.id = barang.barang_id');
        $this->db->join('jenis_status', 'jenis_status.id = barang.status_id');
        $this->db->join('jenis_angsuran', 'jenis_angsuran.id = barang.angsuran_id');
        $this->db->where('kreditor.id_kreditor', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function getBarangById($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kreditor', 'kreditor.id_kreditor = barang.id_kreditor');
        $this->db->join('jenis_barang', 'jenis_barang.id = barang.barang_id');
        $this->db->join('jenis_status', 'jenis_status.id = barang.status_id');
        $this->db->join('jenis_angsuran', 'jenis_angsuran.id = barang.angsuran_id');
        $this->db->where('barang.id_barang', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function ubahDataBarang()
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "barang_id" => $this->input->post('barang_id', true),
            "harga_barang" => $this->input->post('harga_barang', true),
            "uang_muka" => $this->input->post('uang_muka', true),
            "kredit_total" => $this->input->post('kredit_total', true),
            "angsuran_id" => $this->input->post('angsuran_id', true),
            "nominal_angsuran" => $this->input->post('nominal_angsuran', true),
            // "date_created" => time()
            //kalo dibutuhin tanggal dibuat ya fian :D
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('barang', $data);
    }

    public function hapusDataBarang($id)
    {
        $this->db->delete('barang', ['id_barang' => $id]);
    }
}
