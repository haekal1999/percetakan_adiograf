<div class="container-fluid">
	<header class="page-header">
		<h1 class="page-title">Checkout Pesanan</h1>
	</header>
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-4">
			<h3 class="widget-title">Info Pesanan</h3>
			<div class="box">
				<table class="table">
					<thead>
						<tr>
							<th>Jenis</th>
							<th>Jumlah</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							if ($spanduk == !null) :
							?>
								<td>Spanduk</td>
								<?php
								foreach ($spanduk as $key => $value) :
								?>
									<td><?= $value['spanduk_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($spanduk as $key => $value) {
											$harga = $harga + $value['spanduk_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>
						<tr>
							<?php
							if ($xbanner == !null) :
							?>
								<td>X-Banner</td>
								<?php
								foreach ($xbanner as $key => $value) :
								?>
									<td><?= $value['xbanner_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($xbanner as $key => $value) {
											$harga = $harga + $value['xbanner_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>
						<tr>
							<?php
							if ($spanduk_outdoor == !null) :
							?>
								<td>Spanduk Outdoor</td>
								<?php
								foreach ($spanduk_outdoor as $key => $value) :
								?>
									<td><?= $value['spanduk_outdoor_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($spanduk_outdoor as $key => $value) {
											$harga = $harga + $value['spanduk_outdoor_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

						<tr>
							<?php
							if ($flyer == !null) :
							?>
								<td>Flyer</td>
								<?php
								foreach ($flyer as $key => $value) :
								?>
									<td><?= $value['flyer_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($flyer as $key => $value) {
											$harga = $harga + $value['flyer_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

						<tr>
							<?php
							if ($brosur == !null) :
							?>
								<?php
								foreach ($brosur as $key => $value) :
								?>
									<td>Brosur </td>

									<td><?= $value['brosur_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($brosur as $key => $value) {
											$harga = $value['brosur_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

						<tr>
							<?php
							if ($kartu_nama == !null) :
							?>
								<td>Kartu Nama</td>
								<?php
								foreach ($kartu_nama as $key => $value) :
								?>
									<td><?= $value['kartu_nama_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($kartu_nama as $key => $value) {
											$harga = $harga + $value['kartu_nama_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

						<tr>
							<?php
							if ($undangan == !null) :
							?>
								<td>Undangan</td>
								<?php
								foreach ($undangan as $key => $value) :
								?>
									<td><?= $value['undangan_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($undangan as $key => $value) {
											$harga = $harga + $value['undangan_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

						<tr>
							<?php
							if ($sertifikat == !null) :
							?>
								<td>Sertifikat</td>
								<?php
								foreach ($sertifikat as $key => $value) :
								?>
									<td><?= $value['sertifikat_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($sertifikat as $key => $value) {
											$harga = $harga + $value['sertifikat_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

						<tr>
							<?php
							if ($kalender == !null) :
							?>
								<td>Kalender</td>
								<?php
								foreach ($kalender as $key => $value) :
								?>
									<td><?= $value['kalender_jumlah'] ?></td>
									<td style="text-align: right">
										<?php
										$harga = 0;
										foreach ($kalender as $key => $value) {
											$harga = $harga + $value['kalender_total'];
										}
										echo 'Rp. ' . nominal($harga)
										?>
									</td>
								<?php
								endforeach;
								?>
							<?php
							endif;
							?>
						</tr>

					</tbody>
					<tfoot>
						<tr>
							<td colspan="2"><b>Total</b></td>
							<td style="text-align: right"><b>Rp. <?= nominal($pesanan['keranjang_total']) ?></b></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>


	</div>


	<div class="col-md-8">
		<h3 class="widget-title">Pembayaran</h3>
		<div class="box">
			<?= form_open('bayar/' . $pesanan['keranjang_id']) ?>
			<p>Pilih Jenis Pembayaran</p>

			<?php
			foreach ($rekening as $row) {
			?>
				<input type="radio" name="tipebayar" value="<?php echo $row->rekening ?>" required> <?php echo $row->jenis ?><?php echo $row->rekening ?> | <?php echo $row->nomor ?> | <?php echo $row->atas_nama ?>
				<br>
			<?php
			}
			?>
			<br>

			<p>Waktu Pengambilan Pesanan</p>
			<div class="row">
				<div class="col-md-4">

					<input type="date" name="estimasi" id="estimasi" class="form-control" title="masukan tanggal" required autocomplete="off">

				</div>


			</div>

			<button type="submit" class="btn btn-primary" name="selesai">Selesai</button>
			<div class="gap gap-small"></div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(function() {
		$("#estimasi").datepicker({
			minDate: 0
		});
	});
</script>