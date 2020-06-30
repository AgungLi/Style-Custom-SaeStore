<div class="container-fluid">
    <p>
        <a href="<?php echo base_url('admin/data_user/tambah') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah User</a>
    </p>
    <?php
    if ($this->session->flashdata('sukses')) {
        echo '<p class"alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
    ?>
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($user as $user) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $user->nama ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->username ?></td>
                    <td><?php echo $user->akses_level ?></td>
                    <td>
                        <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                        <a href="<?php echo base_url('admin/data_user/edit/' . $user->id_user) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url('admin/data_user/delete/' . $user->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>