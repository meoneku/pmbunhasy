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
            <h1 class="m-0 text-dark">Ubah Prodi Di Terima</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Ubah Prodi Di Terima</li>
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
                <h5 class="card-title">Ubah Prodi</h5>

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
				  <div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Cek Kembali</h5>
					Harap cek kembali sebelum melakukan perubahan agar tidak terjadi kesalahan.
				  </div>
				  <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/ubahprodi');?>" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="nomor" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor Pendaftar" value="<?php echo $pendaftar['nomor'];?>" readonly>
								<input type="hidden" name="id" value="<?php echo url_encode($pendaftar['nomor']);?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo $pendaftar['nama'];?>" readonly>
								<input type="hidden" name="name" value="<?php echo $pendaftar['nama'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $pendaftar['kelas'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil" class="col-sm-4 col-form-label">Prodi Di Terima</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="pil" id="pil" placeholder="Pilihanmu" value="<?php echo getProdi($pendaftar['prodi']);?>" readonly>
								<input type="hidden" name="oldprodi" id="oldprodi" value="<?php echo $pendaftar['prodi'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-danger">Data Perubahan</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="suratasal" class="col-sm-4 col-form-label">Upload Surat Asal Prodi</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="suratasal" name="suratasal" required>
										<label class="custom-file-label" for="suratasal">Pilih Berkas</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="suratterima" class="col-sm-4 col-form-label">Upload Surat Prodi Penerima</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="suratterima" name="suratterima" required>
										<label class="custom-file-label" for="suratterima">Pilih Berkas</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prodi" class="col-sm-4 col-form-label">Prodi Yang Di Rubah</label>
							<div class="col-sm-8">
								<select name="prodi" class="form-control" id="prodi" required>
									<option value="" selected>Pilih Prodi Yang Di Rubah</option>
									<option value="1">S1 Hukum Keluarga</option>
									<option value="2">S1 Hukum Ekonomi Syariah</option>
									<option value="3">S1 Komunikasi Dan Penyiaran Islam</option>
									<option value="4">S1 Pendidikan Agama Islam</option>
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
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-edit"></i> Ubah</button>
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
  <script src="<?php echo base_url();?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
  </script>