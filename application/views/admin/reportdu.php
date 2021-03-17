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
            <h1 class="m-0 text-dark">REPORT DAFTAR ULANG</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin/admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
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
                <h5 class="card-title">Masukkan Kriteria</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('webmin/report/viewdu');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="jurusan" class="col-sm-4 col-form-label">Prodi</label>
							<div class="col-sm-8">
								<select name="jurusan" id="jurusan" class="form-control">
									<option value="0" selected>Semua Prodi</option>
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
								<button type="submit" class="btn btn-block btn-primary"><i class="fas fa-search"></i> Tampilkan</button>
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
					<i></i>
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
