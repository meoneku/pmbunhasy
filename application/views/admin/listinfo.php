<?php $this->load->view('admin/_parsial/header');?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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
              <li class="breadcrumb-item active">Data Pendaftar</li>
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
                <h5 class="card-title text-center">Data Pendaftaran</h5>

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
                    <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="pendaftar" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>No.</th>
				  <th>Aksi</th>
                  <th>Judul</th>
                  <th>Jenis Informasi</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                </tr>
                </thead>
                <tbody>
				<?php $no = 1; foreach ($informasi as $info) {
					$tanggal = new DateTime($info['waktu']);
					$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
					$jam     = $tanggal->format('H:i:s');
					?>
                <tr>
				  <td class="text-center"><?php echo $no;?></td>
				  <td class="text-center">
				  <div class="dropdown">
					<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						Aksi
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/informasi/editinformasi/').url_encode($info['id_informasi']);?>"><i class="fas fa-edit"></i> Edit</a></a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/informasi/hapusinformasi/').url_encode($info['id_informasi']);?>"><i class="fas fa-trash"></i> Hapus</a></li>
					</ul>
				  </div>
				  </td>
                  <td><?php echo $info['judul_informasi'];?></td>
                  <td class="text-center">Informasi Depan</td>
                  <td class="text-center"><?php echo $indotgl;?></td>
                  <td class="text-center"><?php echo $jam;?></td>
                </tr>
				<?php $no++; }
				    foreach ($pengumuman as $umum) {
					$tanggal = new DateTime($umum['waktu_pengumuman']);
					$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
					$jam     = $tanggal->format('H:i:s');
					?>
                <tr>
				  <td class="text-center"><?php echo $no;?></td>
				  <td class="text-center">
				  <div class="dropdown">
					<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						Aksi
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/informasi/editpengumuman/').url_encode($umum['id_pengumuman']);?>"><i class="fas fa-edit"></i> Edit</a></a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/informasi/hapuspengumuman/').url_encode($umum['id_pengumuman']);?>"><i class="fas fa-trash"></i> Hapus</a></li>
					</ul>
				  </div>
				  </td>
                  <td><?php echo $umum['judul_pengumuman'];?></td>
                  <td class="text-center">Pengumuman Pendaftar</td>
                  <td class="text-center"><?php echo $indotgl;?></td>
                  <td class="text-center"><?php echo $jam;?></td>
                </tr>
				<?php $no++; }
					foreach ($kelulusan as $lulus) {
					$tanggal = new DateTime($lulus['waktu']);
					$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
					$jam     = $tanggal->format('H:i:s');
					?>
                <tr>
				  <td class="text-center"><?php echo $no;?></td>
				  <td class="text-center">
				  <div class="dropdown">
					<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						Aksi
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/informasi/hapuspengumuman/').url_encode($lulus['id_info']);?>"><i class="fas fa-trash"></i> Hapus</a></li>
					</ul>
				  </div>
				  </td>
                  <td><?php echo $umum['judul_info'];?></td>
                  <td class="text-center">Informasi Kelulusan</td>
                  <td class="text-center"><?php echo $indotgl;?></td>
                  <td class="text-center"><?php echo $jam;?></td>
					<?php $no++; }?>
                </tr>
                </tbody>
                <tfoot>
                <tr>
				  <th>No.</th>
                  <th>Aksi</th>
                  <th>Judul</th>
                  <th>Jenis Informasi</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
                  </div>
                  <!-- /.col -->
                
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
  </div>

  <?php $this->load->view('admin/_parsial/footer');?>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  
  <script>
  $(function () {
    $('#pendaftar').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
