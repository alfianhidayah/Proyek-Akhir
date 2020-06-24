<?php

class Dashboard_model extends CI_Model
{
    public function getDataHarian()
    {
        $query = " SELECT date(tanggal_transaksi) as tanggal_transaksi, sum(nominal_transaksi) as total_transaksi 
        FROM transaksi 
        WHERE tanggal_transaksi = date(NOW())
        GROUP BY tanggal_transaksi";
        return $this->db->query($query)->row_array();
    }

    public function getDataMingguan()
    {
        $query = " SELECT YEARWEEK(tanggal_transaksi) as transaksi_mingguan, sum(nominal_transaksi) as total_transaksi
                    FROM transaksi
                    WHERE YEARWEEK(tanggal_transaksi) = YEARWEEK(NOW())
                    GROUP BY YEARWEEK(tanggal_transaksi)";
        return $this->db->query($query)->row_array();
    }

    public function getDataBulanan()
    {
        $query = " SELECT MONTH(tanggal_transaksi) as transaksi_mingguan, sum(nominal_transaksi) as total_transaksi
                    FROM transaksi
                    WHERE MONTH(tanggal_transaksi) = MONTH(NOW())
                    GROUP BY MONTH(tanggal_transaksi)";
        return $this->db->query($query)->row_array();
    }

    public function getDataTahunan()
    {
        $query = " SELECT YEAR(tanggal_transaksi) as transaksi_mingguan, sum(nominal_transaksi) as total_transaksi
                    FROM transaksi
                    WHERE YEAR(tanggal_transaksi) = YEAR(NOW())
                    GROUP BY YEAR(tanggal_transaksi)";
        return $this->db->query($query)->row_array();
    }
}
