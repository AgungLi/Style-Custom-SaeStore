<?php
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        // proteksi
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $produk = $this->Produk_model->listing();
        $data = array(
            'title' => 'Data produk',
            'produk'  => $produk,
            'isi'   => 'admin/produk'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/list', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }

    // //tambah produk
    public function tambah()
    {
        // ambil data kategori
        $kategori = $this->Kategori_model->listing();
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_produk',
            'Nama produk',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'kode_produk',
            'Kode Produk',
            'required|is_unique[produk.kode_produk]',
            array(
                'required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat kode baru'
            )
        );

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2400;
            $config['max_width']            = 2024;
            $config['max_height']           = 2024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {

                //end validasi
                $data = array(
                    'title'     => 'Tambah produk',
                    'kategori'  => $kategori,
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/tambah'
                );
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/sidebar');
                $this->load->view('admin/produk/tambah', $data, FALSE);
                $this->load->view('templates_admin/footer');
                // Masuk database
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                // Create thumnail gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];

                // lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;
                $config['height']           = 250;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                // end create thumbnail

                $i = $this->input;
                // slug produk
                $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_user'       => $this->session->userdata('id_user'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'   => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'keyword'      => $i->post('keyword'),
                    'harga'         => $i->post('harga'),
                    'stok'          => $i->post('stok'),
                    // disimpan nama file gambar
                    'gambar'        => $upload_gambar['upload_data']['file_name'],
                    'berat'         => $i->post('berat'),
                    'ukuran'        => $i->post('ukuran'),
                    'status_produk' => $i->post('status_produk'),
                    'tanggal_post'  => date('Y-m-d H:i:s')
                );
                $this->Produk_model->tambah($data);
                $this->session->set_flashdata('sukses', 'data telah ditambahkan');
                redirect(base_url('admin/produk/index'), 'refresh');
            }
        }
        // end masuk database
        $data = array(
            'title'     => 'Tambah produk',
            'kategori'  => $kategori,
            'isi'       => 'admin/tambah'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/tambah', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }

    // edit
    public function edit($id_produk)
    {
        // ambil data produk
        $produk = $this->Produk_model->detail($id_produk);
        // ambil data kategori
        $kategori = $this->Kategori_model->listing();
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_produk',
            'Nama produk',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'kode_produk',
            'Kode Produk',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            // check jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {

                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2400;
                $config['max_width']            = 2024;
                $config['max_height']           = 2024;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {

                    //end validasi
                    $data = array(
                        'title'     => 'Edit produk: ' . $produk->nama_produk,
                        'kategori'  => $kategori,
                        'produk'    => $produk,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/edit'
                    );
                    $this->load->view('templates_admin/header', $data);
                    $this->load->view('templates_admin/sidebar');
                    $this->load->view('admin/produk/tambah', $data, FALSE);
                    $this->load->view('templates_admin/footer');
                    // Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumnail gambar
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];

                    // lokasi folder thumbnail
                    $config['new_image']        = './assets/upload/image/thumbs';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    // end create thumbnail

                    $i = $this->input;
                    // slug produk
                    $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
                    $data = array(
                        'id_produk'     => $id_produk,
                        'id_user'       => $this->session->userdata('id_user'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'kode_produk'   => $i->post('kode_produk'),
                        'nama_produk'   => $i->post('nama_produk'),
                        'slug_produk'   => $slug_produk,
                        'keterangan'    => $i->post('keterangan'),
                        'keyword'      => $i->post('keyword'),
                        'harga'         => $i->post('harga'),
                        'stok'          => $i->post('stok'),
                        // disimpan nama file gambar
                        'gambar'        => $upload_gambar['upload_data']['file_name'],
                        'berat'         => $i->post('berat'),
                        'ukuran'        => $i->post('ukuran'),
                        'status_produk' => $i->post('status_produk')
                    );
                    $this->Produk_model->edit($data);
                    $this->session->set_flashdata('sukses', 'data telah diedit');
                    redirect(base_url('admin/produk/index'), 'refresh');
                }
            } else {
                // edit produk tanpa ganti gambar
                $i = $this->input;
                // slug produk
                $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_user'       => $this->session->userdata('id_user'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'   => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'keyword'      => $i->post('keyword'),
                    'harga'         => $i->post('harga'),
                    'stok'          => $i->post('stok'),
                    // disimpan nama file gambar (gambar tidak diganti)
                    // 'gambar'        => $upload_gambar['upload_data']['file_name'],
                    'berat'         => $i->post('berat'),
                    'ukuran'        => $i->post('ukuran'),
                    'status_produk' => $i->post('status_produk')
                );
                $this->Produk_model->edit($data);
                $this->session->set_flashdata('sukses', 'data telah diedit');
                redirect(base_url('admin/produk/index'), 'refresh');
            }
        }
        // end masuk database
        $data = array(
            'title'     => 'Edit produk: ' . $produk->nama_produk,
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'admin/edit'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/edit', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }

    // delete produk
    public function delete($id_produk)
    {
        // hapus gambar
        $produk = $this->Produk_model->detail($id_produk);
        unlink('./assets/upload/image/' . $produk->gambar);
        unlink('./assets/upload/image/thumbs/' . $produk->gambar);

        // end proeses hapus
        $data = array('id_produk' => $id_produk);
        $this->Produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'data telah dihapus');
        redirect(base_url('admin/produk/index'), 'refresh');
    }
}
