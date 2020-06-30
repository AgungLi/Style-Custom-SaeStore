<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo base_url('assets/template/images/bg_3.jpeg') ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread"><?= $title; ?></h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Produk <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>

</section>
<div class="row">
    <div class="col-md-12 nav-link-wrap mb-5">
        <div class="btn-group nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="btn btn-primary btn-lg" href="<?= base_url('dasbor') ?>" role="tab" aria-controls="v-pills-0" aria-selected="true">Dasboard</a>

            <a class="btn btn-dark btn-lg" href="<?= base_url('belanja') ?>" role="tab" aria-controls="v-pills-1" aria-selected="false">Keranjang Belanja</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('dasbor/belanja') ?>" role="tab" aria-controls="v-pills-2" aria-selected="false">Riwayat Belanja</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('dasbor/profil') ?>" role="tab" aria-controls="v-pills-2" aria-selected="false">Profil</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('masuk/logout') ?>" role="tab" aria-controls="v-pills-3" aria-selected="false">Logout</a>
        </div>
    </div>
</div>
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">

            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <?php
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                    ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th class="column-2">Gambar</th>
                                <th class="column-3">Produk</th>
                                <th class="column-4">Harga</th>
                                <th class="column-5">Jumlah</th>
                                <th class="column-6">Sub Total</th>
                                <th class="column-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($keranjang as $keranjang) {
                                //ambil data produk
                                $id_produk = $keranjang['id'];
                                $produk = $this->produk_model->detail($id_produk);

                                // Form update keranjang
                                echo form_open(base_url('belanja/update_cart/' . $keranjang['rowid']));

                            ?>
                                <tr class="table-row text-center">
                                    <td class="column-1">
                                        <div class="cart-img-product">
                                            <img style="width: 200px" src="<?php echo base_url('assets/upload/image/thumbs/') . $produk->gambar ?>" alt="<?php echo $keranjang['name'] ?>">
                                        </div>
                                    </td>

                                    <td class="column-2">
                                        <h3><?php echo $keranjang['name'] ?></h3>
                                    </td>

                                    <td class="column-3">Rp. <?php echo number_format($keranjang['price'], '0', ',', '.') ?></td>

                                    <td class="column-4">
                                        <div class="form-group">
                                            <input type="text" name="qty" class="col-md-4 text-center " value="<?php echo $keranjang['qty'] ?>" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="column-5">Rp.
                                        <?php
                                        $sub_total = $keranjang['price'] * $keranjang['qty'];
                                        echo number_format($sub_total, '0', ',', '.')
                                        ?>
                                    </td>
                                    <td>
                                        <button type="submit" name="update" class="btn btn-dark btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?php echo base_url('belanja/hapus/' . $keranjang['rowid']) ?>" name="hapus" class="btn btn-dark btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr><!-- END TR-->
                            <?php
                                echo form_close();
                            }
                            ?>
                            <tr class="table-row text-center">
                                <td colspan="4">
                                    <h4>Total Belanja</h4>
                                </td>
                                <td>Rp. <?php echo number_format($this->cart->total(), '0', ',', '.') ?></td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <p class="fa-pull-right">
                    <a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-dark btn-lg">
                        <i class="fas fa-trash"></i>
                        Bersihkan
                    </a>
                    <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-dark btn-lg">
                        <i class="fas fa-shopping-cart"></i>
                        Checkout
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>