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
            <h1 class="m-0 text-dark">Berkas Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Berkas Pendaftaran</li>
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
					<div class="card-body">
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<label for="label" class="col-sm-4 col-form-label"><?php echo $personal['nama'];?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Jalur</label>
							<div class="col-sm-8">
								<label for="label" class="col-sm-4 col-form-label"><?php echo $personal['jalur'];?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Prodi Pilihan 1</label>
							<div class="col-sm-8">
								<label for="label" class="col-sm-4 col-form-label"><?php echo getProdi($personal['pil1']);?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">Prodi Pilihan 2</label>
							<div class="col-sm-8">
								<label for="label" class="col-sm-4 col-form-label"><?php echo getProdi($personal['pil2']);?></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
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
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="label" class="col-sm-4 col-form-label">SKL/SKHUN/Suket Sekolah</label>
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
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
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
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
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
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
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
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
								
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
									<option value="1" selected>Tidak Ada</option>
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
