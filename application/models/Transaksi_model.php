<?php

class Transaksi_model extends CI_Model
{
    public function getAllDataTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('kreditor', 'kreditor.id_kreditor = transaksi.id_kreditor');
        $this->db->join('barang', 'barang.id_barang = transaksi.id_barang');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getAllDataTransaksi1()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('kreditor', 'kreditor.id_kreditor = transaksi.id_kreditor');
        $this->db->join('barang', 'barang.id_barang = transaksi.id_barang');
        $query = $this->db->get()->result();
        return $query;
    }
}
