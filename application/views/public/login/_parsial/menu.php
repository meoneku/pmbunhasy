	<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('file/foto/').$foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nama;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('dlogin'); ?>"" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a href="<?php echo base_url('dlogin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Diri
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dlogin/identitas'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Identitas Diri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dlogin/pendidikan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asal Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dlogin/ortu'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Orang Tua</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Pemberkasan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dlogin/pembayaran'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bukti Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dlogin/berkas'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berkas Pendaftaran</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item has-treeview">
            <a href="<?php echo base_url('dlogin/ubah_jurusan'); ?>" class="nav-link">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                Perubahan Jurusan
              </p>
            </a>
          </li>
		  <?php if ($this->session->userdata('status') == 1) {?>
		  <li class="nav-item has-treeview">
            <a href="<?php echo base_url('dlogin/daftar_ulang'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Daftar Ulang
				<span class="badge badge-success right">Baru</span>
              </p>
            </a>
          </li>
		  <?php } ?>
          <li class="nav-header">Informasi</li>
          <li class="nav-item">
            <a href="<?php echo base_url('dlogin/pengumuman'); ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('dlogin/inbox'); ?>" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Kotak Pesan
				<span class="badge badge-info right"><?php if ($jpesan != 0) { echo $jpesan;} ?></span>
              </p>
            </a>
          </li>
          <li class="nav-header">Lainnya</li>
		   <li class="nav-item has-treeview">
            <a href="<?php echo base_url('dlogin/survey'); ?>" class="nav-link">
              <i class="nav-icon fa fa-poll"></i>
              <p>
                Kuesioner
				<span class="badge badge-success right">Baru</span>
              </p>
            </a>
          </li>
		  <?php if ($this->session->userdata('status') == 1) {?>
		  <li class="nav-item">
            <a href="<?php echo base_url('file/Alur-DU-Camaba-PMB2020.pdf'); ?>" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>Panduan DU</p>
			  <span class="badge badge-success right">Baru</span>
            </a>
          </li>
		  <?php } ?>
          <li class="nav-item">
            <a href="<?php echo base_url('dlogin/password'); ?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Ganti Password</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>