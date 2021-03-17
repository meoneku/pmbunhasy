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
            <h1 class="m-0 text-dark">Rekap</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rekap</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Jumlah Keseluruhan</h5>

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
                    <p class="text-center">
                      <strong>Rekap Jumlah Total Berdasarkan Jalur Dan Pilihan Prodi Pertama</strong>
                      <div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th >Prodi</th>
									<th>Reguler</th>
									<th>Nilai UN</th>
									<th>Raport</th>
									<th>Tahfidz</th>
									<th>Prestasi Akademik</th>
									<th>Prestasi Non Akademik</th>
									<th>BKKM</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $jumlah;?>
							</tbody>
						</table>
					  </div>
                  </div>
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
        <div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title text-center">Rincian Pada Gelombang 1</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                    <p class="text-center">
                      <strong>Rekap Jumlah Total Berdasarkan Jalur Dan Pilihan Prodi Pertama</strong>
                      <div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th >Prodi</th>
									<th>Reguler</th>
									<th>Nilai UN</th>
									<th>Raport</th>
									<th>Tahfidz</th>
									<th>Prestasi Akademik</th>
									<th>Prestasi Non Akademik</th>
									<th>BKKM</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $jumlahgelombang1;?>
							</tbody>
						</table>
					  </div>
                  </div>
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
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title text-center">Rincian Pada Gelombang 2</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                    <p class="text-center">
                      <strong>Rekap Jumlah Total Berdasarkan Jalur Dan Pilihan Prodi Pertama</strong>
                      <div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th >Prodi</th>
									<th>Reguler</th>
									<th>Nilai UN</th>
									<th>Raport</th>
									<th>Tahfidz</th>
									<th>Prestasi Akademik</th>
									<th>Prestasi Non Akademik</th>
									<th>BKKM</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $jumlahgelombang2;?>
							</tbody>
						</table>
					  </div>
                  </div>
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
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title text-center">Rincian Pada Gelombang 3</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                    <p class="text-center">
                      <strong>Rekap Jumlah Total Berdasarkan Jalur Dan Pilihan Prodi Pertama</strong>
                      <div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th >Prodi</th>
									<th>Reguler</th>
									<th>Nilai UN</th>
									<th>Raport</th>
									<th>Tahfidz</th>
									<th>Prestasi Akademik</th>
									<th>Prestasi Non Akademik</th>
									<th>BKKM</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $jumlahgelombang3;?>
							</tbody>
						</table>
					  </div>
                  </div>
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
            <div class="card collapsed-card">
              <div class="card-header">
                <h5 class="card-title text-center">Rincian Pada Gelombang 4</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                    <p class="text-center">
                      <strong>Rekap Jumlah Total Berdasarkan Jalur Dan Pilihan Prodi Pertama</strong>
                      <div class="card-body table-responsive p-0">
						<table class="table table-head-fixed text-nowrap">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th >Prodi</th>
									<th>Reguler</th>
									<th>Nilai UN</th>
									<th>Raport</th>
									<th>Tahfidz</th>
									<th>Prestasi Akademik</th>
									<th>Prestasi Non Akademik</th>
									<th>BKKM</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $jumlahgelombang4;?>
							</tbody>
						</table>
					  </div>
                  </div>
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
