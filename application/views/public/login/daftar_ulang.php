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
                <h5 class="card-title">Proses Daftar Ulang Langkah 1-3</h5>

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
						if ($this->session->userdata('dustep') == 1 || empty($this->session->userdata('dustep'))) { ?>
					<form class="form-horizontal" action="<?php echo base_url('dlogin/proses_daftar_ulang_1');?>" method="post">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Status Data Diri</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<p>Silahkan Cek Kembali Status Pengisian Data Diri Anda, Pastikan Status Masing-masing bagian Sudah <a href="" class="btn btn-success"><i class="fa fa-check"></i> Lengkap</a>. Bila Status <a href="" class="btn btn-danger"><i class="fa fa-times"></i> Belum Lengkap</a> Harap Cek Kembali Di Menu Data Diri Kemungkinan Masih Ada Kolom Yang Kosong Sebelum Melanjutkan Ke Tahap Berikutnya.</p>
							</div>
						</div>
						<div class="form-group row">
							<label for="identiti" class="col-sm-4 col-form-label">Identitas Diri</label>
							<div class="col-sm-8">
								<?php if ($identitasku == 0) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/identitas');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Lengkap</a></label>
								<?php } else { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/identitas');?>" class="btn btn-block btn-success"><i class="fa fa-check"></i> Lengkap</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1x" class="col-sm-4 col-form-label">Asal Pendidikan</label>
							<div class="col-sm-8">
								<?php if ($pendidikanku == 0) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/pendidikan');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Lengkap</a></label>
								<?php } else { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/pendidikan');?>" class="btn btn-block btn-success"><i class="fa fa-check"></i> Lengkap</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2x" class="col-sm-4 col-form-label">Data Orang Tua/Wali</label>
							<div class="col-sm-8">
								<?php if ($waliku == 0) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/ortu');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Lengkap</a></label>
								<?php } else { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/ortu');?>" class="btn btn-block btn-success"><i class="fa fa-check"></i> Lengkap</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas (<i>Bila Berkas Di Upload</i>)</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<p>Silahkan Cek Kembali Berkas Yang Di Upload Kembali, Bila Berkas Tertulis <a href="" class="btn btn-danger"><i class="fa fa-times"></i> Belum Ada</a> Maka Anda Dapat Untuk Mengupload Berkas Melalui Menu Pemberkasan->Berkas Pendaftaran Atau Anda Juga Dapat Melewati Proses Upload Berkas Untuk Menyerahkan Berkas Langsung Ke Kantor Sekretariat PMB.</p>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2x" class="col-sm-4 col-form-label">Scan KK</label>
							<div class="col-sm-8">
								<?php if(empty($berkas['kk'])) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/berkas');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Ada</a></label>
								<?php } else {?>
								<label class="col-form-label"><a href="<?php echo base_url('file/kk/').$berkas['kk'];?>" target="_blank" class="btn btn-block btn-success"><i class="fa fa-check"></i> Ada</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2x" class="col-sm-4 col-form-label">Scan KTP/Suket Pengganti KTP</label>
							<div class="col-sm-8">
								<?php if(empty($berkas['ktp'])) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/berkas');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Ada</a></label>
								<?php } else {?>
								<label class="col-form-label"><a href="<?php echo base_url('file/ktp/').$berkas['ktp'];?>" target="_blank" class="btn btn-block btn-success"><i class="fa fa-check"></i> Ada</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2x" class="col-sm-4 col-form-label">Scan Ijazah</label>
							<div class="col-sm-8">
								<?php if(empty($berkas['ijazah'])) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/berkas');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Ada</a></label>
								<?php } else {?>
								<label class="col-form-label"><a href="<?php echo base_url('file/ijazah/').$berkas['ijazah'];?>" target="_blank" class="btn btn-block btn-success"><i class="fa fa-check"></i> Ada</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2x" class="col-sm-4 col-form-label">Scan SKHUN</label>
							<div class="col-sm-8">
								<?php if(empty($berkas['skhun'])) { ?>
								<label class="col-form-label"><a href="<?php echo base_url('dlogin/berkas');?>" class="btn btn-block btn-danger"><i class="fa fa-times"></i> Belum Ada</a></label>
								<?php } else {?>
								<label class="col-form-label"><a href="<?php echo base_url('file/skhun/').$berkas['skhun'];?>" target="_blank" class="btn btn-block btn-success"><i class="fa fa-check"></i> Ada</a></label>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-10 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-info" <?php if($identitasku == 0 || $pendidikanku == 0 || $waliku == 0) { echo 'disabled'; } ?>>Selanjutnya <i class="fa fa-caret-square-right"></i></button>
							</div>
						</div>
					</div>
					</form>
						<?php } else {
							redirect(base_url('dlogin/daftar_ulang_2'));
							  }
						} elseif ($pendaftar['daftar_ulang'] == 3) { ?>
					<p>Proses Daftar Ulang Anda Telah Selesai Harap Tunggu 3x24 Jam Kerja Untuk Verifikasi Data Dan Berkas. Harap Berkas Segera <strong>Di Kirimkan</strong> Ke Kantor Sekretariat Pendaftaran Pada Hari Sabtu-Kamis Jam 08.30-16.00 Bila Berkas Memilih Tidak Di Upload.</p>
						<?php } elseif ($pendaftar['daftar_ulang'] == 4) { ?>
					<p>Proses Daftar Ulang Telah Selesai Silahkan Klik <a href="<?php echo base_url('daftar/kdu/').url_encode($this->session->userdata['nomor']);?>" class="btn btn-success" target="_blank"><i class="fa fa-download"></i> Download</a> Untuk Mengunduh Bukti Daftar Ulang Anda.</p>
						<?php } else {?>
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
