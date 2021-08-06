<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Victory Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/node_modules/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/node_modules/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo_kecil.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
                    <div class="col-lg-4 mx-auto">

                        <div class="auth-form-dark text-left p-5">
                            <h2>DAFTAR AKUN</h2>
                            <h4 class="font-weight-light">Form Pendaftaran</h4>
                            <form method="post" action="<?php echo base_url('registrasi/index') ?>" class="user">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Anda" name="nama" required>

                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" name="alamat" required>

                                </div>


                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan No Telpon/WhatsApp" name="no_hp" required>

                                </div>


                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Email" name="email" required>

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username anda" name="username" minlength="6" maxlength="15" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password_1" minlength="6" required>
                                        <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2" required>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-warning btn-user btn-block">Daftar</button>
                                </div>

                                <?= form_close() ?>
                                <br>
                                <div class="text-center">
                                    <a href="<?php echo base_url('auth/login'); ?>" class="auth-link text-white">Sudah punya akun ? Silahkan Login!</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <script type="text/javascript">
        function checkLength(el) {
            if (el.value.length != 6) {
                document.getElementById("notif").innerHTML = "Jumlah karakter harus lebih dari 6";
            }
        }
    </script>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>assets/login/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/login/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/login/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/login/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url() ?>assets/login/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>assets/login/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>assets/login/js/misc.js"></script>
    <script src="<?= base_url() ?>assets/login/js/settings.js"></script>
    <script src="<?= base_url() ?>assets/login/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>