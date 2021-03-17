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
            <h1 class="m-0 text-dark">Mail Sender</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Mail Sender</li>
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
                <h5 class="card-title">Pengirim Pesan Email Berjamaah</h5>

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
				  <form>
					<div class="card-body">
						<div class="form-group row">
							<label for="jumlah" class="col-sm-4 col-form-label">Jumlah Email Yang Harus Di Kirim</label>
							<div class="col-sm-8">
								<label for="jumlah" class="col-sm-8 col-form-label"><?php echo $jumlah?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="sisa" class="col-sm-4 col-form-label">Jumlah Sisa Yang Belum Di Kirim</label>
							<div class="col-sm-8">
								<label for="sisa" class="col-sm-8 col-form-label" id="sisa"></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label">Alamat Email Yang Sedang Di Proses</label>
							<div class="col-sm-8">
								<label for="email" class="col-sm-8 col-form-label" id="email"></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-sm-4 col-form-label">Status Pengiriman</label>
							<div class="col-sm-8">
								<label for="status" class="col-sm-4 col-form-label" id="status"></label>
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
  <script>
  var auto_refresh = setInterval(
	function () {
		$("#email").load("<?php echo base_url('webmin/informasi/sentmail');?>").fadeIn("slow");
		$("#sisa").load("<?php echo base_url('webmin/informasi/sentmailsisa');?>").fadeIn("slow");
		$("#status").load("<?php echo base_url('webmin/informasi/sentmailstatus');?>").fadeIn("slow");
	}, 15000);
  </script>
