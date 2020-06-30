<?php
if ($this->session->flashdata('sukses')) {
    echo '<p class"alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<?php
// error upload
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
?>

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
                                <h1 class="h4 text-gray-900 mb-4">Form edit Icon</h1>
                            </div>
                            <?php
                            //notifikasi error
                            echo validation_errors('<div class="alert alert-warning">', '</div>');

                            //form open
                            echo form_open_multipart(base_url('admin/konfigurasi/icon'), ' class="form-horizontal"');
                            ?>
                            <div class="form-group form-group-lg">
                                <label for="">Nama Website</label>
                                <input type="text" name="namaweb" class="form-control" placeholder="Nama website" value="<?php echo $konfigurasi->namaweb ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Icon Baru</label>
                                <input type="file" name="icon" class="form-control" placeholder="Upload Icon Baru" value="<?php echo $konfigurasi->icon ?>" required>
                                Icon Lama : <br> <img src="<?php echo base_url('assets/upload/image/' . $konfigurasi->icon) ?>" alt="" class="img img-responsive img-thumbnail" width="200">
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