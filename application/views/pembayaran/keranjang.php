<?php
if ($keranjang['keranjang_total'] == '0') :
?>
    <div class="container">
        <div class="text-center"><i class="fa fa-cart-arrow-down empty-cart-icon"></i>
            <p class="lead">Keranjang Kamu Kosong</p><a class="btn btn-primary btn-lg" href="<?= base_url() ?>">Pesan
                Sekarang <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>
<?php
elseif ($keranjang == !null) :
?>

    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Keranjang</h1>
        </header>
        <div class="row">
            <div class="col-md-6 shadow p-3 mb-5 bg-white rounded">
                <?php
                if ($xbanner != null) :
                ?>
                    <h4>X-Banner</h4>
                    <?php
                    foreach ($xbanner as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/Xbanner/') . $value['xbanner_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">

                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['xbanner_ukuran'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['xbanner_jumlah'] ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['xbanner_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/xbanner/' . $value['xbanner_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>


                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($spanduk != null) :
                ?>
                    <h4>Spanduk</h4>
                    <?php
                    foreach ($spanduk as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/spanduk/') . $value['spanduk_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Finishing</td>
                                            <td><strong><?= $value['spanduk_finishing'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['spanduk_panjang'] ?> X <?= $value['spanduk_lebar'] ?> meter</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['spanduk_jumlah'] ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['spanduk_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/spanduk/' . $value['spanduk_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>


                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($spanduk_outdoor != null) :
                ?>
                    <h4>Spanduk Outdoor</h4>
                    <?php
                    foreach ($spanduk_outdoor as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/spanduk_outdoor/') . $value['spanduk_outdoor_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Finishing</td>
                                            <td><strong><?= $value['spanduk_outdoor_finishing'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['spanduk_outdoor_panjang'] ?> X <?= $value['spanduk_outdoor_lebar'] ?> meter</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['spanduk_outdoor_jumlah'] ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['spanduk_outdoor_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/spanduk_outdoor/' . $value['spanduk_outdoor_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($brosur != null) :
                ?>
                    <h4>Brosur</h4>
                    <?php
                    foreach ($brosur as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/Brosur/') . $value['brosur_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">

                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['brosur_ukuran'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Sisi</td>
                                            <td><strong><?= $value['brosur_finishing'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Laminasi</td>
                                            <td><strong> <?= $value['nama'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Lipatan</td>
                                            <td><strong> <?= $value['brosur_lipatan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['brosur_jumlah'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['brosur_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/brosur/' . $value['brosur_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>


                <?php
                if ($flyer != null) :
                ?>
                    <h4>Flyer</h4>
                    <?php
                    foreach ($flyer as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/flyer/') . $value['flyer_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Finishing</td>
                                            <td><strong><?= $value['flyer_finishing'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['flyer_ukuran'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['flyer_jumlah'] ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['flyer_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/flyer/' . $value['flyer_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($sertifikat != null) :
                ?>
                    <h4>Sertifikat</h4>
                    <?php
                    foreach ($sertifikat as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/Sertifikat/') . $value['sertifikat_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Jenis Laminasi</td>
                                            <td><strong><?= $value['nama'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['sertifikat_ukuran'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['sertifikat_jumlah'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Sisi</td>
                                            <td><strong> <?= $value['sertifikat_sisi'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['sertifikat_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/sertifikat/' . $value['sertifikat_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($undangan != null) :
                ?>
                    <h4>Undangan</h4>
                    <?php
                    foreach ($undangan as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/Undangan/') . $value['undangan_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Jenis Laminasi</td>
                                            <td><strong><?= $value['nama'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['undangan_ukuran'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['undangan_jumlah'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Sisi</td>
                                            <td><strong> <?= $value['undangan_sisi'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['undangan_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/undangan/' . $value['undangan_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($kartu_nama != null) :
                ?>
                    <h4>Kartu Nama</h4>
                    <?php
                    foreach ($kartu_nama as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/KartuNama/') . $value['kartu_nama_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Jenis Laminasi</td>
                                            <td><strong><?= $value['nama'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['kartu_nama_ukuran'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Sudut</td>
                                            <td><strong><?= $value['kartu_nama_sudut'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['kartu_nama_jumlah'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Sisi</td>
                                            <td><strong> <?= $value['kartu_nama_sisi'] ?> Hari</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['kartu_nama_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/kartunama/' . $value['kartu_nama_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>

                <?php
                if ($kalender != null) :
                ?>
                    <h4>Kalender</h4>
                    <?php
                    foreach ($kalender as $key => $value) :
                    ?>
                        <div class="card mb-2">

                            <div class="card-body">

                                <div class="">
                                    <img src="<?= base_url('uploads/Kalender/') . $value['kalender_foto'] ?>" class="card-img-top">
                                </div>
                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <td>Jenis Laminasi</td>
                                            <td><strong><?= $value['nama'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Bahan</td>
                                            <td><strong><?= $value['bahan'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran</td>
                                            <td><strong><?= $value['kalender_ukuran'] ?> </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td><strong> <?= $value['kalender_jumlah'] ?></strong></td>
                                        </tr>


                                        <tr>
                                            <td>Harga</td>
                                            <td> <strong>
                                                    <div class="btn btn-sm btn-success">Rp. <?= nominal($value['kalender_total']) ?></div>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="">
                                    <?php echo anchor('hapus/kalender/' . $value['kalender_id'], '<div class="btn btn-danger btn-lg" style="position: absolute; bottom: 12px; right: 12px;"><i class="fas fa-trash"></i></div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="gap gap-small"></div>
                <?php
                endif;
                ?>


            </div>
            <div class="col-md-4 shadow p-3 mb-5 bg-white rounded offset-md-2">
                <h4>Total</h4>
                <h3>Rp. <?= nominal($keranjang['keranjang_total']) ?></h3>
                <a class="btn btn-primary" href="<?= base_url('bayar/' . $keranjang['keranjang_id']) ?>">Bayar</a>
            </div>
        </div>
    </div>
<?php
else :
?>
    <div class="container">
        <div class="text-center"><i class="fa fa-cart-arrow-down empty-cart-icon"></i>
            <p class="lead">Keranjang Kamu Kosong</p><a class="btn btn-primary btn-lg" href="<?= base_url() ?>">Pesan
                Sekarang <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>
<?php
endif;
?>