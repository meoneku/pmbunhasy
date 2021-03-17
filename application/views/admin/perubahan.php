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
              <li class="breadcrumb-item active">Data Pengajuan Perubahan</li>
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
                <h5 class="card-title text-center">Data Pengajuan Perubahan</h5>

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
				  <th>Aksi</th>
				  <th>No</th>
                  <th>Pendaftaran</th>
                  <th>Nama Lengkap</th>
                  <th>Data Asli</th>
                  <th>Data Perubahan</th>
				  <th>Status Perubahan</th>
                </tr>
                </thead>
                <tbody>
				<?php $no = 1; foreach ($list_perubahan as $pendaftar) {
					$pil1 = getProdi($pendaftar['pil1']);
					$pil2 = getProdi($pendaftar['pil2']);
					$pil1r = getProdi($pendaftar['pil1_r']);
					$pil2r = getProdi($pendaftar['pil2_r']);
					$status = getStatusPerubahan($pendaftar['status_perubahan']);?>
					
                <tr>
				  <td class="text-center">
					<a href="<?php echo base_url('webmin/admin/kperubahan/').url_encode($pendaftar['id_perubahan']);?>" title="Verifikasi">
						<i class="fas fa-edit"></i>
					</a>
				  </td>
				  <td><?php echo $no;?></td>
                  <td><?php echo $pendaftar['nomor'];?></td>
                  <td><?php echo $pendaftar['nama'];?></td>
                  <td><?php echo "Jalur: ".$pendaftar['jalur']."</br>Kelas :".$pendaftar['kelas']."</br>Pilihan 1: ".$pil1."</br>Pilihan 2 :".$pil2;?></br></td>
                  <td><?php echo "Jalur: ".$pendaftar['jalur_r']."</br>Kelas :".$pendaftar['kelas_r']."</br>Pilihan 1: ".$pil1r."</br>Pilihan 2 :".$pil2r;?></br></td>
				  <td><?php echo $status;?></td>
                </tr>
				<?php $no++; }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>Aksi</th>
				  <th>No</th>
                  <th>Pendaftaran</th>
                  <th>Nama Lengkap</th>
                  <th>Data Asli</th>
                  <th>Data Perubahan</th>
				  <th>Status Perubahan</th>
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
	  "scrollX": true,
    });
  });
  </script>
