<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA PRODUK</h3>

    <?php foreach ($produk as $pdk) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/data_produk/update' ?>">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $pdk->nama ?>">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $pdk->kategori ?>">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="hidden" name="id_produk" class="form-control" value="<?php echo $pdk->id_produk ?>">

                <input type="text" name="keterangan" class="form-control" value="<?php echo $pdk->keterangan ?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $pdk->harga ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>
        </form>
    <?php endforeach; ?>
</div>