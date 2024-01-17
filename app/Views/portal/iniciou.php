<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inicio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href=<?= base_url(ASSETS_IMG.'favicon.png')?>rel="icon">
  <link href=<?= base_url(ASSETS_IMG.'apple-touch-icon.png')?> rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
  <link rel="stylesheet" href=<?= base_url(ESPECIFICOS_CSS.'estilo_lista.css')?>>


  <!-- Vendor CSS Files -->
  <link href=<?= base_url(ASSETS_VENDOR.'bootstrap/css/bootstrap.min.css')?> rel="stylesheet">
  <link href=<?= base_url(ASSETS_VENDOR.'bootstrap-icons/bootstrap-icons.css')?> rel="stylesheet">
  <link href=<?= base_url(ASSETS_VENDOR.'fontawesome-free/css/all.min.css')?> rel="stylesheet">
  <link href=<?= base_url(ASSETS_VENDOR.'glightbox/css/glightbox.min.css')?> rel="stylesheet">
  <link href=<?= base_url(ASSETS_VENDOR.'swiper/swiper-bundle.min.css')?> rel="stylesheet">
  <link href=<?= base_url(ASSETS_VENDOR.'aos/aos.css" rel="stylesheet')?>>

  <!-- Template Main CSS File -->
  <link href=<?= base_url(ASSETS_CSS.'main.css')?> rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('<?= base_url(ASSETS_IMG.'inicio.jpg');?>">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Comencemos</h2>
              <p><em>“El conocimiento es un antídoto para el miedo”.</em><br> <b>— Ralph Waldo Emerson</b></p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Breadcrumbs -->

        <!-- ======= USUARIO ====== -->
        <section id="usuario" class="usuario">
        <div class="container-fluid">
                <div class="row">
                <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card">
                        <center><br>
                        <img src="<?= base_url(RECURSOS_IMAGENES_PORTAL.'usuario.webp')?>"  width="120"></center><br>
                            <div class="card-header">
                                <center>
                                    <h3 class="card-title"><?= $nombre_usuario ?></h3>
                                </center>
                            </div>
                            <div class="card-body">
                            <button href="" class="btn btn-success btn-sm estatus float-end" id="listas"><i class="fa-solid fa-plus"></i> Agregar conferencia</button>
                            <br><br>
                                <table id="table-us-conference" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Conferencias Asistidas</th>
                                            <th>Constancia</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
                                        if (!empty($conferencias)){
                                            $html = '';
                                            $numero = 0;
                                            foreach ($conferencias as $conferencia) {
                                                $html .= '
                                                <tr>
                                                    <td>' . ++$numero . '</td>
                                                    <td>' . $conferencia->nombre_conferencia . '</td>
                                                    <td><center><a href='.base_url(PLUGINS.'fpdf/Constancia.php').'?usuario='.urlencode($conferencia->nombre_usuario).'&conferencia='.urlencode($conferencia->nombre_conferencia).'&imagen='.urlencode($conferencia->plantilla_imagen).' target="_blank" class="btn btn-dark btn-sm"><i class="fa-solid fa-file-pdf"></i> Ver</a> 
                                                    <a href='.base_url(PLUGINS.'fpdf/Correo.php').'?usuario='.urlencode($conferencia->nombre_usuario).'&conferencia='.urlencode($conferencia->nombre_conferencia).'&direccion='.urlencode($email_usuario).'&imagen='.urlencode($conferencia->plantilla_imagen).' target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-envelope"></i> Enviar</a></center></td>

                                                </tr>';
                                            }
                                            echo $html;
                                        } else {
                                            echo '<tr><td colspan="3"><center>No ha participado en ninguna conferencia</center></td></tr>';
                                        }
                                        ?>         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  <div class="col-1"></div>
                  <div class="col-1">
                  <a class="nav-link" href="<?=route_to('cerrar');?>"><center>
                    <i class="fa fa-sign-out"></i><br><p class="text-break">Salir</p></center>
                  </div>
                </div>
            </div>
    </section><!-- End usuario -->

  </main><!-- End #main -->

 

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  <!-- JS para cada vista -->
  <?= $this->section("js")?>

  <!-- Vendor JS Files -->
  <script src=<?= base_url(ASSETS_VENDOR.'bootstrap/js/bootstrap.bundle.min.js')?>></script>
  <script src=<?= base_url(ASSETS_VENDOR.'purecounter/purecounter_vanilla.js')?>></script>
  <script src=<?= base_url(ASSETS_VENDOR.'glightbox/js/glightbox.min.js')?>></script>
  <script src=<?= base_url(ASSETS_VENDOR.'swiper/swiper-bundle.min.js')?>></script>
  <script src=<?= base_url(ASSETS_VENDOR.'aos/aos.js')?>></script>
  <script src=<?= base_url(ASSETS_VENDOR.'php-email-form/validate.js')?>></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Template Main JS File -->
  <script src=<?= base_url(ASSETS_JS.'main.js')?>></script>
  <script src=<?= base_url(ESPECIFICOS_JS.'lista_conferencias.js')?>></script>
<?php
$mensaje_exito = session()->getFlashdata('mensaje_exito');
if ($mensaje_exito !== null):
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Felicidades',
                text: '<?= $mensaje_exito; ?>',
            });
        });
    </script>
<?php endif;

?>

</body>

</html>