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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status Pendaftaran</span>
                <span class="info-box-number">
				<?php if ($maba['status'] != 0) { echo '<span class="text-info">Terverifikasi</span><small class="fas fa-check"></small>'; } else { echo '<span class="text-info">Belum Terverifikasi</span><small class="fas fa-times"></small>';}?>
                <small></small>
				</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Biaya Pendaftaran Anda</span>
                <span class="info-box-number"><?php echo "Rp " . number_format($maba['biaya'],0,',','.');?></span>
				<small></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jalur/Program Pendidikan</span>
                <small class="info-box-number">Program : <?php echo $maba['jalur'];?></small>
				<small class="info-box-number">Kelas : <?php echo $maba['kelas'];?></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		  <?php if($maba['lulus_seleksi'] != '1') { ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pilihan Prodi/Jurusan</span>
                <small class="info-box-number"><?php echo getSingkatanProdi($maba['pil1']);?></small>
				<small class="info-box-number"><?php echo getSingkatanProdi($maba['pil2']);?></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <?php } ?>
		  <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status Berkas</span>
                <small class="info-box-number"><?php echo getStatusBerkasPublic($maba['status_berkas'],$maba['nomor']);?></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		   <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lulus Seleksi</span>
                <small class="info-box-number"><span class="text-danger"><?php echo getStatusLulus($maba['lulus_seleksi']);?></span></small>
				<small class="info-box-number">Prodi : <?php echo getSingkatanProdi($maba['prodi']);?></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <?php if ($maba['lulus_seleksi'] == '1') {?>
		  <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-university"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rekening Daftar Ulang</span>
                <span class="info-box-text"><?php echo $bank;?></span>
				<small class="info-box-number">Rekening : <?php echo $rek;?></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-certificate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status Daftar Ulang</span>
				<span class="info-box-number"><?php echo getStatusDaftarUlang($maba['daftar_ulang']);?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <?php } ?>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Selamat Datang</h5>

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
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Selamat Datang Di Halaman Calon Mahasiswa Baru Universitas Hasyim Asy'ari Tebuireng Jombang</strong>
                    </p>

                    <p>
						Halaman ini digunakan untuk Anda melakukan proses pelengkapan data pendaftaran, data tersebut meliputi data identitas diri, data asal sekolah dan data orang tua / wali dengan mengklik menu Data Diri.
					</p>
					<p>
						Anda juga dapat melakukan Upload/Unggah berkas pendaftaran yang di syaratkan melalui menu Pemberkasan. Anda juga dapat mengunggah bukti transfer pembayaran pendaftaran atau daftar ulang (bila sudah dinyatakan lulus) pada menu Pemberkasan juga.
					</p>
					<p>
						Bila ada masalah atau pertanyaan Anda dapat menghubungi kontak yang tersedia.
					</p>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Informasi</strong>
                    </p>
					<ul>
						<strong><i class="fas fa-phone-square"></i> Nomor yang dapat dihubungi</strong>
						<li>+62 8213 3555 859</li>
						<li>+62 8151 9921 992</li>
					</ul>
					<?php if($maba['lulus_seleksi'] == '1') {?>
					<ul>
						<strong><i class="fas fa-wallet"></i> Nomor Rekening Daftar Ulang</strong>
						<li><?php echo $bank;?> : <?php echo $rek?></li>
					</ul>
					<?php } else {?>
					<ul>
						<strong><i class="fas fa-wallet"></i> Nomor Rekening Pembayaran</strong>
						<li>Bank Mandiri : 142-00-2555444-4</li>
						<li>Bank Mandiri Syariah: 7108073262</li>
					</ul>
					<?php } ?>
					<ul>
						<strong><i class="fas fa-envelope"></i> Email Bantuan</strong>
						<li>bantuan@pmbunhasy.ac.id</li>
						<li>rektorat.unhasy@gmail.com</li>
					</ul>
					<ul>
						<strong><i class="fas fa-map-marked-alt"></i> Alamat & Jam Kerja</strong>
						<li>Jl. Irian Jaya 55 Tebuireng Jombang 61471</li>
						<li>Sabtu-Kamis 08.30 - 15.00</li>
					</ul>
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
