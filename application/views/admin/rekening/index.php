<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Data Rekening
            </h4>
            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i>Tambah</button>

            <div class="table-responsive">
                <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th>Jenis</th>
                            <th>Rekening</th>
                            <th>Nomor</th>
                            <th>Atas Nama</th>
                            <th style="width: 10%;">Aksi</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rekening as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $value['jenis'] ?></td>
                                <td><?= $value['rekening'] ?></td>
                                <td><?= $value['nomor'] ?></td>
                                <td><?= $value['atas_nama'] ?></td>

                                <td>
                                    <a href="<?= base_url('admin/rekening/edit_rekening/' . $value['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </a>
                                    <a href="<?= base_url('admin/rekening/hapus_rekening/' . $value['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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
                            <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'admin/rekening/tambah_rekening';
                                            ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" name="jenis" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Rekening</label>
                                    <input type="text" name="rekening" class="form-control">

                                </div>



                                <div class="form-group">
                                    <label>Nomor</label>
                                    <input type="text" name="nomor" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input type="text" name="atas_nama" class="form-control">
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>