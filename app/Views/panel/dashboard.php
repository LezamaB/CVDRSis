<!-- Heredar todo el contenido especifico de la plantilla base-->
<?=$this->extend("base/panel_base")?>
<!--CSS especificos para cada vista -->
<?= $this->section("css")?>
 <!-- Daterange picker -->
 <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'daterangepicker/daterangepicker.css')?>>
 <!-- PARA LAS NOTIFICACIONESToastr -->
 <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'toastr/toastr.min.css')?>>

<?= $this->endSection();?>

<!-- Contenido especifico de cada vista -->
<?= $this->section("contenido") ?>
<div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?= $contador['usuarios'] ?></h3>

                <p>Oyentes</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-friends"></i>
              </div>
              <a href="<?=route_to('usuarios')?>" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?= $contador['conferencia'] ?></h3>

                <p>Conferencias</p>
              </div>
              <div class="icon">
              <i class="fas fa-paste"></i> 
              </div>
              <a href="<?=route_to('conferencias')?>" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
        </div>
        
        <!-- /.row -->

                    <!-- PIE CHART -->
                    <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<?= $this->endSection();?>

<!-- JS especificos para cada vista -->
<?= $this->section("js")?>
<!--PARA LAS NOTIFICACIONES Toastr -->
<!-- jQuery -->
<script src=<?= base_url(PLUGINS.'jquery/jquery.min.js')?>></script>
<!-- Bootstrap 4 -->
<script src=<?= base_url(PLUGINS.'bootstrap/js/bootstrap.bundle.min.js')?>></script>
<!-- ChartJS -->
<script src=<?= base_url(PLUGINS.'chart.js/Chart.min.js')?>></script>
<!-- AdminLTE App -->
<script src=<?= base_url(DIST_DASHBOARD.'js/adminlte.min.js')?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?= base_url(DIST_DASHBOARD.'js/demo.js')?>></script>
<!-- Page specific script -->
<script>
  $(function () {
     //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

  })


<?= $this->endSection();?>

