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

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
                <div class="cart-list">
                    <?php
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                    ?>

                    <p class="alert alert-dark">Belum memiliki akun? Silahkan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-dark btn-sm">Registrasi disini</a></p>
                    <div class="col-md-8 col-md-offset-2">
                        <?php
                        // display error
                        echo validation_errors('<div class="alert alert-warning">', '</div>');

                        // display notifikasi error login
                        if ($this->session->flashdata('warning')) {
                            echo '<div class="alert alert-warning">';
                            echo $this->session->flashdata('warning');
                            echo '</div>';
                        }

                        // display notifikasi sukses logout
                        if ($this->session->flashdata('sukses')) {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        }
                        // form open
                        echo form_open(base_url('masuk'));
                        ?>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="20%">Email</td>
                                    <td>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-dark" type="submit">
                                            <i class="fas fa-save"> </i> Login
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
    </div>
</section>