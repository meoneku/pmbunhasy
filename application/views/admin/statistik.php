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
            <h1 class="m-0 text-dark">Statistik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('webmin')?>">Home</a></li>
              <li class="breadcrumb-item active">Statistik</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	  <div class="row">
          <div class="col-md-6">
        <!-- Info boxes -->

        <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jalur Pendaftaran</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="jalur" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
		
          <div class="col-md-6">
        <!-- Info boxes -->

        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Asal Informasi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="asal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
		</div>
		
		<div class="row">
          <div class="col-md-12">
        <!-- Info boxes -->

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jumlah Pendaftar Per Bulan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="jumlah" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
		</div>
		
			<div class="row">
          <div class="col-md-12">
        <!-- Info boxes -->

        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Jumlah Pendaftar Per Prodi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="jumlahprodi" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
        </div>
		
		<div class="row">
          <div class="col-md-6">
        <!-- Info boxes -->

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pendaftar Offline Dan Online</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="onof" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
		
          <div class="col-md-6">
        <!-- Info boxes -->

        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="asal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
		</div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
		</div>
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
	//-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#jalur').get(0).getContext('2d')
	var pieData        = {
      labels: [
          'Reguler', 
          'Nilai UN',
          'Raport', 
          'Tahfidz', 
          'Prestasi Akademik/Non', 
          'BKKM', 
      ],
      datasets: [
        {
          data: [<?php echo $jalur;?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
	
	
	 var AsalData = {
      labels  : ['Pameran', 'Media Sosial', 'Media Elektronik', 'Media Cetak', 'Website Unhasy', 'Teman', 'Mahasiswa Unhasy', 'Alumni', 'Guru', 'Dosen/Karyawan Unhasy'],
      datasets: [
        {
          label               : 'Asal Informasi',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $asalinfo;?>]
        }
      ]
    }
	
	
	var barChartAsal = $('#asal').get(0).getContext('2d')

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartAsal, {
      type: 'bar', 
      data: AsalData,
      options: barChartOptions
    })
	
	var JmlhPerBulan = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'],
      datasets: [
        {
          label               : 'Bulan',
          backgroundColor     : 'rgba(174,59,22,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $jumlahbulan;?>]
        }
      ]
    }
	
	
	var barChartJumlah = $('#jumlah').get(0).getContext('2d')

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartJumlah, {
      type: 'bar', 
      data: JmlhPerBulan,
      options: barChartOptions
    })
	
	var JmlhPerProdi = {
      labels  : ['HK', 'HES', 'KPI', 'PAI', 'PBA', 'PGMI', 'TM', 'TE', 'TS', 'TD','TI','SI','D3','Man','Akun','EI','PGSD','PBSI','PBI','IPA','PM','S2HK','S2PAI', 'MPI'],
      datasets: [
        {
          label               : 'Pilihan 1',
          backgroundColor     : 'rgba(144,147,22,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $jumlahpil1;?>]
        },
		{
          label               : 'Pilihan 2',
          backgroundColor     : 'rgba(180, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $jumlahpil2;?>]
        },
      ]
    }
	
	
	var barChartProdi = $('#jumlahprodi').get(0).getContext('2d')

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartProdi, {
      type: 'bar', 
      data: JmlhPerProdi,
      options: barChartOptions
    })
	
	 var pieChartCanvas = $('#onof').get(0).getContext('2d')
	var pieData        = {
      labels: [
          'Offline', 
          'Online',
      ],
      datasets: [
        {
          data: [<?php echo $onof;?>],
          backgroundColor : ['#00c0ef', '#3c8dbc'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

  </script>
