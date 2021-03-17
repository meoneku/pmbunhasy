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
            <h1 class="m-0 text-dark">Upload Bukti Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Bukti Pembayaran</li>
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
            <div class="card <?php if ($iden['lulus_seleksi'] == '1') { echo 'collapsed-card'; }?>">
              <div class="card-header">
                <h5 class="card-title">Upload Bukti Bayar Pendaftaran</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_pembayaran');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="bayarpen" class="col-sm-4 col-form-label">Upload Bukti Pembayaran</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="bayarpen" name="bayarpen" required <?php //if ($iden['status'] != '0') { echo 'disabled';}?> disabled>
								<label class="custom-file-label" for="bayarpen">Pilih Berkas</label>
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
							<label for="bayarpen" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-info"><?php if($bayarpen['status_bukti'] == 1){ echo "Proses Verfikasi Bukti Pembayaran Pendaftaran Anda Sedang Di Proses Harap Tunggu 2x24 Jam Untuk Verfikasi";} elseif ($bayarpen['status_bukti'] == 2) { echo "Bukti Pembayaran Anda Telah Terverikasi, Anda Dapat Melakukan Unggah/Upload Berkas Melakui Menu Berkas Pendaftaran";} elseif ($bayarpen['status_bukti'] == 3) { echo "Verifikasi Bukti Pembayaran Pendaftaran Anda Di Tolak Karena:</br>".$bayarpen['ket'];}?></i>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary" disabled>Simpan</button>
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
					<i>- Harap Pastikan Sebelum Upload Bukti Pembayaran Dapat Terlihat Dengan Jelas</i></br>
					<i>- Bukti Pembauaran Akan Di Verifikasi Dalam Waktu 2x24 Jam, Dan Akan Ada Notifikasi Di Bahwa Pembayaran Sudah Terverfikasi Atau Belum</i>
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
            <div class="card <?php if ($iden['lulus_seleksi'] != '1') { echo 'collapsed-card'; }?>">
              <div class="card-header">
                <h5 class="card-title">Upload Bukti Bayar Daftar Ulang</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" <?php if($iden['lulus_seleksi'] != '1') { echo 'disabled'; }?>>
                    <i class="fas fa-plus"></i>
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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_daftar_ulang');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="bayarulang" class="col-sm-4 col-form-label">Upload Bukti Daftar Ulang</label>
							<div class="col-sm-8">
							 <div class="input-group">
							   <div class="custom-file">
								<input type="file" class="custom-file-input" id="bayarulang" name="bayarulang" required <?php if ($iden['daftar_ulang'] >= '1') { echo 'disabled';}?>>
								<label class="custom-file-label" for="bayarpen">Pilih Berkas</label>
							   </div>
							  </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarulang" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-danger">Maksimum Ukuran File Sebesar 2048 Kb, Bisa Dalam Bentuk Foto/Gambar (jpg, jpeg, png) Atau Scan Dokumen (Pdf)</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="bayarulang" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<i class="text-info"><?php if($bayarulang['status_bukti'] == 1){ echo "Proses Verfikasi Bukti Pembayaran Daftar Ulang Anda Sedang Di Proses Harap Tunggu 2x24 Jam Untuk Verfikasi";} elseif ($bayarulang['status_bukti'] == 2) { echo "Bukti Pembayaran Anda Telah Terverikasi, Anda Dapat Melakukan Unggah/Upload Berkas Melakui Menu Berkas Pendaftaran";} elseif ($bayarulang['status_bukti'] == 3) { echo "Verifikasi Bukti Pembayaran Daftar Ulang Anda Di Tolak Karena:</br>".$bayarpen['ket'];}?></i>
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
					<i>- Untuk Rincian Biaya Dapat Di Lihat <a href="<?php echo base_url('file/Daftar-Ulang-Maba-2020.pdf');?>" class="button btn-success">Di Sini</a><br>
					<i>- Jika Tidak Dapat Melakukan Upload Bukti Daftar Ulang Pastikan Anda Sudah Terverifikasi Telah Melakukan Pembayaran Biaya Pendaftaran</i></br>
					<i>- Harap Pastikan Sebelum Upload Bukti Pembayaran Dapat Terlihat Dengan Jelas</i></br>
					<i>- Bukti Pembauaran Akan Di Verifikasi Dalam Waktu 2x24 Jam, Dan Akan Ada Notifikasi Di Bahwa Pembayaran Sudah Terverfikasi Atau Belum</i>
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
  <script src="<?php echo base_url();?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
  </script>
