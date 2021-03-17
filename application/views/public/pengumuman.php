<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('public/_parsial/head');?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<body>

  <?php $this->load->view('public/_parsial/header2');?> 

  <main id="main">
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          </br></br>
          <h2><?php echo $info['judul_info'];?></h2>
          <p>Pengumuman Hasil Seleksi Calon Mahasiswa Baru Universitas Hasyim Asy'ari Tahap <?php echo $info['tahap'];?></p>
        </div>
		<div>
		  <p><?php echo $info['isi_info'];?></p></br>
          <a href="<?php echo base_url('file/pengumuman/').$info['file_scan'];?>">Download Surat Keputusan Lulus Seleksi</a></p>
          <p><a href="<?php echo base_url('file/Alur-DU-Camaba-PMB2020.pdf');?>">Download Panduan Daftar Ulang</a></p>
        </div>
        <div class="col-md-12">
		  <table id="pengumuman" class="table table-bordered table-hover">
            <thead>
                <tr>
				  <th>No.</th>
				  <th>Nama</th>
				  <th>Nomor Pendaftaran</th>
				  <th>Jalur/Program</th>
                  <th>Prodi Di Terima</th>
                  <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
			<?php $no = 1;
				foreach ($lulus as $pendaftar) {
				$prodi = getProdi($pendaftar['prodi']);
			?>
				<tr>
				  <td class="text-center"><?php echo $no;?></td>
				  <td><?php echo $pendaftar['nama'];?></td>
				  <td class="text-center"><?php echo $pendaftar['nomor'];?></td>
				  <td><?php echo $pendaftar['jalur'];?></td>
				  <td><?php echo $prodi;?></td>
				  <td><?php echo $pendaftar['info'];?></td>
				</tr>
			<?php $no++;}?>
			</tbody>
			<tfoot>
				<tr>
				  <th>No.</th>
				  <th>Nama</th>
				  <th>Nomor Pendaftaran</th>
				  <th>Jalur/Program</th>
                  <th>Prodi Di Terima</th>
                  <th>Keterangan</th>
                </tr>
			</tfoot>
		  </table>
        </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php $this->load->view('public/_parsial/footer');?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php $this->load->view('public/_parsial/corejs');?>
  
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  
  <script type="text/javascript">
	$(function () {
    $('#pengumuman').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
</body>

</html>