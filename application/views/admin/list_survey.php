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
              <li class="breadcrumb-item active">Data Pertanyaan Kuesioner</li>
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
                <h5 class="card-title text-center">Pertanyaan Kuesioner</h5>

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
			<div class="col-sm-2">
				<a href="<?php echo base_url('webmin/survey/add');?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
			</div>
            <div class="card-body">
              <table id="pendaftar" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>No.</th>
				  <th>Aksi</th>
                  <th>Pertanyaan</th>
                  <th>Tanggal Buat</th>
                  <th>Jam Buat</th>
                </tr>
                </thead>
                <tbody>
				<?php $no = 1; foreach ($question as $pertanyaan) {
					$tanggal = new DateTime($pertanyaan['created_time']);
					$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
					$jam     = $tanggal->format('H:i:s'); ?>
                <tr>
				  <td class="text-center"><?php echo $no;?></td>
				  <td class="text-center">
				  <a href="<?php echo base_url('webmin/survey/edit/').$pertanyaan['id_pertanyaan'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
				  <a href="#" data-toggle="modal" data-target="#modal-danger" data-id="<?php echo url_encode($pertanyaan['id_pertanyaan']);?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
				  </td>
                  <td><?php echo $pertanyaan['pertanyaan'];?></td>
                  <td class="text-center"><?php echo $indotgl;?></td>
                  <td class="text-center"><?php echo $jam;?></td>
                </tr>
				<?php $no++; }?>
                </tbody>
                <tfoot>
                <tr>
				  <th>No.</th>
				  <th>Aksi</th>
                  <th>Pertanyaan</th>
                  <th>Tanggal Buat</th>
                  <th>Jam Buat</th>
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
        <form action="<?php echo base_url('webmin/survey/hapus') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
              <button type="submit" class="btn btn-outline-light">Hapus</button>
            </div>
          </div>
		</form>
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
            url : '<?php echo base_url('webmin/survey/hapus_survey') ?>',
            data :  'idx='+ idx,
            success : function(data){
            $('.hasil-data').html(data);//menampilkan data ke dalam modal
            }
        });
	 });
	});
  </script>
