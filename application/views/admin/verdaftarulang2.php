<?php $this->load->view('admin/_parsial/header');?>

    <?php $this->load->view('admin/_parsial/menu');?>
	
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PEMBAYARAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Pembayaran Daftar Ulang</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Cek Kembali</h5>
					Harap cek kembali sebelum memverifikasi bukti pembayaran agar tidak terjadi kesalahan.
				</div>
                <div class="row">
				 <div class="col-md-12">
				  <form class="form-horizontal" action="<?php echo base_url('webmin/du/simpandu');?>" method="post">
				  	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="card-body">
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Verifikasi Untuk</label>
							<div class="col-sm-8">
								<input type="text" name="nama" class="form-control" value="<?php echo $pendaftar['nama'];?>" readonly>
								<input type="hidden" name="id" value="<?php echo $nomor;?>">
								<input type="hidden" name="id_b" value="<?php echo $id_berkas;?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Jalur/Program</label>
							<div class="col-sm-8">
								<input type="text" name="jalur" class="form-control" value="<?php echo $pendaftar['jalur'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-4 col-form-label">Prodi Di Terima</label>
							<div class="col-sm-8">
								<input type="text" name="jalur" class="form-control" value="<?php echo getProdi($pendaftar['prodi']);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-8">
								<hr/>
							</div>
						</div>
						<div class="form-group row">
							<label for="bank" class="col-sm-4 col-form-label">Bank Yang Di Pakai</label>
							<div class="col-sm-8">
								<select name="bank" id="bank" class="form-control" required>
									<option value="">Pilih Bank</option>
									<option value="Bank Mandiri Syariah">Bank Mandiri Syariah</option>
									<option value="Bank BRI">Bank BRI</option>
									<option value="Bank Mandiri">Bank Mandiri</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="herreg" class="col-sm-4 col-form-label">Her Regristasi</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="herreg" name="herreg" value="<?php echo $her;?>" onkeyup="convertToRupiah(this)" onchange="JumlahTotal()" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="spp" class="col-sm-4 col-form-label">SPP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="spp" name="spp" value="<?php echo $spp;?>" onkeyup="convertToRupiah(this)" onchange="JumlahTotal()" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="ujian" class="col-sm-4 col-form-label">Ujian (UTS & UAS)</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="ujian" name="ujian" value="<?php echo $ujian;?>" onkeyup="convertToRupiah(this)" onchange="JumlahTotal()" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="dpp" class="col-sm-4 col-form-label">DPP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="dpp" name="dpp" value="<?php echo $dpp;?>" onkeyup="convertToRupiah(this)" onchange="JumlahTotal()" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="posmaru" class="col-sm-4 col-form-label">Lain-lain (Posmaru)</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="posmaru" name="posmaru" value="<?php echo $posmaru;?>" onkeyup="convertToRupiah(this)" onchange="JumlahTotal()" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="kopertais" class="col-sm-4 col-form-label">Kopertais</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kopertais" name="kopertais" value="<?php echo $kopertais;?>" onkeyup="convertToRupiah(this)" onchange="JumlahTotal()" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah;?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="ket" name="ket" value="" placeholder="Keterangan Bila Ada">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-4 col-form-label"></label>
							<div class="col-sm-2">
								</br>
								<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>
				 </form>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
					
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php $this->load->view('admin/_parsial/footer');?>
  
  <script>
			function convertToRupiah(objek) {
			  var 	bilangan = objek.value;
	
			  var	number_string = bilangan.replace(/[^,\d]/g, '').toString(),
			  split		= number_string.split(','),
			  sisa 		= split[0].length % 3,
			  rupiah 	= split[0].substr(0, sisa),
			  ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
		
			  if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			  }
			  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

			  // Cetak hasil	
			  objek.value = rupiah;
			}

			function JumlahTotal() {			  
			  var hertemp = document.getElementById('herreg').value.replace(/[^,\d]/g, '');
			  var spptemp = document.getElementById('spp').value.replace(/[^,\d]/g, '');
			  var ujiantemp = document.getElementById('ujian').value.replace(/[^,\d]/g, '');
			  var dpptemp = document.getElementById('dpp').value.replace(/[^,\d]/g, '');
			  var posmarutemp = document.getElementById('posmaru').value.replace(/[^,\d]/g, '');
			  var kopertaistemp = document.getElementById('kopertais').value.replace(/[^,\d]/g, '');
			  
			  var hernmr = hertemp.replace(/,/g,'.');
			  var sppnmr = spptemp.replace(/,/g,'.');
			  var ujiannmr = ujiantemp.replace(/,/g,'.');
			  var dppnmr = dpptemp.replace(/,/g,'.');
			  var posmarunmr = posmarutemp.replace(/,/g,'.');
			  var kopertaisnmr = kopertaistemp.replace(/,/g,'.');
			  
			  var her = parseFloat(hernmr, 10);
			  var spp = parseFloat(sppnmr, 10);
			  var ujian = parseFloat(ujiannmr, 10);
			  var dpp = parseFloat(dppnmr, 10);
			  var posmaru = parseFloat(posmarunmr, 10);
			  var kopertais = parseFloat(kopertaisnmr, 10);
			  
			  var jumlah = her + spp + ujian + dpp + posmaru + kopertais;
			  var number_string = jumlah.toString(),
			  split		= number_string.split('.'),
			  sisa 		= split[0].length % 3,
			  rupiah 	= split[0].substr(0, sisa),
			  ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
		
			  if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			  }
			  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			  document.getElementById('jumlah').value = rupiah;
			}
	</script> 
