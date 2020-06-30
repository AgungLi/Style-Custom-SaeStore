<?php
class Rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekening_model');
        // proteksi
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $rekening = $this->Rekening_model->listing();
        $data = array(
            'title' => 'Data rekening',
            'rekening'  => $rekening,
            'isi'   => 'admin/rekening'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/rekening/list', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }
    // edit
    public function edit($id_rekening)
    {
        $rekening = $this->Rekening_model->detail($id_rekening);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_bank',
            'Nama rekening',
            'required',
            array('required' => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            //end validasi
            $data = array(
                'title' => 'Edit rekening',
                'rekening'  => $rekening,
                'isi'   => 'admin/edit'
            );
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/rekening/edit', $data, FALSE);
            $this->load->view('templates_admin/footer');
        } else {
            $i = $this->input;
            $data = array(
                'nama_bank'  => $i->post('nama_bank'),
                'nomor_rekening'  => $i->post('nomor_rekening'),
                'nama_pemilik'  => $i->post('nama_pemilik')
            );
            $this->Rekening_model->edit($data);
            $this->session->set_flashdata('sukses', 'data telah diedit');
            redirect(base_url('admin/rekening/index'), 'refresh');
        }
    }

    // //tambah rekening
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_bank',
            'Nama bank',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'nama_pemilik',
            'Nama pemilik rekening',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'nomor_rekening',
            'Nomor rekening',
            'required|is_unique[rekening.nama_bank]',
            array(
                'required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat nomot rekening baru'
            )
        );


        if ($valid->run() === FALSE) {
            //end validasi
            $data = array(
                'title' => 'Tambah rekening',
                'isi'   => 'admin/tambah'
            );
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/rekening/tambah', $data, FALSE);
            $this->load->view('templates_admin/footer');
        } else {
            $i = $this->input;
            $data = array(
                'nama_bank'  => $i->post('nama_bank'),
                'nomor_rekening'  => $i->post('nomor_rekening'),
                'nama_pemilik'  => $i->post('nama_pemilik')
            );
            $this->Rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', 'data telah ditambahkan');
            redirect(base_url('admin/rekening/index'), 'refresh');
        }
    }
    // delete rekening
    public function delete($id_rekening)
    {
        $data = array('id_rekening' => $id_rekening);
        $this->Rekening_model->delete($data);
        $this->session->set_flashdata('sukses', 'data telah dihapus');
        redirect(base_url('admin/rekening/index'), 'refresh');
    }
}
