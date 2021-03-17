-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 07:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb-backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_pendaftaran`
--

CREATE TABLE `his_pendaftaran` (
  `id_his_pendaftaran` int(11) NOT NULL,
  `nomor` int(10) NOT NULL,
  `perubahan` varchar(64) NOT NULL,
  `data_asli` varchar(255) NOT NULL,
  `data_ubah` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `his_ubah_prodi`
--

CREATE TABLE `his_ubah_prodi` (
  `id_ubah_prodi` int(11) NOT NULL,
  `nomor` int(10) NOT NULL,
  `surat_asal` varchar(128) NOT NULL,
  `surat_terima` varchar(128) NOT NULL,
  `prodi_asal` int(2) NOT NULL,
  `prodi_terima` int(2) NOT NULL,
  `waktu_ubah` datetime NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_rekening`
--

CREATE TABLE `ref_rekening` (
  `id_ref_rek` int(11) NOT NULL,
  `prodi` int(11) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `rekening` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_rekening`
--

INSERT INTO `ref_rekening` (`id_ref_rek`, `prodi`, `bank`, `rekening`) VALUES
(1, 1, 'Bank Syariah Mandiri', '7108073262'),
(2, 2, 'Bank Syariah Mandiri', '7108073262'),
(3, 3, 'Bank Syariah Mandiri', '7108073262'),
(4, 4, 'Bank Syariah Mandiri', '7108073262'),
(5, 5, 'Bank Syariah Mandiri', '7108073262'),
(6, 6, 'Bank Syariah Mandiri', '7108073262'),
(7, 7, 'Bank Mandiri', '142-00-884455-55'),
(8, 8, 'Bank Mandiri', '142-00-884455-55'),
(9, 9, 'Bank Mandiri', '142-00-884455-55'),
(10, 10, 'Bank Mandiri', '142-00-884455-55'),
(11, 11, 'Bank BRI', '0023-01-001985-30-4'),
(12, 12, 'Bank BRI', '0023-01-001985-30-4'),
(13, 13, 'Bank BRI', '0023-01-001985-30-4'),
(14, 14, 'Bank Mandiri', '142-00-884455-55'),
(15, 15, 'Bank Mandiri', '142-00-884455-55'),
(16, 16, 'Bank Mandiri', '142-00-884455-55'),
(17, 17, 'Bank BRI', '0023-01-001985-30-4'),
(18, 18, 'Bank BRI', '0023-01-001985-30-4'),
(19, 19, 'Bank BRI', '0023-01-001985-30-4'),
(20, 20, 'Bank BRI', '0023-01-001985-30-4'),
(21, 21, 'Bank BRI', '0023-01-001985-30-4'),
(22, 22, 'Bank Mandiri', '142-00-884455-55'),
(23, 23, 'Bank Mandiri', '142-00-884455-55'),
(24, 24, 'Bank Syariah Mandiri', '7108073262');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `skhun` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `surat_rapot` varchar(255) DEFAULT NULL,
  `ratasurat` float DEFAULT NULL,
  `rapot1` varchar(255) DEFAULT NULL,
  `rata1` float DEFAULT NULL,
  `rapot2` varchar(255) DEFAULT NULL,
  `rata2` float DEFAULT NULL,
  `rapot3` varchar(255) DEFAULT NULL,
  `rata3` float DEFAULT NULL,
  `rapot4` varchar(255) DEFAULT NULL,
  `rata4` float DEFAULT NULL,
  `rapot5` varchar(255) DEFAULT NULL,
  `rata5` float DEFAULT NULL,
  `rata` float DEFAULT NULL,
  `surat_prestasi` varchar(255) DEFAULT NULL,
  `piagam` varchar(255) DEFAULT NULL,
  `tahfidz` varchar(255) DEFAULT NULL,
  `piagamtahfidz` varchar(255) DEFAULT NULL,
  `surat_bkkm` varchar(255) DEFAULT NULL,
  `gaji` varchar(255) DEFAULT NULL,
  `pbb` varchar(255) DEFAULT NULL,
  `listrik` varchar(255) DEFAULT NULL,
  `s_telp` varchar(255) DEFAULT NULL,
  `pdam` varchar(255) DEFAULT NULL,
  `kip` varchar(255) DEFAULT NULL,
  `formulirs2` varchar(255) DEFAULT NULL,
  `bkip` varchar(255) NOT NULL,
  `status_berkas` int(1) DEFAULT NULL,
  `waktu_berkas` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya`
--

CREATE TABLE `tb_biaya` (
  `id_biaya` int(11) NOT NULL,
  `tanggal_biaya` datetime NOT NULL,
  `bank` varchar(128) NOT NULL,
  `her` int(11) NOT NULL,
  `spp` int(11) NOT NULL,
  `ujian` int(11) NOT NULL,
  `dpp` int(11) NOT NULL,
  `posmaru` int(11) NOT NULL,
  `kopertais` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `keterangan_biaya` varchar(128) NOT NULL,
  `has_key` varchar(64) NOT NULL,
  `qrcode` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti_pembayaran`
--

CREATE TABLE `tb_bukti_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `jenis_bukti` char(15) NOT NULL,
  `bukti_daftar` varchar(255) NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `status_bukti` int(1) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detil_survey`
--

CREATE TABLE `tb_detil_survey` (
  `id_ds` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekwitansi`
--

CREATE TABLE `tb_ekwitansi` (
  `id_kwitansi` char(64) NOT NULL DEFAULT '',
  `nomor` int(12) DEFAULT NULL,
  `id_user` int(12) DEFAULT NULL,
  `waktu_acc` datetime DEFAULT NULL,
  `qrcode` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gelombang`
--

CREATE TABLE `tb_gelombang` (
  `gelombang` int(1) NOT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `biaya2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` varchar(50) NOT NULL,
  `isi_informasi` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_info_lulus`
--

CREATE TABLE `tb_info_lulus` (
  `id_info` int(11) NOT NULL,
  `tahap` int(11) DEFAULT NULL,
  `judul_info` varchar(128) DEFAULT NULL,
  `isi_info` text DEFAULT NULL,
  `file_scan` varchar(128) DEFAULT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lupa_pass`
--

CREATE TABLE `tb_lupa_pass` (
  `id_lupa` int(11) NOT NULL,
  `link` varchar(64) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomor` int(10) DEFAULT NULL,
  `exp` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mail`
--

CREATE TABLE `tb_mail` (
  `id_mail` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `status_kirim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemberkasan`
--

CREATE TABLE `tb_pemberkasan` (
  `id_pmbk` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `kk` int(1) NOT NULL,
  `ktp` int(1) NOT NULL,
  `ijazah` int(1) NOT NULL,
  `skhun` int(1) NOT NULL,
  `foto` int(1) NOT NULL,
  `formulir` int(1) NOT NULL,
  `suket_lulus` int(1) NOT NULL,
  `rapot1` int(1) NOT NULL,
  `rapot2` int(1) NOT NULL,
  `rapot3` int(1) NOT NULL,
  `rapot4` int(1) NOT NULL,
  `rapot5` int(1) NOT NULL,
  `suket_prestasi` int(1) NOT NULL,
  `piagam` int(1) NOT NULL,
  `tahfidz` int(1) NOT NULL,
  `piagam_tahfidz` int(1) NOT NULL,
  `suket_bkkm` int(1) NOT NULL,
  `gaji` int(1) NOT NULL,
  `pbb` int(1) NOT NULL,
  `listrik` int(1) NOT NULL,
  `telp` int(1) NOT NULL,
  `pdam` int(1) NOT NULL,
  `kip` int(1) NOT NULL,
  `bkip` varchar(255) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `num` int(10) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `nomor` int(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `gender` char(20) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `rt` int(3) DEFAULT NULL,
  `rw` int(3) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `kab` varchar(50) DEFAULT NULL,
  `prov` varchar(50) DEFAULT NULL,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `alamat_sekolah` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `status_sekolah` varchar(20) DEFAULT NULL,
  `telp_instansi` char(16) DEFAULT NULL,
  `nisn` char(15) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `nama_ayah` varchar(150) DEFAULT NULL,
  `nik_ayah` char(16) DEFAULT NULL,
  `tgl_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(150) DEFAULT NULL,
  `pekerjaan_ayah` varchar(150) DEFAULT NULL,
  `penghasilan_ayah` varchar(150) DEFAULT NULL,
  `nama_ibu` varchar(150) DEFAULT NULL,
  `nik_ibu` char(16) DEFAULT NULL,
  `tgl_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(150) DEFAULT NULL,
  `pekerjaan_ibu` varchar(150) DEFAULT NULL,
  `penghasilan_ibu` varchar(150) DEFAULT NULL,
  `telp_ortu` varchar(150) DEFAULT NULL,
  `alamat_ortu` varchar(150) DEFAULT NULL,
  `rt_ortu` int(3) DEFAULT NULL,
  `rw_ortu` int(3) DEFAULT NULL,
  `desa_ortu` varchar(150) DEFAULT NULL,
  `kec_ortu` varchar(150) DEFAULT NULL,
  `kab_ortu` varchar(150) DEFAULT NULL,
  `prov_ortu` varchar(150) DEFAULT NULL,
  `jalur` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `pil1` int(11) DEFAULT NULL,
  `pil2` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `tanggal_verifikasi` date DEFAULT NULL,
  `asal_informasi` varchar(128) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `gelombang` int(1) DEFAULT NULL,
  `gelombang_asli` int(1) NOT NULL,
  `biaya` bigint(20) DEFAULT NULL,
  `keterangan_pendaftaran` varchar(100) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `status_berkas` int(1) DEFAULT NULL,
  `lulus_seleksi` int(1) DEFAULT NULL,
  `prodi` int(2) DEFAULT NULL,
  `nim_pdti` int(10) DEFAULT NULL,
  `nim` int(10) NOT NULL,
  `daftar_ulang` int(1) DEFAULT NULL,
  `info` varchar(128) DEFAULT NULL,
  `point` float DEFAULT NULL,
  `tahap` int(11) DEFAULT NULL,
  `tanggal_verifikasi_du` datetime NOT NULL,
  `waktu_verifikasi_berkas` datetime NOT NULL,
  `ukuran_jas` char(4) NOT NULL,
  `is_survey` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Triggers `tb_pendaftaran`
--
DELIMITER $$
CREATE TRIGGER `after_pendaftaran_update` AFTER UPDATE ON `tb_pendaftaran` FOR EACH ROW BEGIN
    IF OLD.jalur <> new.jalur THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Jalur', old.jalur, new.jalur);
    END IF;
	IF OLD.kelas <> new.kelas THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Kelas', old.kelas, new.kelas);
    END IF;
	IF OLD.pil1 <> new.pil1 THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Pilihan 1', old.pil1, new.pil1);
    END IF;
	IF OLD.pil2 <> new.pil2 THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Pilihan 2', old.pil2, new.pil2);
    END IF;
	IF OLD.status_berkas <> new.status_berkas THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Status Berkas', old.status_berkas, new.status_berkas);
    END IF;
	IF OLD.prodi <> new.prodi THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Prodi', old.prodi, new.prodi);
    END IF;
	IF OLD.daftar_ulang <> new.daftar_ulang THEN
        INSERT INTO his_pendaftaran(nomor, perubahan, data_asli, data_ubah)
        VALUES(old.nomor, 'Daftar Ulang', old.daftar_ulang, new.daftar_ulang);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(50) DEFAULT NULL,
  `isi_pengumuman` text DEFAULT NULL,
  `waktu_pengumuman` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perubahan`
--

CREATE TABLE `tb_perubahan` (
  `id_perubahan` int(11) NOT NULL,
  `nomor` int(11) DEFAULT 0,
  `jalur_r` varchar(50) DEFAULT NULL,
  `kelas_r` varchar(10) DEFAULT NULL,
  `pil1_r` int(11) DEFAULT NULL,
  `pil2_r` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_perubahan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nomor` int(11) DEFAULT NULL,
  `waktu_pesan` datetime DEFAULT NULL,
  `judul_pesan` varchar(50) DEFAULT NULL,
  `isi_pesan` text DEFAULT NULL,
  `status_pesan` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_survey`
--

CREATE TABLE `tb_survey` (
  `id_survey` int(11) NOT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `jawaban` char(1) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_survey_pertanyaan`
--

CREATE TABLE `tb_survey_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_survey_pertanyaan`
--

INSERT INTO `tb_survey_pertanyaan` (`id_pertanyaan`, `pertanyaan`, `created_time`) VALUES
(1, 'Bagaimana Tingkat Pelayanan Pendaftaran Calon Mahasiswa Baru Universitas Hasyim Aysari?', '2020-07-26 15:23:09'),
(2, 'Bagaimana Dalam Menggunakan WEB Pendaftaran Ini?', '2020-07-26 15:23:20'),
(3, 'Pernahkah Melakukan kontak person ke nomor HP/email/media sosial untuk mencari info pendaftaran dan bagaimana dalam memberikan info tersebut?', '2020-07-26 15:24:27'),
(4, 'Bila Ada Permsalahan Apakah Petugas Sudah Memberikan Jawaban Dengan Baik?', '2020-07-26 15:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `level` char(10) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `level`, `username`, `password`, `foto`) VALUES
(1, 'Administrator', 'admin', 'meone', '1d30d41eb915b89fc93e6061acee84f2', 'default.jpg'),
(2, 'Tim Sekretariat', 'petugas', 'timsekret', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(3, 'Adi Cahyono, S.Kom', 'petugas', 'adi', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(4, 'Evi Silviana, M.E', 'petugas', 'evi', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(5, 'Fitri Maisyaroh, S.Sy', 'keuangan', 'fitri', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(6, 'Iffatul Mutia Romli, S.E', 'petugas', 'mutia', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(7, 'Aisyatus Sa\'diyah, S.Kom', 'petugas', 'aisyah', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(8, 'Moh. Jihad, S.PdI', 'petugas', 'jihad', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(9, 'Aimmatul Khoiroh, S.IIP', 'petugas', 'aim', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(10, 'Muhammad Fatkhur Rizal, S.Kom', 'petugas', 'rizal', '625870cd5ae506688968df16afc191ea', 'default.jpg'),
(11, 'Siti Fatimah, S.Kom', 'petugas', 'fatim', '9957adb762f4d0a92b45d0f8eb835fd6', 'default.jpg'),
(12, 'Parsun, S.Kom', 'petugas', 'parsun', '40dfc8a12d32d3cc43f1dd825546a87e', 'default.jpg'),
(13, 'Yuyun Fitrotul Fauziyah, S.Pd', 'petugas', 'yuyun', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(14, 'Arif Khamdana, S.Kom', 'petugas', 'juki', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg'),
(15, 'M. Khoirur Rozikin, S.Kom', 'petugas', 'irul', 'be3395c0f385c0995252b4308c1f4e87', 'default.jpg'),
(16, 'Humaidi, S.E', 'keuangan', 'humaidi', 'e10adc3949ba59abbe56e057f20f883e', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_pendaftaran`
--
ALTER TABLE `his_pendaftaran`
  ADD PRIMARY KEY (`id_his_pendaftaran`);

--
-- Indexes for table `his_ubah_prodi`
--
ALTER TABLE `his_ubah_prodi`
  ADD PRIMARY KEY (`id_ubah_prodi`);

--
-- Indexes for table `ref_rekening`
--
ALTER TABLE `ref_rekening`
  ADD PRIMARY KEY (`id_ref_rek`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tb_bukti_pembayaran`
--
ALTER TABLE `tb_bukti_pembayaran`
  ADD PRIMARY KEY (`id_bayar`) USING BTREE;

--
-- Indexes for table `tb_detil_survey`
--
ALTER TABLE `tb_detil_survey`
  ADD PRIMARY KEY (`id_ds`);

--
-- Indexes for table `tb_ekwitansi`
--
ALTER TABLE `tb_ekwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  ADD PRIMARY KEY (`gelombang`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `tb_info_lulus`
--
ALTER TABLE `tb_info_lulus`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_lupa_pass`
--
ALTER TABLE `tb_lupa_pass`
  ADD PRIMARY KEY (`id_lupa`);

--
-- Indexes for table `tb_mail`
--
ALTER TABLE `tb_mail`
  ADD PRIMARY KEY (`id_mail`);

--
-- Indexes for table `tb_pemberkasan`
--
ALTER TABLE `tb_pemberkasan`
  ADD PRIMARY KEY (`id_pmbk`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`nomor`) USING BTREE;

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tb_perubahan`
--
ALTER TABLE `tb_perubahan`
  ADD PRIMARY KEY (`id_perubahan`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_survey`
--
ALTER TABLE `tb_survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `tb_survey_pertanyaan`
--
ALTER TABLE `tb_survey_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_pendaftaran`
--
ALTER TABLE `his_pendaftaran`
  MODIFY `id_his_pendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_ubah_prodi`
--
ALTER TABLE `his_ubah_prodi`
  MODIFY `id_ubah_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_rekening`
--
ALTER TABLE `ref_rekening`
  MODIFY `id_ref_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bukti_pembayaran`
--
ALTER TABLE `tb_bukti_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detil_survey`
--
ALTER TABLE `tb_detil_survey`
  MODIFY `id_ds` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_info_lulus`
--
ALTER TABLE `tb_info_lulus`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lupa_pass`
--
ALTER TABLE `tb_lupa_pass`
  MODIFY `id_lupa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mail`
--
ALTER TABLE `tb_mail`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemberkasan`
--
ALTER TABLE `tb_pemberkasan`
  MODIFY `id_pmbk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_perubahan`
--
ALTER TABLE `tb_perubahan`
  MODIFY `id_perubahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_survey`
--
ALTER TABLE `tb_survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_survey_pertanyaan`
--
ALTER TABLE `tb_survey_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
