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
            <h1 class="m-0 text-dark">VIEW REPORT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hasil Report</li>
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
                <h5 class="card-title text-center">Report</h5>

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
                  <th>NIM</th>
                  <th>Nama Lengkap</th>
                  <th>Prodi</th>
                  <th>Kelas</th>
				  <th>Jalur</th>
				  <th>No. HP</th>
				  <th>Kab. Asal</th>
				  <th>Prov. Asal</th>
				  <th>Asal Pendidikan</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no = 1;
				foreach ($maba as $personal) {
					$prodi = getSingkatanProdi($personal['prodi']);
				?>
                <tr>
				  <td class="text-center"><?php echo $no;?></td>
				  <td class="text-center"><?php echo $personal['nim_pdti'];?></td>
                  <td><?php echo $personal['nama'];?></td>
                  <td><?php echo $prodi;?></td>
                  <td class="text-center"><?php echo $personal['kelas'];?></td>
                  <td class="text-center"><?php echo $personal['jalur'];?></td>
				  <td class="text-center"><?php echo $personal['hp'];?></td>
				  <td><?php echo $personal['kab'];?></td>
				  <td class="text-center"><?php echo $personal['prov'];?></td>
				  <td class="text-center"><?php echo $personal['nama_sekolah'];?></td>
                </tr>
				<?php $no++;}?>
                </tbody>
                <tfoot>
                <tr>
				  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama Lengkap</th>
                  <th>Prodi</th>
                  <th>Kelas</th>
				  <th>Jalur</th>
				  <th>No. HP</th>
				  <th>Kab. Asal</th>
				  <th>Prov. Asal</th>
				  <th>Asal Pendidikan</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
				  <div class="col-sm-2">
					<a href="<?php echo base_url('webmin/admin/reportdu');?>" type="button" class="btn btn-block btn-primary"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
				  </div>
				  <div class="col-sm-2">
					<a href="<?php echo base_url('webmin/report/duxlsx').$link;?>" type="button" class="btn btn-block btn-success"><i class="fas fa-file-excel"></i> Export Ke XLSX</a>
				  </div>
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
