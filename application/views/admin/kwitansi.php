<style>
    .isi {
        font-size: 12px;
        height: 18px;
    }

    .petunjuk {
        font-size: 12px;
    }
</style>
<title>Cetak Kwitansi</title>
<body onload="cetak();">
    <table border=0 width="890" style="border-bottom: 1px solid black; border-style: dashed; padding:10px 10px 30px 10px;" cellspacing="0" cellpadding="0">
        <tr>
			<td width="250">
                <font size='2' style='font-family: inherit'><b style='font-size:14px'>UNHASY JOMBANG </b><br/>Jl.Irian Jaya No.55 Tebuireng <br/>Jombang - Jawa Timur - Indonesia <br/> Telepon/Fax: 0321 861 719 / 0321 874 684</font></td>
			<td width="310" align="center" style="font-weight:bold; font-size: 24px">KWITANSI PENDAFTARAN</td>
            <td align='right' width="280"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="75"/> &nbsp;</td>
        </tr>
		<tr><td>&nbsp;</td></tr>
        <tr>
            <td>&nbsp;Nomor Pendaftaran</td>
			<td colspan="2">: &nbsp; <?php echo $kuwi['nomor'];?></td>
        </tr>
		<tr>
            <td>&nbsp;Banyaknya uang</td>
			<td colspan="2">: &nbsp; <i><?php echo getTerbilang($kuwi['biaya']);?> Rupiah</i></td>
        </tr>
		<tr>
            <td>&nbsp;Sudah diterima dari</td>
			<td colspan="2">: &nbsp; <?php echo $kuwi['nama'];?></td>
        </tr>
		<tr>
            <td>&nbsp;Untuk pembayaran</td>
			<td colspan="2">: &nbsp; Pendaftaran calon mahasiswa baru Universitas Hasyim Asy'ari  Gelombang <?php echo $kuwi['gelombang'];?>.</td>
        </tr>
		<tr>
            <td>&nbsp;</td>
			<td colspan="2">&nbsp; </td>
        </tr>
		<tr>
            <td colspan="2" style="font-weight:bold; font-size: 22px;">Jumlah <?php echo "Rp " . number_format($kuwi['biaya'],0,',','.');?></td>
			<td align="center">Jombang, <?php echo getTanggalIndo($tanggal);?><br/><br/><br/><br/></td>
        </tr>
		<tr>
            <td colspan="2">*) untuk calon mahasiswa</td>
			<td align="center" style='border-bottom: 3px solid black;'>&nbsp;</td>
        </tr>
    </table>
	<br/>
	<table border=0 width="890" style="border-bottom: 1px solid black; border-style: dashed; padding:10px 10px 30px 10px;" cellspacing="0" cellpadding="0">
        <tr>
			<td width="250">
                <font size='2' style='font-family: inherit'><b style='font-size:14px'>UNHASY JOMBANG </b><br/>Jl.Irian Jaya No.55 Tebuireng <br/>Jombang - Jawa Timur - Indonesia <br/> Telepon/Fax: 0321 861 719 / 0321 874 684</font></td>
			<td width="310" align="center" style="font-weight:bold; font-size: 24px">KWITANSI PENDAFTARAN</td>
            <td align='right' width="280"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="75"/> &nbsp;</td>
        </tr>
		<tr><td>&nbsp;</td></tr>
        <tr>
            <td>&nbsp;Nomor Pendaftaran</td>
			<td colspan="2">: &nbsp; <?php echo $kuwi['nomor'];?></td>
        </tr>
		<tr>
            <td>&nbsp;Banyaknya uang</td>
			<td colspan="2">: &nbsp; <i><?php echo getTerbilang($kuwi['biaya']);?> Rupiah</i></td>
        </tr>
		<tr>
            <td>&nbsp;Sudah diterima dari</td>
			<td colspan="2">: &nbsp; <?php echo $kuwi['nama'];?></td>
        </tr>
		<tr>
            <td>&nbsp;Untuk pembayaran</td>
			<td colspan="2">: &nbsp; Pendaftaran calon mahasiswa baru Universitas Hasyim Asy'ari  Gelombang <?php echo $kuwi['gelombang'];?>.</td>
        </tr>
		<tr>
            <td>&nbsp;</td>
			<td colspan="2">&nbsp; </td>
        </tr>
		<tr>
            <td colspan="2" style="font-weight:bold; font-size: 22px;">Jumlah <?php echo "Rp " . number_format($kuwi['biaya'],0,',','.');?></td>
			<td align="center">Jombang, <?php echo getTanggalIndo($tanggal);?><br/><br/><br/><br/></td>
        </tr>
		<tr>
            <td colspan="2">*) untuk TIM PMB</td>
			<td align="center" style='border-bottom: 3px solid black;'>&nbsp;</td>
        </tr>
    </table>
	<br/>
	<table border=0 width="890" style="padding:10px 10px 30px 10px;" cellspacing="0" cellpadding="0">
        <tr>
			<td width="250">
                <font size='2' style='font-family: inherit'><b style='font-size:14px'>UNHASY JOMBANG </b><br/>Jl.Irian Jaya No.55 Tebuireng <br/>Jombang - Jawa Timur - Indonesia <br/> Telepon/Fax: 0321 861 719 / 0321 874 684</font></td>
			<td width="310" align="center" style="font-weight:bold; font-size: 24px">KWITANSI PENDAFTARAN</td>
            <td align='right' width="280"><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="75"/> &nbsp;</td>
        </tr>
		<tr><td>&nbsp;</td></tr>
        <tr>
            <td>&nbsp;Nomor Pendaftaran</td>
			<td colspan="2">: &nbsp; <?php echo $kuwi['nomor'];?></td>
        </tr>
		<tr>
            <td>&nbsp;Banyaknya uang</td>
			<td colspan="2">: &nbsp; <i><?php echo getTerbilang($kuwi['biaya']);?> Rupiah</i></td>
        </tr>
		<tr>
            <td>&nbsp;Sudah diterima dari</td>
			<td colspan="2">: &nbsp; <?php echo $kuwi['nama'];?></td>
        </tr>
		<tr>
            <td>&nbsp;Untuk pembayaran</td>
			<td colspan="2">: &nbsp; Pendaftaran calon mahasiswa baru Universitas Hasyim Asy'ari  Gelombang <?php echo $kuwi['gelombang'];?>.</td>
        </tr>
		<tr>
            <td>&nbsp;</td>
			<td colspan="2">&nbsp; </td>
        </tr>
		<tr>
            <td colspan="2" style="font-weight:bold; font-size: 22px;">Jumlah <?php echo "Rp " . number_format($kuwi['biaya'],0,',','.');?></td>
			<td align="center">Jombang, <?php echo getTanggalIndo($tanggal);?><br/><br/><br/><br/></td>
        </tr>
		<tr>
            <td colspan="2">*) untuk Keuangan</td>
			<td align="center" style='border-bottom: 3px solid black;'>&nbsp;</td>
        </tr>
    </table>
</body>

<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>