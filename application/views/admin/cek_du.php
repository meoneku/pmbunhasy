<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMB UNHASY</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="">VERFIKASI DAFTAR ULANG</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Data Pendaftaran</p>

       <div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Nomor</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $verifi['nomor'];?>" disabled>
			</div>
		</div>
        <div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Nama</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $verifi['nama'];?>" disabled>
			</div>
		</div>
		 <div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Jalur</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $verifi['jalur'];?>" disabled>
			</div>
		</div>
		 <div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Kelas</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $verifi['kelas'];?>" disabled>
			</div>
		</div>
		 <div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Prodi</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo getProdi($verifi['prodi']);?>" disabled>
			</div>
		</div>
		<div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Waktu Verifikasi</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $verifi['tanggal_biaya'];?>" disabled>
			</div>
		</div>
		<div class="form-group row">
		<label for="alasan" class="col-sm-4 col-form-label">Verificator</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $verifi['nama_user'];?>" disabled>
			</div>
		</div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!--<input type="checkbox" id="remember">-->
              <label for="remember">
                
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            
          </div>
          <!-- /.col -->
        </div>

      <!-- /.social-auth-links -->

      <p class="mb-1">

      </p>
      <p class="mb-0">

      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>

</body>
</html>
