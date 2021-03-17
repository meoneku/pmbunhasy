<body onload="cetak();">
<style>
.doubleUnderline {
    text-decoration:underline;
    border-bottom: 2px solid #000;
	padding-bottom: 1px;
}

</style>
<center>
<table border="0" width="900px">
<tr><td align="center" rowspan="2" width="100"><img src="<?php echo base_url('file/Unhasy-RBW.png'); ?>" width="80px" height="80px"></td>
<td align="left"><strong style="font-size:28px; font-family:Arial;">UNIVERSITAS HASYIM ASY'ARI</br>TEBUIRENG JOMBANG</strong></td></tr>
<tr></td><td><font class="doubleUnderline" style="font-size:12px; font-family:Arial;">Jl. Irian Jaya  Nomor 55 Tebuireng Tromol Pos IX Jombang &nbsp;Jawa Timur Telepon (0321) 861719&nbsp; (Hunting),&nbsp; 864206, 851396, 874685  Fax. 874684</font></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td align="center" colspan="2"><strong style="font-size:18px; font-family:Arial;"><center><strong><u>BERKAS PENDAFTARAN MAHASISWA BARU</u></center></strong></strong></td></tr>
</table></br></br>
<table border="0" width="900px" frame="box">
<tr><td width="200px">&nbsp;&nbsp;Nomor Pendaftaran</td><td width="10px">:</td><td><?php echo $berkas['nomor'];?></td></tr>
<tr><td>&nbsp;&nbsp;Nama Lengkap</td><td>:</td><td><?php echo $berkas['nama'];?></td></tr>
<tr><td>&nbsp;&nbsp;NIK / No. KTP</td><td>:</td><td><?php echo $berkas['nik'];?></td></tr>
<tr><td>&nbsp;&nbsp;E-Mail</td><td>:</td><td><?php echo $berkas['email'];?></td></tr>
<tr><td>&nbsp;&nbsp;No. Telepon/ HP</td><td>:</td><td><?php echo $berkas['hp'];?></td></tr>
<tr><td>&nbsp;&nbsp;Tempat Lahir / Tanggal Lahir</td><td>:</td><td><?php echo $berkas['tempat_lahir'];?>, <?php echo getTanggalIndo($berkas['tanggal_lahir']);?></td></tr>
<tr><td>&nbsp;&nbsp;Jenis Kelamin</td><td>:</td><td><?php echo $berkas['gender'];?></td></tr>
<tr><td>&nbsp;&nbsp;Alamat Lengkap</td><td>:</td><td><?php echo $berkas['alamat'];?> RT : <?php echo $berkas['rt'];?> RW : <?php echo $berkas['rw'];?> Desa/Kel <?php echo $berkas['desa'];?> Kec. <?php echo $berkas['kec'];?> Kab. <?php echo $berkas['kab'];?>, Prop. <?php echo $berkas['prov'];?></td></tr>
<tr><td>&nbsp;&nbsp;Asal Sekolah</td><td>:</td><td><?php echo $berkas['nama_sekolah'];?></td></tr>
<tr><td>&nbsp;&nbsp;Alamat Sekolah</td><td>:</td><td><?php echo $berkas['alamat_sekolah'];?></td></tr>
<tr><td>&nbsp;&nbsp;Jalur</td><td>:</td><td><?php echo $berkas['jalur'];?></td></tr>
<tr><td>&nbsp;&nbsp;Kelas</td><td>:</td><td><?php echo $berkas['kelas'];?></td></tr>
<tr><td>&nbsp;&nbsp;Pilihan Prodi Pertama</td><td>:</td><td><?php echo getProdi($berkas['pil1']);?></td></tr>
<tr><td>&nbsp;&nbsp;Pilihan Prodi Kedua</td><td>:</td><td><?php echo getProdi($berkas['pil2']);?></td></tr>
<tr><td>&nbsp;&nbsp;Asal Informasi</td><td>:</td><td><?php echo $berkas['asal_informasi'];?></td></tr>
</table></br></br></br></br>
<?php if(!empty($bukti['bukti_daftar'])) { ?>
<img src="<?php echo base_url('file/bukti_pendaftaran/').$bukti['bukti_daftar'];?>" height="500px">
<?php } else { echo ""; } ?>
</center>
</body>
</html>

<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>