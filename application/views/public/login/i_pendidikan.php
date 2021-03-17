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
            <h1 class="m-0 text-dark">Pendidikan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Asal Pendidikan</li>
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
                <h5 class="card-title">Asal Pendidikan</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_pendidikan');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="asal" class="col-sm-4 col-form-label">Asal Instansi / Sekolah</label>
							<div class="col-sm-8">
								<select name="asal" id="asal" class="form-control" required>
									<option value="<?php echo $pendidikan['asal_sekolah'];?>"  selected><?php echo getAsalSekolah($pendidikan['asal_sekolah']);?></option>
									<option value="SMA">Sekolah Menengah Atas (SMA)</option>
									<option value="MA">Madrasah Aliyah (MA)</option>
									<option value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
									<option value="Pondok">Pondok Pesantren</option>
									<option value="D1">Diploma 1 (D1)</option>
									<option value="D2">Diploma 2 (D2)</option>
									<option value="D3">Diploma 3 (D3)</option>
									<option value="S1">Sarjana (S1)</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan ex: IPS/IPA/Keagamaan/Lainnya" value="<?php echo $pendidikan['jurusan'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="ns" class="col-sm-4 col-form-label">Negeri / Swasta</label>
							<div class="col-sm-8">
								<select name="ns" id="ns" class="form-control" required>
									<option value="<?php echo $pendidikan['status_sekolah'];?>" selected><?php if ($pendidikan['status_sekolah'] == "") { echo '-- Status Sekolah --'; } else { echo $pendidikan['status_sekolah']; }?></option>
									<option value="Negeri">Negeri</option>
									<option value="Swasta">Swasta</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="instan" class="col-sm-4 col-form-label">Nama Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="instan" name="instan" placeholder="Instansi Pendidikan" value="<?php echo $pendidikan['nama_sekolah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_instan" class="col-sm-4 col-form-label">Alamat Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat_instan" name="alamat_instan" placeholder="Alamat Instansi / Sekolah" value="<?php echo $pendidikan['alamat_sekolah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="telp_instan" class="col-sm-4 col-form-label">Telepon Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="telp_instan" name="telp_instan" placeholder="Telepon Instansi / Sekolah" value="<?php echo $pendidikan['telp_instansi'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nisn" class="col-sm-4 col-form-label">NISN</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nisn" name="nisn" placeholder="Bila Ada" value="<?php echo $pendidikan['nisn'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Nilai Rata-rata Raport/UN/Jumlah Hafalan Juz</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nilai" name="nilai" placeholder="Khusus Bagi Yang Mengambil Jalur UN" value="<?php echo $pendidikan['nilai'];?>"  readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="submit" class="col-sm-4 col-form-label"></label>
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
