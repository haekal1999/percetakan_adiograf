<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA USER</h3>

    <?php foreach ($user as $pdk) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/dashboard_admin/update_user' ?>">
            <div class="form-group">
                <label>Nama </label>
                <input type="text" name="nama" class="form-control" value="<?php echo $pdk->nama ?>">
            </div>

            <div class="form-group">
                <label>Nomor telpon</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $pdk->no_hp ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $pdk->id ?>">

                <input type="text" name="email" class="form-control" value="<?php echo $pdk->email ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $pdk->alamat ?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $pdk->password ?>">
            </div>
          
            <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>
        </form>
    <?php endforeach; ?>
</div>