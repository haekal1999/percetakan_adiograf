<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Laminasi Produk
            </h4>
            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i>Tambah Produk</button>

            <div class="table-responsive">
                <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th>Nama </th>
                            <th>ID Laminasi </th>
                            <th>Produk</th>
                            <th>Keterangan</th>
                            <th style="width: 15%;">Aksi</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($laminasi as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['id'] ?></td>

                                <td><?= $value['produk'] ?></td>
                                <td><?= $value['ket'] ?></td>

                                <td>
                                    <a href="<?= base_url('admin/data_produk/detail_laminasi/' . $value['id']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </a>
                                    <a href="<?= base_url('admin/data_produk/edit_laminasi/' . $value['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </a>
                                    <a href="<?= base_url('admin/data_produk/hapus_laminasi/' . $value['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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
                            <form action="<?php echo base_url() . 'admin/data_produk/tambah_laminasi';
                                            ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nama Laminasi</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option disabled selected value="">Pilih Kategori</option>

                                        <?php foreach ($kategori_produk as $row) { ?>
                                            <option value="<?php echo $row->nama ?>"><?= $row->nama ?> </option>
                                        <?php  } ?>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
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