<div class="container-fluid">
    <p>
        <a href="<?php echo base_url('admin/rekening/tambah') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah rekening</a>
    </p>
    <?php
    if ($this->session->flashdata('sukses')) {
        echo '<div class"alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
    ?>
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama bank</th>
                <th>Nomor rekening</th>
                <th>Pemilik</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($rekening as $rekening) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $rekening->nama_bank ?></td>
                    <td><?php echo $rekening->nomor_rekening ?></td>
                    <td><?php echo $rekening->nama_pemilik ?></td>
                    <td>
                        <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                        <a href="<?php echo base_url('admin/rekening/edit/' . $rekening->id_rekening) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                        <a href="<?php echo base_url('admin/rekening/delete/' . $rekening->id_rekening) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>