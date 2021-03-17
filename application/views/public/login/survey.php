<?php $this->load->view('public/login/_parsial/header');?>

    <?php $this->load->view('public/login/_parsial/menu');?>
	
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
            <h1 class="m-0 text-dark">Kuesioner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Kuesioner</li>
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
                <h5 class="card-title">Kuesioner</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_survey');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<?php if ($pendaftar['is_survey'] == 1) { ?>
						<div class="form-group row">
							<div class="col-sm-12">
								<p>Terimakasih Atas Partisipasinya Dalam Kuesioner Ini Dalam Rangka Untuk Meningkatkan Layanan Dan Sistem.</p>
							</div>
						</div>
						<?php } else { ?>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Kuesioner Layanan Dan Sistem</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<p>Isikan Sesuai Dengan Hati Nurani Anda, Kami Akan Tetap Menjaga Anonimitas Pengisi Kuesioner Di Sini Untuk Peningkatan Layanan Dan Sistem</p>
							</div>
						</div>
						<?php
						$no = 1;
						foreach ($question as $tanya) {
								$idt = $tanya['id_pertanyaan'];
						?>
						<div class="form-group row">
							<div class="col-sm-12">
								<label class="col-form-label"><?php echo $no.'.) '.$tanya['pertanyaan'];?><label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-2">
										<div class="form-check">
											<input type="radio" class="form-check-input" value="1" id="jawabana<?php echo $idt;?>" name="jawaban<?php echo $idt;?>">
											<label for="jawabana<?php echo $idt;?>" class="form-check-label">Tidak Baik</label>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-check">
											<input type="radio" class="form-check-input" value="2" id="jawabanb<?php echo $idt;?>" name="jawaban<?php echo $idt;?>">
											<label for="jawabanb<?php echo $idt;?>" class="form-check-label">Kurang Baik</label>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-check">
											<input type="radio" class="form-check-input" value="3" id="jawabanc<?php echo $idt;?>" name="jawaban<?php echo $idt;?>" checked>
											<label for="jawabanc<?php echo $idt;?>" class="form-check-label">Cukup Baik</label>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-check">
											<input type="radio" class="form-check-input" value="4" id="jawaband<?php echo $idt;?>" name="jawaban<?php echo $idt;?>">
											<label for="jawaband<?php echo $idt;?>" class="form-check-label">Baik</label>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-check">
											<input type="radio" class="form-check-input" value="5" id="jawabane<?php echo $idt;?>" name="jawaban<?php echo $idt;?>">
											<label for="jawabane<?php echo $idt;?>" class="form-check-label">Sangat Baik</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $no++; } ?>
						<!-- di sini -->
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Lain-lain</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="pesan" class="col-sm-2 col-form-label">Pesan Dan Kesan</label>
							<div class="col-sm-10">
								<textarea name="pesan" id="pesan" class="form-control" height="150" placeholder="Pesan Dan Kesan" required></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="submit" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>
						<?php } ?>
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
					<i>(* Pastikan Anda Sudah Mengisi Semuanya Sesuai Dengan Yang Anda Kehendaki</i>
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
