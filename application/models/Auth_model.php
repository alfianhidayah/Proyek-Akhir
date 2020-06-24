<?php

class Auth_model extends CI_Model
{
    public function login()
    {
        //ambil username dan password yang dimasukkan admin ketika login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user_admin = $this->db->get_where('user_admin', ['username' => $username])->row_array();

        if ($user_admin != null) {
            if ($password == $user_admin['password']) {
                $data = [
                    'username' => $user_admin['username']
                ];

                //kirim session dan data
                $this->session->set_userdata($data);

                redirect('dashboard');
            } else {
                //kalau salah password
                //buat kirim setflashmessage dan tampilkan di fungsi flashdata()
                $this->session->set_flashdata('messages', '<div class="alert alert-danger" role="alert"> Wrong password</div>');
                redirect('auth'); //pindah ke halaman login
            }
        } else {
            //user tidak valid dan tendang saja ya teman2 :)
            $this->session->set_flashdata('messages', '<div class="alert alert-danger" role="alert"> username not registered</div>');
            redirect('auth'); //pindah ke halaman login
        }
    }
}
