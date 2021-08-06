<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">
				Detail Pesanan
			</h3>
			<div>
				<table>
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
						<td>Deadline Pesanan</td>
						<td> :</td>
						<td>&nbsp;
							<?= $transaksi['deadline_pesanan'] ?> Hari
						</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td> :</td>
						<td>&nbsp;
							<?php if ($transaksi['faktur_status'] == 'sudah') : ?>
								<label class="label label-warning">Menunggu Proses Cetak</label>
							<?php elseif ($transaksi['faktur_status'] == 'cetak') : ?>
								<label class="label label-primary">Pesanan Sedang Dicetak </label>
							<?php elseif ($transaksi['faktur_status'] == 'selesai') : ?>
								<label class="label label-primary">Pesanan Sudah Siap </label>
							<?php endif; ?>
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

				</table>
				<hr>
				<?php
				if ($spanduk == !null) :
				?>
					<h5>Spanduk</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran (m)</th>
								<th>Jenis Bahan</th>
								<th>Finishing</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($spanduk as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['spanduk_panjang'] ?> x <?= $value['spanduk_lebar'] ?> </td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['spanduk_finishing'] ?></td>
									<td><?= $value['spanduk_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['spanduk_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($xbanner == !null) :
				?>
					<h5>X-Banner</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran (m)</th>
								<th>Jenis Bahan</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($xbanner as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['xbanner_ukuran'] ?> </td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['xbanner_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['xbanner_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($spanduk_outdoor == !null) :
				?>
					<h5>Spanduk Outdoor</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Finishing</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($spanduk_outdoor as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['spanduk_outdoor_panjang'] ?> X <?= $value['spanduk_outdoor_lebar'] ?> </td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['spanduk_outdoor_finishing'] ?></td>
									<td><?= $value['spanduk_outdoor_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['spanduk_outdoor_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($flyer == !null) :
				?>
					<h5>Flyer</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Finishing</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($flyer as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['flyer_ukuran'] ?></td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['flyer_finishing'] ?></td>
									<td><?= $value['flyer_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['flyer_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($brosur == !null) :
				?>
					<h5>Brosur</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Finishing</th>
								<th>Laminasi</th>
								<th>Jenis Lipatan</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($brosur as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['brosur_ukuran'] ?></td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['brosur_finishing'] ?></td>
									<td><?= $value['nama'] ?></td>
									<td><?= $value['brosur_lipatan'] ?></td>

									<td><?= $value['brosur_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['brosur_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($kartu_nama == !null) :
				?>
					<h5>Kartu Nama</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Sisi</th>
								<th>Sudut</th>
								<th>Laminasi</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($kartu_nama as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['kartu_nama_ukuran'] ?></td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['kartu_nama_sisi'] ?></td>
									<td><?= $value['kartu_nama_sudut'] ?></td>

									<td><?= $value['nama'] ?></td>

									<td><?= $value['kartu_nama_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['kartu_nama_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($undangan == !null) :
				?>
					<h5>Undangan</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Sisi</th>
								<th>Orientasi</th>
								<th>Laminasi</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($undangan as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['undangan_ukuran'] ?></td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['undangan_sisi'] ?></td>
									<td><?= $value['undangan_orientasi'] ?></td>

									<td><?= $value['nama'] ?></td>

									<td><?= $value['undangan_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['undangan_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>

				<hr>
				<?php
				if ($sertifikat == !null) :
				?>
					<h5>Sertifikat</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Sisi</th>
								<th>Laminasi</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($sertifikat as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['sertifikat_ukuran'] ?></td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['sertifikat_sisi'] ?></td>
									<td><?= $value['nama'] ?></td>
									<td><?= $value['sertifikat_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['sertifikat_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>

				<hr>
				<?php
				if ($kalender == !null) :
				?>
					<h5>Kalender</h5>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Ukuran</th>
								<th>Jenis Bahan</th>
								<th>Sisi</th>
								<th>Finishing</th>
								<th>Laminasi</th>
								<th>Dudukan</th>
								<th>Jumlah</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($kalender as $key => $value) :
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['kalender_ukuran'] ?></td>
									<td><?= $value['bahan'] ?></td>
									<td><?= $value['kalender_sisi'] ?></td>
									<td><?= $value['kalender_finishing'] ?></td>
									<td><?= $value['nama'] ?></td>
									<td><?= $value['kalender_dudukan'] ?></td>
									<td><?= $value['kalender_jumlah'] ?></td>
									<td>
										<a href="<?= base_url('operator/pesanan/foto/' . $value['kalender_id']) ?>" class="badge badge-primary"><i class="fa fa-eye"></i> Lihat</a>
									</td>
								</tr>
							<?php
								$no++;
							endforeach;
							?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
			</div>
		</div>

	</div>
</div>