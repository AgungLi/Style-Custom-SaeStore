<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('konfigurasi_model');

        $this->simple_login->cek_login();
    }

    public function index()
    {
        $header_transaksi = $this->header_transaksi_model->listing();
        $data = array(
            'title' => 'Data Transaksi',
            'header_transaksi' => $header_transaksi,
            'isi' => 'admin/transaksi/list'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi/list', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }

    // detail
    public function status($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

        $data = array(
            'title'     => 'Riwayat belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi'     => $transaksi,
            'isi'       => 'admin/transaksi/status'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi/status', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }

    // edit
    public function editstatus($kode_transaksi)
    {

        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);

        $i = $this->input;
        $data = array(
            'id_header_transaksi'     => $header_transaksi->id_header_transaksi,
            'status_bayar'   => $i->post('status')
        );
        $this->header_transaksi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil');
        redirect(base_url('admin/transaksi'), 'refresh');
    }

    // detail
    public function detail($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

        $data = array(
            'title'     => 'Riwayat belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi'     => $transaksi,
            'isi'       => 'admin/transaksi/detail'
        );
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi/detail', $data, FALSE);
        $this->load->view('templates_admin/footer');
    }
    // cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site = $this->konfigurasi_model->listing();

        $data = array(
            'title'     => 'Riwayat belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi'     => $transaksi,
            'site' => $site
        );
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }
    // Cetak PDF
    public function pdf($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site = $this->konfigurasi_model->listing();

        $data = array(
            'title'     => 'Riwayat belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi'     => $transaksi,
            'site' => $site
        );
        //$this->load->view('admin/transaksi/cetak', $data, FALSE);
        $html = $this->load->view('admin/transaksi/cetak', $data, true);
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }
    //Pengiriman
    public function kirim($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site = $this->konfigurasi_model->listing();

        $data = array(
            'title'     => 'Riwayat belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi'     => $transaksi,
            'site' => $site
        );
        //$this->load->view('admin/transaksi/kirim', $data, FALSE);
        $html = $this->load->view('admin/transaksi/kirim', $data, true);
        //Load Fungsi MPDF
        $mpdf = new \Mpdf\Mpdf();

        // Setting Header Dan Footer
        $mpdf->SetHTMLHeader('
    <div style="text-align: left; font-weight: bold;">
        <img src="' . base_url('assets/upload/image/' . $site->logo) . '" style="height: 50px; width:50px;">
</div>');
        $mpdf->SetHTMLFooter('
    <div style="padding:10px 20px; background-color: blue; color:white; font-size:14px;"> 

        Alamat:' . $site->namaweb . '(' . $site->alamat . ')<br>
        Telepon:' . $site->telepon . '
    </div>

');
        //end header dan footer
        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output tampil dengan nama baru 
        $nama_file_pdf = url_title($site->namaweb, 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }
}
