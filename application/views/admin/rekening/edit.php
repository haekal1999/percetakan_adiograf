<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA REKENING</h3>

    <?php foreach ($rekening as $pdk) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/rekening/update_rekening' ?>">
            <div class="form-group">
                <label>Jenis</label>
                <input type="text" name="jenis" class="form-control" value="<?php echo $pdk->jenis ?>">
            </div>

            <div class="form-group">
                <label>Rekening</label>
                <input type="text" name="rekening" class="form-control" value="<?php echo $pdk->rekening ?>">
            </div>

            <div class="form-group">
                <label>Nomor</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $pdk->id ?>">

                <input type="text" name="nomor" class="form-control" value="<?php echo $pdk->nomor ?>">
            </div>

            <div class="form-group">
                <label>Atas Nama</label>
                <input type="text" name="atas_nama" class="form-control" value="<?php echo $pdk->atas_nama ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>
        </form>
    <?php endforeach; ?>
</div>