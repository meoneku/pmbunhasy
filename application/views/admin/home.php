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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Beranda</li>
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendaftar Terverfikasi</span>
                <span class="info-box-number"><?php echo $vdaftar;?></span>
                <small></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Daftar Ulang</span>
                <span class="info-box-number"><?php echo $daftardu;?></span>
				<small></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendaftar Hari Ini</span>
                <span class="info-box-number"><?php echo $cdaftar;?></span>
				<small></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendaftar Hari Ini Belum Verifikasi</span>
                 <span class="info-box-number"><?php echo $sdaftar;?></span>
				<small></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Selamat Datang</h5>

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
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Rekap Jumlah Total</strong>
                      <div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th>No</th>
									<th>Prodi</th>
									<th>Offline</th>
									<th>Online</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
							<?php echo $jumlah;?>
							</tbody>
						</table>
					  </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Rekap Perhari <?php echo getTanggalIndo(date('Y-m-d'));?></strong>
                    </p>
					<div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th>Prodi</th>
									<th>Offline</th>
									<th>Online</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
							<?php echo $hrian;?>
							</tbody>
						</table>
					  </div>
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
