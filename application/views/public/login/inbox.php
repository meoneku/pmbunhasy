<?php $this->load->view('public/login/_parsial/header');?>

    <?php $this->load->view('public/login/_parsial/menu');?>
	
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
            <h1 class="m-0 text-dark">Kotak Pesan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('dlogin')?>">Home</a></li>
              <li class="breadcrumb-item active">Kotak Pesan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- /.btn-group -->
               
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
				  <?php foreach ($pesan as $message) {
					  $waktu = getSelisihWaktu($message->waktu_pesan);?>
                  <tr>
                    <td class="mailbox-star"><a href="#"><?php if ($message->status_pesan == 0) { echo '<i class="fas fa-star text-warning"></i>';}?></a></td>
                    <td class="mailbox-name"><a href="<?php echo base_url('dlogin/bacainbox/').url_encode($message->id_pesan);?>"><?php echo $message->nama_user;?></a></td>
					<td class="mailbox-title"><a href="<?php echo base_url('dlogin/bacainbox/').url_encode($message->id_pesan);?>"><?php echo $message->judul_pesan;?></a></td>
                    <td class="mailbox-subject"><?php echo substr($message->isi_pesan,0,80). "....";?>
                    </td>
                    <td class="mailbox-date"><?php echo $waktu;?></td>
                  </tr>
				  <?php }?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php $this->load->view('public/login/_parsial/footer');?>
