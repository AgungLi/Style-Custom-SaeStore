<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo base_url('assets/template/images/bg_3.jpeg') ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread"><?= $title; ?></h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Produk <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-md-12 nav-link-wrap mb-5">
        <div class="btn-group nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="btn btn-primary btn-lg" href="<?= base_url('dasbor') ?>" role="tab" aria-controls="v-pills-0" aria-selected="true">Dasboard</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('belanja') ?>" role="tab" aria-controls="v-pills-1" aria-selected="false">Keranjang Belanja</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('dasbor/belanja') ?>" role="tab" aria-controls="v-pills-2" aria-selected="false">Riwayat Belanja</a>

            <a class="btn btn-dark btn-lg" href="<?= base_url('dasbor/profil') ?>" role="tab" aria-controls="v-pills-2" aria-selected="false">Profil</a>

            <a class="btn btn-primary btn-lg" href="<?= base_url('masuk/logout') ?>" role="tab" aria-controls="v-pills-3" aria-selected="false">Logout</a>
        </div>
    </div>
</div>
</div>

<div class="col-lg-12 ftco-animate p-md-2">
    <div class="row">
        <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php
                // notif
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }

                // display error
                echo validation_errors('<div class="aler alert-warning">', '</div>');

                // form open
                echo form_open(base_url('dasbor/profil'));
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th width="25%">Nama</th>
                            <th>
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                                <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>
                                <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-dark" type="submit">
                                    <i class="fas fa-save"> </i> Update profil
                                </button>
                                <button class="btn btn-dark" type="reset">
                                    <i class="fas fa-times"> </i> Reset
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>