<div class="container-fluid">
    <p>
        <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah produk</a>
    </p>
    <?php
    if ($this->session->flashdata('sukses')) {
        echo '<p class"alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
    ?>
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($produk as $produk) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60" alt="">
                    </td>
                    <td><?php echo $produk->nama_produk ?></td>
                    <td><?php echo $produk->nama_kategori ?></td>
                    <td><?php echo number_format($produk->harga, '0', ',', '.') ?></td>
                    <td><?php echo $produk->status_produk ?></td>

                    <td>
                        <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>

                        <a href="<?php echo base_url('admin/produk/edit/' . $produk->id_produk) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <?php include('delete.php') ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>
</div>