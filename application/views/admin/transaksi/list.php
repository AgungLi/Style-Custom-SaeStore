<div class="container-fluid">
    <table class="table" id="myTable">
        <thead class="thead-dark">
            <tr class="text-center">
                <th class="column-2">No</th>
                <th class="column-2">Pelanggan</th>
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
                    <td>
                        <?= $header_transaksi->nama_pelanggan; ?><br>
                        <small>Telepon : <?= $header_transaksi->telepon; ?>
                            <br>Email : <?= $header_transaksi->email; ?>
                            <br>Alamat Pengiriman : <br><?= nl2br($header_transaksi->alamat); ?>
                        </small>
                    </td>
                    <td> <?= $header_transaksi->kode_transaksi; ?></td>
                    <td> <?= date('d-m-y', strtotime($header_transaksi->tanggal_transaksi)); ?></td>
                    <td> <?= number_format($header_transaksi->jumlah_transaksi); ?></td>
                    <td> <?= $header_transaksi->total_item; ?></td>
                    <td> <?= $header_transaksi->status_bayar; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo base_url('admin/transaksi/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-dark btn-xs">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="<?php echo base_url('admin/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-primary btn-xs">
                                <i class="fas fa-print"></i> Cetak
                            </a>
                            <a href="<?php echo base_url('admin/transaksi/status/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-danger btn-xs">
                                <i class="fas fa-check"></i> Update status
                            </a>
                        </div>

                        <div class="clearfix"></div>
                        <br>
                        <div class="btn-group">
                            <a href="<?php echo base_url('admin/transaksi/pdf/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-dark btn-xs">
                                <i class="fas fa-file-pdf-o"></i> Unduh PDF
                            </a>
                            <a href="<?php echo base_url('admin/transaksi/kirim/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-primary btn-xs">
                                <i class="fas fa-print"></i> Pengiriman
                            </a>
                            <a href="<?php echo base_url('admin/transaksi/word/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-danger btn-xs">
                                <i class="fas fa-file-word-o"></i> Exsport Ke Word
                            </a>
                    </td>
                </tr><!-- END TR-->
            <?php
                $i++;
            }
            ?>
        </tbody>

    </table>
</div>