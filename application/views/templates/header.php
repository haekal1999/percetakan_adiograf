<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADIOGRAF DIGITAL PRINTING</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() . 'assets/vendor/dropify/dist/css/dropify.min.css' ?>"></script>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo_kecil.png" />

    <link href="<?php echo base_url() ?>assets/vendor/dropify/dist/css/dropify.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#estimasi").datepicker({
                minDate: 0
            });
        });
    </script>

</head>
<?php echo $this->session->flashdata('konfirmasi_eror') ?>
<?php echo $this->session->flashdata('update_konfirmasi_eror') ?>


<div class="alert-parent">
    <?php if ($this->session->flashdata('alert') == 'login_sukses') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong> Berhasil Login</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php elseif ($this->session->flashdata('alert') == 'success_register') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong> Berhasil Register, Silahkan Login</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php elseif ($this->session->flashdata('alert') == 'failed_upload') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong> Desain/Gambar/ Harus Berformat JPG/JPEG/PNG</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php elseif ($this->session->flashdata('alert') == 'bayar_sukses') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong> Berhasil Melakukan Pembayaran</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif ($this->session->flashdata('alert') == 'konfirmasi_sukses') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong> Berhasil Melakukan Konfirmasi</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php elseif ($this->session->flashdata('alert') == 'konfirmasi_gagal') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <?php
            if (isset($error)) {
                print_r($error);
                echo "<hr/>";
            }
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php elseif ($this->session->flashdata('alert') == 'pesan_sukses') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong> Berhasil Melakukan Pemesanan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>



    <?php elseif ($this->session->flashdata('alert') == 'pesan_hapus') : ?>

        <div class="alert alert-success animated fadeInDownBig hide-it" role="alert">
            <strong>Berhasil Menghapus Pesanan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>
</div>