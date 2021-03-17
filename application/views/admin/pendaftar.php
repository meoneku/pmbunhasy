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
                  <th>Pendaftaran</th>
                  <th>Nama Lengkap</th>
                  <th>Jalur</th>
                  <th>Pil 1</th>
				  <th>Keterangan</th>
				  <th>Stat Daf</th>
				  <th>Stat Brks</th>
				  <th>Brks</th>
                </tr>
                </thead>
                <tbody>
				<?php $no = 1; foreach ($maba as $pendaftar) {
					$pil1 = getSingkatanProdi($pendaftar['pil1']);
					$status = getStatusPendaftaran($pendaftar['status']);
					$berkas = getStatusBerkas($pendaftar['status_berkas'],$pendaftar['nomor']);
					
					$cekberkas = $this->admin_model->getBerkas($pendaftar['nomor']);
					if (empty($cekberkas)) {
						$rberkas = '<a href="'.base_url('webmin/admin/berkas/').url_encode($pendaftar['nomor']).'" type="button" class="btn btn-block btn-primary">-</a>';
					} else {
						$rberkas = '<a href="'.base_url('webmin/admin/berkas/').url_encode($pendaftar['nomor']).'" type="button" class="btn btn-block btn-success">On</a>';
					}
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
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/detil_daftar/').url_encode($pendaftar['nomor']);?>"><i class="fas fa-edit"></i> Edit / lihat Detail Camaba</a></a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/kwitansi/').url_encode($pendaftar['nomor']);?>" target="_blank"><i class="fas fa-money-bill-wave-alt"></i> Cetak Kwitansi</a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/bukti/').url_encode($pendaftar['nomor']);?>" target="_blank"><i class="fas fa-credit-card"></i> Cetak Bukti Pendaftaran</a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/bdaftar/').url_encode($pendaftar['nomor']);?>" target="_blank"><i class="fas fa-file"></i> Cetak Bukti / Berkas Pendaftaran</a></li>
						<div class="dropdown-divider"></div>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/verifi/').url_encode($pendaftar['nomor']);?>"><i class="fas fa-hands-helping"></i> Verifikasi Pendaftaran</a></li>
						<li><a class="dropdown-item" tabindex="1" href="#" data-toggle="modal" data-target="#modal-danger" data-id="<?php echo url_encode($pendaftar['nomor']);?>"><i class="fas fa-key"></i> Reset Password</a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/berkas/').url_encode($pendaftar['nomor']);?>"><i class="fas fa-eye"></i> Cek Berkas</a></li>
						<li><a class="dropdown-item" tabindex="1" href="<?php echo base_url('webmin/admin/uploadberkas/').url_encode($pendaftar['nomor']);?>"><i class="fas fa-upload"></i> Upload Berkas</a></li>
						<div class="dropdown-divider"></div>
						<li><a class="dropdown-item" tabindex="1" href="#" data-toggle="modal" data-target="#modal-his" data-id="<?php echo url_encode($pendaftar['nomor']);?>"><i class="fas fa-history"></i> Riwayat Perubahan</a></li>
					</ul>
				  </div>
				  </td>
                  <td class="text-center"><?php echo $pendaftar['nomor'];?></td>
                  <td><?php echo $pendaftar['nama'];?></td>
                  <td class="text-center"><?php echo $pendaftar['jalur'];?></td>
                  <td class="text-center"><?php echo $pil1;?></td>
				  <td><?php echo $pendaftar['keterangan_pendaftaran'];?></td>
				  <td class="text-center"><?php echo $status;?></td>
				  <td class="text-center"><?php echo $berkas;?></td>
				  <td class="text-center"><?php echo $rberkas;?></td>
                </tr>
				<?php $no++; }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>No.</th>
                  <th>Aksi</th>
                  <th>Pendaftaran</th>
                  <th>Nama Lengkap</th>
                  <th>Jalur</th>
                  <th>Pil 1</th>
				  <th>Keterangan</th>
				  <th>Stat Daf</th>
				  <th>Stat Brks</th>
				  <th>Brks</th>
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
  
  <div class="modal fade" id="modal-danger">
        <form action="<?php echo base_url('webmin/adminact/reset') ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Peringatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="hasil-data"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-outline-light">Reset Password</button>
            </div>
          </div>
		</form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  
  <div class="modal fade" id="modal-his">
		<div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Riwayat Perubahan Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="hasil-data"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
  
  $(document).ready(function(){
    $('#modal-danger').on('show.bs.modal', function (e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?php echo base_url('webmin/admin/modalreset') ?>',
            data :  'idx='+ idx,
            success : function(data){
            $('.hasil-data').html(data);//menampilkan data ke dalam modal
            }
        });
	 });
	});
	
	$(document).ready(function(){
    $('#modal-his').on('show.bs.modal', function (e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?php echo base_url('webmin/admin/modalriwayat') ?>',
            data :  'idx='+ idx,
            success : function(data){
            $('.hasil-data').html(data);//menampilkan data ke dalam modal
            }
        });
	 });
	});
  </script>
