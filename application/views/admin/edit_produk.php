<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>Edit Data Produk</h3>

	<?php foreach($produk as $prd) : ?>
		<form method="post" action="<?php echo base_url().'admin/data_produk/update' ?>" >
			
			<div class="form-group">
				<label for="nama_produk">Nama Produk</label>
				<input type="text" name="nama_produk" class="form-control" value="<?php echo $prd->nama_produk ?>">
			</div>
			<div class="form-group">
				<label for="id_produk">Keterangan</label>
				<input type="hidden" name="id_produk" class="form-control" value="<?php echo $prd->id_produk ?>">
				<input type="text" name="keterangan" class="form-control" value="<?php echo $prd->keterangan ?>">
			</div>
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<input type="text" name="kategori" class="form-control" value="<?php echo $prd->kategori ?>">
			</div>
			<div class="form-group">
				<label for="harga">Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $prd->harga ?>">
			</div>
			<div class="form-group">
				<label for="stok">Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $prd->stok ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
		</form>
	<?php endforeach; ?>
</div>