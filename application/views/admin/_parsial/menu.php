	<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('file/foto/default.png'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('webmin'); ?>"" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a href="<?php echo base_url('webmin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Data Pendaftaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/daftar'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-bars nav-icon"></i>
                  <p>Pendaftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/daftarls'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-database nav-icon"></i>
                  <p>Lulus Seleksi</p>
                </a>
              </li>
			  <?php if ($this->session->userdata('role') == "admin" or $this->session->userdata('role') == "keuangan") {?>
			  <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/bayardu'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-receipt nav-icon"></i>
                  <p>Pembayaran DU</p>
                </a>
              </li>
			  <?php } ?>
			  <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/daftardu'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-id-card nav-icon"></i>
                  <p>Daftar Ulang</p>
                </a>
              </li>
            </ul>
		  </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('webmin/admin/perubahan'); ?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Perubahan
                
              </p>
            </a>
          </li>

		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Rekap
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/rekap'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-calculator nav-icon"></i>
                  <p>Perolehan Pendaftaran</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/rekapls'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-building nav-icon"></i>
                  <p>Jumlah Lulus Seleksi</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/rekapdu'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-box-open nav-icon"></i>
                  <p>Jumlah Daftar Ulang</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/rekapjas'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-tshirt nav-icon"></i>
                  <p>Ukuran Jas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/report'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-file-download nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo base_url('webmin/admin/reportdu'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-file-export nav-icon"></i>
                  <p>Export Daftar Ulang</p>
                </a>
              </li>
            </ul>
		  </li>
		  <?php if ($this->session->userdata('role') == "admin") {?>
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Kuesioner
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('webmin/survey'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-plus-square nav-icon"></i>
                  <p>Pertanyaan Kuesioner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('webmin/survey/hasil'); ?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-vote-yea nav-icon"></i>
                  <p>Hasil Kuesioner</p>
                </a>
              </li>
            </ul>
		  </li> <?php } ?>
		   <li class="nav-item has-treeview">
            <a href="<?php echo base_url('webmin/admin/stat'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Statistik
                
              </p>
            </a>
          </li>
          <li class="nav-header">Lainnya</li>
		   <?php if ($this->session->userdata('role') == "admin") {?>
		   <li class="nav-item">
            <a href="<?php echo base_url('webmin/informasi/pengumuman'); ?>" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>Buat Pengumuman</p>
            </a>
		   </li> <?php } ?>
          <li class="nav-item">
            <a href="<?php echo base_url('webmin/admin/password'); ?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Ganti Password</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('webmin/login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="" class="nav-link">
              
              <p>
                
              </p>
            </a>
          </li>
        </ul>
      </nav>