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
                            <tr>
                                <td>Bukti bayar</td>
                                <td>:
                                    <?php if ($header_transaksi->bukti_bayar != "") { ?>
                                        <img src="<?php echo base_url('assets/upload/image/' . $header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" alt="" width="200">
                                    <?php } else {
                                        echo 'Belum Ada Bukti Bayar';
                                    } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    // error upload
                    if (isset($error)) {
                        echo '<p class"alert alert-warning">' . $error . '</p>';
                    }

                    // notif error
                    echo validation_errors('<p class"alert alert-warning">', '</p>');

                    // form open
                    echo form_open_multipart('dasbor/konfirmasi/' . $header_transaksi->kode_transaksi);
                    ?>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="30%">Pembayaran ke rekening</td>
                                <td>
                                    <select name="id_rekening" class="form-control" id="">
                                        <?php foreach ($rekening as $rekening) { ?>
                                            <option value="<?php echo $rekening->id_rekening ?>" <?php if ($header_transaksi->id_rekening == $rekening->id_rekening) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                <?php echo $rekening->nama_bank ?> (NO. Rekening : <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal bayar</td>
                                <td>
                                    <input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yy" value="<?php
                                                                                                                                    if (isset($_POST['tanggal_bayar'])) {
                                                                                                                                        echo set_value('tanggal_bayar');
                                                                                                                                    } elseif ($header_transaksi->tanggal_bayar != "") {
                                                                                                                                        echo $header_transaksi->tanggal_bayar;
                                                                                                                                    } else {
                                                                                                                                        echo date('d-m-y');
                                                                                                                                    }
                                                                                                                                    ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah pembayar</td>
                                <td>

                                    <input type="number" name="jumlah_bayar" class="form-control-lg" placeholder="Jumlah pembayaran" value="<?php
                                                                                                                                            if (isset($_POST['jumlah_bayar'])) {
                                                                                                                                                echo set_value('jumlah_bayar');
                                                                                                                                            } elseif ($header_transaksi->jumlah_bayar != "") {
                                                                                                                                                echo $header_transaksi->jumlah_bayar;
                                                                                                                                            } else {
                                                                                                                                                echo $header_transaksi->jumlah_transaksi;
                                                                                                                                            }
                                                                                                                                            ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Dari bank</td>
                                <td>
                                    <input type="text" name="nama_bank" class="form-control" value="<?php echo $header_transaksi->nama_bank; ?>" placeholder="Nama bank">
                                    <small>Misal : Bank xyz</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Dari nomor rekening</td>
                                <td>
                                    <input type="text" name="rekening_pembayaran" class="form-control" value="<?php echo $header_transaksi->rekening_pembayaran ?>" placeholder="Nomor rekening">
                                    <small>Misal : 598271698</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama pemilik rekening</td>
                                <td>
                                    <input type="text" name="rekening_pelanggan" class="form-control" value="<?php echo $header_transaksi->rekening_pelanggan ?>" placeholder="Nama pemilik rekening">
                                    <small>Misal : Agung laksmana</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Bukti Bayar</td>
                                <td>
                                    <input type="file" name="bukti_bayar" class="form-control" placeholder="Upload bukti pembayaran">
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Bukti Bayar</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-dark btn-sm" type="submit" name="submit"><i class="fas fa-upload"></i> Submit</button>
                                        <button class="btn btn-primary btn-sm" type="reset" name="reset"><i class="fas fa-times"></i> Reset</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <?php
                    // form clode
                    echo form_close();
                } else { ?>
                    <p class="alert alert->success">
                        <i class="fas fa-warning"></i> Belum ada data transaksi
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>