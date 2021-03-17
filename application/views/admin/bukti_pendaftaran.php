
<style>
    .isi {
        font-size: 12px;
        height: 18px;
    }

    .petunjuk {
        font-size: 12px;
    }
</style>
<title>Cetak Kartu Bukti Pendaftaran</title>
<body onload="cetak();">
    <table style="border: 1px solid black; border-style: dashed;">
        <tr>
            <td align='right'><img src="<?php echo base_url('file/Unhasy-RBW.png');?>" width="75"/> &nbsp;</td>
            <td>
                <font size='2' style='font-family: inherit'><b style='font-size:14px'>UNIVERSITAS HASYIM ASY'ARI JOMBANG </b><br/>Jl.Irian Jaya No.55 Tebuireng Jombang <br/> Jawa Timur - Indonesia <br/> Telepon/Fax: 0321 861 719 / 0321 874 684</font></td>
        </tr>
        <tr>
            <td colspan='2' style='border-top: 3px solid black;' align="center" height="40">&nbsp;
                <font size='2' style="font-weight: bold">KARTU BUKTI PENDAFTARAN</font></td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="padding-left: 5px; border: 1px solid black; border-style: dotted;" cellpadding="0" cellspacing="0" width="520">
                    <tr class="isi">
                        <td width="120">Nomor Peserta</td>
                        <td>: &nbsp <?php echo $bukti['nomor'];?></td>
                    </tr>
                    <tr class="isi">
                        <td>Nama Peserta</td>
                        <td>: &nbsp <?php echo $bukti['nama'];?></td>
                    </tr>
                    <tr class="isi">
                        <td>Gelombang</td>
                        <td>: &nbsp <?php echo $bukti['gelombang'];?></td>
                    </tr>
					<tr class="isi">
                        <td>Jalur</td>
                        <td>: &nbsp <?php echo $bukti['jalur'];?></td>
                    </tr>
					<tr class="isi">
                        <td>Kelas</td>
                        <td>: &nbsp <?php echo $bukti['kelas'];?></td>
                    </tr>
                </table>
                <table style="padding-left: 5px; margin-top: 5px; border: 1px solid black; border-style: dotted;" cellpadding="0" cellspacing="0" width="520">
                    <tr class="isi">
                        <td>
							<img src="<?php echo base_url('file/foto/').$foto;?>" height="140" width="120" title="noavatar" />                        </td>
                        <td valign="top">
                            <table style="padding-left: 10px">
                                <tr class="isi">
                                    <td width="87">No. Identitas</td>
                                    <td width="175">:<?php echo $bukti['nik'];?></td>
                                    <td width="8"></td>
                                </tr>
                                <tr class="isi">
                                    <td valign="top">Alamat Email</td>
                                    <td valign="top">:<?php echo $bukti['email'];?></td>
                                    <td></td>
                                </tr>
                                <tr class="isi">
                                    <td>Pilihan 1</td>
                                    <td>:<?php echo getProdi($bukti['pil1']);?></td>
                                    <td></td>
                                </tr>
                                <tr class="isi">
                                    <td>Pilihan 2</td>
                                    <td>:<?php echo getProdi($bukti['pil2']);?></td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="padding-left: 5px; margin-top: 5px; padding-top: 5px; border: 1px solid black; border-style: dotted;" cellpadding="0" cellspacing="0" width="520">
                    <tr class="isi">
                        <td>
                            <b>PERLENGKAPAN YANG HARUS DIBAWA SAAT UJIAN MASUK</b>
                        </td>
                    </tr>
                    <tr class="petunjuk">
                        <td> 
                            <ul>
                                <li>Kartu bukti pendaftaran ini.</li>
                                <li>Kartu identitas waktu melakukan pendaftaran.</li>
                                <li>Fotocopy Ijasah yang telah dilegalisasi atau tanda lulus asli.</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
<script>
    function cetak(){
        window.print();
		window.focus();
    }
</script>