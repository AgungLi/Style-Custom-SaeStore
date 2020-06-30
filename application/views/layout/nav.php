<?php
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk = $this->konfigurasi_model->nav_produk();
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('assets/upload/image/' . $site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <!-- HOME -->
                <li class="nav-item"><a href="<?php echo base_url() ?>" class="nav-link"><strong>Beranda</strong></a></li>
                <!-- MENU PRODUK -->

                <ul class="navbar-nav dropdown list-unstyled">
                    <li class="nav-item"><a href="<?php echo base_url('produk') ?>" class="nav-link dropdown-toggle"><strong>Produk</strong></a></li>
                    <ul class="dropdown-menu">
                        <?php foreach ($nav_produk as $nav_produk) { ?>
                            <li><a class="dropdown-item" href="<?= base_url('produk/kategori/' . $nav_produk->slug_kategori) ?>"><?= $nav_produk->nama_kategori; ?></a></li>
                        <?php } ?>
                        <li class="divider"></li>
                    </ul>
                </ul>
                <li class="nav-item"><a href="#" class="nav-link"><strong>Catalogue</strong></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><strong>Kontak Kami</strong></a></li>
                <!-- <li class="nav-item cta"><a href="reservation.html" class="nav-link">Book a table</a></li> -->
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cart-plus fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <?php
                        // check data belanjaan ada atau tidak
                        $keranjang = $this->cart->contents();

                        ?>
                        <span class="badge badge-danger badge-counter"><?php echo count($keranjang) ?></span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">

                        <?php
                        if (empty($keranjang)) {
                        ?>
                            <h6 class="dropdown-header">
                                <?php echo "Keranjang Kosong" ?>
                            </h6>
                        <?php
                        } else {
                        ?>
                            <h6 class="text-center">
                                <span class="font-weight-bold">Keranjang Belanja</span>
                            </h6>
                            <hr>
                            <?php
                            $total = 'Rp. ' . number_format($this->cart->total(), '0', ',', '.');
                            foreach ($keranjang as $keranjang) {
                                $id_produk = $keranjang['id'];
                                // ambil data produk
                                $produknya = $this->produk_model->detail($id_produk);
                            ?>
                                <a class="dropdown-item d-flex align-items-center" href="<?php /*echo base_url('produk/detail/' . $produknya->slug_produk)  */ ?>">
                                    <div class="mr-3">
                                        <img style="width: 50px" class="" src="<?php echo base_url('assets/upload/image/thumbs/') . $produknya->gambar ?>" alt="<?php echo $keranjang['name'] ?>">
                                    </div>
                                    <div>
                                        <span class="font-weight-bold"><?php echo $keranjang['name'] ?></span>
                                        <div class="small text-gray-50 font-weight-bold"><?php echo $keranjang['qty'] ?> X Rp. <?php echo number_format($keranjang['price'], '0', ',', '.') ?></div>
                                    </div>
                                </a>
                            <?php
                            } // tutup foreach 
                            ?>
                            <div class="font-weight-bold text-center">
                                <hr>
                                Total : <?php echo $total ?>
                            </div>
                            <a class="dropdown-item text-center small text-white-500" href="<?php echo base_url('belanja') ?>"> <span class="btn btn-dark btn-sm btn-block">Tampilkan Semua</span></a>
                            <a class="dropdown-item text-center small text-white-500" href="<?php echo base_url('belanja/checkout') ?>"><span class="btn btn-dark btn-sm btn-block"> Check Out </span></a>
                        <?php
                        } // tutup if
                        ?>

                    </div>
                </li>

                <?php if ($this->session->userdata('email')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('dasbor') ?>">
                            <span class="font-weight-bold"><strong><?php echo $this->session->userdata('nama_pelanggan') ?></strong></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('masuk/logout') ?>">
                            <span class="font-weight-bold"><strong>Logout</strong></span>
                        </a>
                    </li>
                <?php } else { ?>
                    <a href="<?php echo base_url('registrasi') ?>">
                        <strong><?php echo $this->session->userdata('nama_pelanggan') ?></strong>
                    </a>
                <?php } ?>
            </ul>


        </div>
    </div>
</nav>