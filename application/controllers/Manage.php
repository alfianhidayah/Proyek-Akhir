<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //helper
        is_logged_in();

        //load model
        $this->load->model('Manage_model', 'manage');
    }

    //tambah Desa
    public function index()
    {
        $data['title'] = 'Tambah Desa';
        $data['title_page'] = 'Desa Manager';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //model
        $data['desa'] = $this->manage->getDataDesa();

        //Rules
        $this->form_validation->set_rules('desa', 'Nama Baru Desa', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manage/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->manage->tambahDataDesa();
            $this->session->set_flashdata('messages', 'Ditambah');
            redirect('manage');
        }
    }

    //UbahDesa
    public function ubahDesa()
    {
        $this->manage->ubahDesa();
        $this->session->set_flashdata('messages', 'Diubah !');
        redirect('manage'); //pindah ke halaman login
    }
    //ambil data desa
    //method ajax
    public function getUbahDesa()
    {
        //$_POST itu MENANGKAP BUKAN NGIRIM
        echo json_encode($this->manage->getDesaById($_POST['id']));
    }




    //=========================TAMBAH BARANG==============
    //tambah BARANG
    public function tipeBarang()
    {
        $data['title'] = 'Tambah Jenis Barang';
        $data['title_page'] = 'Jenis Barang Manager';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //model
        $data['jenis_barang'] = $this->manage->getDataJenisBarang();

        //Rules
        $this->form_validation->set_rules('jenis_barang', 'Nama Jenis Barang Baru', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manage/jenis_barang', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->manage->tambahDataJenisBarang();
            $this->session->set_flashdata('messages', 'Ditambahkan !');
            redirect('manage/tipebarang');
        }
    }

    //UbahBarang
    public function ubahBarang()
    {
        $this->manage->ubahBarang();
        $this->session->set_flashdata('messages', 'Diubah !');
        redirect('manage/tipebarang'); //pindah ke halaman login
    }
    //ambil data Barang
    //method ajax
    public function getUbahBarang()
    {
        //$_POST itu MENANGKAP BUKAN NGIRIM
        echo json_encode($this->manage->getBarangById($_POST['id']));
    }
}
