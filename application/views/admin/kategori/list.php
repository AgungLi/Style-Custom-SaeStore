<div class="container-fluid">
    <p>
        <a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah kategori</a>
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
                <th>Nama</th>
                <th>Slug</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($kategori as $kategori) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kategori->nama_kategori ?></td>
                    <td><?php echo $kategori->slug_kategori ?></td>
                    <td><?php echo $kategori->urutan ?></td>

                    <td>
                        <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                        <a href="<?php echo base_url('admin/kategori/edit/' . $kategori->id_kategori) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url('admin/kategori/delete/' . $kategori->id_kategori) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>