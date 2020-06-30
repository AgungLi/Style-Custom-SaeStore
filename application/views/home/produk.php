<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <!-- <span class="subheading">SAE</span> -->
                    <h2 class="mb-4">PRODUK TERBARU</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-15 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">


                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row text-center">
                                <?php foreach ($produk as $produk) { ?>
                                    <div class="card ml-3 mb-3" style="width: 16rem;">
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
                                        <img src="<?php echo base_url('assets/upload/image/' . $produk->gambar) ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title mb-1"><?= $produk->nama_produk; ?></h5>

                                            <span class="badge badge-dark mb-3">IDR <?= number_format($produk->harga, '0', ',', '.'); ?></span>
                                            <div class="faded">
                                                <ul class="ftco-social">
                                                    <li class="btn btn-dark"><a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>"><i class="fas fa-search-plus"></i></a></li>
                                                    <button type="submit" value="submit" class="btn btn-dark"><i class="fas fa-shopping-cart"></i></button>
                                                </ul>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>