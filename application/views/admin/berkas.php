<?php $this->load->view('admin/_parsial/header');?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/toggle-switch/toggle-min.css">

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
            <h1 class="m-0 text-dark">Data Pendaftar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Pendaftar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		<div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-success card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Pemberkasan</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#online" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Online</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#offline" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Offline</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="online" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                    <!--ndok Kene-->
					<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendafataran Atas Nama <strong><?php echo $personal['nama'];?></strong> Jalur <strong><?php echo $personal['jalur'];?></strong></h5>

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
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Cek Kembali</h5>
					Harap cek kembali Pilihan Jurusan, Jalur/Program & Jenjang sebelum memverifikasi berkas.
				</div>
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/verfikasiberkas');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $personal['nama'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Jalur</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $personal['jalur'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Prodi Pilihan 1</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo getProdi($personal['pil1']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Prodi Pilihan 2</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo getProdi($personal['pil2']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas Umum</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Kartu Keluarga</label>
							<div class="col-sm-8">
								<input type="hidden" name="id" value="<?php echo url_encode($personal['nomor'])?>">
								<label class="col-form-label"><?php if (empty($berkas['kk'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/kartu_keluarga/').$berkas['kk'].'" target="_blank">'.$berkas['kk'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Kartu Tanda Penduduk</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['ktp'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/ktp/').$berkas['ktp'].'" target="_blank">'.$berkas['ktp'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Ijazah</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['ijazah'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/ijazah/').$berkas['ijazah'].'" target="_blank">'.$berkas['ijazah'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">SKHUN</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['skhun'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/skhun/').$berkas['skhun'].'" target="_blank">'.$berkas['skhun'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Foto</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['foto'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/foto/').$berkas['foto'].'" target="_blank">'.$berkas['foto'].'</a>';}?></label>
							</div>
						</div>
						<?php if ($personal['pil1'] == 22 OR $personal['pil1'] == 23) {?>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Formulir</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['formulirs2'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/formulir/').$berkas['formulirs2'].'" target="_blank">'.$berkas['formulirs2'].'</a>';}?></label>
							</div>
						</div>
						<?php } ?>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas SKL/Raport</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">SKL/Suket Sekolah</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['surat_rapot'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/raport/').$berkas['surat_rapot'].'" target="_blank">'.$berkas['surat_rapot'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 1</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['rapot1'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/raport/').$berkas['rapot1'].'" target="_blank">'.$berkas['rapot1'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 2</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['rapot2'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/raport/').$berkas['rapot2'].'" target="_blank">'.$berkas['rapot2'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 3</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['rapot3'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/raport/').$berkas['rapot3'].'" target="_blank">'.$berkas['rapot3'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 4</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['rapot4'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/raport/').$berkas['rapot4'].'" target="_blank">'.$berkas['rapot4'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 5</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['rapot5'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/raport/').$berkas['rapot5'].'" target="_blank">'.$berkas['rapot5'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas Prestasi Akademik/Non Akademik</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Suket Prestasi Dari Sekolah</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['surat_prestasi'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/akademik/').$berkas['surat_prestasi'].'" target="_blank">'.$berkas['surat_prestasi'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Piagam/Sertifikat</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['piagam'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/akademik/').$berkas['piagam'].'" target="_blank">'.$berkas['piagam'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas Tahfidz</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Syahadah/Surat Tahfidz</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['tahfidz'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/tahfidz/').$berkas['tahfidz'].'" target="_blank">'.$berkas['tahfidz'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Sertifikat/Piagam Pernah Ikut Lomba Tahfidz</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['[piagamtahfidz'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/tahfidz/').$berkas['piagamtahfidz'].'" target="_blank">'.$berkas['piagamtahfidz'].'</a>';}?></label>
							</div>
						</div>
							<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas KIP</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Berkas KIP</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['bkip'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/kip/').$berkas['bkip'].'" target="_blank">'.$berkas['bkip'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas BKKM</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Suket Tidak Mampu</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['surat_bkkm'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['surat_bkkm'].'" target="_blank">'.$berkas['surat_bkkm'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Slip Gaji/Suket Penghasilan</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['gaji'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['gaji'].'" target="_blank">'.$berkas['gaji'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">PBB</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['pbb'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['pbb'].'" target="_blank">'.$berkas['pbb'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Listrik</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['listrik'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['listrik'].'" target="_blank">'.$berkas['listrik'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Telepon</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['s_telp'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['s_telp'].'" target="_blank">'.$berkas['s_telp'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">PDAM</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['pdam'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['pdam'].'" target="_blank">'.$berkas['pdam'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">KIP</label>
							<div class="col-sm-8">
								<label class="col-form-label"><?php if (empty($berkas['kip'])) { echo 'Berkas Belum Ada';} else { echo '<a href="'.base_url('file/bkkm/').$berkas['kip'].'" target="_blank">'.$berkas['kip'].'</a>';}?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Data Nilai Rata-rata</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Nilai Rata-rata Raport/UN/Jumlah Hafalan Berapa Juz</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nilai" name="nilai" placeholder="Isi Dengan Angka" value="<?php echo $personal['nilai'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Status Berkas</label>
							<div class="col-sm-8">
								<select name="veri" id="veri" class="form-control" required>
								    <option value="<?= $personal['status_berkas']?>" selected><?= getStatusBerkasAdmin($personal['status_berkas']);?></option>
									<option value="1">Tidak Ada</option>
									<option value="2">Kurang Lengkap</option>
									<option value="3">Verifikasi/Lengkap</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="ket" name="ket" placeholder="Isi Keterangan/Catatan" value="<?php echo $personal['keterangan_pendaftaran'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="waktu" class="col-sm-4 col-form-label">Waktu Terakhir Update</label>
							<div class="col-sm-8">
								<div class="row">
									<?php
									$tanggal = new DateTime($personal['waktu_verifikasi_berkas']);
									$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
									$jam     = $tanggal->format('H:i:s'); ?>
									<div class="col-8">
										<input type="text" class="form-control" id="waktu" name="tanggal" placeholder="Tanggal Terakhir Update" value="<?php echo $indotgl;?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="waktu" name="jam" placeholder="Waktu Terakhir Update" value="<?php echo $jam;?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<label class="col-form-label"><button type="submit" class="btn btn-block btn-info"><i class="fas fa-print"></i> Proses Verifikasi Berkas</button></label>
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
					<i>- Pastikan Semua Berkas Sudah Sesuai.</br>
					- Untuk Berkas Pendaftaran Offline Langung Isi Pada Kolom Nilai Dan Status Berkas.</br>
					- Untuk Berkas Wajib Berupa Raport1-5/SKL/SKHUN/Suket Yang Menerangkan Nilai Selama Menempuh Pendidikan Terakhir Untuk Semua Jalur/Program Kecuali Jalur Tahfidz Dan Prestasi Akademik/Non Akademik.</br>
					- Untuk Jalur Tahfidz Nilai Yang Di Isi Berupa Jumlah Juz Yang Tertera Pada Surat/Sertfikat/Syahadah.</br>
					- Untuk Jalur Prestasi Akademik/Non Akademik Nilai Yang Di Isi Juara/Peringkat Sesuai Dengan Sertifikat/Piagam Dan Di Beri Keterangan Tingkat Kabupaten/Provinsi.</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
                 </div>
                  <div class="tab-pane fade" id="offline" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <!--Offline-->
					<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Berkas Pendafataran Atas Nama <strong><?php echo $personal['nama'];?></strong> Jalur <strong><?php echo $personal['jalur'];?></strong></h5>

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
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Cek Kembali</h5>
					Harap cek kembali Pilihan Jurusan, Jalur/Program & Jenjang sebelum memverifikasi berkas.
				</div>
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/berkasoffline');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $personal['nama'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Jalur</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $personal['jalur'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Prodi Pilihan 1</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo getProdi($personal['pil1']);?>" readonly>
								<input type="hidden" name="pil" value="<?php echo $personal['pil1'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Prodi Pilihan 2</label>
							<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo getProdi($personal['pil2']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas Umum</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Kartu Keluarga</label>
							<div class="col-sm-8">
								<input type="hidden" name="id" value="<?php echo url_encode($personal['nomor'])?>">
								<input type="hidden" name="kk" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="kk" value="1" <?php if ($cekberkas['kk'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Kartu Tanda Penduduk</label>
							<div class="col-sm-8">
								<input type="hidden" name="ktp" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="ktp" value="1" <?php if ($cekberkas['ktp'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Ijazah</label>
							<div class="col-sm-8">
								<input type="hidden" name="ijazah" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="ijazah" value="1" <?php if ($cekberkas['ijazah'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">SKHUN</label>
							<div class="col-sm-8">
								<input type="hidden" name="skhun" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="skhun" value="1" <?php if ($cekberkas['skhun'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Foto</label>
							<div class="col-sm-8">
								<input type="hidden" name="foto" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="foto" value="1" <?php if ($cekberkas['foto'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<?php if ($personal['pil1'] == 22 OR $personal['pil1'] == 23) {?>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Formulir</label>
							<div class="col-sm-8">
								<input type="hidden" name="formulir" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="formulir" value="1" <?php if ($cekberkas['formulir'] == 1) { echo 'formulir';}?>>
							</div>
						</div>
						<?php } ?>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas SKL/Raport</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">SKL/Suket Sekolah</label>
							<div class="col-sm-8">
								<input type="hidden" name="suket_lulus" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="suket_lulus" value="1" <?php if ($cekberkas['suket_lulus'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 1</label>
							<div class="col-sm-8">
								<input type="hidden" name="rapot1" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="rapot1" value="1" <?php if ($cekberkas['rapot1'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 2</label>
							<div class="col-sm-8">
								<input type="hidden" name="rapot2" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="rapot2" value="1" <?php if ($cekberkas['rapot2'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 3</label>
							<div class="col-sm-8">
								<input type="hidden" name="rapot3" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="rapot3" value="1" <?php if ($cekberkas['rapot3'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 4</label>
							<div class="col-sm-8">
								<input type="hidden" name="rapot4" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="rapot4" value="1" <?php if ($cekberkas['rapot4'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Raport Semester 5</label>
							<div class="col-sm-8">
								<input type="hidden" name="rapot5" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="rapot5" value="1" <?php if ($cekberkas['rapot5'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas Prestasi Akademik/Non Akademik</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Suket Prestasi Dari Sekolah</label>
							<div class="col-sm-8">
								<input type="hidden" name="suket_prestasi" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="suket_prestasi" value="1" <?php if ($cekberkas['suket_prestasi'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Piagam/Sertifikat</label>
							<div class="col-sm-8">
								<input type="hidden" name="piagam" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="piagam" value="1" <?php if ($cekberkas['piagam'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas Tahfidz</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Syahadah/Surat Tahfidz</label>
							<div class="col-sm-8">
								<input type="hidden" name="tahfidz" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="tahfidz" value="1" <?php if ($cekberkas['tahfidz'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Sertifikat/Piagam Pernah Ikut Lomba Tahfidz</label>
							<div class="col-sm-8">
								<input type="hidden" name="piagam_tahfidz" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="piagam_tahfidz" value="1" <?php if ($cekberkas['piagam_tahfidz'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas KIP</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Berkas KIP</label>
							<div class="col-sm-8">
								<input type="hidden" name="bkip" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="bkip" value="1" <?php if ($cekberkas['bkip'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Berkas BKKM</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Suket Tidak Mampu</label>
							<div class="col-sm-8">
								<input type="hidden" name="suket_bkkm" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="suket_bkkm" value="1" <?php if ($cekberkas['suket_bkkm'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Slip Gaji/Suket Penghasilan</label>
							<div class="col-sm-8">
								<input type="hidden" name="gaji" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="gaji" value="1" <?php if ($cekberkas['gaji'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">PBB</label>
							<div class="col-sm-8">
								<input type="hidden" name="pbb" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="pbb" value="1" <?php if ($cekberkas['pbb'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Listrik</label>
							<div class="col-sm-8">
								<input type="hidden" name="listrik" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="listrik" value="1" <?php if ($cekberkas['listrik'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Telepon</label>
							<div class="col-sm-8">
								<input type="hidden" name="telp" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="telp" value="1" <?php if ($cekberkas['telp'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">PDAM</label>
							<div class="col-sm-8">
								<input type="hidden" name="pdam" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="pdam" value="1" <?php if ($cekberkas['pdam'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">KIP</label>
							<div class="col-sm-8">
								<input type="hidden" name="kip" value="0">
								<input type="checkbox" data-toggle="toggle" data-on="Ada" data-off="Tidak" data-onstyle="success" data-offstyle="danger" data-width="100" name="kip" value="1" <?php if ($cekberkas['kip'] == 1) { echo 'checked';}?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Data Nilai Rata-rata</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Nilai Rata-rata Raport/UN/Jumlah Hafalan Berapa Juz</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nilai" name="nilai" placeholder="Isi Dengan Angka" value="<?php echo $personal['nilai'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="instansi" class="col-sm-4 col-form-label">Instansi Yang Mengeluarkan Surat (Raport/SKL/Tahfidz/Ijazah)</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="instansi" name="instansi" placeholder="Nama Instansi" value="<?php echo $cekberkas['instansi'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Status Berkas</label>
							<div class="col-sm-8">
								<select name="veri" id="veri" class="form-control" required>
								    <option value="<?= $personal['status_berkas']?>" selected><?= getStatusBerkasAdmin($personal['status_berkas']);?></option>
									<option value="1">Tidak Ada</option>
									<option value="2">Kurang Lengkap</option>
									<option value="3">Verifikasi/Lengkap</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="ket" name="ket" placeholder="Isi Keterangan/Catatan" value="<?php echo $personal['keterangan_pendaftaran'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-block btn-info"><i class="fas fa-save"></i> Simpan</button>
							</div>
							<div class="col-sm-2">
								<?php if (!empty($cekberkas['nomor'])) {?>
								<a href="<?php echo base_url('webmin/admin/cetak_penerimaan_berkas/').url_encode($personal['nomor']);?>" target="_blank" type="button" class="btn btn-block btn-primary"><i class="fas fa-print"></i> Cetak</a>
								<?php }?>
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
					<i>- Pastikan Semua Berkas Sudah Sesuai.</br>
					- Untuk Berkas Pendaftaran Offline Langung Isi Pada Kolom Nilai Dan Status Berkas.</br>
					- Untuk Berkas Wajib Berupa Raport1-5/SKL/SKHUN/Suket Yang Menerangkan Nilai Selama Menempuh Pendidikan Terakhir Untuk Semua Jalur/Program Kecuali Jalur Tahfidz Dan Prestasi Akademik/Non Akademik.</br>
					- Untuk Jalur Tahfidz Nilai Yang Di Isi Berupa Jumlah Juz Yang Tertera Pada Surat/Sertfikat/Syahadah.</br>
					- Untuk Jalur Prestasi Akademik/Non Akademik Nilai Yang Di Isi Juara/Peringkat Sesuai Dengan Sertifikat/Piagam Dan Di Beri Keterangan Tingkat Kabupaten/Provinsi.</i>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
                  </div>
                 </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
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
  <script src="<?php echo base_url(); ?>assets/admin/plugins/toggle-switch/toggle-min.js"></script>