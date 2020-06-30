<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data = array(
			'title'         => 'Homepage',
			'produk'        =>  $this->model_produk->tampil_data()->result()
		);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_ke_keranjang($id)
	{
		$produk = $this->model_produk->find($id);
		$data = array(
			'id'      => $produk->id_produk,
			'qty'     => 1,
			'price'   => $produk->harga,
			'name'    => $produk->nama_produk
		);

		$this->cart->insert($data);
		redirect('dashboard');
	}

	public function detail_keranjang()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('dashboard/index');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		} else {
			echo "Maaf, Pesanan Anda Gagal diproses!";
		}
	}

	public function detail($id_produk)
	{
		$data['produk'] = $this->model_produk->detail_prd($id_produk);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_produk', $data);
		$this->load->view('templates/footer');
	}
}
