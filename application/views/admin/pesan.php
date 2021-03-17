<?php $this->load->view('admin/_parsial/header');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/summernote/summernote-bs4.css">

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
            <h1 class="m-0 text-dark">Kirim Pesan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Pesan</li>
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
                <h5 class="card-title">Kirim Pesan Ke </h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('adminact/kirim_pesan');?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="nomor" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor" value="<?php echo $ubah['nomor'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nomor" value="<?php echo $ubah['nama'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="jalurdisabled" class="col-sm-4 col-form-label">Jalur/Program Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jalurdisabled" name="jalurdisabled" placeholder="Jalur Yang Pilih" value="<?php echo $ubah['jalur'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelasdisabled" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kelasdisabled" name="kelasdisabled" placeholder="Kelas" value="<?php echo $ubah['kelas'];?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1disabled" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Pertama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil1disabled" name="pil1disabled" placeholder="Pilihan Jurusan/Prodi Pertama" value="<?php echo getProdi($ubah['pil1']);?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2disabled" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Kedua</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pil2disabled" name="pil2disabled" placeholder="Pilihan Jurusan/Prodi Kedua" value="<?php echo getProdi($ubah['pil2']);?>" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="pesan" class="col-sm-12 col-form-label text-center">Pesan</label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<textarea class="textarea" placeholder="Masukkan Pesan Di Sini" name="pesan" id="pesan"
									style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
  <script src="<?php echo base_url();?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
  </script>
