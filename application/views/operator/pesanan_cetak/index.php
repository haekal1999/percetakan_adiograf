<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Pesanan Sedang Dicetak
            </h4>
            <div class="table-responsive">
                <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th>Nomor Faktur</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Deadline</th>
                            <th>Total</th>
                            <th style="text-align: center">Aksi<i class="icon-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $key => $value) :
                            if ($value['faktur_status'] == 'cetak') :
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $value['faktur_id'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td> <?php
                                            $tanggal = explode(" ", $value['faktur_date_created']);
                                            echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
                                            ?></td>
                                    <td><?= $value['deadline_pesanan'] ?></td>
                                    <td><?= nominal($value['keranjang_total']) ?></td>
                                    <div class="row">
                                        <td>
                                            <a href="<?= base_url('operator/pesanan/lihat/' . $value['faktur_id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('operator/pesanan/edit_status_cetak/' . $value['faktur_id']) ?>" class="btn btn-primary btn-sm">Status</a>
                                            <a href="<?= base_url('operator/pesanan/lihat/' . $value['faktur_id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </div>
                                </tr>
                        <?php
                                $no++;
                            endif;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>