<?php $this->load->view('admin/_parsial/header');?>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/summernote/summernote-bs4.css">

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
            <h1 class="m-0 text-dark">Buat Pengumuman Kelulusan Tes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Buat Pengumuman</li>
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
                <h5 class="card-title">Buat Pengumuman</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('webmin/informasi/buatpengumuman');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="judul" class="col-sm-4 col-form-label">Judul Pengumuman</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="tahap" class="col-sm-4 col-form-label">Pengumuman Tahap</label>
							<div class="col-sm-8">
								<select name="tahap" class="form-control" required>
									<option value="1">Tahap 1</option>
									<option value="2">Tahap 2</option>
									<option value="3">Tahap 3</option>
									<option value="4">Tahap 4</option>
									<option value="5">Tahap 5</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="file" class="col-sm-4 col-form-label">Upload File Excel Pengumuman</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="xls" name="xls" required>
										<label class="custom-file-label" for="xls">Pilih Berkas</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="file" class="col-sm-4 col-form-label">File Scan SK</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="scan" name="scan" required>
										<label class="custom-file-label" for="scan">Pilih Berkas</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jalur" class="col-sm-4 col-form-label">Isi Pengumuman</label>
							<div class="col-sm-8">
								<textarea class="textarea" placeholder="Place some text here" name="isi" id="isi"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Buat Pengumuman</button>
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

  <?php $this->load->view('admin/_parsial/footer');?>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  
  <script>
	$(function () {
		// Summernote
		$('.textarea').summernote()
	})
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
  </script>
