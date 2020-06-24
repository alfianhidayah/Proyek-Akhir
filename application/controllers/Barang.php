<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Kreditor_model', 'kreditor');
        //helper
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Barang';
        $data['title_page'] = 'Barang Manager';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //ambil model
        $data['barang'] = $this->barang->getAllBarang();
        //model kreditor
        $data['kreditor'] = $this->kreditor->getAllKreditor();
        //model untuk data id terakhir agar otomatis bertambah
        $data['get_id_barang'] = $this->barang->getIdBarang();
        //ambil jenis barang
        $data['jenis_barang'] = $this->barang->getJenisBarang();
        //ambil data tanggal masuk
        $data['tanggal_masuk'] = $this->barang->getTanggalMasuk();
        //ambil data jenis angsuran
        $data['jenis_angsuran'] = $this->barang->getJenisAngsuran();

        //Rules
        $this->form_validation->set_rules('id_kreditor', 'Nama & ID Kreditor', 'required');
        $this->form_validation->set_rules('id_barang', 'Nama & ID Kreditor', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('barang_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('uang_muka', 'Uang Muka', 'required');
        $this->form_validation->set_rules('kredit_total', 'Kredit Total', 'required');
        $this->form_validation->set_rules('angsuran_id', 'Jenis Angsuran', 'required');
        $this->form_validation->set_rules('nominal_angsuran', 'Nominal Angsuran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->barang->tambahDataBarang();
            $this->session->set_flashdata('messages', 'Ditambah !');
            redirect('barang'); //pindah ke halaman login
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Barang';
        $data['title_page'] = 'Barang Manager';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //ambil model
        $data['barang'] = $this->barang->getAllBarangById($id);
        $data['barang_detail'] = $this->barang->getBarangById($id);

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    //method ajax
    public function getUbah()
    {
        //$_POST itu MENANGKAP BUKAN NGIRIM
        echo json_encode($this->barang->getBarangById($_POST['id']));
    }

    public function ubah()
    {
        $this->barang->ubahDataBarang();
        $this->session->set_flashdata('messages', 'DiUbah !');
        redirect('barang'); //pindah ke halaman login
    }

    public function hapus($id)
    {
        $this->barang->hapusDataBarang($id);
        $this->session->set_flashdata('messages', 'Dihapus ! ');
        redirect('barang'); //pindah ke halaman login
    }
}
