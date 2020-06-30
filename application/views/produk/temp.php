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

<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
            <div class="row">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php foreach ($listing_kategori as $listing_kategori) : ?>
                            <a class="nav-link ftco-animate" id="v-pills-1-tab" data-toggle="pill" href="#<?= $listing_kategori->nama_kategori; ?>" role="tab" aria-controls="v-pills-1" aria-selected="false"><?= $listing_kategori->nama_kategori; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-15 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">


                        <div class="tab-pane fade show active" id="<?= $listing_kategori->nama_kategori; ?>" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                <?php foreach ($produk as $produk) { ?>
                                    <div class="col-md-20 col-lg-5 d-flex align-self-stretch mb-3">
                                        <?php
                                        // Form untuk memproses belanjaan
                                        echo form_open(base_url('belanja/add'));
                                        // elemen yang dibawa
                                        echo form_hidden('no', $produk->id_produk);
                                        echo form_hidden('jum', 1);
                                        echo form_hidden('harga', $produk->harga);
                                        echo form_hidden('nama', $produk->nama_produk);
                                        // Elemen redirect
                                        echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
                                        ?>
                                        <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                            <div class="menu-img img" style="background-image: url(<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>);"></div>
                                            <div class="text d-flex align-items-center">
                                                <div>
                                                    <div class="d-flex">
                                                        <div class="one-half">
                                                            <h3><?= $produk->nama_produk; ?></h3>
                                                        </div>
                                                    </div>
                                                    <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span></p>
                                                    <div class="one-forth">
                                                        <span class="price">IDR <?= number_format($produk->harga, '0', ',', '.'); ?></span>
                                                    </div>
                                                    <div class="faded">
                                                        <ul class="ftco-social d-flex">
                                                            <li class="ftco-animate"><a href="<?php base_url('produk/detail/' . $produk->slug_produk) ?>"><span class="fas fa-search-plus"></span></a></li>
                                                            <button type="submit" value="submit" class="ftco-animate"><span class="fas fa-shopping-cart"></span></button>
                                                        </ul>
                                                    </div>
                                                    <p><a href="#" class="btn btn-primary">Order now</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // closing form
                                        echo form_close();
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <?= $pagin; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>