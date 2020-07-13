<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        //helper
        is_after_logged_in();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->auth->login();
        }
    }

    public function logout()
    {
        //membersihkan session
        $this->session->unset_userdata('username');
        //redirect ke halaman login dan beri flash message
        $this->session->set_flashdata('messages', '<div class="alert alert-success" role="alert"> You have been logout</div>');
        redirect('auth');
    }
}
