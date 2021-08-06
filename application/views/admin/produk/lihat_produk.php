<div class="container-fluid">

    <div class="card">
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
                                <td>Harga</td>
                                <td> <strong>
                                        <div class="btn btn-sm btn-success">Rp. <?php echo number_format($pdk->harga, 0, ',', '.')  ?></div>
                                    </strong></td>
                            </tr>
                        </table>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>