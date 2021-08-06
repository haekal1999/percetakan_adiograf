<div class="gap"></div>
<div class="container">
    <div class="row row-col-gap" data-gutter="60">
        <div class="col-md-3">
            <h3 class="widget-title"><?= $this->session->userdata('username'); ?></h3>
            <div class="box">
                <a href="#" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-user-circle"></i> Profil</a>
                <a href="<?= base_url('pesanan') ?>" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-list"></i> Data Pemesanan</a>
                <a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Logout? ')" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <h3 class="widget-title">Akun Saya</h3>
            <div class="box">
                <div class="row">
                    <div class="col-md-8">
                        <form action="<?= base_url('ProfilController/update_user') ?>" method="post">
                            <input type="hidden" name="id" value="<?php $this->session->userdata('id'); ?>">
                            <div class="form-group">
                                <label for="">Nama :</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required autocomplete="off" value="<?php echo $edit_user->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Username :</label>
                                <input type="text" name="username" id="username" class="form-control" required autocomplete="off" value="<?= $this->session->userdata('username'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nomor Telpon :</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor Telpon" required autocomplete="off" value="<?php echo $edit_user->no_hp ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat :</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required autocomplete="off" value="<?php echo $edit_user->alamat ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autocomplete="off" value="<?php echo $edit_user->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Password :</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="off" minlength="6" value="<?php echo $edit_user->password ?>">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary" name="simpan"><i class="fa fa-save"></i>Simpan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>