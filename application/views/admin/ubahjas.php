<?php $this->load->view('admin/_parsial/header'); ?>

<?php $this->load->view('admin/_parsial/menu'); ?>

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
                    <h1 class="m-0 text-dark">Ubah Ukuran Jas Almamater</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php base_url('webmin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Jas Almamater</li>
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
                            <h5 class="card-title">Ubah Ukuran Jas Almamater</h5>

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
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="<?php echo base_url('webmin/adminact/ubahjas'); ?>" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nim" class="form-control" value="<?= $personal['nim_pdti']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nama" class="form-control" value="<?= $personal['nama']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prodi" class="form-control" value="<?= getProdi($personal['prodi']); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="kelas" class="form-control" value="<?= $personal['kelas']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jalur" class="col-sm-4 col-form-label">Jalur</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="jalur" class="form-control" value="<?= $personal['jalur']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pertanyaan" class="col-sm-4 col-form-label">Ukuran Jas</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" name="id" value="<?= url_encode($personal['nomor']); ?>">
                                                    <select name="jas" id="jas" class="form-control" required>
                                                        <option value="<?= $personal['ukuran_jas']; ?>" selected>Ukuran <?= $personal['ukuran_jas']; ?></option>
                                                        <option value="S">Ukuran <strong>S</strong></option>
                                                        <option value="M">Ukuran <strong>M</strong></option>
                                                        <option value="L">Ukuran <strong>L</strong></option>
                                                        <option value="XL">Ukuran <strong>XL</strong></option>
                                                        <option value="XXL">Ukuran <strong>XXL</strong></option>
                                                        <option value="XXXL">Ukuran <strong>XXXL</strong></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-2">
                                                    </br>
                                                    <button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-edit"></i> Ubah</button>
                                                </div>
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
</div>
<!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<?php $this->load->view('admin/_parsial/footer'); ?>