<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Pesanan Selesai
            </h4>
            <div class="table-responsive">
                <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th>Nomor Faktur</th>
                            <th>Nama</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Tanggal Pesanan Dicetak</th>
                            <th>Deadline</th>
                            <th>Burst Time</th>
                            <th>Tanggal Selesai (CT)</th>
                            <th>Lama Proses (TAT)</th>
                            <th>Waktu Tunggu (WT)</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $key => $value) :
                            if ($value['faktur_status'] == 'selesai') :
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $value['faktur_id'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td> <?php
                                            $tanggal = explode(" ", $value['faktur_date_created']);
                                            echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
                                            ?></td>
                                    <td><?= $value['pesanan_dicetak'] ?></td>

                                    <td><?php
                                        $tanggal = $value['deadline_pesanan'];
                                        echo date_indo($tanggal);
                                        ?></td>

                                    <td><?php
                                        $mulai = $value['pesanan_dicetak'];
                                        $selesai = $value['pesanan_selesai'];

                                        $start = strtotime($mulai);
                                        $end = strtotime($selesai);
                                        $diff = $end - $start;

                                        $hours = floor($diff / (60 * 60));
                                        $minutes = $diff - $hours * (60 * 60);
                                        echo  $hours .  ' Jam, ' . floor($minutes / 60) . ' Menit';
                                        ?></td>

                                    <td> <?php
                                            $tanggal = explode(" ", $value['pesanan_selesai']);
                                            echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
                                            ?></td>
                                    <td><?php
                                        $mulai = $value['faktur_date_created'];
                                        $selesai = $value['pesanan_selesai'];

                                        $start = strtotime($mulai);
                                        $end = strtotime($selesai);
                                        $diff = $end - $start;

                                        $hours = floor($diff / (60 * 60));
                                        $minutes = $diff - $hours * (60 * 60);
                                        echo  $hours .  ' Jam, ' . floor($minutes / 60) . ' Menit';
                                        ?></td>

                                    <td><?php
                                        $mulai_TAT = $value['faktur_date_created'];
                                        $selesai_TAT = $value['pesanan_selesai'];

                                        $start_TAT = strtotime($mulai_TAT);
                                        $end_TAT = strtotime($selesai_TAT);
                                        $diff_TAT = $end_TAT - $start_TAT;

                                        $mulai_BT = $value['pesanan_dicetak'];
                                        $selesai_BT = $value['pesanan_selesai'];

                                        $start_BT = strtotime($mulai_BT);
                                        $end_BT = strtotime($selesai_BT);
                                        $diff_BT = $end_BT - $start_BT;

                                        $WT = $diff_TAT - $diff_BT;

                                        $hours = floor($WT / (60 * 60));
                                        $minutes = $WT - $hours * (60 * 60);
                                        echo  $hours .  ' Jam, ' . floor($minutes / 60) . ' Menit';
                                        ?></td>

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