<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('produk_model');
    }

    //login pelanggan
    public function index()
    {
        // validasi
        $this->form_validation->set_rules('email', 'Email/username', 'required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi'));

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            // proses ke simple login
            $this->simple_pelanggan->login($email, $password);
        }
        // end validasi
        $data = array(
            'title' => 'Login Pelanggan',
            'isi'   => 'masuk/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    // logout
    public function logout()
    {
        // ambil fungsi logout di simple pelanggan
        $this->simple_pelanggan->logout();
    }
}
