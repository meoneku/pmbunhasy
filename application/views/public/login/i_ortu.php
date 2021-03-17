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
            <h1 class="m-0 text-dark">Data Orang Tua</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Data Orang Tua</li>
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
                <h5 class="card-title">Data Orang Tua</h5>

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
				  <form class="form-horizontal" action="<?php echo base_url('maba/simpan_ortu');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="bp" class="col-sm-4 col-form-label"><u>Data Ayah</u></label>
							<div class="col-sm-8">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nm_ayah" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nm_ayah" name="nm_ayah" placeholder="Nama Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $ortu['nama_ayah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik_ayah" class="col-sm-4 col-form-label">NIK/No. KTP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK/No. KTP Sesuai Dengan Kartu Keluarga (KK) /KTP" value="<?php echo $ortu['nik_ayah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo $ortu['tgl_ayah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="pend_ayah" class="col-sm-4 col-form-label">Pendidikan</label>
							<div class="col-sm-8">
								<select name="pend_ayah" id="pend_ayah" class="form-control" required>
									<option value="<?php echo $ortu['pendidikan_ayah'];?>" selected><?php echo getPendidikanOrtu($ortu['pendidikan_ayah']);?></option>
									<option value="Putus">Putus Sekolah</option>
									<option value="SD">SD/MI/Sederajat</option>
									<option value="SLTP">SMP/MTs/Sederajat</option>
									<option value="SLTA">SMA/MA/SMK/Sederajat</option>
									<option value="Diploma">Diploma 1/2/3</option>
									<option value="S1">Sarjana</option>
									<option value="S2">Magister</option>
									<option value="Lain">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="kerja_ayah" class="col-sm-4 col-form-label">Pekerjaan</label>
							<div class="col-sm-8">
								<select name="kerja_ayah" id="kerja_ayah" class="form-control" required>
									<option value="<?php echo $ortu['pekerjaan_ayah'];?>" selected><?php echo getPekerjaan($ortu['pekerjaan_ayah']);?></option>
									<option value="Tidak">Tidak Bekerja</option>
									<option value="Buruh">Buruh</option>
									<option value="PNS">PNS/TNI/Polri</option>
									<option value="Guru">Guru</option>
									<option value="Nelayan">Nelayan</option>
									<option value="Pedagang Kecil">Pedagang Kecil</option>
									<option value="Pedagang Besar">Pedagang Besar</option>
									<option value="Karyawan Swasta">Karyawan Swasta</option>
									<option value="Karyawan BUMN">Karyawan BUMN/BUMD</option>
									<option value="Petani">Petani</option>
									<option value="Buruh Tani">Buruh Tani</option>
									<option value="Wiraswasta">Wiraswasta</option>
									<option value="Wirausaha">Wirausaha</option>
									<option value="Almarhum">Sudah Meninggal</option>
									<option value="Lain">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="hasil_ayah" class="col-sm-4 col-form-label">Penghasilan Perbulan</label>
							<div class="col-sm-8">
								<select name="hasil_ayah" id="hasil_ayah" class="form-control" required>
									<option value="<?php echo $ortu['penghasilan_ayah'];?>" selected><?php echo getPenghasilan($ortu['penghasilan_ayah']);?></option>
									<option value="0">Tidak Ada Penghasilan</option>
									<option value="500">Kurang Dari Rp. 500.000</option>
									<option value="1000">Kurang Dari Rp. 1.000.000</option>
									<option value="2000">Rp. 1.000.000 - 2.000.000</option>
									<option value="5000">Rp. 2.000.000 - 5.000.000</option>
									<option value="5000">Lebih Dari 5.000.0000</option>
								</select>
							</div>
						</div></br>
						<div class="form-group row">
							<label for="bp" class="col-sm-4 col-form-label"><u>Data Ibu</u></label>
							<div class="col-sm-8">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nm_ibu" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nm_ibu" name="nm_ibu" placeholder="Nama Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $ortu['nama_ibu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik_ibu" class="col-sm-4 col-form-label">NIK/No. KTP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK/No. KTP Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $ortu['nik_ibu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ibu" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" id="tgl_ibu" name="tgl_ibu" placeholder="" value="<?php echo $ortu['tgl_ibu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="pend_ibu" class="col-sm-4 col-form-label">Pendidikan</label>
							<div class="col-sm-8">
								<select name="pend_ibu" id="pend_ibu" class="form-control" required>
									<option value="<?php echo $ortu['pendidikan_ibu'];?>" selected><?php echo getPendidikanOrtu($ortu['pendidikan_ibu']);?></option>
									<option value="Putus">Putus Sekolah</option>
									<option value="SD">SD/MI/Sederajat</option>
									<option value="SLTP">SMP/MTs/Sederajat</option>
									<option value="SLTA">SMA/MA/SMK/Sederajat</option>
									<option value="Diploma">Diploma 1/2/3</option>
									<option value="S1">Sarjana</option>
									<option value="S2">Magister</option>
									<option value="Lain">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="kerja_ibu" class="col-sm-4 col-form-label">Pekerjaan</label>
							<div class="col-sm-8">
								<select name="kerja_ibu" id="kerja_ibu" class="form-control" required>
									<option value="<?php echo $ortu['pekerjaan_ibu'];?>" selected><?php echo getPekerjaan($ortu['pekerjaan_ibu']);?></option>
									<option value="Tidak">Tidak Bekerja</option>
									<option value="Buruh">Buruh</option>
									<option value="PNS">PNS/TNI/Polri</option>
									<option value="Guru">Guru</option>
									<option value="Nelayan">Nelayan</option>
									<option value="Pedagang Kecil">Pedagang Kecil</option>
									<option value="Pedagang Besar">Pedagang Besar</option>
									<option value="Karyawan Swasta">Karyawan Swasta</option>
									<option value="Karyawan BUMN">Karyawan BUMN/BUMD</option>
									<option value="Petani">Petani</option>
									<option value="Buruh Tani">Buruh Tani</option>
									<option value="Wiraswasta">Wiraswasta</option>
									<option value="Wirausaha">Wirausaha</option>
									<option value="Almarhum">Sudah Meninggal</option>
									<option value="Lain">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="hasil_ibu" class="col-sm-4 col-form-label">Penghasilan Perbulan</label>
							<div class="col-sm-8">
								<select name="hasil_ibu" id="hasil_ibu" class="form-control" required>
									<option value="<?php echo $ortu['penghasilan_ibu'];?>" selected><?php echo getPenghasilan($ortu['penghasilan_ibu']);?></option>
									<option value="0">Tidak Ada Penghasilan</option>
									<option value="500">Kurang Dari Rp. 500.000</option>
									<option value="1000">Kurang Dari Rp. 1.000.000</option>
									<option value="2000">Rp. 1.000.000 - 2.000.000</option>
									<option value="5000">Rp. 2.000.000 - 5.000.000</option>
									<option value="5000">Lebih Dari 5.000.0000</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="telp_ortu" class="col-sm-4 col-form-label">Nomor Yang Dapat Dihubungi</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="telp_ortu" name="telp_ortu" placeholder="Nomor Telepon/Handphone Yang Dapat Di Hubungis" value="<?php echo $ortu['telp_ortu'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat Orang Tua Tinggal</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Jalan / Dusun" value="<?php echo $ortu['alamat_ortu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="rtrw" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rt" placeholder="RT" value="<?php echo $ortu['rt_ortu'];?>" required>
									</div>
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rw" placeholder="RW" value="<?php echo $ortu['rw_ortu'];?>" required>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Desa/Kelurahan" value="<?php echo $ortu['desa_ortu'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prov" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kec" placeholder="Kecamatan" value="<?php echo $ortu['kec_ortu'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kab" placeholder="Kabupaten" value="<?php echo $ortu['kab_ortu'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" value="<?php echo $ortu['prov_ortu'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="submit" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
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
					<i>(* Harap Di Isi Dengan Huruf Capital (Huruf Besar Setiap Kata) ex: <strong>M</strong>uhammad&nbsp;<strong>S</strong>lamet</i>
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
