<body onload="cetak();">
	<center><img src="<?php echo base_url('file/kop.png');?>" width="900"><br><br>
	<strong><span style="font-size:24px;"><u>BLANKO UKURAN JAS AlMAMATER</u></span></strong><br><br>
		<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:20;">
			<tr height="30"><td width="200">Nomor Pendaftaran</td><td width="5">:</td><td><?php echo $pendaftar['nomor'];?></td></tr>
			<tr height="30"><td>Nama</td><td>:</td><td><?php echo $pendaftar['nama'];?></td></tr>
			<tr height="30"><td>Fakultas</td><td>:</td><td><?php echo getFakultas($pendaftar['prodi']);?></td></tr>
			<tr height="30"><td>Prodi</td><td>:</td><td><?php echo getProdi($pendaftar['prodi']);?></td></tr>
			<tr height="30"><td>Ukuran Jas</td><td>:</td><td><strong><?php echo $pendaftar['ukuran_jas'];?></strong></td></tr>
		</table><br>
		<table border="0" cellspacing="1" cellspadding="0" width="900" style="font-size:20;">
			<tr><td width="600"></td><td width="300">Jombang, <?php $tanggal = new DateTime($pendaftar['tanggal_verifikasi_du']);
																	$indotgl = getTanggalIndo($tanggal->format('Y-m-d'));
																	echo $indotgl;?></td></tr>
			<tr><td></td><td></td></tr>
			<tr height="80"><td></td><td></td></tr>
			<tr><td><u></u></td><td><u><?php echo $petugas['nama_user'];?></u></td></tr>
		</table>
	</center>
</body>
<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>