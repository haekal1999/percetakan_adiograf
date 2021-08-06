<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                DATA PRODUK </h4>
            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i>Tambah Produk
            </button>

            <div class="table-responsive">
                <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th>NAMA PRODUK</th>
                            <th>KATEGORI</th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th colspan="3">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($produk as $pdk) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $pdk->nama ?></td>
                                <td><?php echo $pdk->kategori ?></td>
                                <td><?php echo $pdk->keterangan ?></td>
                                <td><?php echo $pdk->harga ?></td>
                                <td>
                                    <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                                </td>
                                <td>
                                    <?php echo anchor('admin/data_produk/edit/' . $pdk->id_produk, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                                </td>
                                <td>
                                    <?php echo anchor('admin/data_produk/hapus/' . $pdk->id_produk, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
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
                            <form action="<?php echo base_url() . 'admin/data_produk/tambah_aksi';
                                            ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option>Spanduk</option>
                                        <option>Brosur</option>
                                        <option>Kartu Undangan</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Bahan</label>
                                    <select class="form-control" name="id" id="id">
                                        <option disabled selected value="">Pilih Bahan</option>

                                        <?php foreach ($bahan as $row) { ?>
                                            <option value="<?php echo base_url('data_produk/index/' . $row->bahan) ?>"><?= $row->bahan ?> </option>
                                        <?php  } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Bahan</label>
                                    <input type="text" name="bahan_desk" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control">
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