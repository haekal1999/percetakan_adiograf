<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA PESANAN</h3>

    <form method="post" action="<?php echo base_url() . 'operator/PesananCetak/update_status' ?>">
        <div class="form-group">
            <table>
                <tr>
                    <td>Nomor Faktur</td>
                    <td> :</td>
                    <td><input name="id" id="id" value="<?= $transaksi['faktur_id'] ?>" readonly></td>
                    <td><input name="id_faktur" id="id_faktur" value="<?= $transaksi['faktur_id'] ?>" type="hidden"></td>

                </tr>
                <tr>
                    <td>Status Pemesanan &nbsp;</td>
                    <td> :</td>
                    <td>&nbsp;

                        <select class="form-control" name="status" id="status" required="">
                            <option value="sudah">Pesanan Sedang Dicetak</option>
                            <option value="selesai">Pesanan Sudah Siap</option>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td> :</td>
                    <td>&nbsp;
                        <?= $transaksi['nama'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td> :</td>
                    <td>&nbsp;
                        <?= $transaksi['no_hp'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Waktu Pemesanan</td>
                    <td> :</td>
                    <td>&nbsp;
                        <?php
                        $tanggal = explode(" ", $transaksi['faktur_date_created']);
                        echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Waktu Selesai</td>
                    <td> :</td>
                    <td><input name="id" id="id" value="  <?php
                                                            date_default_timezone_set('Asia/Jakarta');
                                                            $date = new DateTime('now');
                                                            echo $date->format('H:i:s, d M Y');
                                                            ?>" readonly></td>
                    </td>
                    <td><input name="tgl_selesai" id="tgl_selesai" value="  <?php
                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                            $date = new DateTime('now');
                                                                            echo $date->format('Y-m-d  H:i:s ');
                                                                            ?>" hidden></td>
                    </td>
                </tr>
            </table>
        </div>





        <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>
    </form>
</div>