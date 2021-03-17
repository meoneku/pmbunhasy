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
								<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo getProdi($pendaftar['prodi']);?>" readonly>
							</div>
						</div>
<?php foreach($history as $riwayat) { ?>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-danger"></a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Prodi Asli</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo getProdi($riwayat['prodi_asal']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Data Ubah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="perubahan" name="perubahan" placeholder="perubahan" value="<?php echo getProdi($riwayat['prodi_terima']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="waktu" class="col-sm-4 col-form-label">Waktu Update</label>
							<div class="col-sm-8">
								<div class="row">
									<?php
									$tanggal = new DateTime($riwayat['waktu_ubah']);
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
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Surat Asal Prodi</label>
							<div class="col-sm-8">
								<a href="<?php echo base_url('file/pindahprodi/').$riwayat['surat_asal'];?>" target="_blank"><?php echo $riwayat['surat_asal'];?></a>
							</div>
						</div>
						<div class="form-group row">
							<label for="perubahan" class="col-sm-4 col-form-label">Surat Prodi Penerima</label>
							<div class="col-sm-8">
								<a href="<?php echo base_url('file/pindahprodi/').$riwayat['surat_terima'];?>" target="_blank"><?php echo $riwayat['surat_terima'];?></a>
							</div>
						</div>
<?php } ?>