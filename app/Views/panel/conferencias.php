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
                        <a href="<?=route_to('nueva_conferencia')?>" class="btn btn-secondary btn-sm">Agregar nuevo</a><br><br>
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h3 class="card-title">Lista de Conferencias    </h3>
                                </center>
                            </div>
                            <div class="card-body">
                                <table id="table-conferencias" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Conferencia</th>
                                            <th>Fecha</th>
                                            <th>Horario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($conferencia)){
                                            $html='';
                                            $numero=0;
                                            foreach ($conferencia as $conferen) {
                                                $html.='
                                                <tr>
                                                    <td>'.++$numero.'</td>
                                                    <td>'.$conferen->nombre_conferencia.'</td>
                                                    <td>'.$conferen->fecha_conferencia.'</td>
                                                    <td>'.$conferen->hora_conferencia.'</td>
                                                    <td>
                                                        <a href="'.route_to("conferencia_detalles", $conferen->id_conferencia).'" class="btn btn-warning text-white"><i class="fas fa-info-circle"></i> Detalles</a>
                                                        <a href="'.route_to("eliminar_conferencia", $conferen->id_conferencia).'" class="btn btn-danger text-white"><i class="fas fa-times-circle"></i> Eliminar</a>
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
<script src=<?= base_url(ESPECIFICOS_JS.'conferencias.js')?>></script>
<script src=<?= base_url(ESPECIFICOS_JS.'funciones.js')?>></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js "></script>

<?php
// Comprueba si hay un mensaje de alerta en la sesión
$mensaje_alerta = session()->getFlashdata('mensaje_alerta');
if ($mensaje_alerta !== null):
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                            title: "¡Eliminado!",
                            text: "<?= $mensaje_alerta; ?>",
                            icon: "success"
                        })                    
                    });
    </script>
<?php endif; 
?>





<?= $this->endSection();?>

