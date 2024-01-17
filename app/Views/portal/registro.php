<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

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

              <?= form_open_multipart('registrar_usuario',['id'=>'form-usuario','class'=>''])?>

                  <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #8E44AD;"></i>
                  </div>
                  <h1 class="h1 fw-bold mb-3">Bienvenidos</h1>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa tu información</h5>

                  <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre(s) y Apellidos</label>
                                        <?php
                                            $data = [
                                                'name'      => 'nombre',
                                                'id'        => 'nombre',
                                                'type'     => 'text',
                                                'class' => 'form-control',
                                                'maxlength' => '100',
                                                'placeholder'=>'Nombre Apellidos',
                                                'requiered'=>true
                                            ];
                                            echo form_input($data);
                                        ?>
                                    </div>
                                    <br>
                                </div>

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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Genero</label>                                        
                                            <?php
                                                $parametros = array('class' => 'form-control',
                                                                    'id' => 'genero'
                                                            );                                        
                                                echo form_dropdown("genero",["" => "Selecciona un genero"]+GENEROS, array(), $parametros);
                                            ?>                             
                                
                                    </div>
                                    <br>
                                </div>
                    

                  <div class="pt-1 mb-4 d-grid gap-2 col-6 mx-auto">
                  <?= form_submit('Registrar', 'Registrar',['class'=>'btn btn-dark btn-lg btn-block']);?>
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
<!-- PARA VALIDACIÓN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src=<?= base_url(JQUERY_VALIDATION.'jquery.validate.min.js')?>></script>
<script src=<?= base_url(ESPECIFICOS_JS.'registro.js')?>></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Comprueba si hay un mensaje de alerta en la sesión
$mensaje_alerta = session()->getFlashdata('mensaje_alerta');
if ($mensaje_alerta !== null):
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'info',
                title: 'Atención',
                text: '<?= $mensaje_alerta; ?>',
                showCancelButton: true,
                confirmButtonText: "Tengo una cuenta",
                }).then((result)=>{
                  if(result.isConfirmed){
                  location.href ="http://localhost:8080/login";
        }
            });
        });
    </script>
<?php endif; 

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

$mensaje_error = session()->getFlashdata('mensaje_error');
if ($mensaje_error !== null):
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= $mensaje_error; ?>',
            });
        });
    </script>
<?php endif; 


?>

</body>
</html>