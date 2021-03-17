<?php $this->load->view('admin/_parsial/header');?>

    <?php $this->load->view('admin/_parsial/menu');?>
	
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
            <h1 class="m-0 text-dark">Pengajuan Perubahan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Perubahan</li>
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
                <h5 class="card-title">Data Sebelum Perubahan</h5>

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
			    <div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Cek Kembali</h5>
					Harap cek kembali Pilihan Jurusan, Jalur/Program & Jenjang sebelum menyetujui perubahan yang diajukan.
				</div>
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('adminact/simpan_ajuan');?>" method="post">
					<div class="card-body">
						<div class="form-group row">
							<label for="nomor" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor" value="<?php echo $ubah['nomor'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nomor" value="<?php echo $ubah['nama'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="jalurdisabled" class="col-sm-4 col-form-label">Jalur/Program Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jalurdisabled" name="jalurdisabled" placeholder="Jalur Yang Pilih" value="<?php echo $ubah['jalur'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelasdisabled" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kelasdisabled" name="kelasdisabled" placeholder="Kelas" value="<?php echo $ubah['kelas'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1disabled" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Pertama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil1disabled" name="pil1disabled" placeholder="Pilihan Jurusan/Prodi Pertama" value="<?php echo getProdi($ubah['pil1']);?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2disabled" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Kedua</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil2disabled" name="pil2disabled" placeholder="Pilihan Jurusan/Prodi Kedua" value="<?php echo getProdi($ubah['pil2']);?>" disabled>
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
					
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
		  
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Data Yang Di Rubah</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/simpan_ajuan');?>" method="post">
				      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="jalur" class="col-sm-4 col-form-label">Jalur/Program Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jalur" name="jalur" placeholder="Jalur Yang Pilih" value="<?php echo $ubah['jalur_r'];?>" readonly>
								<input type="hidden" name="jalurlama" value="<?php echo $ubah['jalur'];?>">
								<input type="hidden" name="id" value="<?php echo $ubah['id_perubahan'];?>">
								<input type="hidden" name="nomor" value="<?php echo $ubah['nomor'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?php echo $ubah['kelas_r'];?>" readonly>
								<input type="hidden" name="kelaslama" value="<?php echo $ubah['kelas'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1x" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Pertama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil1x" name="pil1x" placeholder="Pilihan Jurusan/Prodi Pertama" value="<?php echo getProdi($ubah['pil1_r']);?>" readonly>
								<input type="hidden" name="pil1lama" value="<?php echo $ubah['pil1'];?>">
								<input type="hidden" name="pil1" value="<?php echo $ubah['pil1_r'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2x" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Kedua</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil2x" name="pil2x" placeholder="Pilihan Jurusan/Prodi Kedua" value="<?php echo getProdi($ubah['pil2_r']);?>" readonly>
								<input type="hidden" name="pil2lama" value="<?php echo $ubah['pil2'];?>">
								<input type="hidden" name="pil2" value="<?php echo $ubah['pil2_r'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="alasan" class="col-sm-4 col-form-label">Alasan Perubahan</label>
							<div class="col-sm-8">
								<textarea id="alasan" name="alasan" class="form-control" rows="3" readonly>
								<?php echo $ubah['keterangan'];?>
								</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="terima" class="col-sm-4 col-form-label">Di Terima?</label>
							<div class="col-sm-8">
								<select name="konfir" id="konfir" class="form-control" required>
									<option value="" selected>Pilih Salah Satu</option>
									<option value="2">Tolak</option>
									<option value="1">Terima</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="alasan" class="col-sm-4 col-form-label">Alasan Tidak Di Terima</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alasan" name="alasan" placeholder="Alasan Tidak Diterima">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Proses</button>
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
					<i>- Untuk Kelas Sore Yang Di Buka Hanya Prodi Umum Saja.</br>
					- Pastikan Kesamaan Jenjang Untuk Pilihan Prodi 1 & 2 Sama.</br>
					- Pastikan Alasan Perubahan.</i>
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
