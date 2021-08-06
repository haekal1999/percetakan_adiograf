<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BAHAN</h3>

    <?php foreach ($bahan as $pdk) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/data_produk/update_bahan' ?>">
            <div class="form-group">
                <label>Nama Bahan</label>
                <input type="text" name="bahan" class="form-control" value="<?php echo $pdk->bahan ?>">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="produk" class="form-control" value="<?php echo $pdk->produk ?>">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $pdk->id ?>">

                <input type="text" name="ket" class="form-control" value="<?php echo $pdk->ket ?>">
            </div>


            <div class="form-group">
                <label>Foto/Gambar</label>
                <input type="file" class="form-control" required id="foto" name="foto" value="<?php echo $pdk->foto ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>
        </form>
    <?php endforeach; ?>
</div>