<?php
if ( ! function_exists('getAsalSekolah'))
{
	function getAsalSekolah($id)
    {
        if ($id == "SMA"){
        	$result = "Sekolah Menengah Atas (SMA)";
        } elseif ($id == "MA"){
        	$result = "Madrasah Aliyah (MA)";
        } elseif ($id == "SMK"){
        	$result = "Sekolah Menengah Kejuruan (SMK)";
        } elseif ($id == "Pondok"){
            $result = "Pondok Pesantren";
        } elseif ($id == "D1"){
            $result = "Diploma 1";
        } elseif ($id == "D2"){
            $result = "Diploma 2";
        } elseif ($id == "D3"){
            $result = "Diploma 3";
        } elseif ($id == "S1"){
            $result = "Sarjana (S1)";
        } else {
            $result = "-- Pilih Asal Pendidikan --";
        }
        return $result;
    }
}

if ( ! function_exists('getPendidikanOrtu'))
{
    function getPendidikanOrtu($id)
    {
        if ($id == "Putus"){
            $result = "Putuh Sekolah";
        } elseif ($id == "SD"){
            $result = "SD/MI/Sederajat";
        } elseif ($id == "SLTP"){
            $result = "SMP/MTs/Sederajat";
        } elseif ($id == "SLTA"){
            $result = "SMA/MA/SMK/Sederajat";
        } elseif ($id == "Diploma"){
            $result = "Diploma 1/2/3";
        } elseif ($id == "S1"){
            $result = "Sarjana";
        } elseif ($id == "S2"){
            $result = "Magister";
        } elseif ($id == "Lain"){
            $result = "Lainnya";
        } else {
            $result = "-- Pilih Pendidikan --";
        }
        return $result;
    }
}

if ( ! function_exists('getPekerjaan'))
{
    function getPekerjaan($id)
    {
        if ($id == "Tidak"){
            $result = "Tidak Bekerja";
        } elseif ($id == "Buruh"){
            $result = "Buruh";
        } elseif ($id == "PNS"){
            $result = "PNS/TNI/Polri";
        } elseif ($id == "Guru"){
            $result = "Guru";
        } elseif ($id == "Nelayan"){
            $result = "Nelayan";
        } elseif ($id == "Pedagang Kecil"){
            $result = "Pedagang Kecil";
        } elseif ($id == "Pedagang Besar"){
            $result = "Pedagang Besar";
        } elseif ($id == "Karyawan Swasta"){
            $result = "Karyawan Swasta";
        } elseif ($id == "Karyawan BUMN"){
            $result = "Karyawan BUMN/BUMD";
        } elseif ($id == "Petani"){
            $result = "Petani";
        } elseif ($id == "Buruh Tani"){
            $result = "Buruh Tani";
        } elseif ($id == "Wiraswasta"){
            $result = "Wiraswasta";
        } elseif ($id == "Wirausaha"){
            $result = "Wirausaha";
        } elseif ($id == "Almarhum"){
            $result = "Sudah Meninggal";
        } elseif ($id == "Lain"){
            $result = "Lainnya";
        } else {
            $result = "-- Pilih Pekerjaan --";
        }
        return $result;
    }
}

if ( ! function_exists('getPenghasilan'))
{
    function getPenghasilan($id)
    {
        if ($id == "0"){
            $result = "Tidak Ada Penghasilan";
        } elseif ($id == "500"){
            $result = "Kurang Dari Rp. 500.000";
        } elseif ($id == "1000"){
            $result = "Kurang Dari Rp. 1.000.000";
        } elseif ($id == "2000"){
            $result = "Rp. 1.000.000 - 2.000.000";
        } elseif ($id == "5000"){
            $result = "Rp. 2.000.000 - 5.000.000";
        } elseif ($id == "5000"){
            $result = "Lebih Dari 5.000.000";
        } elseif ($id == "Lain"){
            $result = "Lainnya";
        } else {
            $result = "-- Pilih Penghasilan --";
        }
        return $result;
    }
}

if ( ! function_exists('getProdi'))
{
    function getProdi($kode)
    {
        if($kode == 1) {
			$result = "S1 Hukum Keluarga";
		} elseif ($kode == 2) {
			$result = "S1 Hukum Ekonomi Syariah";
		} elseif ($kode == 3) {
			$result = "S1 Komunikasi Dan Penyiaran Islam";
		} elseif ($kode == 4) {
			$result = "S1 Pendidikan Agama Islam";
		} elseif ($kode == 5) {
			$result = "S1 Pendidikan Bahasa Arab";
		} elseif ($kode == 6) {
			$result = "S1 Pendidikan Guru Madrasah Ibtidaiyah";
		} elseif ($kode == 7) {
			$result = "S1 Teknik Mesin";
		} elseif ($kode == 8) {
			$result = "S1 Teknik Elektro";
		} elseif ($kode == 9) {
			$result = "S1 Teknik Sipil";
		} elseif ($kode == 10) {
			$result = "S1 Teknik Industri";
		} elseif ($kode == 11) {
			$result = "S1 Teknik Informatika";
		} elseif ($kode == 12) {
			$result = "S1 Sistem Informasi";
		} elseif ($kode == 13) {
			$result = "D3 Manajemen Informatika";
		} elseif ($kode == 14) {
			$result = "S1 Manajemen";
		} elseif ($kode == 15) {
			$result = "S1 Akutansi";
		} elseif ($kode == 16) {
			$result = "S1 Ekonomi Islam";
		} elseif ($kode == 17) {
			$result = "S1 Pendidikan Guru Sekolah Dasar";
		} elseif ($kode == 18) {
			$result = "S1 Pendidikan Bahasa Dan Sastra Indonesia";
		} elseif ($kode == 19) {
			$result = "S1 Pendidikan Bahasa Inggris";
		} elseif ($kode == 20) {
			$result = "S1 Pendidikan Ilmu Pengetahuan Alam";
		} elseif ($kode == 21) {
			$result = "S1 Pendidikan Matematika";
		} elseif ($kode == 22) {
			$result = "S2 Hukum Keluarga";
		} elseif ($kode == 23) {
			$result = "S2 Pendidikan Agama Islam";
		} elseif ($kode == 24) {
			$result = "S1 Manajemen Pendidikan Islam";
		} else {
            $result = "";
        }
		return $result;
    }
}

if ( ! function_exists('getKodeFakultas'))
{
    function getKodeFakultas($kode)
    {
        if($kode == 1 OR $kode == 2) {
            $result = "91";
        } elseif ($kode == 3) {
            $result = "92";
        } elseif ($kode == 4 OR $kode == 5 OR $kode == 6 OR $kode == 24) {
            $result = "93";
        } elseif ($kode == 7 OR $kode == 8 OR $kode == 9 OR $kode == 10) {
            $result = "94";
        } elseif ($kode == 11 OR $kode == 12 OR $kode == 13) {
            $result = "95";
        } elseif ($kode == 14 OR $kode == 15 OR $kode == 16) {
            $result = "96";
        } elseif ($kode == 17 OR $kode == 18 OR $kode == 19 OR $kode == 20 OR $kode == 21) {
            $result = "97";
        } elseif ($kode == 22 OR $kode == 23) {
            $result = "98";
        } else {
            $result = "00";
        }
        return $result;
    }
}

if ( ! function_exists('getFakultas'))
{
    function getFakultas($kode)
    {
        if($kode == 1 OR $kode == 2) {
            $result = "Fakultas Agama Islam";
        } elseif ($kode == 3) {
            $result = "Fakultas Agama Islam";
        } elseif ($kode == 4 OR $kode == 5 OR $kode == 6 OR $kode == 24) {
            $result = "Fakultas Agama Islam";
        } elseif ($kode == 7 OR $kode == 8 OR $kode == 9 OR $kode == 10) {
            $result = "Fakultas Teknik";
        } elseif ($kode == 11 OR $kode == 12 OR $kode == 13) {
            $result = "Fakultas Teknologi Informasi";
        } elseif ($kode == 14 OR $kode == 15 OR $kode == 16) {
            $result = "Fakultas Ekonomi";
        } elseif ($kode == 17 OR $kode == 18 OR $kode == 19 OR $kode == 20 OR $kode == 21) {
            $result = "Fakultas Ilmu Pendidikan";
        } elseif ($kode == 22 OR $kode == 23) {
            $result = "Pasca Sarjana";
        } else {
            $result = "Nothing";
        }
        return $result;
    }
}

if ( ! function_exists('getSingkatanProdi'))
{
    function getSingkatanProdi($kode)
    {
       if($kode == 1) {
            $result = "HK";
        } elseif ($kode == 2) {
            $result = "HES";
        } elseif ($kode == 3) {
            $result = "KPI";
        } elseif ($kode == 4) {
            $result = "PAI";
        } elseif ($kode == 5) {
            $result = "PBA";
        } elseif ($kode == 6) {
            $result = "PGMI";
        } elseif ($kode == 7) {
            $result = "TM";
        } elseif ($kode == 8) {
            $result = "TE";
        } elseif ($kode == 9) {
            $result = "TS";
        } elseif ($kode == 10) {
            $result = "TD";
        } elseif ($kode == 11) {
            $result = "TI";
        } elseif ($kode == 12) {
            $result = "SI";
        } elseif ($kode == 13) {
            $result = "D3 MI";
        } elseif ($kode == 14) {
            $result = "Man";
        } elseif ($kode == 15) {
            $result = "Akun";
        } elseif ($kode == 16) {
            $result = "EI";
        } elseif ($kode == 17) {
            $result = "PGSD";
        } elseif ($kode == 18) {
            $result = "PBSI";
        } elseif ($kode == 19) {
            $result = "PBI";
        } elseif ($kode == 20) {
            $result = "PIPA";
        } elseif ($kode == 21) {
            $result = "PM";
        } elseif ($kode == 22) {
            $result = "S2 HK";
        } elseif ($kode == 23) {
            $result = "S2 PAI";
        } elseif ($kode == 24) {
            $result = "MPI";
        } else {
            $result = "Belum Ada";
        }
        return $result;
    }
}

if ( ! function_exists('getStatusPendaftaran'))
{
    function getStatusPendaftaran($kode)
    {
       if($kode == 0) {
            $result = '<button type="button" class="btn btn-block btn-danger">Blm</button>';
        } elseif ($kode == 1) {
            $result = '<button type="button" class="btn btn-block btn-primary">Off</button>';
        } elseif ($kode == 2) {
            $result = '<button type="button" class="btn btn-block btn-success">On</button>';
        } else {
            $result = "";
        }
        return $result;
    }
}

if ( ! function_exists('getStatusPerubahan'))
{
    function getStatusPerubahan($kode)
    {
       if($kode == 0) {
            $result = '<button type="button" class="btn btn-block btn-info">Belum Verifikasi</button>';
        } elseif ($kode == 1) {
            $result = '<button type="button" class="btn btn-block btn-primary">Disetujui</button>';
        } elseif ($kode == 2) {
            $result = '<button type="button" class="btn btn-block btn-success">Ditolak</button>';
        } else {
            $result = "";
        }
        return $result;
    }
}

if ( ! function_exists('getStatusBerkas'))
{
    function getStatusBerkas($kode,$id)
    {
       if($kode == 0 OR $kode == "" OR $kode == "NULL") {
            $result = '<a href="'.base_url('webmin/admin/berkas/').url_encode($id).'" type="button" class="btn btn-block btn-danger">Blm</a>';
        } elseif ($kode == 1) {
            $result = '<a href="'.base_url('webmin/admin/berkas/').url_encode($id).'" class="btn btn-block btn-primary">Tidak Ada</a>';
        } elseif ($kode == 2) {
            $result = '<a href="'.base_url('webmin/admin/berkas/').url_encode($id).'" class="btn btn-block btn-info">Kurang</a>';
        } elseif ($kode == 3) {
            $result = '<a href="'.base_url('webmin/admin/berkas/').url_encode($id).'" class="btn btn-block btn-success">Verifikasi</a>';
        } else {
            $result = '<a href="'.base_url('webmin/admin/berkas/').url_encode($id).'" class="btn btn-block btn-danger">Blm</a>';
        }
        return $result;
    }
}

if ( ! function_exists('getStatusBerkasPublic'))
{
    function getStatusBerkasPublic($kode)
    {
       if($kode == 0 OR $kode == "" OR $kode == "NULL") {
            $result = 'Belum Ada';
        } elseif ($kode == 1) {
            $result = 'Tidak Ada';
        } elseif ($kode == 2) {
            $result = '<a href="'.base_url('dlogin/cekberkas/').'">Kurang</a>';
        } elseif ($kode == 3) {
            $result = 'Verifikasi';
        } else {
            $result = 'Belum Ada';
        }
        return $result;
    }
}

if ( ! function_exists('getStatusBerkasAdmin'))
{
    function getStatusBerkasAdmin($kode)
    {
       if($kode == 0 OR $kode == "" OR $kode == "NULL") {
            $result = 'Belum Di Tentukan';
        } elseif ($kode == 1) {
            $result = 'Tidak Ada';
        } elseif ($kode == 2) {
            $result = 'Kurang Lengkap';
        } elseif ($kode == 3) {
            $result = 'Verifikasi/Lengkap';
        } else {
            $result = 'Belum Di Tentukan';
        }
        return $result;
    }
}

if ( ! function_exists('getStatusLulus'))
{
    function getStatusLulus($kode)
    {
       if($kode == 0 OR $kode == "" OR $kode == "NULL") {
            $result = 'Belum Ada';
        } elseif ($kode == 1) {
            $result = 'Lulus Seleksi';
        } elseif ($kode == 2) {
            $result = 'Tidak Lulus Seleksi';
        } else {
            $result = 'Belum Ada';
        }
        return $result;
    }
}

if ( ! function_exists('getStatusDaftarUlang'))
{
    function getStatusDaftarUlang($kode)
    {
       if($kode == 0) {
            $result = '<span class="text-info">Belum Terverifikasi </span><small class="fas fa-times"></small>';
        } elseif ($kode == 1) {
            $result = '<span class="text-info">Verifikasi Pembayaran </span><small class="fas fa-check"></small>';
        } elseif ($kode == 2) {
            $result = '<span class="text-success">Pembayaran Di Terima </span><small class="fas fa-check"></small>';
        } elseif ($kode == 3) {
            $result = '<span class="text-success">Proses Verifikasi </span><small class="fas fa-check"></small>';
        } elseif ($kode == 4) {
            $result = '<span class="text-success">Verifikasi </span><small class="fas fa-check"></small>';
        } else {
            $result = '<span class="text-danger">Belum Terverifikasi </span><small class="fas fa-times"></small>';
        }
        return $result;
    }
}

if ( ! function_exists('getStatusDaftarUlangPublic'))
{
    function getStatusDaftarUlangPublic($kode)
    {
       if($kode == 0) {
            $result = 'Belum Terverifikasi';
        } elseif ($kode == 1) {
            $result = 'Verifikasi Pembayaran';
        } elseif ($kode == 2) {
            $result = 'Pembayaran Di Terima';
        } elseif ($kode == 3) {
            $result = 'Proses Verifikasi';
        } elseif ($kode == 4) {
            $result = 'Verifikasi';
        } else {
            $result = 'Belum Terverifikasi';
        }
        return $result;
    }
}
?>