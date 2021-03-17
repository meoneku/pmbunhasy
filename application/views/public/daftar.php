<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('public/_parsial/head');?>

<body>

  <?php $this->load->view('public/_parsial/header2');?> 

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Form Pendaftaran</h2>
          <p>Silahkan isi semua data diri anda sesuai dengan kolom yang di sediakan dan pastikan data yang masukkan sudah benar</p>
        </div>
		<form action="<?php echo base_url('daftar/proses');?>" method="post" role="form" class="php-email-form" data-aos="fade-up" name="daftar" id="daftar">
        <div class="row">
		  
            <div class="col-lg-6">
              <div class="form-group">
                <input placeholder="Nama Anda" type="text" name="nama" class="form-control" id="nama" data-rule="minlen:4" data-msg="Masukkan minimal 4 karakter" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input placeholder="Email Anda" type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Masukkan email yang valid" />
                <div class="validate"></div>
              </div>
			  <div class="form-group">
                <input placeholder="Password Untuk Login" type="password" class="form-control" name="pass" id="pass" data-rule="required" data-msg="Masukkan Password" />
                <div class="validate"></div>
              </div>
			  <div class="form-group">
				<select name="jk" class="form-control" id="jk" data-rule="required" style="font-size:14px;border-radius: 0;box-shadow: none;height:42px;">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input placeholder="NIK/KTP" type="number" class="form-control" name="nik" id="nik" data-rule="minlen:8" data-msg="Masukkan minimal 8 karakter" />
                <div class="validate"></div>
              </div>
			  <div class="form-group">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input placeholder="Tempat Lahir/Tanggal Lahir" type="text" class="form-control" name="tlah" id="tlah" data-rule="minlen:4" data-msg="Masukkan minimal 4 karakter" />
						<div class="validate"></div>
					</div>
					<div class="form-group col-md-6">
						<input placeholder="Tanggal Lahir (dd/mm/yyyy)" type="date" class="form-control" name="tgl" id="tgl" data-rule="minlen:10" data-msg="Masukkan format tanggal lahir yang benar" />
						<div class="validate"></div>
					</div>
				</div>
			  </div>
			  <div class="form-group">
                <input placeholder="Alamat Dusun/Alamat Jalan/Gang Tinggal Sekarang" type="text" name="alamat" class="form-control" id="alamat" data-rule="minlen:4" data-msg="Masukkan minimal 4 karakter" />
                <div class="validate"></div>
			  </div>
			  <div class="form-group">
				<div class="form-row">
					<div class="form-group col-md-3">
						<input placeholder="RT" type="number" name="rt" class="form-control" id="rt" data-rule="required" data-msg="Masukkan RT" />
						<div class="validate"></div>
					</div>
					<div class="form-group col-md-3">
						<input placeholder="RW" type="number" name="rw" class="form-control" id="rw" data-rule="required" data-msg="Masukkan RT" />
						<div class="validate"></div>
					</div>
					<div class="form-group col-md-6">
						<input placeholder="Kelurahan/Desa" type="text" name="desa" class="form-control" id="desa" data-rule="required" data-msg="Masukkan RT" />
						<div class="validate"></div>
					</div>
				</div>
			  </div>
			   <div class="form-group">
				<div class="form-row">
					<div class="form-group col-md-4">
						<input placeholder="Kecamatan" type="text" name="kec" class="form-control" id="kec" data-rule="required" data-msg="Masukkan Kecamatan" />
						<div class="validate"></div>
					</div>
					<div class="form-group col-md-4">
						<input placeholder="Kabupaten" type="text" name="kab" class="form-control" id="kab" data-rule="required" data-msg="Masukkan Kabupateb" />
						<div class="validate"></div>
					</div>
					<div class="form-group col-md-4">
						<input placeholder="Provinsi" type="text" name="prov" class="form-control" id="prov" data-rule="required" data-msg="Masukkan Provinsi" />
						<div class="validate"></div>
					</div>
				</div>
			  </div>
			</div>
			<div class="col-lg-6">
            <div class="form-group">
                <input placeholder="Asal Sekolah" type="text" name="sekolah" class="form-control" id="sekolah" data-rule="minlen:4" data-msg="Masukkan minimal 4 karakter" />
                <div class="validate"></div>
            </div>
			<div class="form-group">
                <input placeholder="Alamat Sekolah" type="text" name="alakolah" class="form-control" id="alakolah" data-rule="minlen:4" data-msg="Masukkan minimal 4 karakter" />
                <div class="validate"></div>
            </div>
            <div class="form-group">
				<select name="jalur" class="form-control" id="jalur" data-rule="required" onchange="tampilkan()" style="font-size:14px;border-radius: 0;box-shadow: none;height:42px;" required>
					<option value="" disabled selected>Jalur Pendaftaran</option>
					<option value="Reguler">Reguler</option>
					<option value="Nilai UN">Nilai UN</option>
					<option value="KIP Kuliah">KIP Kuliah</option>
				</select>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <select name="kelas" class="form-control" id="kelas" data-rule="required" onchange="tampilkan()" style="font-size:14px;border-radius: 0;box-shadow: none;height:42px;" required>
					<option value="" disabled selected>Kelas</option>
					<option value="Pagi">Pagi</option>
					<option value="Sore">Sore</option>
				</select>
                <div class="validate"></div>
              </div>
              <div class="form-group">
				<select name="pil1" class="form-control" id="pil1" data-rule="required" style="font-size:14px;border-radius: 0;box-shadow: none;height:42px;" required>
					<option value="" disabled selected>Pilihan Prodi Pertama (Pilih Kelas Untuk Menampilkan Pilihan)</option>
				</select>
                <div class="validate"></div>
              </div>
			  <div class="form-group">
				<div class="form-row">
				<div class="form-group col-md-12">
                <select name="pil2" class="form-control" id="pil2" data-rule="required" style="font-size:14px;border-radius: 0;box-shadow: none;height:42px;" required>
					<option value="" disabled selected>Pilihan Prodi Kedua (Pilih Kelas Untuk Menampilkan Pilihan)</option>
				</select>
                <div class="validate"></div>
              </div></div></div>
			  <div class="form-group">
                <input placeholder="Nomer HP Yang Dapat Di Hubungi" type="text" name="hp" class="form-control" id="hp" data-rule="minlen:10" data-msg="Minimal 10 karakter" />
                <div class="validate"></div>
			  </div>
			<div class="form-group">
				<div class="form-row">
				<div class="form-group col-md-12">
				<select name="info" class="form-control" id="info" data-rule="required" style="font-size:14px;border-radius: 0;box-shadow: none;height:42px;" required>
					<option value="" selected>Asal Informasi Mengenai UNHASY</option>
					<option value="Pameran/Sosialisai Sekolah">Pameran/Sosialisai Sekolah</option>
					<option value="Media Sosial (Instagram/Facebook)">Media Sosial (Instagram/Facebook)</option>
					<option value="Media Elektronik (Radio/Televisi)">Media Elektronik (Radio/Televisi)</option>
					<option value="Media Cetak (Brosur/Banner/Spanduk)">Media Cetak (Brosur/Banner/Spanduk)</option>
					<option value="Website UNHASY">Website UNHASY</option>
					<option value="Teman">Teman</option>
					<option value="Mahasiswa UNHASY">Mahasiswa UNHASY</option>
					<option value="Alumni">Alumni</option>
					<option value="Guru">Guru</option>
					<option value="Dosen / Karyawan UNHASY">Dosen / Karyawan UNHASY</option>
				</select>
                <div class="validate"></div>
              </div></div></div>
			<div class="form-group">
				<div class="form-row">
					<div class="form-group col-md-4">
						<img src="<?php echo base_url('/home/recp'); ?>">
					</div>
					<div class="form-group col-md-8">
						<input placeholder="Masukkan Kata Di Yang Muncul" type="text" name="capca" class="form-control" id="capca" data-rule="required" data-msg="Masukkan Captha" value=""/>
						<div class="validate"></div>
					</div>
				</div>
			  </div>
          </div>
        </div>
		<div class="mb-12">
                <div class="loading">Sedang di Proses</div>
                <div class="error-message">Ada Masalah</div>
                <div class="sent-message">Pendaftaran Anda Telah Di Proses. Terimakasih!</div>
        </div>
		<div class="text-center"><button type="reset">Reset</button><button type="submit">Daftar</button></div>
		</form>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php $this->load->view('public/_parsial/footer');?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php $this->load->view('public/_parsial/corejs');?>
  
  <script type="text/javascript">
	function tampilkan(){
		var kelas=document.getElementById("daftar").kelas.value;
		var jalur=document.getElementById("daftar").jalur.value;
		if (kelas=="Pagi")
		{
			if (jalur=="BKKM")
			{
				document.getElementById("pil1").innerHTML='<option value="">Pilihan Prodi Pertama</option><option value="8">S1 Teknik Elektro</option><option value="13">D3 Manajemen Informatika</option>';
				document.getElementById("pil2").innerHTML='<option value="">Pilihan Prodi Pertama</option><option value="8">S1 Teknik Elektro</option><option value="13">D3 Manajemen Informatika</option>';
			} else
			{
				document.getElementById("pil1").innerHTML='<option value="">Pilihan Prodi Pertama</option><option value="1">S1 Hukum Keluarga</option><option value="2">S1 Hukum Ekonomi Syariah</option><option value="3">S1 Komunikasi Dan Penyiaran Islam</option><option value="4">S1 Pendidikan Agama Islam</option><option value="5">S1 Pendidikan Bahasa Arab</option><option value="6">S1 Pendidikan Guru MI</option><option value="24">S1 Manajemen Pendidikan Agama Islam</option><option value="7">S1 Teknik Mesin</option><option value="8">S1 Teknik Elektro</option><option value="9">S1 Teknik Sipil</option><option value="10">S1 Teknik Industri</option><option value="11">S1 Informatika</option><option value="12">S1 Sistem Informasi</option><option value="13">D3 Manajemen Informatika</option><option value="14">S1 Manajemen</option><option value="15">S1 Akutansi</option><option value="16">S1 Ekonomi Islam</option><option value="17">S1 Pendidikan Guru SD</option><option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option><option value="19">S1 Pendidikan Bahasa Inggris</option><option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option><option value="21">S1 Pendidikan Matematika</option><option value="22">S2 Hukum Keluarga</option><option value="23">S2 Pendidikan Agama Islam</option>';
				document.getElementById("pil2").innerHTML='<option value="">Pilihan Prodi Kedua</option><option value="1">S1 Hukum Keluarga</option><option value="2">S1 Hukum Ekonomi Syariah</option><option value="3">S1 Komunikasi Dan Penyiaran Islam</option><option value="4">S1 Pendidikan Agama Islam</option><option value="5">S1 Pendidikan Bahasa Arab</option><option value="6">S1 Pendidikan Guru MI</option><option value="24">S1 Manajemen Pendidikan Agama Islam</option><option value="7">S1 Teknik Mesin</option><option value="8">S1 Teknik Elektro</option><option value="9">S1 Teknik Sipil</option><option value="10">S1 Teknik Industri</option><option value="11">S1 Informatika</option><option value="12">S1 Sistem Informasi</option><option value="13">D3 Manajemen Informatika</option><option value="14">S1 Manajemen</option><option value="15">S1 Akutansi</option><option value="16">S1 Ekonomi Islam</option><option value="17">S1 Pendidikan Guru SD</option><option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option><option value="19">S1 Pendidikan Bahasa Inggris</option><option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option><option value="21">S1 Pendidikan Matematika</option><option value="22">S2 Hukum Keluarga</option><option value="23">S2 Pendidikan Agama Islam</option>';
			}
		}
		else if (kelas=="Sore")
		{
			if (jalur=="BKKM")
			{
				document.getElementById("pil1").innerHTML='<option value="">Tidak Ada Pilihan Untuk Kelas Ini</option>';
				document.getElementById("pil2").innerHTML='<option value="">Tidak Ada Pilihan Untuk Kelas Ini</option>';
			} else
			{
				document.getElementById("pil1").innerHTML='<option value="">Pilihan Prodi Pertama</option><option value="7">S1 Teknik Mesin</option><option value="9">S1 Teknik Sipil</option><option value="10">S1 Teknik Industri</option><option value="11">S1 Informatika</option><option value="12">S1 Sistem Informasi</option><option value="13">D3 Manajemen Informatika</option><option value="14">S1 Manajemen</option><option value="15">S1 Akutansi</option><option value="16">S1 Ekonomi Islam</option><option value="17">S1 Pendidikan Guru SD</option><option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option><option value="19">S1 Pendidikan Bahasa Inggris</option><option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option><option value="21">S1 Pendidikan Matematika</option>';
				document.getElementById("pil2").innerHTML='<option value="">Pilihan Prodi Kedua</option><option value="7">S1 Teknik Mesin</option><option value="9">S1 Teknik Sipil</option><option value="10">S1 Teknik Industri</option><option value="11">S1 Informatika</option><option value="12">S1 Sistem Informasi</option><option value="13">D3 Manajemen Informatika</option><option value="14">S1 Manajemen</option><option value="15">S1 Akutansi</option><option value="16">S1 Ekonomi Islam</option><option value="17">S1 Pendidikan Guru SD</option><option value="18">S1 Pendidikan Bahasa Dan Sastra Indonesia</option><option value="19">S1 Pendidikan Bahasa Inggris</option><option value="20">S1 Pendidikan Ilmu Pengetahuan Alam</option><option value="21">S1 Pendidikan Matematika</option>';
			}
		} else
		{
			document.getElementById("pil1").innerHTML='<option value="">Tidak Ada Pilihan Untuk Kelas Ini</option>';
			document.getElementById("pil2").innerHTML='<option value="">Tidak Ada Pilihan Untuk Kelas Ini</option>';
		}
	}
  </script>
</body>

</html>