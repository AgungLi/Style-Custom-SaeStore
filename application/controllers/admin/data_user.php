<?php
class Data_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');

        $this->simple_login->cek_login();
    }

    public function index()
    {
        $user = $this->model_user->listing();
        $data = array(
            'title' => 'Data user',
            'user'  => $user,
            'isi'   => 'admin/data_user'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_user', $data, FALSE);
        $this->load->view('templates_admin/footer');
        
    }
    // edit
    public function edit($id_user)
    {
        $user = $this->model_user->detail($id_user);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            array('required' => '%s harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'    => '%s harus diisi',
                'valid_email'   => '%s tidak valid'
            )
        );
        $valid->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run() === FALSE) {
            //end validasi
            $data = array(
                'title' => 'Edit User',
                'user'  => $user,
                'isi'   => 'admin/edit'
            );
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit', $data, FALSE);
            $this->load->view('templates_admin/footer');
        } else {
            $i = $this->input;
            $data = array(
                'id_user' => $id_user,
                'nama'  => $i->post('nama'),
                'email'  => $i->post('email'),
                'username'  => $i->post('username'),
                'password'  => SHA1($i->post('password')),
                'akses_level'  => $i->post('akses_level')
            );
            $this->model_user->edit($data);
            $this->session->set_flashdata('sukses', 'data telah diedit');
            redirect(base_url('admin/data_user/index'), 'refresh');
        }
    }

    // //tambah user
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            array('required' => '%s harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'    => '%s harus diisi',
                'valid_email'   => '%s tidak valid'
            )
        );
        $valid->set_rules(
            'username',
            'Username',
            'required|min_length[6]|max_length[32]|is_unique[users.username]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 6 karakter',
                'max_length' => '%s maksimal 32 karakter',
                'is_unique'  => '%s sudah ada. buat username baru.'
            )
        );
        $valid->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run() === FALSE) {
            //end validasi
            $data = array(
                'title' => 'Tambah User',
                'isi'   => 'admin/tambah_user'
            );
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_user', $data, FALSE);
            $this->load->view('templates_admin/footer');
        } else {
            $i = $this->input;
            $data = array(
                'nama'  => $i->post('nama'),
                'email'  => $i->post('email'),
                'username'  => $i->post('username'),
                'password'  => SHA1($i->post('password')),
                'akses_level'  => $i->post('akses_level')
            );
            $this->model_user->tambah($data);
            $this->session->set_flashdata('sukses', 'data telah ditambahkan');
            redirect(base_url('admin/data_user/index'), 'refresh');
        }
    }
    // delete user
    public function delete($id_user)
    {
        $data = array('id_user' => $id_user);
        $this->model_user->delete($data);
        $this->session->set_flashdata('sukses', 'data telah dihapus');
        redirect(base_url('admin/data_user/index'), 'refresh');
    }
}
