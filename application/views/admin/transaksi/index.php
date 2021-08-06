<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">
				Data Transaksi
			</h4>
			<div class="table-responsive">
				<table id="order-listing" class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 1%;">No</th>
							<th>Nomor Faktur</th>
							<th>Nama Pemesan</th>
							<th>Tanggal Pemesanan</th>
							<th>Total</th>
							<th>Prioritas</th>
							<th>Status</th>
							<th style="text-align: center"><i class="icon-settings"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($transaksi as $key => $value) :
						?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['faktur_id'] ?></td>
								<td><?= $value['nama'] ?></td>
								<td> <?php
										$tanggal = explode(" ", $value['faktur_date_created']);
										echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
										?></td>
								<td><?= nominal($value['keranjang_total']) ?></td>
								<td><?= $value['nama'] ?></td>
								<td>
									<?php if ($value['faktur_status'] == 'belum') : ?>
										<label class="badge badge-secondary">Belum bayar</label>
									<?php elseif ($value['faktur_status'] == 'sudah') : ?>
										<label class="badge badge-success">Sudah Dikonfirmasi</label>
									<?php elseif ($value['faktur_status'] == 'tunggu') : ?>
										<label class="badge badge-warning">Belum Dikonfirmasi</label>
									<?php elseif ($value['faktur_status'] == 'tidak_sesuai') : ?>
										<label class="badge badge-danger">Pembayaran Tidak Sesuai</label>
									<?php elseif ($value['faktur_status'] == 'cetak') : ?>
										<label class="badge badge-info">Pesanan Sedang Dicetak</label>
									<?php elseif ($value['faktur_status'] == 'selesai') : ?>
										<label class="badge badge-success">Pesanan Sudah Selesai</label>
									<?php endif; ?>
								</td>
								<td><a href="<?= base_url('admin/transaksi/lihat/' . $value['faktur_id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
							</tr>
						<?php
							$no++;
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>