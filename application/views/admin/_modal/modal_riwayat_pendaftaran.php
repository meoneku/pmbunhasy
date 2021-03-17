						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo $pendaftar['nomor'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Nama</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo $pendaftar['nama'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Prodi Pilihan</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo getProdi($pendaftar['pil1']);?>" readonly>
							</div>
						</div>
<?php foreach($history as $riwayat) {
	if ($riwayat['perubahan'] == 'Pilihan 1') {
		$data_asli  = getProdi($riwayat['data_asli']);
		$data_ubah  = getProdi($riwayat['data_ubah']);
	} else if ($riwayat['perubahan'] == 'Pilihan 2') {
		$data_asli  = getProdi($riwayat['data_asli']);
		$data_ubah  = getProdi($riwayat['data_ubah']);
	} else if ($riwayat['perubahan'] == 'Status Berkas') {
		$data_asli  = getStatusBerkasAdmin($riwayat['data_asli']);
		$data_ubah  = getStatusBerkasAdmin($riwayat['data_ubah']);
	} else if ($riwayat['perubahan'] == 'Prodi') {
		$data_asli  = getProdi($riwayat['data_asli']);
		$data_ubah  = getProdi($riwayat['data_ubah']);
	} else if ($riwayat['perubahan'] == 'Daftar Ulang') {
		$data_asli  = getStatusDaftarUlangPublic($riwayat['data_asli']);
		$data_ubah  = getStatusDaftarUlangPublic($riwayat['data_ubah']);
	} else {
		$data_asli  = $riwayat['data_asli'];
		$data_ubah  = $riwayat['data_ubah'];
	}
	?>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-danger"></a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Perubahan</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo $riwayat['perubahan'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Data Asli</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo $data_asli;?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Data Ubah</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo $data_ubah;?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="waktu" class="col-sm-4 col-form-label">Waktu Update</label>
							<div class="col-sm-8">
								<div class="row">
									<?php
									$tanggal = new DateTime($riwayat['waktu']);
									$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
									$jam     = $tanggal->format('H:i:s'); ?>
									<div class="col-8">
										<input type="text" class="form-control" id="waktu" name="tanggal" placeholder="Tanggal Terakhir Update" value="<?php echo $indotgl;?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="waktu" name="jam" placeholder="Waktu Terakhir Update" value="<?php echo $jam;?>" readonly>
									</div>
								</div>
							</div>
						</div>
<?php } ?>