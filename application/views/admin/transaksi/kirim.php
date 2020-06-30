<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
	
		
		body{
			font-size: 12px;
			font-family: Arial;

			}
			table{
				border:solid thin #000;
				border-collapse: collapse;
			}
			td{
				padding:6px 12px;
				border:solid thin #000;
				text-align:left;

			}


</style>
</head>
<body>
		<div style="width: 19cm; padding: 1cm; height: 27cm; margin-top: 2cm; border-top: solid thin #EEE; " >
			<h1 style ="text-align: center; font-size:18px; font-weight: bold;">PENGIRIMAN</h1>
		<table>
				<tr>
					<td>
						<strong>PENGIRIM:</strong>
						<p>
							<?php echo $site->namaweb  ?>
							<br><?php echo $site->alamat  ?>
							<br>Telepon: <?php echo $site->telepon ?>
				</p>
				
					</td>

					<td>
					<strong>PENERIMA</strong> 
					<p>
						<?php echo $header_transaksi->nama_pelanggan?>
						<br><?php echo $header_transaksi->alamat?>
						<br>Telepon: <?php echo $header_transaksi->telepon?>
						</p>
				</td>
				</tr>
		</table>
		 <table class="table">
             <thead class="thead-dark">
              <tr class="text-center">
                    <th class="column-2">No</th>
                    <th class="column-2">Kode</th>
                    <th class="column-3">Nama produk</th>
                    <th class="column-4">Jumlah</th>
                    <th class="column-5">Harga</th>
                    <th class="column-6">Sub total</th>
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
	</div>
</body>
</html>