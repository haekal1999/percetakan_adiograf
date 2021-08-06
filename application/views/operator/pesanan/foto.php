<div class="col-12">
	<div class="card">
		<div class="card-body">
			<?php
			if ($spanduk != null) :
			?>
				<h3 class="card-title">
					Foto Spanduk Indoor
				</h3>
				<img src="<?= base_url('uploads/Spanduk/' . $spanduk['spanduk_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>
			<?php
			if ($xbanner != null) :
			?>
				<h3 class="card-title">
					Foto X-Banner
				</h3>
				<img src="<?= base_url('uploads/Xbanner/' . $xbanner['xbanner_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>
			<?php
			if ($spanduk_outdoor != null) :
			?>
				<h3 class="card-title">
					Foto Spanduk Outdoor
				</h3>
				<img src="<?= base_url('uploads/Spanduk_Outdoor/' . $spanduk_outdoor['spanduk_outdoor_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>
			<?php
			if ($flyer != null) :
			?>
				<h3 class="card-title">
					Flyer </h3>
				<img src="<?= base_url('uploads/Flyer/' . $flyer['flyer_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>

			<?php
			if ($brosur != null) :
			?>
				<h3 class="card-title">
					Brosur </h3>
				<img src="<?= base_url('uploads/Brosur/' . $brosur['brosur_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>

			<?php
			if ($kartu_nama != null) :
			?>
				<h3 class="card-title">
					Kartu Nama </h3>
				<img src="<?= base_url('uploads/KartuNama/' . $kartu_nama['kartu_nama_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>

			<?php
			if ($undangan != null) :
			?>
				<h3 class="card-title">
					Undangan </h3>
				<img src="<?= base_url('uploads/Undangan/' . $undangan['undangan_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>

			<?php
			if ($sertifikat != null) :
			?>
				<h3 class="card-title">
					Sertifikat </h3>
				<img src="<?= base_url('uploads/Sertifikat/' . $sertifikat['sertifikat_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>

			<?php
			if ($kalender != null) :
			?>
				<h3 class="card-title">
					Kalender </h3>
				<img src="<?= base_url('uploads/Kalender/' . $kalender['kalender_foto']) ?>" style="width: 50%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					</div>
				</div>
			<?php
			endif;
			?>
		</div>
	</div>
</div>