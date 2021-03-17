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
            <h1 class="m-0 text-dark">Verifikasi Calon Mahasiswa Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Verifikasi</li>
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
                <h5 class="card-title">Verifikasi</h5>

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
					Harap cek kembali sebelum memverifikasi bukti pembayaran agar tidak terjadi kesalahan.
				</div>
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('webmin/du/onlinedu');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Verifikasi Untuk</label>
							<div class="col-sm-8">
								<input type="text" name="nama" class="form-control" value="<?php echo $pendaftar['nama'];?>" readonly>
								<input type="hidden" name="id" value="<?php echo $pendaftar['nomor'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Jalur/Program</label>
							<div class="col-sm-8">
								<input type="text" name="jalur" class="form-control" value="<?php echo $pendaftar['jalur'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Prodi Di Terima</label>
							<div class="col-sm-8">
								<input type="text" name="jalur" class="form-control" value="<?php echo getProdi($pendaftar['prodi']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Bank/No. Rekening</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" name="bank" class="form-control" value="<?php echo $bank['bank'];?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" name="bank" class="form-control" value="<?php echo $bank['rekening'];?>" readonly>
									</div>
								</div>
							</div>
						</div></br>
						<?php if ($transfer['bukti_daftar'] != "") {?>
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<embed width="800" height="450" src="<?php echo base_url('file/bukti_daftar_ulang/').$transfer['bukti_daftar'];?>" type="application/pdf"></embed>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Tanggal Upload Bukti Pembayaran</label>
							<div class="col-sm-8">
								<input type="hidden" name="id_b" value="<?php echo $transfer['id_bayar'];?>">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo getTanggalIndo($transfer['tanggal_upload']);?>" disabled>
							</div>
						</div><?php } ?>
						<div class="form-group row">
							<label for="terima" class="col-sm-4 col-form-label">Konfirmasi Bukti Transfer</label>
							<div class="col-sm-8">
								<select name="konfir" id="konfir" class="form-control" required>
									<option value="" selected>Pilih Salah Satu</option>
									<option value="2">Tolak</option>
									<option value="1">Terima</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="alasan" class="col-sm-4 col-form-label">Alasan Di Tolak</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alasan" name="alasan" placeholder="Alasan Di Tolak">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i> Simpan</button>
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

  <?php $this->load->view('admin/_parsial/footer');?>
