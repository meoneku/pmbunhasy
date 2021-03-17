<?php $this->load->view('public/login/_parsial/header');?>

    <?php $this->load->view('public/login/_parsial/menu');?>
	
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload Berkas Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Berkas Pendaftaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Upload Berkas Pendaftaran (Syarat Umum) <i>Wajib</i></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_berkas_umum');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="kk" class="col-sm-4 col-form-label">Berkas Pendaftaran Kartu Keluarga (KK)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="kk" name="kk">
								<label class="custom-file-label" for="kk">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="ktp" class="col-sm-4 col-form-label">Kartu Tanda Penduduk (KTP) / Surat Keterangan</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="ktp" name="ktp">
								<label class="custom-file-label" for="ktp">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="ijazah" class="col-sm-4 col-form-label">Ijazah Terakhir</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="ijazah" name="ijazah">
								<label class="custom-file-label" for="ijazah">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="skhun" class="col-sm-4 col-form-label">SKHUN</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="skhun" name="skhun">
								<label class="custom-file-label" for="skhun">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="foto" class="col-sm-4 col-form-label">Foto Close Up Background Biru/Merah</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="foto" name="foto">
								<label class="custom-file-label" for="foto">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<?php if($identitas['pil1'] == 22 OR $identitas['pil2'] == 23) {?>
						<div class="form-group row">
							<label for="formulir" class="col-sm-4 col-form-label">Formulir Pendaftaran Khusus S2</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="formulir" name="formulir">
								<label class="custom-file-label" for="formulir">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<?php } ?>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)
								<?php if($identitas['pil1'] == 22 OR $identitas['pil2'] == 23) {?></br>Khusus Untuk S2 Silahkan Download/Unduh Formulir Khusus <a href="<?php echo base_url('file/formulir/formulir-s2.pdf');?>" >Di Link Ini</a>, Dan Setelah Di Isi Mohon Upload/Unggah Dokumen Formulir Tersebut Ke Kolom Yang Tersedia Di Atas<?php } ?></i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Berkas Yang Sudah Anda Unggah/Upload</label>
							<div class="col-sm-8">
								<i class="text-info">
									<?php if ($berkas['kk'] != "") {echo 'Berkas Kartu Keluarga Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/kartu_keluarga/').$berkas['kk'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Kartu Keluarga Anda Belum Ada";}?></br>
									<?php if ($berkas['ktp'] != "") {echo 'Berkas KTP Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/ktp/').$berkas['ktp'].'" target="_blank">Di Sini</a>';} else { echo "Berkas KTP Anda Belum Ada";}?></br>
									<?php if ($berkas['ijazah'] != "") {echo 'Berkas Ijazah Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/ijazah/').$berkas['ijazah'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Ijazah Anda Belum Ada";}?></br>
									<?php if ($berkas['foto'] != "") {echo 'Berkas Foto Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/foto/').$berkas['foto'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Foto Anda Belum Ada";}?></br>
									<?php if ($berkas['skhun'] != "") {echo 'Berkas SKHUN Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/skhun/').$berkas['skhun'].'" target="_blank">Di Sini</a>';} else { echo "Berkas SKHUN Anda Belum Ada";}?></br>
									<?php if($identitas['pil1'] == 22 OR $identitas['pil2'] == 23) { if ($berkas['formulirs2'] != "") {echo 'Berkas Formulir Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/formulir/').$berkas['formulirs2'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Formulir Anda Belum Ada";} }?></br>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					<i>- Harap Pastikan Dokumen Terlihat Jelas Dan Dapat Dibaca</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
		</br>
		<div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendaftaran Raport</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_berkas_raport');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="surat_kepsek" class="col-sm-4 col-form-label">SKHUN/Surat Keterangan Lulus (<i>*Opsional</i>)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="surat_kepsek" name="surat_kepsek">
								<label class="custom-file-label" for="surat_kepsek">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="surat_kepsek" class="col-sm-4 col-form-label">Nilai Rata-rata SKHUN/Surat Keterangan Lulus</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   	<input type="number" class="form-control" id="nilais" name="nilais"  placeholder="Nilai Rata-rata" value="<?php echo $berkas['ratasurat'];?>">
							 </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot1" class="col-sm-4 col-form-label">Raport Semester 1 (Satu)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="rapot1" name="rapot1">
								<label class="custom-file-label" for="rapot1">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot1" class="col-sm-4 col-form-label">Nilai Rata-rata Raport Semester 1</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   	<input type="number" class="form-control" id="nilai1" name="nilai1"  placeholder="Nilai Rata-rata" value="<?php echo $berkas['rata1'];?>">
							 </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot2" class="col-sm-4 col-form-label">Raport Semester 2 (Dua)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="rapot2" name="rapot2">
								<label class="custom-file-label" for="rapot2">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot2" class="col-sm-4 col-form-label">Nilai Rata-rata Raport Semester 2</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   	<input type="number" class="form-control" id="nilai2" name="nilai2"  placeholder="Nilai Rata-rata" value="<?php echo $berkas['rata2'];?>">
							</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot3" class="col-sm-4 col-form-label">Raport Semester 3 (Tiga)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" id="rapot3" name="rapot3">
								<label class="custom-file-label" for="rapot3">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot3" class="col-sm-4 col-form-label">Nilai Rata-rata Raport Semester 3</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   	<input type="number" class="form-control" id="nilai3" name="nilai3"  placeholder="Nilai Rata-rata" value="<?php echo $berkas['rata3'];?>">
							 </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot4" class="col-sm-4 col-form-label">Raport Semester 4 (Empat)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" id="rapot4" name="rapot4">
								<label class="custom-file-label" for="rapot4">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot4" class="col-sm-4 col-form-label">Nilai Rata-rata Raport Semester 4</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   	<input type="number" class="form-control" id="nilai4" name="nilai4"  placeholder="Nilai Rata-rata" value="<?php echo $berkas['rata4'];?>">
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot5" class="col-sm-4 col-form-label">Raport Semester 5 (Lima)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="rapot5" name="rapot5">
								<label class="custom-file-label" for="rapot5">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot5" class="col-sm-4 col-form-label">Nilai Rata-rata Raport Semester 5</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   	<input type="number" class="form-control" id="nilai5" name="nilai5"  placeholder="Nilai Rata-rata" value="<?php echo $berkas['rata5'];?>">
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Nilai Rata-rata Rapot</label>
							<div class="col-sm-8">
								<div class="col-md-5">
									<input type="number" class="form-control" id="nilai" name="nilai" placeholder="Nilai Rata-Rata Semua" value="<?php echo $berkas['rata'];?>" readonly>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Berkas Yang Sudah Anda Unggah/Upload</label>
							<div class="col-sm-8">
								<i class="text-info">
									<?php if ($berkas['surat_rapot'] != "") {echo 'SKHUN/Surat Keterangan Lulus Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/raport/').$berkas['surat_rapot'].'" target="_blank">Di Sini</a>';} else { echo "Berkas SKHUN/Surat Keterangan Lulus Anda Tidak Ada";}?></br>
									<?php if ($berkas['rapot1'] != "") {echo 'Berkas Raport Semester 1 Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/raport/').$berkas['rapot1'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Raport Semester 1 Anda Belum Ada";}?></br>
									<?php if ($berkas['rapot2'] != "") {echo 'Berkas Raport Semester 2 Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/raport/').$berkas['rapot2'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Raport Semester 2 Anda Belum Ada";}?></br>
									<?php if ($berkas['rapot3'] != "") {echo 'Berkas Raport Semester 3 Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/raport/').$berkas['rapot3'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Raport Semester 3 Anda Belum Ada";}?></br>
									<?php if ($berkas['rapot4'] != "") {echo 'Berkas Raport Semester 4 Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/raport/').$berkas['rapot4'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Raport Semester 4 Anda Belum Ada";}?></br>
									<?php if ($berkas['rapot5'] != "") {echo 'Berkas Raport Semester 5 Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/raport/').$berkas['rapot5'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Raport Semester 5 Anda Belum Ada";}?></br>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					<i>- Untuk raport yang di upload adalah raport semester 1-5.</i>
					<i>- Untuk pendaftar yang lulusan 2019, 2018 dan sebelumnya bisa menggunakan Ijazah/SKHUN (bila raport yang bersangkutan sudah tidak ada).</i>
					<i>- Untuk lulusan Paket C bisa menggunakan ijazah sebagai penggantinya.</i>
					<i>- Bila raport tidak, ijazah/SKHUN juga tidak ada bisa menggunakan SKL (Surat Keterangan Lulus)</i>
					<i>- Untuk Pascasarjana berbasis karya tulis ilmiah dan Rekom doktor (format bisa menghubungi Pascasarjana 082229998110/082123456589)</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
		</br>
		<div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendaftaran Syarat Khusus (Jalur Akademik / Non Akademik) <i>Optional</i></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_berkas_akademik');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="surat_kepsek" class="col-sm-4 col-form-label">Surat Keterangan Berprestasi Dari Kepala Sekolah</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="surat_kepsek" name="surat_kepsek">
								<label class="custom-file-label" for="surat_kepsek">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="piagam" class="col-sm-4 col-form-label">Sertifikat / Piagam Penghargaan</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="piagam" name="piagam">
								<label class="custom-file-label" for="piagam">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Berkas Yang Sudah Anda Unggah/Upload</label>
							<div class="col-sm-8">
								<i class="text-info">
									<?php if ($berkas['surat_prestasi'] != "") {echo 'Berkas Surat Rekomendasi Dari Kepala Sekolah Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/akademik/').$berkas['surat_prestasi'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Surat Rekomendasi Dari Kepala Sekolah Anda Belum Ada";}?></br>
									<?php if ($berkas['piagam'] != "") {echo 'Berkas Piagam/Sertifikat Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/akademik/').$berkas['piagam'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Piagam/Sertifikat Anda Belum Ada";}?></br>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					<i>- Harap Pastikan Dokumen Terlihat Jelas Dan Dapat Dibaca</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
		</br>
		<div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendaftaran Syarat Khusus (Tahfidz) <i>Optional</i></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_berkas_tahfidz');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="surat" class="col-sm-4 col-form-label">Surat Keterangan Hafidz Dari Pengasuh Pondok Pesantren/Syahadah</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="surat" name="surat">
								<label class="custom-file-label" for="surat">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="surat" class="col-sm-4 col-form-label">Sertifikat/Piagam/Bukti Pernah Mengikuti Lomba Tahfidz</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="piagam" name="piagam">
								<label class="custom-file-label" for="piagam">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="juz" class="col-sm-4 col-form-label">Jumlah Hafalan</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="juz" name="juz" placeholder="Jumlah Hafalan Al-Qur'an Dalam Berapa Juz" value="<?php echo $identitas['nilai'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Berkas Yang Sudah Anda Unggah/Upload</label>
							<div class="col-sm-8">
								<i class="text-info">
									<?php if ($berkas['tahfidz'] != "") {echo 'Berkas Surat Keterangan Hafidz Dari Pengasuh Pondok Pesantren/Syahadah Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/tahfidz/').$berkas['tahfidz'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Surat Keterangan Hafidz Dari Pengasuh Pondok Pesantren/Syahadah Anda Belum Ada";}?></br>
									<?php if ($berkas['piagamtahfidz'] != "") {echo 'Berkas Sertifikat/Piagam Lomba Tahfidz Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/tahfidz/').$berkas['piagamtahfidz'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Sertifikat/Piagam Lomba Tahfidz Anda Belum Ada";}?></br>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					<i>- Harap Pastikan Dokumen Terlihat Jelas Dan Dapat Dibaca</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
		<br>
		<div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendaftaran KIP <i>Optional</i></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_berkas_kip');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="kip" class="col-sm-4 col-form-label">Berkas KIP</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="kip" name="kip">
								<label class="custom-file-label" for="kip">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Berkas Yang Sudah Anda Unggah/Upload</label>
							<div class="col-sm-8">
								<i class="text-info">
									<?php if ($berkas['bkip'] != "") {echo 'Berkas KIP Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/kip/').$berkas['bkip'].'" target="_blank">Di Sini</a>';} else { echo "Berkas KIP Anda Belum Ada";}?><br>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					<i>- Harap Pastikan Dokumen Terlihat Jelas Dan Dapat Dibaca</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
		</br>
		<div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendaftaran Syarat Khusus (Bantuan Keluarga Kurang Mampu/BKKM) <i>Optional</i></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_berkas_bkkm');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="surat" class="col-sm-4 col-form-label">Surat Keterangan Tidak Mampu Dari Kelurahan/Desa</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="surat" name="surat">
								<label class="custom-file-label" for="surat">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="rapot" class="col-sm-4 col-form-label">Raport Semester 1-5</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<label for="rapot" class="col-sm-8 col-form-label">Bisa Di Upload/Unggah Di Bagian Berkas Pendaftaran Raport</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="slip" class="col-sm-4 col-form-label">Slip Gaji (<i>Bila Ada</i>)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="slip" name="slip">
								<label class="custom-file-label" for="slip">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pbb" class="col-sm-4 col-form-label">Struk Pajak Bumi Dan Bangunan</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="pbb" name="pbb">
								<label class="custom-file-label" for="pbb">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="listrik" class="col-sm-4 col-form-label">Struk Pembayaran Listrik Terakhir</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="listrik" name="listrik">
								<label class="custom-file-label" for="listrik">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="telp" class="col-sm-4 col-form-label">Struk Pembayaran Telepon (<i>Bila Ada</i>)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="telp" name="telp">
								<label class="custom-file-label" for="telp">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pdam" class="col-sm-4 col-form-label">Struk Pembayaran Air (PDAM) (<i>Bila Ada</i>)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="pdam" name="pdam">
								<label class="custom-file-label" for="pdam">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="pdam" class="col-sm-4 col-form-label">KIP (Kartu Indonesia Pintar) (<i>Bila Ada</i>)</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="kip" name="kip">
								<label class="custom-file-label" for="kip">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Berkas Yang Sudah Anda Unggah/Upload</label>
							<div class="col-sm-8">
								<i class="text-info">
									<?php if ($berkas['surat_bkkm'] != "") {echo 'Berkas Surat Keterangan Tidak Mampu Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['surat_bkkm'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Surat Keterangan Tidak Mampu Anda Belum Ada";}?></br>
									<?php if ($berkas['gaji'] != "") {echo 'Berkas Slip Gaji Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['gaji'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Slip Gaji Anda Belum Ada";}?></br>
									<?php if ($berkas['pbb'] != "") {echo 'Berkas Slip Pajak Bumi Dan Bangunan Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['pbb'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Slip Pajak Bumi Dan Bangunan Anda Belum Ada";}?></br>
									<?php if ($berkas['listrik'] != "") {echo 'Berkas Slip Pembayaran Listrik Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['listrik'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Slip Pembayaran Listrik Anda Belum Ada";}?></br>
									<?php if ($berkas['s_telp'] != "") {echo 'Berkas Slip Pembayaran Telepon Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['s_telp'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Slip Pembayaran Telepon Anda Belum Ada";}?></br>
									<?php if ($berkas['pdam'] != "") {echo 'Berkas Slip Pemabayaran Air Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['pdam'].'" target="_blank">Di Sini</a>';} else { echo "Berkas Slip Pembayaran Air Anda Belum Ada";}?></br>
									<?php if ($berkas['kip'] != "") {echo 'KIP Anda Sudah Ada, Bisa Anda Cek <a href="'.base_url('file/bkkm/').$berkas['kip'].'" target="_blank">Di Sini</a>';} else { echo "KIP Anda Belum Ada";}?></br>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					<i>- Harap Pastikan Dokumen Terlihat Jelas Dan Dapat Dibaca</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
		</br>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php $this->load->view('public/login/_parsial/footer');?>
  
  <script src="<?php echo base_url();?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
  </script>
