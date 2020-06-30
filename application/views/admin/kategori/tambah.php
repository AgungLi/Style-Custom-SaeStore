<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Tambah kategori</h1>
                            </div>
                            <?php
                            //notifikasi error
                            echo validation_errors('<div class="alert alert-warning">', '</div>');

                            //form open
                            echo form_open(base_url('admin/kategori/tambah'), ' class="form-horizontal"');
                            ?>
                            <div class="form-group">
                                <label for="">Nama kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Urutan</label>
                                <input type="number" name="urutan" class="form-control" placeholder="Urutan kategori" value="<?php echo set_value('urutan') ?>" required>
                            </div>
                            <div class="form-grup">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-primary" name="reset">Reset</button>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>