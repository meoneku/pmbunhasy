<body onload="cetak();">
<table border="0" cellspacing="1" cellspadding="0" width="900">
<tr><td rowspan="2" align="center"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="37"></td><td><strong><span style="font-size:18px;">KWITANSI DAFTAR ULANG</span></strong></td></tr>
<tr><td><strong><span style="font-size:18px;">UNIVERSITAS HASYIM ASY'ARI TEBUIRENG JOMBANG</span></strong></td></tr>
<tr><td colspan="2"><hr></td></tr>
<table>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="290"><?php echo $pendaftar['nama'];?></td><td width="300"></td><td width="30">Semester</td><td width="5">:</td><td width="150">1 (Satu)</td></tr>
<tr><td>Nomor</td><td>:</td><td><?php echo $pendaftar['nomor'];?></td><td></td><td>Kelas</td><td>:</td><td><?php echo $pendaftar['kelas'];?></td></tr>
<tr><td>Prodi</td><td>:</td><td colspan="5"><?php echo getProdi($pendaftar['prodi']);?></td></tr>
</table></br>

<table border="1" cellspacing="0" cellpadding="1" width="900">
<tr><td align="center"><strong>No</strong></td><td><strong>Jenis Pembayaran</strong></td><td><strong>Jumlah</strong></td><td><strong>Keterangan</strong></td></tr>
<tr><td align="center">1.</td><td>Her Regritasi</td><td><?php echo 'Rp. '.$her;?></td><td>-</td></tr>
<tr><td align="center">2.</td><td>SPP</td><td><?php echo 'Rp. '.$spp;?></td><td>-</td></tr>
<tr><td align="center">3.</td><td>Ujian (UTS Dan UAS)</td><td><?php echo 'Rp. '.$ujian;?></td><td>-</td></tr>
<tr><td align="center">4.</td><td>DPP</td><td><?php echo 'Rp. '.$dpp;?></td><td>-</td></tr>
<tr><td align="center">5.</td><td>Kopertais</td><td><?php echo 'Rp. '.$kopertais;?></td><td>-</td></tr>
<tr><td align="center">6.</td><td>Lain-lain (Posmaru, Jas Almamater, KTM Dan Lainnya)</td><td><?php echo 'Rp. '.$posmaru;?></td><td>-</td></tr>
<tr><td align="center" colspan="2"><strong>TOTAL</strong></td><td colspan="2"><strong><?php echo 'Rp. '.$jumlah;?></strong></td></tr>
</table></br>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="600"></td><td>Jombang, <?php $tanggal = new DateTime($biaya['tanggal_biaya']); echo getTanggalIndo($tanggal->format('Y-m-d'));?></td>
<tr><td ><img src="<?php echo base_url('file/qrcode/').$biaya['qrcode'].'.png';?>" height="100"></td><td></td>
<tr><td><i><?php echo $biaya['bank'];?></i></td><td>(<u><?php echo $user['nama_user'];?></u>)</td>
</table>
</br></br></br></br></hr></br></br></br></br>
<table border="0" cellspacing="1" cellspadding="0" width="900">
<tr><td rowspan="2" align="center"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="37"></td><td><strong><span style="font-size:18px;">KWITANSI DAFTAR ULANG</span></strong></td></tr>
<tr><td><strong><span style="font-size:18px;">UNIVERSITAS HASYIM ASY'ARI TEBUIRENG JOMBANG</span></strong></td></tr>
<tr><td colspan="2"><hr></td></tr>
<table>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="150">Nama</td><td width="5">:</td><td width="290"><?php echo $pendaftar['nama'];?></td><td width="300"></td><td width="30">Semester</td><td width="5">:</td><td width="150">1 (Satu)</td></tr>
<tr><td>Nomor</td><td>:</td><td><?php echo $pendaftar['nomor'];?></td><td></td><td>Kelas</td><td>:</td><td><?php echo $pendaftar['kelas'];?></td></tr>
<tr><td>Prodi</td><td>:</td><td colspan="5"><?php echo getProdi($pendaftar['prodi']);?></td></tr>
</table></br>

<table border="1" cellspacing="0" cellpadding="1" width="900">
<tr><td align="center"><strong>No</strong></td><td><strong>Jenis Pembayaran</strong></td><td><strong>Jumlah</strong></td><td><strong>Keterangan</strong></td></tr>
<tr><td align="center">1.</td><td>Her Regritasi</td><td><?php echo 'Rp. '.$her;?></td><td>-</td></tr>
<tr><td align="center">2.</td><td>SPP</td><td><?php echo 'Rp. '.$spp;?></td><td>-</td></tr>
<tr><td align="center">3.</td><td>Ujian (UTS Dan UAS)</td><td><?php echo 'Rp. '.$ujian;?></td><td>-</td></tr>
<tr><td align="center">4.</td><td>DPP</td><td><?php echo 'Rp. '.$dpp;?></td><td>-</td></tr>
<tr><td align="center">5.</td><td>Kopertais</td><td><?php echo 'Rp. '.$kopertais;?></td><td>-</td></tr>
<tr><td align="center">6.</td><td>Lain-lain (Posmaru, Jas Almamater, KTM Dan Lainnya)</td><td><?php echo 'Rp. '.$posmaru;?></td><td>-</td></tr>
<tr><td align="center" colspan="2"><strong>TOTAL</strong></td><td colspan="2"><strong><?php echo 'Rp. '.$jumlah;?></strong></td></tr>
</table></br>

<table border="0" cellspacing="1" cellpadding="0" width="900">
<tr><td width="600"></td><td>Jombang, <?php $tanggal = new DateTime($biaya['tanggal_biaya']); echo getTanggalIndo($tanggal->format('Y-m-d'));?></td>
<tr><td ><img src="<?php echo base_url('file/qrcode/').$biaya['qrcode'].'.png';?>" height="100"></td><td></td>
<tr><td><?php echo $biaya['bank'];?></td><td>(<u><?php echo $user['nama_user'];?></u>)</td>
</table>
</body>
<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>