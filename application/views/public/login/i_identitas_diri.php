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
            <h1 class="m-0 text-dark">Identitas Diri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Identitas Diri</li>
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
                <h5 class="card-title">Edit Identitas Diri</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_identitas');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama Sesuai Dengan Ijazah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $identitas['nama'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label">Alamat Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $identitas['email'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-8">
								<select name="jk" id="jk" class="form-control" required>
									<option value="<?php echo $identitas['gender'];?>" selected><?php echo $identitas['gender'];?></option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="hp" class="col-sm-4 col-form-label">Nomor Yang Dapat Dihubungi</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="hp" name="hp" placeholder="No Telepon / Handphone" value="<?php echo $identitas['hp'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik" class="col-sm-4 col-form-label">NIK / KTP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?php echo $identitas['nik'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="ttl" class="col-sm-4 col-form-label">Tempat Dan Tanggal Lahir</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-7">
										<input type="text" class="form-control" id="ttl" name="tlah" placeholder="Tempat Lahir" value="<?php echo $identitas['tempat_lahir'];?>" required>
									</div>
									<div class="col-5">
										<input type="date" class="form-control" id="ttl" name="tgl" placeholder="Tanggal Lahir" value="<?php echo $identitas['tanggal_lahir'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat Tinggal Sekarang</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Jalan / Dusun" value="<?php echo $identitas['alamat'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="rtrw" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rt" placeholder="RT" value="<?php echo $identitas['rt'];?>" required>
									</div>
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rw" placeholder="RW" value="<?php echo $identitas['rw'];?>" required>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Desa/Kelurahan" value="<?php echo $identitas['desa'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prov" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kec" placeholder="Kecamatan" value="<?php echo $identitas['kec'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kab" placeholder="Kabupaten" value="<?php echo $identitas['kab'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" value="<?php echo $identitas['prov'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
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
					<i>(* Harap Di Isi Dengan Huruf Capital (Huruf Besar Setiap Kata) ex: <strong>M</strong>uhammad&nbsp;<strong>S</strong>lamet</i>
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
