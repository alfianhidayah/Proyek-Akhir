<?php

class Kreditor_model extends CI_Model
{
    public function getAllKreditor()
    {
        $query = "SELECT `kreditor`. *, `desa`. *
                    FROM `kreditor` JOIN `desa`
                    ON   `kreditor`.`desa_id` = `desa`.`id` 
        ";

        return $this->db->query($query)->result_array();
    }

    //untuk grafik
    public function getAllKreditor1()
    {
        $query = "SELECT `kreditor`. *, `desa`. *
                    FROM `kreditor` JOIN `desa`
                    ON   `kreditor`.`desa_id` = `desa`.`id` 
        ";

        return $this->db->query($query)->result();
    }

    public function getNamaDesa()
    {
        return $this->db->get('desa')->result_array();
    }

    public function getKreditorById($id)
    {
        $this->db->select('*');
        $this->db->from('kreditor');
        $this->db->join('desa', 'desa.id = kreditor.desa_id');
        $this->db->where('kreditor.id_kreditor', $id);
        $query = $this->db->get()->row_array();
        return $query;
        // return $this->db->get_where('kreditor', ['id_kreditor' => $id])->row_array();
    }

    public function getIdKreditor()
    {
        $this->db->select('RIGHT(kreditor.id_kreditor,3) as idkreditor', FALSE);
        $this->db->order_by('id_kreditor', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('kreditor');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->idkreditor) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "KDR" . $kodemax;

        return $kodejadi;
    }

    public function tambahDataKreditor()
    {
        $data = [
            "id_kreditor" => $this->input->post('id_kreditor', true),
            "nama_kreditor" => $this->input->post('nama_kreditor', true),
            "desa_id" => $this->input->post('desa_id', true),
            "pekerjaan" => $this->input->post('pekerjaan_kreditor', true),
            "alamat" => $this->input->post('alamat_kreditor', true),
            "nomor_hp" => $this->input->post('nomor_hp', true),
            "nomor_ktp" => $this->input->post('nomor_ktp', true),
            "password" => $this->input->post('password1', true)
            // "date_created" => time()
            //kalo dibutuhin tanggal dibuat ya fian :D
        ];

        $this->db->insert('kreditor', $data);
    }

    public function hapusDataKreditor($id)
    {
        $this->db->delete('kreditor', ['id_kreditor' => $id]);
    }

    public function ubahDataKreditor()
    {
        $data = [
            "id_kreditor" => $this->input->post('id_kreditor', true),
            "nama_kreditor" => $this->input->post('nama_kreditor', true),
            "desa_id" => $this->input->post('desa_id', true),
            "pekerjaan" => $this->input->post('pekerjaan_kreditor', true),
            "alamat" => $this->input->post('alamat_kreditor', true),
            "nomor_hp" => $this->input->post('nomor_hp', true),
            "nomor_ktp" => $this->input->post('nomor_ktp', true),
            // "date_created" => time()
            //kalo dibutuhin tanggal dibuat ya fian :D
        ];

        $this->db->where('id_kreditor', $this->input->post('id_kreditor'));
        $this->db->update('kreditor', $data);
    }
}
