<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT HARGA BAHAN</h3>

    <?php foreach ($bahan as $pdk) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/harga/update_harga_bahan' ?>">

            <div class="form-group">
                <label>ID Harga Bahan</label>
                <input type="text" name="id_bahan" class="form-control" value="<?php echo $pdk->id_bhn_fk ?>">
                <input type="hidden" name="id" class="form-control" value="<?php echo $pdk->id_hrg_bahan ?>">

            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $pdk->harga ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>
        </form>
    <?php endforeach; ?>
</div>