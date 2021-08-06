<div class="container-fluid">

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item ">
                <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item ">
                <img src="<?php echo base_url('assets/img/slider3.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>



    <div class="row text-center mt-4">
        <?php foreach ($kartu_undangan as $pdk) : ?>
            <div class="card ml-3 mb-3" style="width: 18rem;">
                <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $pdk->nama ?></h5>
                    <small><?php echo $pdk->keterangan ?></small><br>
                    <span class="badge bg-success mb-3">
                        Rp.<?php echo number_format($pdk->harga, 0, ',', '.')  ?>
                    </span><br>
                    <?php echo anchor('dashboard/tambah_ke_keranjang/' . $pdk->id_produk, '<div class="btn btn-sm btn-primary">Tambah Ke Keranjang</div>') ?>
                    <?php echo anchor('dashboard/detail/' . $pdk->id_produk, '<div class="btn btn-sm btn-success">Detail</div>') ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>