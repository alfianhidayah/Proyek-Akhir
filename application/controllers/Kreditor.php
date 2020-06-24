<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kreditor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kreditor_model', 'kreditor');
        $this->load->model('Barang_model', 'barang');
        //helper
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kreditor';
        $data['title_page'] = 'Kreditor Manager';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //ambil model
        $data['kreditor'] = $this->kreditor->getAllKreditor();
        //ambil desa
        $data['desa'] = $this->kreditor->getNamaDesa();
        //model untuk data id terakhir agar otomatis bertambah
        $data['get_id_kreditor'] = $this->kreditor->getIdKreditor();


        //Rules
        $this->form_validation->set_rules('nama_kreditor', 'Nama Kreditor', 'required');
        $this->form_validation->set_rules('pekerjaan_kreditor', 'Pekerjaan Kreditor', 'required');
        $this->form_validation->set_rules('desa_id', 'Desa', 'required');
        $this->form_validation->set_rules('alamat_kreditor', 'Alamat Kreditor', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP Kreditor', 'required');
        $this->form_validation->set_rules('nomor_ktp', 'Nomor KTP Kreditor', 'required');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => "password harus sama !",
            'min_length' => "password terlalu pendek, minimal 5 karakter"
        ]); //rules password, min_length => min digit password , matches => harus sama dengan name elemen lain
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kreditor/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->kreditor->tambahDataKreditor();
            $this->session->set_flashdata('messages', 'Ditambahkan !');
            redirect('kreditor'); //pindah ke halaman login
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Kreditor';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['kreditor'] = $this->kreditor->getKreditorById($id);
        //model barang
        $data['barang'] = $this->barang->getAllBarangById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kreditor/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->kreditor->hapusDataKreditor($id);
        $this->session->set_flashdata('messages', 'Dihapus !');
        redirect('kreditor'); //pindah ke halaman login
    }

    //method ajax
    public function getUbah()
    {
        //$_POST itu MENANGKAP BUKAN NGIRIM
        echo json_encode($this->kreditor->getKreditorById($_POST['id']));
    }

    public function ubah()
    {
        $this->kreditor->ubahDataKreditor();
        $this->session->set_flashdata('messages', 'Diubah !');
        redirect('kreditor'); //pindah ke halaman login
    }
}
