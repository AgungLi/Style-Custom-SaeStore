<div class="clearfix">
    <hr>
</div>
<div class="col-lg-12 ftco-animate p-md-2">
    <div class="row">
        <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php if ($header_transaksi) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">Nama Pelanggan</th>
                                <th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
                            </tr>
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
                                    <?php if ($header_transaksi->bukti_bayar == "") {
                                        echo 'Belum ada';
                                    } else { ?>
                                        <img src="<?php echo base_url('assets/upload/image/' . $header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200" alt="">
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal bayar</td>
                                <td>: <?= date('d-m-y', strtotime($header_transaksi->tanggal_bayar)); ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah bayar</td>
                                <td>: Rp. <?= number_format($header_transaksi->jumlah_bayar, '0', ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td>Pembayaran dari</td>
                                <td>: <?= $header_transaksi->nama_bank; ?> No. rekening : <?= $header_transaksi->rekening_pelanggan; ?> a.n <?= $header_transaksi->rekening_pembayaran; ?></td>
                            </tr>

                            <tr>
                                <td>Pembayaran dari</td>
                                <td>: <?= $header_transaksi->bank; ?> No. rekening : <?= $header_transaksi->nomor_rekening; ?> a.n <?= $header_transaksi->nama_pemilik; ?></td>
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
                    echo form_open_multipart('admin/transaksi/editstatus/' . $header_transaksi->kode_transaksi);
                    ?>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="30%">Status Bayar</td>
                                <td>
                                    <select name="status" class="form-control" id="">
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-dark btn-sm" type="submit" name="submit"><i class="fas fa-upload"></i> Simpan</button>
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