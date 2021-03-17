<body onload="cetak();">
<table border="0" cellspacing="1" cellspadding="0" width="900">
<tr><td rowspan="2" align="center"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="37"></td><td><strong><span style="font-size:18px;">PANITIA PENERIMAAN MAHASISWA BARU</span></strong></td></tr>
<tr><td><strong><span style="font-size:18px;">UNIVERSITAS HASYIM ASY'ARI TEBUIRENG JOMBANG</span></strong></td></tr>
<tr><td colspan="2"><hr></td></tr>
</table><center><strong>BUKTI PENERIMAAN BERKAS</strong></center></br>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="290"><?php echo $pendaftar['nama'];?></td><td width="300"></td><td width="30">Kelas</td><td width="5">:</td><td width="150"><?php echo $pendaftar['kelas'];?></td></tr>
<tr><td>Nomor</td><td>:</td><td><?php echo $pendaftar['nomor'];?></td><td></td><td></td><td></td><td></td></tr>
<tr><td>Prodi</td><td>:</td><td colspan="5"><?php echo getProdi($pendaftar['pil1']);?></td></tr>
</table></br>

<table border="0" cellspacing="1" cellpadding="1" width="900">
<tr><td>Berkas Umum</td><td width="5">:</td><td width="5"><?php if ($berkas['kk'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Kartu Keluarga</td><td width="5"><?php if ($berkas['ktp'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>KTP</td><td width="5"><?php if ($berkas['ijazah'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Ijazah</td><td width="5"><?php if ($berkas['skhun'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>SKHUN</td><td width="5"><?php if ($berkas['foto'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Foto</td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas Raport</td><td width="5">:</td><td width="5"><?php if ($berkas['suket_lulus'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>SKL/Lainnya</td><td width="5"><?php if ($berkas['rapot1'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 1</td><td width="5"><?php if ($berkas['rapot2'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 2</td><td width="5"><?php if ($berkas['rapot3'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 3</td><td width="5"><?php if ($berkas['rapot4'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 4</td><td width="5"><?php if ($berkas['rapot5'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 5</td><td width="5"></td><td></td></tr>
<tr><td>Prestasi Akademik/Non</td><td width="5">:</td><td width="5"><?php if ($berkas['suket_prestasi'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Surat Prestasi</td><td width="5"><?php if ($berkas['piagam'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Piagam</td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas Tahfidz</td><td width="5">:</td><td width="5"><?php if ($berkas['tahfidz'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Surat Tahfidz</td><td width="5"><?php if ($berkas['piagam_tahfidz'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Lomba Tahfidz</td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas KIP</td><td width="5">:</td><td width="5"><?php if ($berkas['bkip'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Berkas KIP</td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas BKKM</td><td width="5">:</td><td width="5"><?php if ($berkas['suket_bkkm'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Suket Tidak Mampu</td><td width="5"><?php if ($berkas['gaji'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Slip Gaji</td><td width="5"><?php if ($berkas['pbb'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>PBB</td><td width="5"><?php if ($berkas['listrik'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Listrik</td><td width="5"><?php if ($berkas['telp'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Telepon</td><td width="5"><?php if ($berkas['pdam'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>PDAM</td><td width="5"><?php if ($berkas['kip'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>KIP</td></tr>
<tr><td colspan="16"><hr></td></tr>
</table></br>
<table border="1" cellspacing="0" cellpadding="0" width="900">
<tr><td align="center">Instansi Pendidikan</td><td align="center">Nilai Rata-rata</td></tr>
<tr><td align="center"><?php echo $berkas['instansi'];?></td><td align="center" halign="middle"><span style="font-size:22;"><?php echo $pendaftar['nilai'];?></span></td></tr>
</table></br>
<table border="0" cellspacing="1" cellpadding="1" width="900">
<tr><td width="600"></td><td>Jombang, <?php echo $tanggalindo;?></td></tr>
<tr><td height="70"></td><td></td></tr>
<tr><td></td><td><?php echo $user['nama_user'];?></td></tr>
</table></br>
<i>* Untuk Mahasiswa</i>
</br>
<table border="0" cellspacing="1" cellspadding="0" width="900">
<tr><td><hr></td></tr>
</table>
</br></br>
<table border="0" cellspacing="1" cellspadding="0" width="900">
<tr><td rowspan="2" align="center"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="37"></td><td><strong><span style="font-size:18px;">PANITIA PENERIMAAN MAHASISWA BARU</span></strong></td></tr>
<tr><td><strong><span style="font-size:18px;">UNIVERSITAS HASYIM ASY'ARI TEBUIRENG JOMBANG</span></strong></td></tr>
<tr><td colspan="2"><hr></td></tr>
</table><center><strong>BUKTI PENERIMAAN BERKAS</strong></center></br>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="290"><?php echo $pendaftar['nama'];?></td><td width="300"></td><td width="30">Kelas</td><td width="5">:</td><td width="150"><?php echo $pendaftar['kelas'];?></td></tr>
<tr><td>Nomor</td><td>:</td><td><?php echo $pendaftar['nomor'];?></td><td></td><td></td><td></td><td></td></tr>
<tr><td>Prodi</td><td>:</td><td colspan="5"><?php echo getProdi($pendaftar['pil1']);?></td></tr>
</table></br>

<table border="0" cellspacing="1" cellpadding="1" width="900">
<tr><td>Berkas Umum</td><td width="5">:</td><td width="5"><?php if ($berkas['kk'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Kartu Keluarga</td><td width="5"><?php if ($berkas['ktp'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>KTP</td><td width="5"><?php if ($berkas['ijazah'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Ijazah</td><td width="5"><?php if ($berkas['skhun'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>SKHUN</td><td width="5"><?php if ($berkas['foto'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Foto</td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas Raport</td><td width="5">:</td><td width="5"><?php if ($berkas['suket_lulus'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>SKL/Lainnya</td><td width="5"><?php if ($berkas['rapot1'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 1</td><td width="5"><?php if ($berkas['rapot2'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 2</td><td width="5"><?php if ($berkas['rapot3'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 3</td><td width="5"><?php if ($berkas['rapot4'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 4</td><td width="5"><?php if ($berkas['rapot5'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Raport 5</td><td width="5"></td><td></td></tr>
<tr><td>Prestasi Akademik/Non</td><td width="5">:</td><td width="5"><?php if ($berkas['suket_prestasi'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Surat Prestasi</td><td width="5"><?php if ($berkas['piagam'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Piagam</td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas Tahfidz</td><td width="5">:</td><td width="5"><?php if ($berkas['tahfidz'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Surat Tahfidz</td><td width="5"><?php if ($berkas['piagam_tahfidz'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Lomba Tahfidz</td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas KIP</td><td width="5">:</td><td width="5"><?php if ($berkas['bkip'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Berkas KIP</td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td><td width="5"></td><td></td></tr>
<tr><td>Berkas BKKM</td><td width="5">:</td><td width="5"><?php if ($berkas['suket_bkkm'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Suket Tidak Mampu</td><td width="5"><?php if ($berkas['gaji'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Slip Gaji</td><td width="5"><?php if ($berkas['pbb'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>PBB</td><td width="5"><?php if ($berkas['listrik'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Listrik</td><td width="5"><?php if ($berkas['telp'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>Telepon</td><td width="5"><?php if ($berkas['pdam'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>PDAM</td><td width="5"><?php if ($berkas['kip'] == 1) { echo '&#10004;';} else { echo '&#10060;';} ?></td><td>KIP</td></tr>
<tr><td colspan="16"><hr></td></tr>
</table></br>
<table border="1" cellspacing="0" cellpadding="0" width="900">
<tr><td align="center">Instansi Pendidikan</td><td align="center">Nilai Rata-rata</td></tr>
<tr><td align="center"><?php echo $berkas['instansi'];?></td><td align="center" halign="middle"><span style="font-size:22;"><?php echo $pendaftar['nilai'];?></span></td></tr>
</table></br>
<table border="0" cellspacing="1" cellpadding="1" width="900">
<tr><td width="600"></td><td>Jombang, <?php echo $tanggalindo;?></td></tr>
<tr><td height="70"></td><td></td></tr>
<tr><td></td><td><?php echo $user['nama_user'];?></td></tr>
</table></br>
<i>* Untuk Panitia</i>
</body>
<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>