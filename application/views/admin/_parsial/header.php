<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/public/img/unhasy-icon.ico" rel="icon">
  <link href="<?php echo base_url(); ?>assets/public/img/unhasy-icon.ico" rel="apple-touch-icon">

  <title>PMB UNHASY Administrator</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	 <?php if($this->session->userdata('role') == 'admin' OR $this->session->userdata('role') == 'keuangan') {?>
	  <!-- Gwe Keuangan -->
	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-arrow-circle-down"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $jumlah_ulang; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if (empty($mini_ulang)) { ?>
            <a href="" class="dropdown-item dropdown-footer">Tidak Ada Notifikasi Daftar Ulang</a>
          <?php } else { foreach ($mini_ulang as $ulang) {
            $tanggal = getTanggalIndo($ulang['tanggal_upload']);
          ?>
          <a href="<?php echo base_url('webmin/du/verifi/').url_encode($ulang['nomor']);?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url('file/foto/default.png'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 Upload Bukti <?php echo $ulang['jenis_bukti']?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $ulang['nama'];?></p>
                <p class="text-sm"><?php echo $tanggal;?></p>
                <!--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>waktu</p>-->
              </div>
            </div>
            <!-- Message End -->
          </a><?php } } ?>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
      </li>
	 <?php } ?>
	 <!-- Messages Dropdown Menu -->
	 <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-tasks"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $jumlah_du; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if (empty($mini_du)) { ?>
            <a href="" class="dropdown-item dropdown-footer">Tidak Ada Notifikasi Daftar Ulang</a>
          <?php } else { foreach ($mini_du as $du) {
			$tanggal = new DateTime($du['tanggal_verifikasi_du']);
			$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
			$jam     = $tanggal->format('H:i:s');
          ?>
          <a href="<?php echo base_url('webmin/admin/du/').url_encode($du['nomor']);?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url('file/foto/default.png'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
				  Verifikasi Daftar Ulang
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $du['nama'];?></p>
                <p class="text-sm"><?php echo $indotgl.' '.$jam;?></p>
                <!--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>waktu</p>-->
              </div>
            </div>
            <!-- Message End -->
          </a><?php } } ?>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $jumlah_notif; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if (empty($mini_pembayaran)) { ?>
            <a href="" class="dropdown-item dropdown-footer">Tidak Ada Notifikasi Pembayaran</a>
          <?php } else { foreach ($mini_pembayaran as $bayar) {
            $tanggal = getTanggalIndo($bayar['tanggal_upload']);
          ?>
          <a href="<?php echo base_url('webmin/admin/verifi/').url_encode($bayar['nomor']);?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url('file/foto/default.png'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 Upload Bukti <?php echo $bayar['jenis_bukti']?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $bayar['nama'];?></p>
                <p class="text-sm"><?php echo $tanggal;?></p>
                <!--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>waktu</p>-->
              </div>
            </div>
            <!-- Message End -->
          </a><?php } } ?>
          <div class="dropdown-divider"></div>
           <?php if (empty($mini_perubahan)) { ?>
            <a href="" class="dropdown-item dropdown-footer">Tidak Ada Notifikasi Pengajuan Perubahan</a>
          <?php } else {foreach ($mini_perubahan as $ubah) { 
              $tanggal = getTanggalIndo($ubah['tanggal_daftar']);
            ?>
          <a href="<?php echo base_url('webmin/admin/kperubahan/').url_encode($ubah['id_perubahan']);?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url('file/foto/default.png'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 Ajuan: <?php echo $ubah['nama']?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $ubah['keterangan'];?></p>
                <p class="text-sm"><?php echo $tanggal;?></p>
                <!--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>waktu</p>-->
              </div>
            </div>
            <!-- Message End -->
          </a><?php } }?>
          <div class="dropdown-divider"></div>
          <!--<a href="<?php echo base_url('dlogin/inbox');?>" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
        </div>-->
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-file-archive"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $jmlberkasn; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if (empty($mini_berkas)) { ?>
            <a href="" class="dropdown-item dropdown-footer">Tidak Ada Notifikasi Unggah Berkas</a>
          <?php } else { foreach ($mini_berkas as $mberkasn) {
			$tanggal = new DateTime($mberkasn['waktu_berkas']);
			$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
			$jam     = $tanggal->format('H:i:s');
          ?>
          <a href="<?php echo base_url('webmin/admin/berkas/').url_encode($mberkasn['nomor']);?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url('file/foto/default.png'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 Upload Berkas
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $mberkasn['nama']?></p>
                <p class="text-sm"><?php echo $indotgl;?> <?php echo $jam;?></p>
                <!--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>waktu</p>-->
              </div>
            </div>
            <!-- Message End -->
          </a><?php } } ?>
          <div class="dropdown-divider"></div>
          <!--<a href="<?php echo base_url('dlogin/inbox');?>" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
        </div>-->
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/public/img/unhasy-icon.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin PMB UNHASY</span>
    </a>