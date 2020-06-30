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
                                <h1 class="h4 text-gray-900 mb-4">Form edit produk</h1>
                            </div>
                            <?php
                            //notifikasi error
                            echo validation_errors('<div class="alert alert-warning">', '</div>');

                            //form open
                            echo form_open_multipart(base_url('admin/produk/edit/' . $produk->id_produk), ' class="form-horizontal"');
                            ?>
                            <div class="form-group form-group-lg">
                                <label for="">Nama produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" value="<?php echo $produk->nama_produk ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Kode produk</label>
                                <input type="text" name="kode_produk" class="form-control" placeholder="Kode produk" value="<?php echo $produk->kode_produk ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori produk</label>
                                <select name="id_kategori" class="form-control">
                                    <?php foreach ($kategori as $kategori) : ?>
                                        <option value="<?php echo $kategori->id_kategori ?>" <?php if ($produk->id_kategori == $kategori->id_kategori) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                            <?php echo $kategori->nama_kategori ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Harga produk</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo $produk->harga ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Stok produk</label>
                                <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $produk->stok ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Berat produk</label>
                                <input type="text" name="berat" class="form-control" placeholder="Berat" value="<?php echo $produk->berat ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Ukuran produk</label>
                                <input type="text" name="ukuran" class="form-control" placeholder="Ukuran" value="<?php echo $produk->ukuran ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Ketarangan produk</label>
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $produk->keterangan ?>" id="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Keyword (Untuk SEO Google)</label>
                                <textarea name="keyword" class="form-control" placeholder="keyword" value="<?php echo $produk->keyword ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Upload gambar produk</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status produk</label>
                                <select name="status_produk" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft" <?php if ($produk->status_produk == "Draft") {
                                                                echo "selected";
                                                            } ?>>Simpan Sebagai Draft</option>
                                </select>
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