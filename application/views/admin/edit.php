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
                                <h1 class="h4 text-gray-900 mb-4">Form Tambah User</h1>
                            </div>
                            <?php
                            //notifikasi error
                            echo validation_errors('<div class="alert alert-warning">', '</div>');

                            //form open
                            echo form_open(base_url('admin/data_user/edit/' . $user->id_user), ' class="form-horizontal"');
                            ?>
                            <div class="form-group">
                                <label for="">Nama user</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo $user->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" redonlye>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Level Hak Akses</label>
                                <select name="akses_level" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="User" <?php if ($user->akses_level == "user") {
                                                                echo "selected";
                                                            } ?>>User</option>
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