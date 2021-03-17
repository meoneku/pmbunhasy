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
            <h1 class="m-0 text-dark">Daftar Ulang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Proses Daftar Ulang</li>
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
                <h5 class="card-title">Proses Daftar Ulang Langkah 2-3</h5>

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
					<?php if ($pendaftar['daftar_ulang'] == 1) {?>
					<p>Pembayaran Daftar Ulang Anda Sedang Dalam Proses Verifikasi, Harap Tunggu Maks 2x24 Jam Kerja Untuk Verifikasi. Anda Dapat Melihat Bukti Daftar Ulang Anda <s href="<?php echo base_url('file/bukti_daftar_ulang/').$bayarulang['bukti_daftar'];?>" >Di Sini</a></p>
					<?php } else if($pendaftar['daftar_ulang'] == 2) { 
						if ($this->session->userdata('dustep') == 2) {?>
					<form class="form-horizontal" action="<?php echo base_url('dlogin/proses_daftar_ulang_2');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Upload/Unggah Foto</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2">
								<?php if (empty($berkas['foto'])) {
									$foto  = base_url('file/foto/default.png');
								} else {
									$foto  = base_url('file/foto/').$berkas['foto'];
								} ?>
								<img width="178" height="224" src="<?php echo $foto;?>">
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="foto" name="foto">
										<label class="custom-file-label" for="foto">Foto</label>
									</div>
								</div>
							</div>
							<div class="col-sm-10"></br>
								<p>Silahkan Unggah/Upload Pas Foto Dengan Ukuran (Ratio) 3 x 4 atau 3 : 4 Dengan Warna Background Merah Atau Biru Dengan Berpakaian Rapi Dengan Mengklik Tombol Upload Foto Bawah Gambar/Foto</p>
								<p>Dan Pastikan File Yang Di Upload/Unggah Ber Ekstensi JPG, PNG, BMP, Dan Jangan Mengupload/Mengunggah Dengan Tipe PDF Agar Foto Tetap Dapat Terbaca Dengan Baik.</p>
								<p>Pastikan Gambar Foto Sudah Sesuai Dengan Yang Di Syaratkan Karena Untuk Kebutuhan Kartu Tanda Mahasiswa</p>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2">
								</br>
								<a href="<?php echo base_url('dlogin/kembali_daftar_ulang_1');?>" class="btn btn-block btn-warning" ><i class="fa fa-caret-square-left"></i> Kembali</a>
							</div>
							<div class="col-sm-8">
								</br>
							</div>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-info">Selanjutnya <i class="fa fa-caret-square-right"></i></button>
							</div>
						</div>
					</div>
					</form>
					<?php } else {
							redirect(base_url('dlogin/daftar_ulang_3'));
						  }
						} else {?>
					<p>Anda Belum Melakukan Pembayaran Daftar Ulang, Untuk Mengetahui Rincian Tentang Biaya Daftar Ulang Silahkan Download Rincian Daftar Ulang <a href="<?php echo base_url('file/Daftar-Ulang-Maba-2020.pdf');?>" class="btn btn-success">Di Sini</a>. Pembayaran Dapat Di Transfer Ke <strong><?php echo $bank;?></strong> Dengan Nomor Rekening <strong><?php echo $rek;?></strong> Atas Nama Universitas Hasyim Asy'ari Dan Unggah/Upload Bukti Daftar Ulang Ke Bagian Menu Pemberkasan Bukti Pembayaran</p>
					<?php } ?>
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
