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
            <h1 class="m-0 text-dark">Hasil Kuesioner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Hasil Kuesioner</li>
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
                <h5 class="card-title text-center">Data Kuesioner Jumlah Responden : <?php echo $responden;?></h5>

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
              <table id="survey" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>No.</th>
				  <th>Pertanyaan</th>
                  <th>Sangat Baik</th>
                  <th>Baik</th>
                  <th>Cukup Baik</th>
                  <th>Kurang Baik</th>
				  <th>Tidak Baik</th>
                </tr>
                </thead>
                <tbody>
			      <?php echo $hasil; ?>
				</tbody>
                <tfoot>
                <tr>
				 <th>No.</th>
				  <th>Pertanyaan</th>
                  <th>Sangat Baik</th>
                  <th>Baik</th>
                  <th>Cukup Baik</th>
                  <th>Kurang Baik</th>
				  <th>Tidak Baik</th>
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
        <!-- teko kene -->
		<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Data Survey Jumlah Responden : <?php echo $responden;?></h5>

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
              <table id="survey" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>No.</th>
				  <th>Pesan/Komentar/Lainnya</th>
                </tr>
                </thead>
                <tbody>
				  <?php
				  $no = 1;
				  foreach ($pesan as $psn) {?>
			      <tr>
					<td align="center"><?php echo $no;?></td>
					<td><?php echo $psn['pesan'];?></td>
				  </tr>
				  <?php $no++; } ?>
				</tbody>
                <tfoot>
                <tr>
				  <th>No.</th>
				  <th>Pesan/Komentar/Lainnya</th>
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
