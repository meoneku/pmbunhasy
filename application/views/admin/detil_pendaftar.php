<?php $this->load->view('admin/_parsial/header');?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Detail <?php echo $identitas['nama'];?></h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#identitas" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Identitas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#pendidikan" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Pendidikan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#ortu" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Orang Tua / Wali</a>
                  </li>
				  <li class="nav-item">
                   <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#pilihan" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Jurusan Yang Dipilih</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/simpan_identitas');?>" method="post">
                     	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama Sesuai Dengan Ijazah</label>
							<div class="col-sm-8">
								<input type="hidden" id="id" name="id" value="<?php echo $identitas['nomor'];?>">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $identitas['nama'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label">Alamat Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $identitas['email'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-8">
								<select name="jk" id="jk" class="form-control" required>
									<option value="<?php echo $identitas['gender'];?>" selected><?php echo $identitas['gender'];?></option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="hp" class="col-sm-4 col-form-label">Nomor Yang Dapat Dihubungi</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="hp" name="hp" placeholder="No Telepon / Handphone" value="<?php echo $identitas['hp'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik" class="col-sm-4 col-form-label">NIK / KTP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?php echo $identitas['nik'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="ttl" class="col-sm-4 col-form-label">Tempat Dan Tanggal Lahir</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-7">
										<input type="text" class="form-control" id="ttl" name="tlah" placeholder="Tempat Lahir" value="<?php echo $identitas['tempat_lahir'];?>" required>
									</div>
									<div class="col-5">
										<input type="date" class="form-control" id="ttl" name="tgl" placeholder="Tanggal Lahir" value="<?php echo $identitas['tanggal_lahir'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat Tinggal Sekarang</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Jalan / Dusun" value="<?php echo $identitas['alamat'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="rtrw" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rt" placeholder="RT" value="<?php echo $identitas['rt'];?>" required>
									</div>
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rw" placeholder="RW" value="<?php echo $identitas['rw'];?>" required>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Desa/Kelurahan" value="<?php echo $identitas['desa'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prov" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kec" placeholder="Kecamatan" value="<?php echo $identitas['kec'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kab" placeholder="Kabupaten" value="<?php echo $identitas['kab'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" value="<?php echo $identitas['prov'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan Data Diri</button>
							</div>
						</div>
					</div>
				 </form>
                 </div>
                  <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                     <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/simpan_pendidikan');?>" method="post">
                     	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="asal" class="col-sm-4 col-form-label">Asal Instansi / Sekolah</label>
							<div class="col-sm-8">
								<input type="hidden" id="id" name="id" value="<?php echo $identitas['nomor'];?>">
								<select name="asal" id="asal" class="form-control">
									<option value="<?php echo $identitas['asal_sekolah'];?>"  selected><?php echo getAsalSekolah($identitas['asal_sekolah']);?></option>
									<option value="SMA">Sekolah Menengah Atas (SMA)</option>
									<option value="MA">Madrasah Aliyah (MA)</option>
									<option value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
									<option value="Pondok">Pondok Pesantren</option>
									<option value="D1">Diploma 1 (D1)</option>
									<option value="D2">Diploma 2 (D2)</option>
									<option value="D3">Diploma 3 (D3)</option>
									<option value="S1">Sarjana (S1)</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan ex: IPS/IPA/Keagamaan/Lainnya" value="<?php echo $identitas['jurusan'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="ns" class="col-sm-4 col-form-label">Negeri / Swasta</label>
							<div class="col-sm-8">
								<select name="ns" id="ns" class="form-control">
									<option value="<?php echo $identitas['status_sekolah'];?>" selected><?php if ($identitas['status_sekolah'] == "") { echo '-- Status Sekolah --'; } else { echo $identitas['status_sekolah']; }?></option>
									<option value="Negeri">Negeri</option>
									<option value="Swasta">Swasta</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="instan" class="col-sm-4 col-form-label">Nama Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="instan" name="instan" placeholder="Instansi Pendidikan" value="<?php echo $identitas['nama_sekolah'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_instan" class="col-sm-4 col-form-label">Alamat Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat_instan" name="alamat_instan" placeholder="Alamat Instansi / Sekolah" value="<?php echo $identitas['alamat_sekolah'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="telp_instan" class="col-sm-4 col-form-label">Telepon Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="telp_instan" name="telp_instan" placeholder="Telepon Instansi / Sekolah" value="<?php echo $identitas['telp_instansi'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="nisn" class="col-sm-4 col-form-label">NISN</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nisn" name="nisn" placeholder="Bila Ada" value="<?php echo $identitas['nisn'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="nilai" class="col-sm-4 col-form-label">Nilai Rata-rata Raport/UN/Jumlah Hafalan Berapa Juz</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nilai" name="nilai" placeholder="Isi Dengan Angka" value="<?php echo $identitas['nilai'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="submit" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan Pendidikan</button>
							</div>
						</div>
					</div>
				 </form>
                  </div>
                  <div class="tab-pane fade" id="ortu" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                     <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/simpan_ortu');?>" method="post">
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
								<input type="hidden" id="id" name="id" value="<?php echo $identitas['nomor'];?>">
								<input type="text" class="form-control" id="nm_ayah" name="nm_ayah" placeholder="Nama Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $identitas['nama_ayah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik_ayah" class="col-sm-4 col-form-label">NIK/No. KTP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK/No. KTP Sesuai Dengan Kartu Keluarga (KK) /KTP" value="<?php echo $identitas['nik_ayah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo $identitas['tgl_ayah'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="pend_ayah" class="col-sm-4 col-form-label">Pendidikan</label>
							<div class="col-sm-8">
								<select name="pend_ayah" id="pend_ayah" class="form-control" required>
									<option value="<?php echo $identitas['pendidikan_ayah'];?>" selected><?php echo getPendidikanOrtu($identitas['pendidikan_ayah']);?></option>
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
									<option value="<?php echo $identitas['pekerjaan_ayah'];?>" selected><?php echo getPekerjaan($identitas['pekerjaan_ayah']);?></option>
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
									<option value="<?php echo $identitas['penghasilan_ayah'];?>" selected><?php echo getPenghasilan($identitas['penghasilan_ayah']);?></option>
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
								<input type="text" class="form-control" id="nm_ibu" name="nm_ibu" placeholder="Nama Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $identitas['nama_ibu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik_ibu" class="col-sm-4 col-form-label">NIK/No. KTP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK/No. KTP Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $identitas['nik_ibu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ibu" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" id="tgl_ibu" name="tgl_ibu" placeholder="" value="<?php echo $identitas['tgl_ibu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="pend_ibu" class="col-sm-4 col-form-label">Pendidikan</label>
							<div class="col-sm-8">
								<select name="pend_ibu" id="pend_ibu" class="form-control" required>
									<option value="<?php echo $identitas['pendidikan_ibu'];?>" selected><?php echo getPendidikanOrtu($identitas['pendidikan_ibu']);?></option>
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
									<option value="<?php echo $identitas['pekerjaan_ibu'];?>" selected><?php echo getPekerjaan($identitas['pekerjaan_ibu']);?></option>
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
									<option value="<?php echo $identitas['penghasilan_ibu'];?>" selected><?php echo getPenghasilan($identitas['penghasilan_ibu']);?></option>
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
								<input type="number" class="form-control" id="telp_ortu" name="telp_ortu" placeholder="Nomor Telepon/Handphone Yang Dapat Di Hubungis" value="<?php echo $identitas['telp_ortu'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat Orang Tua Tinggal</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Jalan / Dusun" value="<?php echo $identitas['alamat_ortu'];?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="rtrw" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rt" placeholder="RT" value="<?php echo $identitas['rt_ortu'];?>" required>
									</div>
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rw" placeholder="RW" value="<?php echo $identitas['rw_ortu'];?>" required>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Desa/Kelurahan" value="<?php echo $identitas['desa_ortu'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prov" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kec" placeholder="Kecamatan" value="<?php echo $identitas['kec_ortu'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kab" placeholder="Kabupaten" value="<?php echo $identitas['kab_ortu'];?>" required>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" value="<?php echo $identitas['prov_ortu'];?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="submit" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan Data Orang Tua / Wali</button>
							</div>
						</div>
					</div>
				 </form>
                </div>
				<div class="tab-pane fade" id="pilihan" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                     <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/simpan_pilihan');?>" method="post">
                     	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="jalur" class="col-sm-4 col-form-label">Jalur/Program Pendaftaran</label>
							<div class="col-sm-8">
								<input type="hidden" id="id" name="id" value="<?php echo $identitas['nomor'];?>">
								<select name="jalur" class="form-control" id="jalur">
									<option value="<?php echo $identitas['jalur']; ?>" selected><?php echo $identitas['jalur']; ?></option>
									<option value="Reguler">Reguler</option>
									<option value="Nilai UN">Nilai UN</option>
									<option value="Raport">Raport</option>
									<option value="Tahfidz">Tahfidz</option>
									<option value="Prestasi Akademik">Prestasi Akademik</option>
									<option value="Prestasi Non Akademik">Prestasi Non Akademik</option>
									<option value="BKKM">Bantuan Keluarga Kurang Mampu</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<select name="kelas" class="form-control" id="kelas">
									<option value="<?php echo $identitas['kelas']; ?>" selected><?php echo $identitas['kelas']; ?></option>
									<option value="Pagi">Pagi</option>
									<option value="Sore">Sore</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil1" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Pertama</label>
							<div class="col-sm-8">
								<select name="pil1" class="form-control" id="pil1">
									<option value="<?php echo $identitas['pil1']; ?>" selected><?php echo getProdi($identitas['pil1']); ?></option>
									<option value="1">S1 Hukum Keluarga</option>
									<option value="2">S1 Hukum Ekonomi Syariah</option>
									<option value="3">S1 Komunikasi Dan Penyiaran Islam</option>
									<option value="4">S1 Pendidikan Agama Islam</option>
									<option value="5">S1 Pendidikan Bahasa Arab</option>
									<option value="6">S1 Pendidikan Guru MI</option>
									<option value="24">S1 Manajemen Pendidikan Agama Islam</option>
									<option value="7">S1 Teknik Mesin</option>
									<option value="8">S1 Teknik Elektro</option>
									<option value="9">S1 Teknik Sipil</option>
									<option value="10">S1 Teknik Industri</option>
									<option value="11">S1 Informatika</option>
									<option value="12">S1 Sistem Informasi</option>
									<option value="13">D3 Manajemen Informatika</option>
									<option value="14">S1 Manajemen</option>
									<option value="15">S1 Akutansi</option>
									<option value="16">S1 Ekonomi Islam</option>
									<option value="17">S1 Pendidikan Guru SD</option>
									<option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option>
									<option value="19">S1 Pendidikan Bahasa Inggris</option>
									<option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option>
									<option value="21">S1 Pendidikan Matematika</option>
									<option value="22">S2 Hukum Keluarga</option>
									<option value="23">S2 Pendidikan Agama Islam</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="pil2" class="col-sm-4 col-form-label">Jurusan/Prodi Pilihan Kedua</label>
							<div class="col-sm-8">
								<select name="pil2" class="form-control" id="pil2">
									<option value="<?php echo $identitas['pil2']; ?>" selected><?php echo getProdi($identitas['pil2']); ?></option>
									<option value="1">S1 Hukum Keluarga</option>
									<option value="2">S1 Hukum Ekonomi Syariah</option>
									<option value="3">S1 Komunikasi Dan Penyiaran Islam</option>
									<option value="4">S1 Pendidikan Agama Islam</option>
									<option value="5">S1 Pendidikan Bahasa Arab</option>
									<option value="6">S1 Pendidikan Guru MI</option>
									<option value="24">S1 Manajemen Pendidikan Agama Islam</option>
									<option value="7">S1 Teknik Mesin</option>
									<option value="8">S1 Teknik Elektro</option>
									<option value="9">S1 Teknik Sipil</option>
									<option value="10">S1 Teknik Industri</option>
									<option value="11">S1 Informatika</option>
									<option value="12">S1 Sistem Informasi</option>
									<option value="13">D3 Manajemen Informatika</option>
									<option value="14">S1 Manajemen</option>
									<option value="15">S1 Akutansi</option>
									<option value="16">S1 Ekonomi Islam</option>
									<option value="17">S1 Pendidikan Guru SD</option>
									<option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option>
									<option value="19">S1 Pendidikan Bahasa Inggris</option>
									<option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option>
									<option value="21">S1 Pendidikan Matematika</option>
									<option value="22">S2 Hukum Keluarga</option>
									<option value="23">S2 Pendidikan Agama Islam</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="ket" class="col-sm-4 col-form-label">Keterangan Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="ket" name="ket" placeholder="Tambahan Keterangan" value="<?php echo $identitas['keterangan_pendaftaran'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
							</div>
						</div>
					</div>
				 </form>
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
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  
  <script>
  $(function () {
    $('#pendaftar').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
