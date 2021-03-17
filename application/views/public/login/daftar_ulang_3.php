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
            <h1 class="m-0 text-dark">Daftar Ulang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Proses Daftar Ulang</li>
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
                <h5 class="card-title">Proses Daftar Ulang Langkah 3-3</h5>

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
					<?php if ($pendaftar['daftar_ulang'] == 1) {?>
					<p>Pembayaran Daftar Ulang Anda Sedang Dalam Proses Verifikasi, Harap Tunggu Maks 2x24 Jam Kerja Untuk Verifikasi. Anda Dapat Melihat Bukti Daftar Ulang Anda <s href="<?php echo base_url('file/bukti_daftar_ulang/').$bayarulang['bukti_daftar'];?>" >Di Sini</a></p>
					<?php } else if($pendaftar['daftar_ulang'] == 2) { 
						if ($this->session->userdata('dustep') == 3) {?>
					<form class="form-horizontal" action="<?php echo base_url('dlogin/finish_daftar_ulang');?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Review Data Identitas Diri</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $pendaftar['nomor'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $pendaftar['nama'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $pendaftar['gender'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="hp" class="col-sm-4 col-form-label">Nomor Yang Dapat Dihubungi</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="hp" name="hp" placeholder="No Telepon / Handphone" value="<?php echo $pendaftar['hp'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik" class="col-sm-4 col-form-label">NIK / KTP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?php echo $pendaftar['nik'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="ttl" class="col-sm-4 col-form-label">Tempat Dan Tanggal Lahir</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-7">
										<input type="text" class="form-control" id="ttl" name="tlah" placeholder="Tempat Lahir" value="<?php echo $pendaftar['tempat_lahir'];?>" readonly>
									</div>
									<div class="col-5">
										<input type="text" class="form-control" id="ttl" name="tgl" placeholder="Tanggal Lahir" value="<?php echo getTanggalIndo($pendaftar['tanggal_lahir']);?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat Tinggal Sekarang</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Jalan / Dusun" value="<?php echo $pendaftar['alamat'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="rtrw" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rt" placeholder="RT" value="<?php echo $pendaftar['rt'];?>" readonly>
									</div>
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rw" placeholder="RW" value="<?php echo $pendaftar['rw'];?>" readonly>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Desa/Kelurahan" value="<?php echo $pendaftar['desa'];?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prov" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kec" placeholder="Kecamatan" value="<?php echo $pendaftar['kec'];?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kab" placeholder="Kabupaten" value="<?php echo $pendaftar['kab'];?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" value="<?php echo $pendaftar['prov'];?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="prodi" name="prodi" placeholder="prodi" value="<?php echo getProdi($pendaftar['prodi']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas" value="<?php echo $pendaftar['kelas'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Review Data Asal Pendidikan Terakhir</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="instan" class="col-sm-4 col-form-label">Asal Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="instan" name="instan" placeholder="Instansi Pendidikan" value="<?php echo getAsalSekolah($pendaftar['asal_sekolah']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan ex: IPS/IPA/Keagamaan/Lainnya" value="<?php echo $pendaftar['jurusan'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="instan" class="col-sm-4 col-form-label">Status Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="instan" name="instan" placeholder="Instansi Pendidikan" value="<?php echo $pendaftar['status_sekolah'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="instan" class="col-sm-4 col-form-label">Nama Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="instan" name="instan" placeholder="Instansi Pendidikan" value="<?php echo $pendaftar['nama_sekolah'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_instan" class="col-sm-4 col-form-label">Alamat Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat_instan" name="alamat_instan" placeholder="Alamat Instansi / Sekolah" value="<?php echo $pendaftar['alamat_sekolah'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="telp_instan" class="col-sm-4 col-form-label">Telepon Instansi Pendidikan/Sekolah</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="telp_instan" name="telp_instan" placeholder="Telepon Instansi / Sekolah" value="<?php echo $pendaftar['telp_instansi'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nisn" class="col-sm-4 col-form-label">NISN</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nisn" name="nisn" placeholder="Bila Ada" value="<?php echo $pendaftar['nisn'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Review Data Data Orang Tua/Wali</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="bp" class="col-sm-4 col-form-label"><u>Data Ayah</u></label>
							<div class="col-sm-8">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nm_ayah" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nm_ayah" name="nm_ayah" placeholder="Nama Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $pendaftar['nama_ayah'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik_ayah" class="col-sm-4 col-form-label">NIK/No. KTP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK/No. KTP Sesuai Dengan Kartu Keluarga (KK) /KTP" value="<?php echo $pendaftar['nik_ayah'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getTanggalIndo($pendaftar['tgl_ayah']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getPendidikanOrtu($pendaftar['pendidikan_ayah']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Pekerjaan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getPekerjaan($pendaftar['pekerjaan_ayah']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Penghasilan Perbulan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getPenghasilan($pendaftar['penghasilan_ayah']);?>" readonly>
							</div>
						</div>
						</br>
						<div class="form-group row">
							<label for="bp" class="col-sm-4 col-form-label"><u>Data Ibu</u></label>
							<div class="col-sm-8">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nm_ibu" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nm_ibu" name="nm_ibu" placeholder="Nama Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $pendaftar['nama_ibu'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik_ibu" class="col-sm-4 col-form-label">NIK/No. KTP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK/No. KTP Sesuai Dengan Kartu Keluarga (KK) / KTP" value="<?php echo $pendaftar['nik_ibu'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ibu" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ibu" name="tgl_ibu" placeholder="" value="<?php echo getTanggalIndo($pendaftar['tgl_ibu']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getPendidikanOrtu($pendaftar['pendidikan_ibu']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Pekerjaan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getPekerjaan($pendaftar['pekerjaan_ibu']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_ayah" class="col-sm-4 col-form-label">Penghasilan Perbulan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_ayah" name="tgl_ayah" placeholder="" value="<?php echo getPenghasilan($pendaftar['penghasilan_ibu']);?>" readonly>
							</div>
						</div>
						</br></br>
						<div class="form-group row">
							<label for="telp_ortu" class="col-sm-4 col-form-label">Nomor Yang Dapat Dihubungi</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="telp_ortu" name="telp_ortu" placeholder="Nomor Telepon/Handphone Yang Dapat Di Hubungis" value="<?php echo $pendaftar['telp_ortu'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat Orang Tua Tinggal</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Jalan / Dusun" value="<?php echo $pendaftar['alamat_ortu'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="rtrw" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rt" placeholder="RT" value="<?php echo $pendaftar['rt_ortu'];?>" readonly>
									</div>
									<div class="col-3">
										<input type="number" class="form-control" id="rtrw" name="rw" placeholder="RW" value="<?php echo $pendaftar['rw_ortu'];?>" readonly>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Desa/Kelurahan" value="<?php echo $pendaftar['desa_ortu'];?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="prov" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kec" placeholder="Kecamatan" value="<?php echo $pendaftar['kec_ortu'];?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="kab" placeholder="Kabupaten" value="<?php echo $pendaftar['kab_ortu'];?>" readonly>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" value="<?php echo $pendaftar['prov_ortu'];?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Review Data Pemberkasan</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-3">
										<?php if (empty($berkas['foto'])) {
										$foto  = base_url('file/foto/default.png');
										} else {
											$foto  = base_url('file/foto/').$berkas['foto'];
										} ?>
										<img width="178" height="224" src="<?php echo $foto;?>">
									</div>
									<div class="col-sm-2">
										<?php if(empty($berkas['kk'])) { echo '<a href="" class="btn btn-danger">Berkas KK Tidak Ada</a>'; } else { echo '<a href="'.base_url('file/kk/').$berkas['kk'].'" class="btn btn-success" target="_blank">Berkas KK Ada</a>'; }?>
									</div>
									<div class="col-sm-2">
										<?php if(empty($berkas['ktp'])) { echo '<a href="" class="btn btn-danger">Berkas KTP Tidak Ada</a>'; } else { echo '<a href="'.base_url('file/ktp/').$berkas['ktp'].'" class="btn btn-success" target="_blank">Berkas KTP Ada</a>'; }?>
									</div>
									<div class="col-sm-2">
										<?php if(empty($berkas['ijazah'])) { echo '<a href="" class="btn btn-danger">Berkas Ijazah Tidak Ada</a>'; } else { echo '<a href="'.base_url('file/ijazah/').$berkas['ijazah'].'" class="btn btn-success" target="_blank">Berkas Ijazah Ada</a>'; }?>
									</div>
									<div class="col-sm-2">
										<?php if(empty($berkas['skhun'])) { echo '<a href="" class="btn btn-danger">Berkas SKHUN Tidak Ada</a>'; } else { echo '<a href="'.base_url('file/skhun/').$berkas['skhun'].'" class="btn btn-success" target="_blank">Berkas SKHUN Ada</a>'; }?>
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<i>Catatan : Bila Berkas Scan Tidak Ada Atau Tidak Di Upload/Unggah Wajib Menyerahkan Melalui Kantor Sekretariat Penerimaan Mahasiswa Baru Unhasy</i>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Ukuran Jas Almamater</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<strong>Panduan Ukuran Jas Almamater:</strong></br>
								<table border="1" width="100%">
									<tr><th class="text-center">Ukuran</th><th class="text-center">Lebar Badan</th><th class="text-center">Panjang Badan</th><th class="text-center">Panjang Lengan</th></tr>
									<tr><td class="text-center">S</td><td class="text-center">50 cm</td><td class="text-center">82 cm</td><td class="text-center">52 cm</td></tr>
									<tr><td class="text-center">M</td><td class="text-center">52 cm</td><td class="text-center">85 cm</td><td class="text-center">53 cm</td></tr>
									<tr><td class="text-center">L</td><td class="text-center">54 cm</td><td class="text-center">88 cm</td><td class="text-center">55 cm</td></tr>
									<tr><td class="text-center">XL</td><td class="text-center">58 cm</td><td class="text-center">92 cm</td><td class="text-center">55 cm</td></tr>
								</table></br>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="jas" class="col-sm-4 col-form-label">Ukuran Jas Alamater</label>
							<div class="col-sm-8">
								<select name="jas" id="jas" class="form-control" required>
									<option value="" selected>Pilih Salah Satu</option>
									<option value="S">Ukuran <strong>S</strong></option>
									<option value="M">Ukuran <strong>M</strong></option>
									<option value="L">Ukuran <strong>L</strong></option>
									<option value="XL">Ukuran <strong>XL</strong></option>
									<option value="XXL">Ukuran <strong>XXL</strong></option>
									<option value="XXXL">Ukuran <strong>XXXL</strong></option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<hr>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2">
								</br>
								<a href="<?php echo base_url('dlogin/kembali_daftar_ulang_2');?>" class="btn btn-block btn-warning" ><i class="fa fa-caret-square-left"></i> Kembali</a>
							</div>
							<div class="col-sm-8">
								</br>
							</div>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-info">Selesaikan <i class="fa fa-save"></i></button>
							</div>
						</div>
					</div>
					</form>
					<?php } else {
							redirect(base_url('dlogin/daftar_ulang'));
						  }
						} else {?>
					<p>Anda Belum Melakukan Pembayaran Daftar Ulang, Untuk Mengetahui Rincian Tentang Biaya Daftar Ulang Silahkan Download Rincian Daftar Ulang <a href="<?php echo base_url('file/Daftar-Ulang-Maba-2020.pdf');?>" class="btn btn-success">Di Sini</a>. Pembayaran Dapat Di Transfer Ke <strong><?php echo $bank;?></strong> Dengan Nomor Rekening <strong><?php echo $rek;?></strong> Atas Nama Universitas Hasyim Asy'ari Dan Unggah/Upload Bukti Daftar Ulang Ke Bagian Menu Pemberkasan Bukti Pembayaran</p>
					<?php } ?>
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
