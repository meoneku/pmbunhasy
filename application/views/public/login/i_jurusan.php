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
            <h1 class="m-0 text-dark">Pilihan Jurusan / Prodi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Pilihan Jurusan / Prodi</li>
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
                <h5 class="card-title">Perubahan Pilihan Jurusan / Prodi</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_jurusan');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row  text-center">
							<label for="nama" class="col-sm-12 col-form-label">Pilihan / Data Awal</label>
						</div>
						<div class="form-group row">
							<label for="jalurdisabled" class="col-sm-4 col-form-label">Jalur/Program Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jalurdisabled" name="jalurdisabled" placeholder="Jalur Yang Pilih" value="<?php echo $jurusan['jalur'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelasdisabled" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kelasdisabled" name="kelasdisabled" placeholder="Kelas" value="<?php echo $jurusan['kelas'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1disabled" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Pertama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil1disabled" name="pil1disabled" placeholder="Pilihan Jurusan/Prodi Pertama" value="<?php echo getProdi($jurusan['pil1']);?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2disabled" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Kedua</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil2disabled" name="pil2disabled" placeholder="Pilihan Jurusan/Prodi Kedua" value="<?php echo getProdi($jurusan['pil2']);?>" disabled>
							</div>
						</div>
						</br>
						<div class="form-group row text-center"">
							<label for="nama" class="col-sm-12 col-form-label">Perubahan</label>
						</div>
						<div class="form-group row">
							<label for="jalur" class="col-sm-4 col-form-label">Jalur/Program Pendaftaran</label>
							<div class="col-sm-8">
								<select name="jalur" class="form-control" id="jalur" <?php echo $prote;?>>
									<option value="" selected>Jalur Pendaftaran</option>
									<option value="Reguler">Reguler</option>
									<option value="Nilai UN">Nilai UN</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<select name="kelas" class="form-control" id="kelas" <?php echo $prote;?>>
									<option value="" selected>Kelas</option>
									<option value="Pagi">Pagi</option>
									<option value="Sore">Sore</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Pertama</label>
							<div class="col-sm-8">
								<select name="pil1" class="form-control" id="pil1" <?php echo $prote;?>>
									<option value="" selected>Pilihan Prodi Pertama</option>
									<option value="1">S1 Hukum Keluarga</option>
									<option value="2">S1 Hukum Ekonomi Syariah</option>
									<option value="3">S1 Komunikasi Dan Penyiaran Islam</option>
									<option value="5">S1 Pendidikan Bahasa Arab</option>
									<option value="6">S1 Pendidikan Guru MI</option>
									<option value="24">S1 Manajemen Pendidikan Agama Islam</option>
									<option value="7">S1 Teknik Mesin</option>
									<option value="8">S1 Teknik Elektro</option>
									<option value="9">S1 Teknik Sipil</option>
									<option value="10">S1 Teknik Industri</option>
									<option value="11">S1 Informatika</option>
									<option value="12">S1 Sistem Informasi</option>
									<option value="13">D3 Manajemen Informatika</option>
									<option value="14">S1 Manajemen</option>
									<option value="15">S1 Akutansi</option>
									<option value="16">S1 Ekonomi Islam</option>
									<option value="17">S1 Pendidikan Guru SD</option>
									<option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option>
									<option value="19">S1 Pendidikan Bahasa Inggris</option>
									<option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option>
									<option value="21">S1 Pendidikan Matematika</option>
									<option value="22">S2 Hukum Keluarga</option>
									<option value="23">S2 Pendidikan Agama Islam</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Kedua</label>
							<div class="col-sm-8">
								<select name="pil2" class="form-control" id="pil2" <?php echo $prote;?>>
									<option value="" selected>Pilihan Prodi Kedua</option>
									<option value="1">S1 Hukum Keluarga</option>
									<option value="2">S1 Hukum Ekonomi Syariah</option>
									<option value="3">S1 Komunikasi Dan Penyiaran Islam</option>
									<option value="5">S1 Pendidikan Bahasa Arab</option>
									<option value="6">S1 Pendidikan Guru MI</option>
									<option value="24">S1 Manajemen Pendidikan Agama Islam</option>
									<option value="7">S1 Teknik Mesin</option>
									<option value="8">S1 Teknik Elektro</option>
									<option value="9">S1 Teknik Sipil</option>
									<option value="10">S1 Teknik Industri</option>
									<option value="11">S1 Informatika</option>
									<option value="12">S1 Sistem Informasi</option>
									<option value="13">D3 Manajemen Informatika</option>
									<option value="14">S1 Manajemen</option>
									<option value="15">S1 Akutansi</option>
									<option value="16">S1 Ekonomi Islam</option>
									<option value="17">S1 Pendidikan Guru SD</option>
									<option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option>
									<option value="19">S1 Pendidikan Bahasa Inggris</option>
									<option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option>
									<option value="21">S1 Pendidikan Matematika</option>
									<option value="22">S2 Hukum Keluarga</option>
									<option value="23">S2 Pendidikan Agama Islam</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="alasan" class="col-sm-4 col-form-label">Alasan Perubahan</label>
							<div class="col-sm-8">
							    <input type="text" name="alasan" id="alasan" class="form-control" placeholder="Masukkan Alasan Berubah" <?php echo $prote;?>>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">
									<?php if ($ajuan == 1) {echo "Proses Pengajuan Perubahan Anda Sedang Di Proses, Harap Tunggu 2x24 Jam. Untuk Sementara Anda Tidak Dapat Melakukan Perubahan Sampai Perubahan Sebelumnya Selesai Diverifikasi.";}?>
								</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary" <?php echo $prote;?>>Simpan</button>
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
					<i>- Proses Pengajuan Perubahan Jalur/Program Pendaftaran, Kelas Dan Jurusan/Prodi Membutuhkan Waktu 2x24 Jam</i>
					<i>- Setelah Melakukan Tes / Sudah Di Umumkan Diterima Maka Sudah Tidak Di Perkenankan Melakukan Perubahan Pilihan Jalur/Program, Kelas Dan Jurusan/Prodi</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
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
