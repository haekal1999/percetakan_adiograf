<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Data User
            </h4>
            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i>Tambah User
            </button>
            <div class="table-responsive">
                <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th>Username</th>
                            <th>nama</th>
                            <th>email</th>
                            <th>Role</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td>
                                    <?php if ($value['id_role'] == '1') : ?>
                                        <label class="badge badge-lg badge-primary">Admin</label>
                                    <?php elseif ($value['id_role'] == '2') : ?>
                                        <label class="badge badge-info">Customer</label>
                                    <?php elseif ($value['id_role'] == '3') : ?>
                                        <label class="badge badge-success">Operator</label>

                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('admin/dashboard_admin/detail_user/' . $value['id']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </a>
                                    <a href="<?= base_url('admin/dashboard_admin/edit_user/' . $value['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </a>
                                    <a href="<?= base_url('admin/dashboard_admin/hapus_user/' . $value['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tambah_produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH USER</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'admin/dashboard_admin/tambah_user';
                                            ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" name="nama" class="form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required autocomplete="off" minlength="6" maxlength="15">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required autocomplete="off" minlength="6">
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role" id="role" required autocomplete="off">
                                        <option disabled selected value="">Pilih Role</option>

                                        <?php foreach ($role as $row) { ?>
                                            <option value="<?php echo $row->id ?>"><?= $row->name ?> </option>
                                        <?php  } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telpon</label>
                                    <input type="text" name="no_hp" class="form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required autocomplete="off">
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>