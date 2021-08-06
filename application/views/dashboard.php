    <div class="container-fluid">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('assets/img/slider3.jpg') ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="container fluid offset-1">
            <div class="row">
                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($spanduk_indoor as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 30rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top " alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_spanduk_indoor/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($xbanner as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 30rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_xbanner/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($spanduk_outdoor as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 30rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_spanduk_outdoor/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($flyer as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_flyer/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($brosur as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_brosur/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($kartu_nama as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_kartu_nama/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($undangan as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_kartu_undangan/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($kalender as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_kalender/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="row text-center mt-4 col-md-3">
                    <?php foreach ($sertifikat as $pdk) : ?>
                        <div class="card ml-3 mb-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                                <small>Harga Mulai</small><br>
                                <span class="badge bg-success mb-3" style="color: beige;">
                                    Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                                </span><br>
                                <?php echo anchor('dashboard/pesan_sertifikat/', '<div class="btn btn-sm btn-primary">Pesan Sekarang</div>') ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>