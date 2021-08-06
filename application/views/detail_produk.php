<div class="container-fluid">
    <div class="row">

        <div class="card col-md-7">
            <div class="card-header">
                Detail Produk
            </div>
            <div class="card-body">
                <?php foreach ($produk as $pdk) : ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo base_url() . '/uploads/' . $pdk->gambar ?>" class="card-img-top">
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td>Nama Produk</td>
                                    <td><strong><?php echo $pdk->nama ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td><strong><?php echo $pdk->keterangan ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td><strong><?php echo $pdk->kategori ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Bahan</td>
                                    <td><strong>
                                            <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><?php echo $pdk->bahan ?></div>
                                        </strong></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td> <strong>
                                            <div class="btn btn-sm btn-success">Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?></div>
                                        </strong></td>
                                </tr>
                            </table>
                            <?php echo anchor('dashboard/tambah_ke_keranjang/' . $pdk->id_produk, '<div class="btn btn-sm btn-primary">Tambah Ke Keranjang</div>') ?>
                            <?php echo anchor('welcome/index/' . $pdk->id_produk, '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
</div>