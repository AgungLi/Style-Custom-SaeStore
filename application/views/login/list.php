<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masukan username dan password</h1>
                                    </div>
                                    <?php
                                    // notifikasi error
                                    echo validation_errors('<div class="alert alert-success">', '</div>');

                                    //Notifikasi gagal login
                                    if ($this->session->flashdata('warning')) {
                                        echo '<div class="alert alert-warning">';
                                        echo $this->session->flashdata('warning');
                                        echo '</div>';
                                    }
                                    // Notifikasi logout
                                    if ($this->session->flashdata('sukses')) {
                                        echo '<div class="alert alert-success">';
                                        echo $this->session->flashdata('sukses');
                                        echo '</div>';
                                    }
                                    // form open login
                                    echo form_open(base_url('login'));
                                    ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan username anda" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan password anda" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control">Login</button>
                                    <?php echo form_close(); ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('registrasi/index'); ?>">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </html>