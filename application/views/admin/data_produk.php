<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i>Tambah Produk</button>

	<table class="table table-bordered" id="myTable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Keterangan</th>
				<th>Kategori</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>

			<?php
			$no = 1;
			foreach ($produk as $prd) : ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $prd->nama_produk ?></td>
					<td><?php echo $prd->keterangan ?></td>
					<td><?php echo $prd->kategori ?></td>
					<td><?php echo $prd->harga ?></td>
					<td><?php echo $prd->stok ?></td>
					<td>
						<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
						<?php echo anchor('admin/data_produk/edit/' . $prd->id_produk, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
						<?php echo anchor('admin/data_produk/hapus/' . $prd->id_produk, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
					</td>

				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Input produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url() . 'admin/data_produk/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Nama Produk</label>
						<input type="text" name="nama_produk" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="text" name="keterangan" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Kategori</label>
						<select name="kategori" id="" class="form-control">
							<option value="Hoodie">Hoodie</option>
							<option value="T-Shirt">T-Shirt</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="text" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Stok</label>
						<input type="text" name="stok" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Gambar</label><br>
						<input type="file" name="gambar" class="form-control">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>