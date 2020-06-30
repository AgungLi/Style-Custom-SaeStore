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

<div class="container-fluid mb-4 mt-4">
    <div class="card">
        <div class="card-header bg-dark">
            <strong class="text-white-50">Detail Produk</strong>
        </div>
        <div class="card-body ">
            <?php
            // Form untuk memproses belanjaan
            echo form_open(base_url('belanja/add'));
            // elemen yang dibawa
            echo form_hidden('no', $produk->id_produk);
            // echo form_hidden('jum', 1);
            echo form_hidden('harga', $produk->harga);
            echo form_hidden('nama', $produk->nama_produk);
            // Elemen redirect
            echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
            ?>
            <div class="row">

                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/upload/image/' . $produk->gambar) ?>" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?= $produk->nama_produk; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><strong><?= $produk->keterangan; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><strong>Hoodie</strong></td>
                        </tr>

                        <tr>
                            <td>Stok</td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><strong>
                                    <div class="btn btn-sm btn-dark"><strong>IDR <?= number_format($produk->harga, '0', ',', '.'); ?></strong> </div>
                                </strong></td>
                        </tr>

                    </table>
                    <a href=""></a>
                    <button type="submit" value="submit" class="btn btn-dark"><i class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
        <?php
        // closing form
        echo form_close();
        ?>
    </div>
</div>
</div>