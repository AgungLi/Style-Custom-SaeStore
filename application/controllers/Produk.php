<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Produk extends CI_Controller
{
    // load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
    }
    // listing data produk
    public function index()
    {
        $site = $this->konfigurasi_model->listing();
        $listing_kategori = $this->produk_model->listing_kategori();
        // ambil data total
        $total      = $this->produk_model->total_produk();
        // start
        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 8;
        $config['uri_segment']      = 3;
        $config['num_links']        = 5;
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item "><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['first_url']        = base_url() . '/produk/';

        $this->pagination->initialize($config);
        // ambil data produk
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $produk = $this->produk_model->produk($config['per_page'], $page);


        // end
        $data = array(
            'title'             => $site->namaweb,
            'site'              => $site,
            'listing_kategori'  => $listing_kategori,
            'produk'            => $produk,
            'pagin'             => $this->pagination->create_links(),
            'isi'               => 'produk/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // listing data kategori produk
    public function kategori($slug_kategori)
    {
        // kategori detail
        $kategori = $this->kategori_model->read($slug_kategori);
        $id_kategori = $kategori->id_kategori;
        // data global

        $site = $this->konfigurasi_model->listing();
        $listing_kategori = $this->produk_model->listing_kategori();
        // ambil data total
        $total      = $this->produk_model->total_kategori($id_kategori);
        // start
        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/kategori/' . $slug_kategori . 'index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 8;
        $config['uri_segment']      = 5;
        $config['num_links']        = 5;
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item "><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['first_url']        = base_url() . '/produk/kategori/' . $slug_kategori;

        $this->pagination->initialize($config);
        // ambil data produk
        $page = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
        $produk = $this->produk_model->kategori($id_kategori, $config['per_page'], $page);

        // end
        $data = array(
            'title'             => $kategori->nama_kategori,
            'site'              => $site,
            'listing_kategori'  => $listing_kategori,
            'produk'            => $produk,
            'pagin'             => $this->pagination->create_links(),
            'isi'               => 'produk/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Detail  produk
    public function detail($slug_produk)
    {
        $site       = $this->konfigurasi_model->listing();
        $produk     = $this->produk_model->read($slug_produk);
        $id_produk  = $produk->id_produk;

        $data = array(
            'title'             => $produk->nama_produk,
            'site'              => $site,
            'produk'            => $produk,
            'isi'               => 'produk/detail'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
