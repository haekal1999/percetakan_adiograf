<div class="gap"></div>
<form action="<?= base_url('ProfilController/update_konfirmasi') ?>" method="post">
	<input type="hidden" name="konfirmasi_faktur_id" value="<?php echo $edit_konfirmasi->konfirmasi_faktur_id ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<h4><i class="fa fa-check"></i>Edit Konfirmasi Pembayaran</h4>
				<div class="row" data-gutter="10">
					<div class="col-md-12">
						<div class="box">
							<div class="form-group">
								<label for="">Nomor Rekening :</label>
								<input type="number" class="form-control" id="rekening" name="rekening" placeholder="Nomor Rekening" required autocomplete="off" value="<?php echo $edit_konfirmasi->konfirmasi_rekening ?>">
							</div>
							<div class="form-group">
								<label for="">Atas Nama :</label><br>
								<input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Atas Nama" required autocomplete="off" value="<?php echo $edit_konfirmasi->konfirmasi_atas_nama ?>">
							</div>
							<div class="form-group">
								<label for="">Nominal Transfer (Rp.) :</label>
								<input type="number" name="nominal" class="form-control" id="nominal" required autocomplete="off" value="<?php echo $edit_konfirmasi->konfirmasi_nominal ?>">
							</div>
							<div class="form-group">
								<label for="">Upload Struk :</label>
								<input type="file" class="form-control" required id="struk" name="struk" value="<?php echo $edit_konfirmasi->konfirmasi_struk ?>">
							</div>
							<br>
							<button type="submit" class="btn btn-block btn-primary" name="konfirmasi"><i class="fa fa-check"></i>Edit
							</button>
						</div>
					</div>
				</div>
			</div>
</form>

</div>
</div>