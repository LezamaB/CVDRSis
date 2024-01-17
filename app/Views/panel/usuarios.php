<!-- Heredar todo el contenido especifico de la plantilla base-->
<?=$this->extend("base/panel_base")?>
<!--CSS especificos para cad vista -->
<?= $this->section("css")?>
<!-- Data Table -->
<link rel="stylesheet" href=<?= base_url(DATATABLES_BS4.'css/dataTables.bootstrap4.min.css')?>>
<link rel="stylesheet" href=<?= base_url(DATATABLES_RESPONSIVE.'css/responsive.bootstrap4.min.css')?>>
<link rel="stylesheet" href=<?= base_url(DATATABLES_BUTTONS.'buttons.bootstrap4.min.css')?>>
<!-- SWEETALERT2 -->
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css " rel="stylesheet">
<!-- Toastr -->
<link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'toastr/toastr.min.css')?>>

<?= $this->endSection();?>
<!-- Contenido especifico de cada vista -->
<?= $this->section("contenido") ?>
<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h3 class="card-title">Lista de Usuarios</h3>
                                </center>
                            </div>
                            <div class="card-body">
                                <table id="table-usuarios" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Sexo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($usuarios)){
                                            $html='';
                                            $numero=0;
                                            foreach ($usuarios as $usuario) {
                                                $html.='
                                                <tr>
                                                    <td>'.++$numero.'</td>
                                                    <td>'.$usuario->nombre_usuario.'</td>
                                                    <td>' . GENEROS[$usuario->genero] . '</td>
                                                    <td><button class="btn btn-danger eliminar" id="'.$usuario->id_usuario.'"><i class="fas fa-times-circle"></i> Eliminar</button>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                            echo $html;
                                        }

                                        ?>
                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?= $this->endSection();?>

<!-- JS especificos para cada vista -->
<?= $this->section("js")?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src=<?= base_url(JQUERY_VALIDATION.'jquery.validate.min.js')?>></script>
    <script src=<?= base_url(DATATABLES.'jquery.dataTables.min.js')?>></script>
    <script src=<?= base_url(DATATABLES_BS4.'js/dataTables.bootstrap4.min.js')?>></script>
    <script src=<?= base_url(DATATABLES_RESPONSIVE.'js/dataTables.responsive.min.js')?>></script>
    <script src=<?= base_url(DATATABLES_RESPONSIVE.'js/responsive.bootstrap4.min.js')?>></script>
    <script src=<?= base_url(ASSETS_JS.'main.js')?>></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src=<?= base_url(ESPECIFICOS_JS.'usuarios.js')?>></script>
<script src=<?= base_url(ESPECIFICOS_JS.'funciones.js')?>></script>

<?php
// Comprueba si hay un mensaje de alerta en la sesión
$mensaje_alerta = session()->getFlashdata('mensaje_alerta');
if ($mensaje_alerta !== null):
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                        title: "¿Esta seguro?",
                        text: "¡No podrás revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, eliminarlo"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                            title: "¡Eliminado!",
                            text: "Your file has been deleted.",
                            icon: "success"
                            });
                        }
                    });
                    });
    </script>
<?php endif; 
?>





<?= $this->endSection();?>

