<?php
defined('BASEPATH') or exit('No direct script access allowed');

//load Spout Library
require_once APPPATH . '/third_party/spout/src/Spout/Autoloader/autoload.php';
//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //helper
        is_logged_in();
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->model('Kreditor_model', 'kreditor');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        //ambil data user yang sudah sesuai email yang dikirim session login
        //lalu ambil data user SEBARIS ARRAY
        $data['user'] = $this->db->get_where('user_admin', ['username' => $this->session->userdata('username')])->row_array();

        //ambil model
        $data['harian'] = $this->dashboard->getDataHarian();
        $data['mingguan'] = $this->dashboard->getDataMingguan();
        $data['bulanan'] = $this->dashboard->getDataBulanan();
        $data['tahunan'] = $this->dashboard->getDataTahunan();

        // $this->load->view('templates/header', $data);
        $this->load->view('templates/header_dashboard', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function export()
    {
        $data['kreditor'] = $this->kreditor->getAllKreditor1();
        $data['barang'] = $this->barang->getAllBarang1();
        $data['transaksi'] = $this->transaksi->getAllDataTransaksi1();

        // HEADER EXCEL
        $header_kreditor = ['Nomor', 'ID Kreditor', 'Nama Lengkap', 'Alamat Desa', 'Alamat Lengkap', 'Pekerjaan', 'Nomor HP', 'Nomor KTP'];
        $header_barang = ['Nomor', 'ID Barang', 'Nama Barang', 'Jenis Barang', 'Tanggal Masuk', 'Harga Barang', 'Uang Muka', 'Kredit Total', 'Jenis Angsuran', 'Nominal Angsuran', 'Kredit Masuk', 'Sisa Kredit', 'Status Kredit', 'Pemilik Barang'];
        $header_transaksi = ['Nomor', 'ID Kreditor', 'Nama Kreditor', 'ID Barang', 'Nama Barang', 'ID Transaksi', 'Tanggal Transaksi', 'Nominal Transaksi'];

        //DATA EXCEL
        //1. Data Kreditor
        $data_kreditor = array();
        $no = 1;

        foreach ($data['kreditor'] as $kdr) {
            $kreditor = array(
                $no++,
                $kdr->id_kreditor,
                $kdr->nama_kreditor,
                $kdr->nama_desa,
                $kdr->alamat,
                $kdr->pekerjaan,
                $kdr->nomor_hp,
                $kdr->nomor_ktp
            );
            array_push($data_kreditor, $kreditor);
        }


        //2. Data Barang
        $data_barang = array();
        $no = 1;

        // $header_barang = ['ID Barang', 'Nama Barang','Jenis Barang', 'Tanggal Masuk', 'Harga Barang', 'Uang Muka', 'Kredit Total', 'Jenis Angsuran', 'Nominal Angsuran', 'Kredit Masuk', 'Sisa Kredit', 'Status Kredit', 'Pemilik Barang'];
        foreach ($data['barang'] as $brg) {
            $brg = array(
                $no++,
                $brg->id_barang,
                $brg->nama_barang,
                $brg->tipe_barang,
                $brg->tanggal_masuk,
                $brg->harga_barang,
                $brg->uang_muka,
                $brg->kredit_total,
                $brg->angsuran,
                $brg->nominal_angsuran,
                $brg->kredit_masuk,
                $brg->sisa_kredit,
                $brg->status,
                $brg->nama_kreditor
            );
            array_push($data_barang, $brg);
        }

        //3. Data Transaksi
        $data_transaksi = array();
        $no = 1;

        // $header_transaksi = ['Nomor', 'ID Kreditor', 'Nama Kreditor', 'ID Barang', 'Nama Barang', 'ID Transaksi', 'Tanggal Transaksi', 'Nominal Transaksi'];
        foreach ($data['transaksi'] as $trs) {
            $trs = array(
                $no++,
                $trs->id_kreditor,
                $trs->nama_kreditor,
                $trs->id_barang,
                $trs->nama_barang,
                $trs->id_transaksi,
                $trs->tanggal_transaksi,
                $trs->nominal_transaksi
            );
            array_push($data_transaksi, $trs);
        }

        // setup Spout Excel Writer, set tipenya xlsx
        $writer = WriterFactory::create(Type::XLSX);
        $datestring = '%Y-%m-%d';
        $time = time();
        $waktu = mdate($datestring, $time);
        // download to browser
        $writer->openToBrowser('Rekap_Data_' . $waktu . '.xlsx');
        // set style untuk header
        $headerStyle = (new StyleBuilder())
            ->setFontBold()
            ->build();


        // write ke Sheet KREDITOR
        $writer->getCurrentSheet()->setName('Kreditor');
        // header Sheet pertama
        $writer->addRowWithStyle($header_kreditor, $headerStyle);
        // data Sheet pertama
        $writer->addRows($data_kreditor);

        // write ke Sheet BARANG
        $writer->addNewSheetAndMakeItCurrent()->setName('Barang');
        // header Sheet kedua
        $writer->addRowWithStyle($header_barang, $headerStyle);
        // data Sheet kedua
        $writer->addRows($data_barang);

        // write ke Sheet Transaksi
        $writer->addNewSheetAndMakeItCurrent()->setName('Transaksi');
        // header Sheet ketiga
        $writer->addRowWithStyle($header_transaksi, $headerStyle);
        // data Sheet ketiga
        $writer->addRows($data_transaksi);


        // close writter
        $writer->close();
    }
}
