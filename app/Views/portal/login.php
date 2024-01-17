<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Acceso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

<section class="vh-100" style="background-color:rgba(77 15 30); opacity:0.9">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-md-block text-center">
              <br><br><br>
              <img src="<?= base_url(RECURSOS_IMAGENES_PORTAL."log.jpg"); ?>" class="img-fluid">

            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <?= form_open_multipart('validar_inicio',['id'=>'form-inicio','class'=>''])?>

                  <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #8E44AD;"></i>
                  </div>
                  <h1 class="h1 fw-bold mb-3">Accede a tu cuenta</h1>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa tu información</h5>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo electrónico</label>
                                        <?php
                                             $data = [
                                                'name'      => 'email',
                                                'id'        => 'email',
                                                'type'     => 'email',
                                                'class' => 'form-control',
                                                'maxlength' => '100',
                                                'placeholder'=>'ejemplo@dominio.com',
                                                'requiered'=>true
                                            ];
                                            echo form_input($data);
                                        ?>
                                    </div>
                                    <br>
                                </div>
                 
                  <div class="pt-1 mb-4 d-grid gap-2 col-6 mx-auto">
                  <?= form_submit('Ingresar', 'Ingresar',['class'=>'btn btn-dark btn-lg btn-block']);?>
                  </div>
                  </div>
              <?=form_close();?>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- PARA VALIDACIÓN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src=<?= base_url(JQUERY_VALIDATION.'jquery.validate.min.js')?>></script>
<script src=<?= base_url(ESPECIFICOS_JS.'login.js')?>></script>
<?php
$mensaje_error = session()->getFlashdata('mensaje_error');
if ($mensaje_error !== null):
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'warning',
                title: 'Error...',
                text: '<?= $mensaje_error; ?>',
                showCancelButton: true,
                confirmButtonText: "Crear cuenta"
                }).then((result)=>{
                  if(result.isConfirmed){
                  location.href ="http://localhost:8080/registro";
        }
      });
                  
        });
    </script>
<?php endif; 


?>

</body>
</html>