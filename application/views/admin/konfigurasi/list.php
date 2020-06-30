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
                                <h1 class="h4 text-gray-900 mb-4">Form edit konfigurasi</h1>
                            </div>
                            <?php
                            //notifikasi error
                            echo validation_errors('<div class="alert alert-warning">', '</div>');

                            //form open
                            echo form_open_multipart(base_url('admin/konfigurasi'), ' class="form-horizontal"');
                            ?>
                            <div class="form-group form-group-lg">
                                <label for="">Nama Website</label>
                                <input type="text" name="namaweb" class="form-control" placeholder="Nama website" value="<?php echo $konfigurasi->namaweb ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tagline</label>
                                <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control" placeholder="Wedsite" value="<?php echo $konfigurasi->website ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat instagram</label>
                                <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="alamat" value="<?php echo $konfigurasi->alamat ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Keyword (Untuk SEO Google)</label>
                                <textarea name="keywords" class="form-control" placeholder="keywords" value="<?php echo $konfigurasi->keywords ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Metatext</label>
                                <textarea name="metatext" class="form-control" placeholder="metatext" value="<?php echo $konfigurasi->metatext ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi Website</label>
                                <textarea name="deskripsi" class="form-control" placeholder="deskripsi" value="<?php echo $konfigurasi->deskripsi ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Rekening Pembayaran</label>
                                <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran" value="<?php echo $konfigurasi->rekening_pembayaran ?>"></textarea>
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