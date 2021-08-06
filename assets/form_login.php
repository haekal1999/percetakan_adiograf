<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-5">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                                        <!-- masukin landing page disini nanti -->
                                        <div class="sidebar-brand-icon rotate-n-15">
                                            <i class="fas fa-cube"></i>
                                        </div>
                                        <div class="sidebar-brand-text mx-3">Kayu<sup>Nich</sup></div>
                                        <h6 style="text-align: center;">Aplikasi Pendonasian Limbah Kayu</h6>
                                        <hr>
                                    </h1><br>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div><br>
                                    <!-- <h1 class="h5 text-gray-700 mb-1">Login</h1> -->
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-secondary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center dropdown">
                                    <a class="small dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= base_url('auth/registration'); ?>">Buat akun baru!</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="<?= base_url('auth/registration_toko'); ?>">Akun Toko</a>
                                        <a class="dropdown-item" href="<?= base_url('auth/registration'); ?>">Akun Donatur</a>
                                    </div>
                                </div>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>