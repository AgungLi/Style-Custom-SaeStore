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

            <a class="btn btn-primary btn-lg" href="<?= base_url('belanja') ?>" role="tab" aria-controls="v-pills-1" aria-selected="false">Keranjang Belanja</a>

            <a class="btn btn-dark btn-lg" href="<?= base_url('dasbor/belanja') ?>" role="tab" aria-controls="v-pills-2" aria-selected="false">Riwayat Belanja</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('dasbor/profil') ?>" role="tab" aria-controls="v-pills-2" aria-selected="false">Profil</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('masuk/logout') ?>" role="tab" aria-controls="v-pills-3" aria-selected="false">Logout</a>
        </div>
    </div>
</div>

<div class="col-lg-12 ftco-animate p-md-2">
    <div class="row">
        <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p>Riwayat belanjan anda</p>
                <?php if ($header_transaksi) { ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">KODE TRANSAKSI</th>
                                <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tanggal</td>
                                <td>: <?= date('d-m-y', strtotime($header_transaksi->tanggal_transaksi)); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah total</td>
                                <td>: <?= number_format($header_transaksi->jumlah_transaksi); ?></td>
                            </tr>
                            <tr>
                                <td>Status bayar</td>
                                <td>: <?= $header_transaksi->status_bayar; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th class="column-2">No</th>
                                <th class="column-3">Kode</th>
                                <th class="column-4">Nama produk</th>
                                <th class="column-5">Jumlah</th>
                                <th class="column-6">Harga</th>
                                <th class="column-6">Sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($transaksi as $transaksi) { ?>
                                <tr class="table-row text-center">
                                    <td class="">
                                        <?php echo $i; ?>
                                    </td>
                                    <td> <?= $transaksi->kode_produk; ?></td>
                                    <td> <?= $transaksi->nama_produk; ?></td>
                                    <td> <?= number_format($transaksi->jumlah); ?></td>
                                    <td> <?= number_format($transaksi->harga); ?></td>
                                    <td> <?= number_format($transaksi->total_harga); ?></td>
                                </tr><!-- END TR-->
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>

                    </table>

                <?php } else { ?>
                    <p class="alert alert->success">
                        <i class="fas fa-warning"></i> Belum ada data transaksi
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>