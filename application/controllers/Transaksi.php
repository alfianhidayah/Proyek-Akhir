<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //helper
        is_logged_in();

        //load model
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['title_page'] = 'Transaksi Manager';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //ambil model
        $data['transaksi'] = $this->transaksi->getAllDataTransaksi();

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
