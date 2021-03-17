<!DOCTYPE html>
<html lang="en">
<head>
  <center><img src="<?php echo base_url('file/kop.png');?>" width="900"></center>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Cetak Bukti Pendaftaran</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" onload="cetak();">
<div class="wrapper">
              <div class="card-body">
                <div class="row">
				 <div class="col-md-12">
					<div class="card-body">
						<center><p><strong>BUKTI DAFTAR ULANG</strong></p></center>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Identitas Diri</a></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nomor Induk Mahasiswa (NIM)</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="NIM Kosong" value="<?php echo $pendaftar['nim_pdti'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo strtoupper($pendaftar['nama']);?>" readonly>
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
							<label for="mail" class="col-sm-4 col-form-label">Email</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="mail" name="mail" placeholder="mail" value="<?php echo $pendaftar['email'];?>" readonly>
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
										<input type="text" class="form-control" id="rtrw" name="desa" placeholder="Tawar" value="<?php echo $pendaftar['desa'];?>" readonly>
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
								<input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" value="<?php echo getProdi($pendaftar['prodi']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?php echo $pendaftar['kelas'];?>" readonly>
							</div>
						</div></br>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Asal Pendidikan Terakhir</a></label>
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
						</br></br></br></br></br></br></br>
						<div class="form-group row">
							<label for="title" class="col-sm-12 col-form-label"><a href="" class="btn btn-block btn-primary">Data Orang Tua/Wali</a></label>
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
						</div></br>
						<div class="form-group row">
							<div class="col-sm-12">
								
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-4">
										<img width="178" height="224" src="<?php echo base_url('file/foto/').$berkas['foto'];?>">
									</div>
									<div class="col-2">
										<img width="178" src="<?php echo base_url('file/qrcode/').$biaya['qrcode'].'.png';?>">
									</div>
									<div class="col-3">
									
									</div>
									<div class="col-2">
										<p>Jombang, <?php	$tanggal = new DateTime($pendaftar['tanggal_verifikasi_du']);
															$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
															echo $indotgl;?></p></br></br></br></br></br>
										<p><?php echo $pendaftar['nama'];?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
  </div>
</body>
</html>
<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>