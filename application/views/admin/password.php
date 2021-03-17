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
            <h1 class="m-0 text-dark">Ganti Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Ganti Password</li>
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
                <h5 class="card-title">Ganti Password</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/ganti_password');?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="old_password" class="col-sm-4 col-form-label">Password Lama</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Masukkan Password Lama" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="new_password" class="col-sm-4 col-form-label">Password Baru</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Masukkan Password Baru" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="jalur" class="col-sm-4 col-form-label">Konfirm Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="cfm_password" id="cfm_password" placeholder="Ketik Ulang Password Baru" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Ganti Password</button>
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
