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

<?php
include('menu.php');
?>


<div class="col-lg-12 ftco-animate p-md-2">
    <div class="row">
        <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p>Riwayat belanjan anda</p>
                <?php if ($header_transaksi) { ?>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th class="column-2">No</th>
                                <th class="column-3">Kode</th>
                                <th class="column-4">Tanggal</th>
                                <th class="column-5">Jumlah Total</th>
                                <th class="column-6">Jumlah item</th>
                                <th class="column-6">Status bayar</th>
                                <th class="column-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($header_transaksi as $header_transaksi) { ?>
                                <tr class="table-row text-center">
                                    <td class="">
                                        <?php echo $i; ?>
                                    </td>
                                    <td> <?= $header_transaksi->kode_transaksi; ?></td>
                                    <td> <?= date('d-m-y', strtotime($header_transaksi->tanggal_transaksi)); ?></td>
                                    <td> <?= number_format($header_transaksi->jumlah_transaksi); ?></td>
                                    <td> <?= $header_transaksi->total_item; ?></td>
                                    <td> <?= $header_transaksi->status_bayar; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('dasbor/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-dark btn-xs">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="<?php echo base_url('dasbor/konfirmasi/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-xs">
                                                <i class="fas fa-upload"></i> Konfirmasi bayar
                                            </a>
                                        </div>
                                    </td>
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