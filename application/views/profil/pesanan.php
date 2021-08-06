<div class="gap"></div>
<div class="container">
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-3">
			<h3 class="widget-title"><?= $this->session->userdata('username'); ?></h3>
			<div class="box">
				<a href="<?= base_url('edit_profil') ?>" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-user-circle"></i> Profil</a>
				<a href="#" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-list"></i> Data Pemesanan</a>
				<a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Logout? ')" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="widget-title"><i class="fa fa-list"></i> Data Pemesanan</h3>
			<div class="box">
				<table class="table">
					<thead>
						<tr>
							<th>Nomor Faktur</th>
							<th>Waktu Pemesanan</th>
							<th>Total</th>
							<th>Status</th>
							<th class="text-center"><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($pesanan as $key => $value) :
						?>
							<tr>
								<td><?= $value['faktur_id'] ?></td>
								<td><?php
									$tanggal = explode(" ", $value['faktur_date_created']);
									echo date_indo($tanggal[0]);
									echo '<br>';
									echo $tanggal[1];
									?>
								</td>
								<td>Rp. <?= nominal($value['keranjang_total']) ?></td>
								<td>
									<?php if ($value['faktur_status'] == 'belum') : ?>
										<label class="badge badge-warning">Belum Melakukan Pembayaran</label>
									<?php elseif ($value['faktur_status'] == 'sudah') : ?>
										<label class="badge badge-success">Pembayaran Sudah Dikonfirmasi</label>
									<?php elseif ($value['faktur_status'] == 'tunggu') : ?>
										<label class="badge badge-warning">Menunggu Dikonfirmasi Admin </label>
									<?php elseif ($value['faktur_status'] == 'cetak') : ?>
										<label class="badge badge-primary">Pesanan Sedang Dicetak </label>
									<?php elseif ($value['faktur_status'] == 'tidak_sesuai') : ?>
										<label class="badge badge-danger">Nominal Pembayaran Tidak Sesuai </label>
									<?php elseif ($value['faktur_status'] == 'selesai') : ?>
										<label class="badge badge-info">Pesanan Sudah Siap (Bisa Diambil) </label>
									<?php endif; ?>
								</td>
								<td class="text-center">
									<a href="<?= base_url('detail-pesanan/' . $value['faktur_id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
								</td>
							</tr>
						<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>