<?php
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        // proteksi
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $kategori = $this->Kategori_model->listing();
        $data = array(
            'title' => 'Data kategori',
            'kategori'  => $kategori,
            'isi'   => 'admin/kategori'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kategori/list', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }
    // edit
    public function edit($id_kategori)
    {
        $kategori = $this->Kategori_model->detail($id_kategori);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required',
            array('required' => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            //end validasi
            $data = array(
                'title' => 'Edit kategori',
                'kategori'  => $kategori,
                'isi'   => 'admin/edit'
            );
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kategori/edit', $data, FALSE);
            $this->load->view('templates_admin/footer');
        } else {
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data = array(
                'id_kategori' => $id_kategori,
                'slug_kategori' => $slug_kategori,
                'nama_kategori'  => $i->post('nama_kategori'),
                'urutan'  => $i->post('urutan')
            );
            $this->Kategori_model->edit($data);
            $this->session->set_flashdata('sukses', 'data telah diedit');
            redirect(base_url('admin/kategori/index'), 'refresh');
        }
    }

    // //tambah kategori
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required|is_unique[kategori.nama_kategori]',
            array(
                'required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat kategori baru'
            )
        );


        if ($valid->run() === FALSE) {
            //end validasi
            $data = array(
                'title' => 'Tambah kategori',
                'isi'   => 'admin/tambah'
            );
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kategori/tambah', $data, FALSE);
            $this->load->view('templates_admin/footer');
        } else {
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data = array(
                'slug_kategori' => $slug_kategori,
                'nama_kategori'  => $i->post('nama_kategori'),
                'urutan'  => $i->post('urutan')
            );
            $this->Kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', 'data telah ditambahkan');
            redirect(base_url('admin/kategori/index'), 'refresh');
        }
    }
    // delete kategori
    public function delete($id_kategori)
    {
        $data = array('id_kategori' => $id_kategori);
        $this->Kategori_model->delete($data);
        $this->session->set_flashdata('sukses', 'data telah dihapus');
        redirect(base_url('admin/kategori/index'), 'refresh');
    }
}
