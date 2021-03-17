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
            <h1 class="m-0 text-dark">Cetak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Pencetakan</li>
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
                <h5 class="card-title">Cetak Berkas Daftar Ulang Atas Nama <strong><?php echo $pendaftar['nama'];?></strong></h5>

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
				  <form class="form-horizontal" action="" method="post">
					<div class="card-body">
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="col-form-label"><a type="button" class="btn btn-block btn-info" href="<?php echo base_url('webmin/admin/cetak_du/').url_encode($pendaftar['nomor']);?>" target="_blank"><i class="fas fa-file"></i> Cetak Bukti Daftar Ulang</a></label>
							</div>
							<div class="col-sm-4">
								<label class="col-form-label"><a type="button" class="btn btn-block btn-success" href="<?php echo base_url('webmin/admin/cetakujas/').url_encode($pendaftar['nomor']);?>" target="_blank"><i class="fas fa-circle"></i> Cetak Blanko Ukuran Jas</a></label>
							</div>
							<div class="col-sm-4">
								<label class="col-form-label"><a type="button" class="btn btn-block btn-secondary" href="<?php echo base_url('daftar/kduv/').url_encode($pendaftar['nomor']);?>" target="_blank"><i class="fas fa-address-card"></i> Download Kartu Daftar Ulang</a></label>
							</div>
						</div>
						<br/>
						<br/>
						<br/>
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
