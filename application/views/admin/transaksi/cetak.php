<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="test/css" media="print">
        body {
             font-size: 12px;
            font-family: Arial;
            
        }
        .cetak {
            width: 19cm;
            height: 27cm;
            padding: 1cm;
        }
        table {
            border: solid thin #000;
            border-collapse: collapse;
        }

        td,th {
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }
    </style>

    <style type="test/css" media="screen">
        body {
            font-family: Arial;
            font-size: 12px;
        }

        .cetak {
            width: 19cm;
            height: 27cm;
            padding: 1cm;
        }

        table {
            border: solid thin #000;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }
    </style>
</head>

<body onload="print()">
    <div class="cetak">
        <h1>DETAIL TRANSAKSI <?php echo $site->namaweb  ?></h1>
        <table>
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

        <table class="table table-bordered" width="100%">
             <thead class="thead-dark">
              <tr class="text-center">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($transaksi as $transaksi) { ?>
                    <tr class="table-row text-center">
                        <td class="">
                            <?php echo $i ?>
                        </td>
                        <td> <?php echo $transaksi->kode_produk; ?></td>
                        <td> <?php echo $transaksi->nama_produk; ?></td>
                        <td> <?php echo number_format($transaksi->jumlah); ?></td>
                        <td> <?php echo number_format($transaksi->harga); ?></td>
                        <td> <?php echo number_format($transaksi->total_harga); ?></td>
                    </tr><!-- END TR-->
                <?php
                    $i++;
                }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>