<p class="pull-right">
    <div class="btn-group pull-right">
        <a href="<?php echo base_url('admin/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>" target="_blank" title="Cetak" class="btn btn-success btn-sm">
            <i class="fas fa-print"></i> Cetak
        </a>
        <a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm">
            <i class="fas fa-backward"></i> Kembali
        </a>
    </div>
</p>
<div class="clearfix">
    <hr>
</div>
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

<hr>

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